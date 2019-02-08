FROM php:7.2-cli

RUN docker-php-ext-install pdo pdo_mysql mbstring tokenizer ctype json bcmath && \
    apt-get update && \
    apt-get install git -y && \
    apt-get install wait-for-it -y

WORKDIR /usr/src/laravel-docker

CMD while [ ! -f ./.env ]; do echo "Waiting for composer install" && sleep 10;done && \
    wait-for-it db:3306 -t 0 -- echo "DB is now available!" && \
    php ./artisan migrate && \
    php ./artisan db:seed && \
    ./vendor/bin/phpunit && \
    php ./artisan serve --host=0.0.0.0 --port=${APP_PORT}
EXPOSE ${APP_PORT}