FROM php:7.1.5-apache

WORKDIR /var/www/html

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php --install-dir=/usr/bin --filename=composer
RUN php -r "unlink('composer-setup.php');"

# COPY ./../../src/composer.json /var/www/html

RUN a2enmod rewrite
CMD ["composer", "install", "--prefer-dist"]
CMD ["apache2-foreground"]

