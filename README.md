# Simple Loan Calculator

Loan Calculator using Symfony

## Using the Loan Calculator Application
First please clone the project onto your machine. Once the project is cloned onto your machine please change your working directory to it.

Please make sure that you change env DB URL according to your local mysql configuration as I have made databse linking.

Now we will run symfony using the following command:

```shell
php bin/console server:run 0.0.0.0
```

You can then open a web browser and navigate to https://127.0.0.1:8000/investor to add the Investor.

You can visit https://127.0.0.1:8000/calculate-interest for interest calculation.

## Running Unit Tests
The project includes some unit tests that test some core functionality of the application. To run theses tests and ensure they are passing following any code changes please run:

```shell
php ./vendor/bin/phpunit
```
