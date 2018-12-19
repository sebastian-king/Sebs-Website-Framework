<?php
define("BASE", "/var/www/example"); // also defined in .htaccess and accessible via getenv("BASE");
// ^ no trailing slash

define("TIMEZONE", "America/Chicago");
define("REQUIRE_AUTH", true);

define("WEBSITE_NAME", "Example Website");
define("WEBSITE_DOMAIN", "example.com");

define("EMAIL_DOMAIN", 		"example.com");
define("EMAIL_USER", 		"support");
define("EMAIL_NAME", 		"Example Site Support");

define("DATABASE_HOST", 	"localhost");
define("DATABASE_USER", 	"example_username");
define("DATABASE_PASSWORD", "example_password");
define("DATABASE_NAME", 	"example_database");
define("DATABASE_CHARSET", 	"utf8");

define("SESSION_TIMEOUT", 	1440); // 24 minutes

define("IP2LOCATION_EMAIL", "admin@example.com");
define("IP2LOCATION_PASS", "<password>");
