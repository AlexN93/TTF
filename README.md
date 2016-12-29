##TTF

This repo contains the source code of TTF Assignment  <br>
Author: Aleksandar Nikolov <br>

##Tech Stack:
+ PHP(Symfony 3)
+ MySQL db
+ FOSRestBundle
+ PHPUnit

##API spec:
+ POST :  /api/v1/mappings <br>
```
Body request : 
{ "a": false, "b": true, "c": true, "d": 1, "e": 2, "f": 3 }
```

Expected response <br>
```
{
    "success": true,
    "data": {
        "id": 1,
        "a": false,
        "b": true,
        "c": true,
        "d": 1,
        "e": 2,
        "f": 3,
        "x": "T",
        "y": 0.97
    }
}
```

+ GET: /api/v1/mappings <br>
```
{
    "success": true,
    "data": [{
        "id": 1,
        "a": false,
        "b": true,
        "c": true,
        "d": 1,
        "e": 2,
        "f": 3,
        "x": "T",
        "y": 0.97
    }]
}
```

+ GET: /api/v1/mappings/record_id <br>
```
{
    "success": true,
    "data": {
        "id": 1,
        "a": false,
        "b": true,
        "c": true,
        "d": 1,
        "e": 2,
        "f": 3,
        "x": "T",
        "y": 0.97
    }
}
```

##Getting started:
To run this server, you will need: <br>
1. You will need Apache web server and MySQL db installed <br>
2. To persist data you need a proper connection. Setting database connection parameters is required in app/config/parameters.yml <br>
3. Installing and running through terminal <br>
```
$ git clone https://github.com/AlexN93/TTF
$ composer install
$ php bin/console doctrine:schema:update --force
$ php bin/console server:run
```

##Fixtures:
Fixtures can be loaded from ApiBundle/DataFixtures/ORM/LoadRecordsData.php into the database <br>
```
$ php bin/console doctrine:fixtures:load 
```

## Unit tests:
There are 4 tests that try the entity validation and api. To run them you will need [phpunit](https://phpunit.de/) globally installed or use the one in the project. <br>
Navigate to the project folder and run <br>
```
$ phpunit -c app/
```
This should return the following <br>
```
PHPUnit 5.7.5 by Sebastian Bergmann and contributors.

.......                                                             7 / 7 (100%)  

Time: 11.86 seconds, Memory: 42.75MB  

OK (7 tests, 27 assertions)
```