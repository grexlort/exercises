Exercises
==================================

# Description #

* all php exercises follows Symfony framework project structure with PSR-4 class auto-loading
* all php exercises have unit tests
* all php exercises follows PSR-1, PSR-2, PSR-12 (draft version) and Symfony coding style 
enforced by `php-cs-fixer` with config file `.php_cs.dist`

# How to run  #

Requirements: Docker engine with Docker Compose:

* `docker-compose up -d && docker-compose exec php-fpm bash`
* `composer install`
* `./vendor/bin/phpunit`


# Exercises list #

1:
 * `tests/IntegersAddition/AdditionTest.php`

2: 
 * implementation : `src/AdditiveInverseNumbers/*`
 * tests: `tests/AdditiveInverseNumbers/*`

3:
 * implementation: `src/Aquarium/*`
 * test: `NotificationAwareAquariumTest.php`
 
4: `SQLExercises/4.sql`

5: `SQLExercises/5.sql`

# Notes #
2: I decided to use helper model `src/AdditiveInverseNumbers/Model/NumberAndInverseNumberSet.php` to improve encapsulation, 
it could be done without it (by using 3 plain arrays or anonymous associative array) but it would lead to the code quality degradation

3: 
* Aquarium ecosystem is really hard to model in synchronous PHP language, 
event cycles like fish breathing or water filtration is (in plain PHP) impossible to archive or will harm performance.
Accordingly, based on time estimation for this exercises, I assume Aquarium class should be plain class 
with implemented interface based on exercise specification and child objects like Fish or Filter.
* Relation between Aquarium, `SwimAbleLifeForms` and events like `lightOff`, `lightOn` or `foodDropedInAquarium` 
 in language like `JavaScript` can be done by using `Observer` or `Observable` pattern but due to 
  * synchronous nature of PHP
  * lack of good implementation of `Subject/Observer` design pattern 
  (however there is couple of `Mediator` implementations like `symfony/event-dispatcher`)
  * sake of simplicity of this exercise and time-box
  
  I decided to use for each loop
  
4:
* escaping or renaming the 'date' field should be considered, due to possible collision with reserved key of many SQL databases.
* I prepared 3 version of this query for MySQL, SQL standard (without `YEAR` non standard function), and with sub-query.

5:
* escaping or renaming the 'system_user' table should be considered, due to possible collision with reserved key of many SQL databases.