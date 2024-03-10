FROM richarvey/nginx-php-fpm:1.7.2

COPY ..

RUN apk update
RUN apk add --no-cache npm

CMD["/start.sh"]
