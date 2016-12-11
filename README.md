# Sebs-Website-Framework
My Framework for building PHP-based websites that are secure, easy to use and easy to modify and easy to set up.
The Framework works basically as a header file for every one of the website's PHP file, although it comes with MySQL user support, a nice .htaccess, apache website configuration and tips for SSL and webroot FTP access.

The Framework was designed while I was building and managing websites for a multitude of different end-users who wanted to be able to easy edit their in-page content but not have to worry about programming, meanwhile not being held back by the limitations of a content manager/CMS. It acheives this by providing only basic HTML and hiding away all of the technical aspects of the website allowing the end-user to directly edit their design and content.

It is designed to be the most efficient form of managing a website and relies upon no third party tools.

-- Provides --

.htaccess

certbot

apache site config -- optional (3rd party)

vsftpd config (multiuser?) -- optional (3rd party)

user sql

session sql

email sql -- optional

template folder (header/top/footer/functions) -- must explain all functions and arguments

header for authentication files:
login
register
logout
including a global userinformation variable header
