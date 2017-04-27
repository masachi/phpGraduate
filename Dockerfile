FROM debian:jessie
ENV NGINX_VERSION=1.11.9-1~jessie
RUN apt-key adv --keyserver hkp://pgp.mit.edu:80 --recv-keys 573BFD6B3D8FBC641079A6ABABF5BD827BD9BF62 &&
    echo "deb http://nginx.org/packages/mainline/debian/ jessie nginx" >> /etc/apt/sources.list &&
    apt-get update &&
    apt-get install --no-install-recommends --no-install-suggests -y ca-certificates nginx=${NGINX_VERSION} nginx-module-xslt nginx-module-geoip nginx-module-image-filter nginx-module-perl nginx-module-njs gettext-base &&
    rm -rf /var/lib/apt/lists/*
RUN ln -sf /dev/stdout /var/log/nginx/access.log && ln -sf /dev/stderr /var/log/nginx/error.log
EXPOSE 80 443
RUN apt-get update -y && apt-get install -y vim php5-fpm php5-intl php-apc php5-gd php5-intl php5-mysqlnd php5-pgsql php-pear php5-cli php5-curl && rm -rf /var/lib/apt/lists/*
RUN echo "catch_workers_output = yes" >> /etc/php5/fpm/php-fpm.conf
ADD default.conf /etc/nginx/conf.d/default.conf
ADD . /var/www/html
EXPOSE 80 443
CMD service php5-fpm start && nginx -g "daemon off;"