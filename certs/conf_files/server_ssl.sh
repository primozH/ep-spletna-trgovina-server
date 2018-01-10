#!/usr/bin/env bash
# INSTALL REQUIREMENTS
sudo apt get php...


# INSTALL LARAVEL
composer update

php artisan storage:link
php artisan migrate:fresh --seed


# DOVOLJENJA
sudo chowm -R www-data /var/www/html/spletna-trgovina
sudo chmod -R 775 /var/www/html/spletna-trgovina

# APACHE CONF
# SSL certifikati
cd /etc/apache2/
sudo mkdir ssl
cd ssl
sudo cp /var/www/html/spletna-trgovina/certs/server/*.pem .

# SERVER
cd /etc/apache2/sites-available
sudo cp /var/www/html/spletna-trgovina/certs/conf_files/*.conf .

sudo a2ensite spletna-trgovina.conf
sudo a2ensite spletna-trgovina-ssl.conf

sudo systemctl restart apache2
