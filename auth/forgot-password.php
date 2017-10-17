<?php
require("../template/top.php");
if (isset($_POST['email'])) {
	do {
		if (!isset($_POST["email"]) || !strlen($_POST["email"]) > 0) {
			$error = "You must enter your e-mail address.";
			break;
		}
		$q = mysql_query("SELECT * FROM `users` WHERE `email` = '".mysql_real_escape_string($_POST['email'])."' LIMIT 1");
		if (!mysql_num_rows($q) > 0) {
			$error = "The e-mail address you entered is not in our database.";
			break;
		} else {
			$r = mysql_fetch_array($q);
			$iid = uniqid(md5(rand()), true);
			$time = time();
			date_default_timezone_set("UTC");

			$timeInD = date('l jS \of F Y h:i:s A T', $time);
			$ip = $_SERVER['REMOTE_ADDR'];
			$host = gethostbyaddr($_SERVER['REMOTE_ADDR']);
			mysql_query("DELETE FROM lostpass WHERE user = '{$r['username']}'");
			mysql_query("INSERT INTO lostpass (iid, timereset, ip, hostname, user, email) VALUES('$iid','$time','$ip','$host','{$r['username']}','{$r['email']}')") or die(mysql_error());
				
			if (email($r['email'], WEBSITE_NAME . " password reset", "<html>Hello {$r['username']}, <br><br>Your password was requested to be reset from $host ($ip)<br>on {$timeInD},<br>here is your reset link:<br><a href=\"https://" . WEBSITE_DOMAIN . "/auth/reset-password?token=$iid\">https://" . WEBSITE_DOMAIN . "/auth/reset-password?token=$iid</a><br><br>Best regards,<br>" . WEBSITE_NAME . "</body></html>")) {
				$success = "Recovery instructions have been sent to your e-mail address.";
			} else {
				$error = "Unable to send e-mail, please contact support.";
			}
		}
	} while (false);
}
?>
<body>
	<div id="container">
        <?php
        if (@$error || @$success) {
			echo "<center><div class='well well-small' style='width:auto; display:inline-block;'>".@$error.@$success."</div></center>";
		}
		?>
		<div class="cls-content">
			<div class="cls-content-sm panel">
				<div class="panel-body">
					<p class="pad-btm">Enter your email address to recover your password. </p>
					<form action="" method="POST">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-envelope"></i></div>
								<input type="email" class="form-control" placeholder="Email" name="email">
							</div>
						</div>
						<div class="form-group text-right">
							<button class="btn btn-primary text-uppercase" type="submit">Reset Password</button>
						</div>
					</form>
				</div>
			</div>
			<div class="pad-ver">
				<a href="login" class="btn-link mar-rgt">Back to Login</a>
			</div>
		</div>
	</div>
</body>