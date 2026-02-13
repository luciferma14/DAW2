FROM php:8.2-apache
COPY ../frontend /var/www/html/
COPY ../backend /var/www/html/backend/
RUN docker-php-ext-install pdo pdo_mysql
