# Sebs-Website-Framework
My Framework is for building PHP-based websites that are secure, easy to use and easy to modify and easy to set up.

The Framework works basically as a header file for every one of the website's PHP file, although it comes with MySQL user support, a nice .htaccess, apache website configuration, tips for SSL and webroot FTP access.

The Framework was designed while I was building and managing websites for a multitude of different end-users who wanted to be able to easily edit their in-page content but not have to worry about programming--but at the same time not being held back by the limitations of a free content manager/CMS. It acheives this by providing only basic HTML and hiding away all of the technical aspects of the website allowing the end-user to directly edit their design and content.

When used in conjuction with Adobe Dreamweaver, it allows for CMS-style drag and drop page building abolity.

It is designed to be the most efficient form of managing a website and relies upon no third party tools.

The provided files are detailed below:

### .htaccess
- The .htaccess file includes a handy rewrite rule that removes the need for the .php in URL, therefore /login.php can be referenced by /login, for example.
- Rule to force use of www.
- Rule to force SSL (if enabled)
- hides directory listings for security

### template
This is the brunt of the website, here are many important and fundamental website features.
- MySQL database configuration
- Style and HTML header and footer templates for all pages
- User authentication and management
- Email function
- Post slug function for turning user inputted strings into SEO friendly links

### auth
The authentication modules included are:
- Login
- Logout
- Register
- Forgot password

### certbot
Included in the installer, is a recommended tool called `certbot` which will provide free and automated SSL for your website

### apache
An example apache configuration file is provided, this file is easy for `cerbot` to use to make SSL and also contained `AllowOverride  All` that is needed for `.htaccess` to be executed.

### sql
SQL templates included:
- Users
- Emails sent
- Authentication sessions

### vsftpd configuration
VSFTPD is a bare minimum, and _very secure_ FTP daemon. Its configuration is sometimes complicated, so a helpful configuration example has been included.
