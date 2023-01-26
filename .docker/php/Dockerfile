FROM thecodingmachine/php:8.1-v4-fpm

#RUN docker-php-ext-install -j$(nproc) iconv tokenizer intl xml soap mcrypt opcache json pdo pdo_mysql mysqli mbstring

COPY ./ /var/www/html/

WORKDIR /var/www/html/

CMD ["php-fpm"]

EXPOSE 9000
