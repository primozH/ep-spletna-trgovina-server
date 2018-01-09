cd /etc/apache2/
sudo mkdir ssl
cd ssl
sudo cp /var/www/html/spletna-trgovina/certs/server/*.pem .
sudo cp /var/www/html/spletna-trgovina/certs/spletna-trgovina.conf /etc/apache2/sites-available/spletna-trgovina.conf

sudo a2ensite spletna-trgovina.conf
sudo systemctl restart apache2
