<?php

$title = htmlspecialchars($title ? $title . " | " . WEBSITE_NAME : WEBSITE_NAME);

$breadcrumbs = array();
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
?>