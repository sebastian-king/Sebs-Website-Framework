<?php
require("../template/top.php");
require(BASE . "/template/functions/hash.php");
if (isset($_POST['username'])) {
	do {
		$required = array("username", "password");
		foreach ($required as $key => $val) {
			if (!isset($_POST[$val]) || !strlen($_POST[$val]) > 0) {
				$error = "You must define a $val.";
				break 2;
			}
		}
		$q = $db->query("SELECT * FROM `users` WHERE username = '".$db->real_escape_string($_POST['username'])."' LIMIT 1");
		if (!$q->num_rows > 0) {
			$error = "Incorrect username or password.";
			break;
		} else {
			$r = $q->fetch_array(MYSQLI_ASSOC);
		}
		if (!password_verify($_POST['password'], $r['password'])) {
			$error = "Incorrect username or password.";
			break;
		} else {
			if (@$_POST['remember-me'] == 1) {
				$expires = strtotime("+1 year"); // almost never?
			} else {
				$expires = 0;
			}
			$fingerprint = get_fingerprint();
			$auth_session_id = obfuscate_hash(sha1($fingerprint . session_id())); // based on IP, time, /dev/urandom and a PHP PRNG (PLCG) and fingerprint calculated above
			session_regenerate_id();
			// possibly an odd solution but it works, the hashes are random and hard to read and should be relatively unique per device
			$auth_session_name = obfuscate_hash(bin2hex(random_bytes(32))); // just really random
			$db->query("INSERT INTO auth_sessions
			(session_id,
			session_name,
			fingerprint,
			uid,
			expires)
			VALUES
			('".$db->real_escape_string($auth_session_id)."',
			'".$db->real_escape_string($auth_session_name)."',
			'".$db->real_escape_string($fingerprint)."',
			'".$db->real_escape_string($r['id'])."',
			'".$db->real_escape_string($expires)."')
			") or die($db->error); // remove this for security
			
			setcookie(COOKIE_PREFIX . "_SESSION_ID", $auth_session_id, $expires, '/', WEBSITE_DOMAIN, true, true);
			setcookie(COOKIE_PREFIX . "_SESSION_NAME", $auth_session_name, $expires, '/', WEBSITE_DOMAIN, true, true);
			setcookie("remember", $r['username'], time()*2, '/auth/');
			
			if (isset($_GET['returnto'])) {
				header("Location: //{$_SERVER['SERVER_NAME']}/".preg_replace("/^\//i", "", $_GET['returnto']));
			} else {
				header("Location: /me/");
			}
			die();
		}
	} while (false);
}
?><!-- this design will work with twitter bootstrap -->
<body>
	<div id="container">
        <?php if (@$error) {
			echo "<center><div class='well well-small' style='width:auto; display:inline-block;'>$error</div></center>";
		} ?>
		<div class="cls-content">
			<div class="cls-content-sm panel">
				<div class="panel-body">
					<p class="pad-btm">Sign in to your account</p>
					<form action="" method="POST">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-user"></i></div>
								<input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo @$_POST['username']; ?>">
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
								<input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo @$_POST['password']; ?>">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-8 text-left checkbox">
								<label class="form-checkbox form-icon">
								<input type="checkbox" name="remember-me" value="1" <?php if (@$_POST['remember-me'] || @$_COOKIE['remember'] == "true") { echo "checked='checked'"; } ?>> Remember me
								</label>
							</div>
							<div class="col-xs-4">
								<div class="form-group text-right">
								<button class="btn btn-primary text-uppercase" type="submit">Sign In</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="pad-ver">
				<a href="forgot-password" class="btn-link mar-rgt">Forgot password?</a>
			</div>
		</div>
	</div>
