# Utilisez l'image PHP avec Apache
FROM php:apache

# Install MySQL client
RUN apt-get update && apt-get install -y default-mysql-client

# Installez les extensions MySQLi et PDO
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Activez le module rewrite Apache
RUN a2enmod rewrite

# Copiez la configuration du site Apache
COPY ./docker/apache/apache-config.conf /etc/apache2/sites-available/000-default.conf

# Redémarrez le serveur Apache
RUN service apache2 restart