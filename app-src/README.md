## Tasks

### Setup API

The goal is to create a REST-API. Data is provided as a json array [data.json](./data.json). Please implement REST endpoints for the following use cases:

* A user can submit a review for a company
* A user can view companies and their average ratings
* A user can view a specific company and read all their reviews
* Add a postman collection to test and document your endpoints

### Enhancement

Choose **one** of the following and add it the API-implementation:

1. Gamification: Write a function that rewards users with badges: Users that review at least three companies, users that write a review with at least 400 characters, .... Try to come up with some ideas on your own and make the gamification system efficient and extensible.
2. Write a simple [sentiment analysis](https://en.wikipedia.org/wiki/Sentiment_analysis): Given a review as input, try to guess whether it is positive, negative or even abusive.
3. Write a "users who reviewed this company also reviewed" - function: Given a particular company list other companies that other users also reviewed.
4. List the review with the highest and the lowest rating for a particular company. Try to make it as efficient as possibility.
5. Tag cloud: Create a tag cloud with the most popular terms for a given company. Try to make it as meaningful as possible, e.g. by filtering out stop words like "the", "and", etc.

## Requirements

Use the tools you know and like. Still we need to impose the following requirements:

1. Please use git as a version control system and GitFlow has a branching model. Make sure that you have clear commit messages and understandable steps in your git-history ([How to Write a Git Commit Message](https://chris.beams.io/posts/git-commit/)).
2. Document your work.
3. Provide a readme and instructions for how we can run your solution. **Note** It should be runnable with one command. You can use the built in PHP-Webserver or you can provide a docker setup ( e.g. docker-compose). You can also assume composer to be present.
4. You can decide if you want to use the provided [data.json](./data.json) as a data store, or you can implement it with any other storage. You **don't need to** use a relational database, but you can. 
5. Implement your solution in a test driven approach.

## Questions

Briefly try to answer the following:

* How would you describe your coding style? What makes your code clean? Can you point out an example?
* How maintainable is your code? What makes it maintainable?
* What would be your preferred storage for solving a problem like this in a production environment and why? What would be the alternatives? 

## Data

Data is provided via a json array in [data.json](./data.json)
