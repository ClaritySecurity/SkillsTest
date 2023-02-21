FROM php:8.1-fpm-alpine AS php

ENV UID=1001
ENV GID=1001

RUN mkdir -p /var/www/html

WORKDIR /var/www/html

# MacOS staff group's gid is 20, so is the dialout group in alpine linux. We're not using it, let's just remove it.
RUN delgroup dialout

RUN addgroup -g ${GID} --system laravel
RUN adduser -G laravel --system -D -s /bin/sh -u ${UID} laravel

RUN apk add nginx supervisor ldb-dev libldap openldap-dev aws-cli openrc zlib-dev libpng-dev redis

ADD site/default.conf /etc/nginx/http.d/
COPY site/nginx.conf /etc/nginx/nginx.conf
COPY site/php.ini-production /usr/local/etc/php/php.ini
COPY --chown=laravel:laravel ./SkillsTest /var/www/html

COPY nginx/ssl/certs/nginx-selfsigned.crt /etc/ssl/certs/nginx-selfsigned.crt
COPY nginx/ssl/private/nginx-selfsigned.key /etc/ssl/private/nginx-selfsigned.key

RUN sed -i "s/user = www-data/user = laravel/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = laravel/g" /usr/local/etc/php-fpm.d/www.conf
RUN echo "php_admin_flag[log_errors] = on" >> /usr/local/etc/php-fpm.d/www.conf

RUN docker-php-ext-configure ldap && \
    docker-php-ext-install pdo pdo_mysql ldap gd

RUN docker-php-ext-configure pcntl --enable-pcntl \
  && docker-php-ext-install \
    pcntl

CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]

COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN /usr/bin/composer update
RUN /usr/bin/composer install --optimize-autoloader

RUN mkdir -p /var/docker
COPY --chown=laravel:laravel site/init.sh /var/docker
RUN chmod 775 /var/docker/init.sh

#create some log files for our different services
RUN touch /var/log/nginx/error.log
RUN touch /var/log/nginx/access.log
RUN touch /var/log/nginx/php-error.log
RUN touch /var/log/nginx/php-access.log
RUN touch /var/log/nginx/worker.log

RUN chown -R laravel:laravel /var/log
RUN chown -R laravel:laravel /var/lib/nginx/logs
RUN chown -R laravel:laravel /var/www/html/storage
RUN chmod g+s /var/www/html/storage/logs
RUN touch /var/www/html/storage/logs/init.log
VOLUME ["/var/www/html/storage/logs"]

FROM node:16.0-alpine AS node

FROM php

COPY --from=node /usr/lib /usr/lib
COPY --from=node /usr/local/share /usr/local/share
COPY --from=node /usr/local/lib /usr/local/lib
COPY --from=node /usr/local/include /usr/local/include
COPY --from=node /usr/local/bin /usr/local/bin

RUN npm install

EXPOSE 80
EXPOSE 443

CMD /bin/sh /var/docker/init.sh && redis-server & nginx -g 'daemon off;'
