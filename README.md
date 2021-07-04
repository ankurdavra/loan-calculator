# Simple Calculator

Simple Calculator using Symfony

## Using the Calculator Application
First please clone the project onto your machine. Once the project is cloned onto your machine please change your working directory to it.

Please make sure that you change env DB URL according to your local mysql configuration

Now we will run symfony using the following command:

```shell
php bin/console server:run 0.0.0.0
```

You can then open a web browser and navigate to <http://localhost:8000/calculator> to see the calculator.

You can visit https://localhost:8000/get-results for all the calculator operations in last 24 hours.

This is API Endpoint https://localhost:8000/api/v1/get-results you can use it in Postman.

You will be presented with a form that will allow you to enter two numbers and an operation.

## Running Unit Tests
The project includes some unit tests that test some core functionality of the application. To run theses tests and ensure they are passing following any code changes please run:

```shell
php ./vendor/bin/phpunit
```
