<?php
require("../template/top.php");
if (isset($_COOKIE[COOKIE_PREFIX . '_SESSION_ID']) || isset($_COOKIE[COOKIE_PREFIX . '_SESSION_NAME'])) {
	setcookie(COOKIE_PREFIX . '_SESSION_ID', false, 1, '/', WEBSITE_DOMAIN, true, true);
	setcookie(COOKIE_PREFIX . '_SESSION_NAME', false, 1, '/', WEBSITE_DOMAIN, true, true);
	
	$db->query("DELETE FROM auth_sessions WHERE session_id = '" . $db->real_escape_string($_COOKIE[COOKIE_PREFIX . '_SESSION_ID']) . "' OR session_name = '" . $db->real_escape_string($_COOKIE[WEBSITE_NAME . 'SESSION_NAME']) . "' LIMIT 1");
}

session_regenerate_id();
session_unset();
session_destroy();

?>
<body>
	<div id="container">
        <center><div class='well well-small' style='width:auto; display:inline-block;'>You have been logged out.</div></center>
		<div class="cls-content">
			<div class="cls-content-sm panel">
				<div class="panel-body">
					<p class="pad-btm">Sign in to your account</p>
					<form action="/auth/login" method="POST">
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
</body>
