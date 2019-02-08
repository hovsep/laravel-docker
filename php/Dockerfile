FROM php:7.2-cli

RUN docker-php-ext-install pdo pdo_mysql mbstring tokenizer ctype json bcmath && \
    apt-get update && \
    apt-get install git -y && \
    apt-get install wait-for-it -y

WORKDIR /usr/src/laravel-docker

CMD while [ ! -f ./.env ]; do echo "Waiting for composer install" && sleep 30;done && \
    wait-for-it db:3306 -t 0 -- php ./artisan migrate && \
    php ./artisan db:seed && \
    ./vendor/bin/phpunit && \
    php ./artisan serve --host=0.0.0.0
EXPOSE 8000