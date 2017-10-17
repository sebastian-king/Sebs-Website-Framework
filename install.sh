# framework installation script -- a work in progress

mysql -e 'CREATE TABLE sent_emails (`id` int PRIMARY KEY NOT NULL AUTO_INCREMENT, `to` varchar(255), `subject` varchar(255), `message` TEXT, `headers` varchar(1000), `status` int(1));'
