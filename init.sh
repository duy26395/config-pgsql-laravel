cp ./example/.env.example ./example/.env

docker-compose up -d --build

# docker exec example_php-fpm chmod -R 777 storage/ /bin/bash
docker exec example_php-fpm php artisan key:generate