<?php
// config
require_once("config.php");

$base = BASE; // for legacy support

$current_cookie_params = session_get_cookie_params(); // is this necessary?

session_set_cookie_params(
	0,
	"/",
	'.' . WEBSITE_DOMAIN, // root domain
	true,
	true
);
session_name(COOKIE_PREFIX . "_PHP_SESSION_ID");
session_start();

$userinfo = array(); // this will be populated later, we are effectively making this a global
$session = array();

$db = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
$db->set_charset(DATABASE_CHARSET);

date_default_timezone_set(TIMEZONE);

function head($title, $heading, $auth = REQUIRE_AUTH, $breadcrumbs = array("Home" => "/"), $return = false) {
	global $base, $userinfo, $session, $db;
	
	$default_values = array(
		2 => array("auth", REQUIRE_AUTH),
		3 => array("breadcrumbs", array("Home" => "/")),
		4 => array("return", false)
	);
	
	foreach (func_get_args() as $key => $val) {
		if ($val == NULL) {
			$$default_values[$key][0] = $default_values[$key][1];
		}
	}
	
	if ($auth == true) {
		$auth_result = auth((int)$auth);
		if (!is_array($auth_result)) {
			die(header("Location: /auth/login"));
		}
		$userinfo = $auth_result[0];
		$session = $auth_result[1];
		date_default_timezone_set($userinfo['timezone']);
	}
	
	$title = htmlspecialchars($title ? $title . " | " . WEBSITE_NAME : WEBSITE_NAME);
	
	//$breadcrumbs = array();
	$i = 0;
	foreach ($breadcrumbs as $key => $val) {
		if (++$i === count($breadcrumbs)) {
			$breadcrumbs[$i] = array($val, $key, false);
		} else {
			$breadcrumbs[$i] = array($val, $key, true);
		}
	}
	
	if ($heading == true && gettype($heading) == "boolean") {
		$heading = $title;
	}
	
	if ($return == true) {
		ob_start();
		require("$base/template/header.php");
		$return = ob_get_clean();
		return $return;
	} else {
		require("$base/template/header.php");
		return;
	}
}

function footer($die = true) {
	global $base;
	require("$base/template/footer.php");
	if ($die == true) {
		die();
	}
}

function email($to, $subject, $message, $replyto = false, $headers = NULL) {
	global $db;
	
	$replyto = ($replyto ? "$replyto" : EMAIL_NAME . ' <' . EMAIL_USER . '@' . EMAIL_DOMAIN . '>');
	if (!$headers || $headers == NULL) {
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: ' . EMAIL_NAME . ' <no-reply@' . EMAIL_DOMAIN . '>' . "\r\n" .
		'Reply-To: ' . $replyto . "\r\n" .
		'X-Mailer: PHP/' . phpversion();
	}
	
	$status = mail($to, $subject, $message, $headers);
	
	$db->query("
				INSERT INTO sent_emails (`to`, `subject`, `message`, `headers`, `status`)
				VALUES (
				" . $db->real_escape_string($to) . ",
				" . $db->real_escape_string($subject) . ",
				" . $db->real_escape_string($message) . ",
				" . $db->real_escape_string($headers) . ",
				" . $db->real_escape_string($status) . "
				)"
	);
	
	//if (!$q) {
		//echo $db->error;
	//}
	
	return $status;
}

function get_fingerprint() {
	return md5($_SERVER['HTTP_USER_AGENT']);
}

function auth($auth_level = 1) {
	global $db;
	if (isset($_COOKIE[COOKIE_PREFIX . '_SESSION_ID']) && isset($_COOKIE[COOKIE_PREFIX . '_SESSION_NAME'])) {
		$q = $db->query("SELECT * FROM auth_sessions WHERE session_id = '".$db->real_escape_string($_COOKIE[COOKIE_PREFIX . '_SESSION_ID'])."' AND session_name = '".$db->real_escape_string($_COOKIE[COOKIE_PREFIX . '_SESSION_NAME'])."' AND (expires > ".time()." OR expires = 0) LIMIT 1") or die($db->error); //or die($db->error); // this is potentially a security risk if a user sees one of these errors
		if ($q->num_rows > 0) {
			$auth_session = $q->fetch_array(MYSQLI_ASSOC);
			if (get_fingerprint() == $auth_session['fingerprint']) {
				$q = $db->query("SELECT * FROM users WHERE id = '".$db->real_escape_string($auth_session['uid'])."' LIMIT 1") or die($db->error);
				if ($q->num_rows > 0) {
					$userinfo = $q->fetch_array(MYSQLI_ASSOC);
					if ($auth_session['session'] == 1) {
						$db->query("UPDATE auth_sessions SET expires = '".$db->real_escape_string(time() + SESSION_TIMEOUT)."' WHERE id = '".$auth_session['id']."' LIMIT 1");
					}
					if ($auth_level == 2) {
						if ($userinfo['is_admin'] == 1) {
							return array($userinfo, $auth_session);
						}
					} else {
						return array($userinfo, $auth_session);
					}
				}
			}
		}
	}
	return false;
}

$timezones = timezone_identifiers_list();
