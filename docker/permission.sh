#!/bin/bash

chown -R www-data:www-data /var/www/html
usermod -a -G www-data sail
cd /var/www/html
chown -R $USER:www-data /var/www/html
find /var/www/html -type f -exec chmod 664 {} \;
find /var/www/html -type d -exec chmod 775 {} \;
chgrp -R www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R ug+rwx /var/www/html/storage /var/www/html/bootstrap/cache
