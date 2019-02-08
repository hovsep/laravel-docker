## Description

This is Laravel in Docker demo project. It has 3 containers: composer, php and mysql.
By default app will be deployed to `localhost:9000`.
If `9000` port is busy on your machine please change it in root `.env` file. 
App source code is mounted as volume, so you can edit it in your favorite IDE and changes will be applied immediately.
Database will be seeded with test data automatically. 

Enhancement #4 (List the review with the highest and the lowest rating for a particular company. Try to make it as efficient as possibility) is implemented.
Reviews are compared by summary rating which is a simple sum of all ratings within given review.
`lowest_review` and `highest_review` are returned when particular company is shown.

* REST endpoints:
- `GET /api/company` - returns all companies
- `GET /api/company/<id>` - returns single company by id
- `POST  /api/review` - create new review 

* Tests:
The app is written in TDD style. You can find tests in `app-src/tests` directory. 
Tests are run automatically when containers are created. 
You can run tests manually (after running `docker-compose up`) by running:
`sudo docker exec laravel-docker_php_1 ./vendor/bin/phpunit`

Postman collection is saved in `app-src/tests/postman_collection.json`.

## Prerequisites
 - Docker (18.09.1)
 - Docker-compose (1.23.2)


## Instructions

 - Clone this repository `git clone https://github.com/hovsep/laravel-docker.git`
 - Run `cd laravel-docker && sudo docker-compose up`
 
 Or just in one line: `git clone https://github.com/hovsep/laravel-docker.git && cd laravel-docker && sudo docker-compose up`
 
 ## Questions
Q: How would you describe your coding style? What makes your code clean? Can you point out an example?
 * A: I use sort of mix of 3 coding styles: Google, Badoo and PSR-2. I think my code it pretty clean, because I follow SOLID, DRY, DIE and KISS principles.
 For example: I use observers to handle model events instead of overriding model's methods. It makes my code cleaner and easier to read.
 
Q: How maintainable is your code? What makes it maintainable?
 * A: I think my code is pretty maintainable, because it follows MVC. It is self-documented and modular. 
Using best practices such as inversion of control and containerization (Docker) makes it pretty maintainable.

Q: What would be your preferred storage for solving a problem like this in a production environment and why? What would be the alternatives?
If I were have to solve a problem like this, I would investigate the read\write loads and select appropriate storage.
For example in case of high read-load I prefer Elastic Search, to handle high write-load Apache Cassandra might be the option.
Also it could be a mix of a two or more storages, for example: MySql as primary storage and Redis as caching front-end, etc.
Managed storages also should be reviewed as clouds are quite popular nowadays (for example AWS RDS instead of MySQL).