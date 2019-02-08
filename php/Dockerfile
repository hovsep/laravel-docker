FROM php:7.2-cli
WORKDIR /usr/src/laravel-docker
RUN docker-php-ext-install pdo pdo_mysql mbstring tokenizer ctype json bcmath
RUN apt-get update && apt-get install git -y && apt-get install wait-for-it -y
CMD wait-for-it db:3306 -t 0 -- php ./artisan migrate && php ./artisan db:seed && php ./artisan serve --host=0.0.0.0
EXPOSE 8000