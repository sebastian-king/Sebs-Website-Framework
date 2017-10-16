<?php

$account_email = "admin@movieventure.net";
$account_password = "MzJyA2xwz5s2";

if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
	if (strlen(decbin(~0)) == 64) {
		$bin = "download-64.exe";
	} else {
		$bin = "download.exe";
	}
} else {
	$bin = "download.pl";
}

chdir(dirname(__FILE__) . "/../ip2location/");

exec("../cron/$bin -package DB11LITEBIN -login \"{$account_email}\" -password \"{$account_password}\"", $output);

var_dump($output);
$output = "";

exec("../cron/$bin -package DB11LITEBINIPV6 -login \"{$account_email}\" -password \"{$account_password}\"", $output);

var_dump($output);
$output = "";

//exec('for f in $(find ./ -name "*.ZIP"); do unzip -o "$f"; rm -- "$f"; done;', $output);
//exec('for f in $(find ./ ! -name "*.BIN" -type f); do rm -- "$f"; done;', $output);

foreach (new DirectoryIterator('./') as $fileinfo) {
	if($fileinfo->isDot()) continue;
	$filename = $fileinfo->getFilename();
	$filehandler = @fopen($filename, "r");
	if (!$filehandler) continue;
	$blob = fgets($filehandler, 5);
	if (strpos($blob, 'PK') !== false) { // should mean that this is a ZIP file
		$zip = new ZipArchive;
		$res = $zip->open($filename);
		if ($res === TRUE) {
			$zip->extractTo('./');
			$zip->close();
		}
	}
}

/* this can be used to save space, although this will remove the licence files
*/
foreach (new DirectoryIterator('./') as $fileinfo) {
	if($fileinfo->isDot()) continue;
	$filename = $fileinfo->getFilename();
	if (!preg_match("/\.bin$/i", $filename)) {
		unlink($filename);
	}
}
/*
*/
