FROM richarvey/nginx-php-fpm:1.7.2

COPY . .


CMD ["/start.sh"]
