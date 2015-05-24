[![Build Status](https://travis-ci.org/e-moe/sonata.svg?branch=feature%2Fsqlite)](https://travis-ci.org/e-moe/sonata)

How to install:

1. composer install

2. php app/console doctrine:database:create

3. php app/console doctrine:schema:update --force

How to test:

1. php app/console doctrine:fixtures:load

2. ./bin/phpunit -c app/

3. ./bin/phpcs --standard=PSR2 src/

4. ./bin/phpcpd src/

5. ./bin/phpmd src text cleancode,codesize,controversial,design,naming,unusedcode