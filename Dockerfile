FROM nginx
RUN apt-get update -y && apt-get install -y vim php5-fpm php5-intl php-apc php5-gd php5-intl php5-mysqlnd php5-pgsql php-pear php5-cli php5-curl && rm -rf /var/lib/apt/lists/*
RUN echo "catch_workers_output = yes" >> /etc/php5/fpm/php-fpm.conf
ADD default.conf /etc/nginx/conf.d/default.conf
ADD . /var/www/html
EXPOSE 80 443
CMD service php5-fpm start && nginx -g "daemon off;"