#!/bin/bash
rm -rf ./db-data/
rm -rf ./app-src/storage/logs/*.log
cp ./app-src/.env.example ./app-src/.env
cd ./app-src/ && composer install && cd ../
docker-compose up --build