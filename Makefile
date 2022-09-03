
run:
    docker container run --rm -v ${dir}:/app/ php-composer:2.0 php /app/src/test.php
