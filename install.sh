# framework installation script -- a work in progress

mysql DATABASE_NAME < sql/*

useradd sebs_web_framework_user
passwd sebs_web_framework_user

`cat tools/cron/crontab` > /etc/cron.d/sebs_web_framework
