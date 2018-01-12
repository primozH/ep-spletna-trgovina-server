#!/usr/bin/env bash
# INSTALL REQUIREMENTS
sudo apt-get install -y python-software-properties
sudo add-apt-repository -y ppa:ondrej/php
sudo apt-get update -y
sudo apt-get install -y git php7.1 libapache2-mod-php7.1 php7.1-cli php7.1-common php7.1-mbstring php7.1-gd php7.1-intl php7.1-xml php7.1-mysql php7.1-mcrypt php7.1-zip

# INSTALL LARAVEL
cd
mkdir composer
cd composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer


cd /var/www/html
sudo git clone https://github.com/primozH/ep-spletna-trgovina-server spletna-trgovina
cd spletna-trgovina

cp certs/conf_files/.env .

# DOVOLJENJA
sudo chown -R www-data /var/www/html/spletna-trgovina
sudo chmod -R 777 /var/www/html/spletna-trgovina

composer install

# APACHE CONF
# SSL certifikati
cd /etc/apache2/
sudo mkdir ssl
cd ssl
sudo cp /var/www/html/spletna-trgovina/certs/server/*.pem .

# SERVER
cd /etc/apache2/sites-available
sudo cp /var/www/html/spletna-trgovina/certs/conf_files/*.conf .

sudo a2enmod ssl
sudo a2enmod rewrite
sudo a2ensite spletna-trgovina.conf
sudo a2ensite spletna-trgovina-ssl.conf

sudo systemctl restart apache2