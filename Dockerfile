FROM debian:jessie

RUN apt-get update && apt-get -y install apache2 && apt-get clean && rm -rf /var/lib/apt/lists/*

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /var/log/apache2

RUN /usr/sbin/a2ensite default-ssl
RUN /usr/sbin/a2enmod ssl

RUN apt-get update -y && apt-get install -y vim php5-fpm php5-intl php-apc php5-gd php5-intl php5-mysqlnd php5-pgsql php-pear php5-cli php5-curl && rm -rf /var/lib/apt/lists/*
RUN echo "catch_workers_output = yes" >> /etc/php5/fpm/php-fpm.conf
RUN /usr/sbin/a2dismod 'mpm_*' && /usr/sbin/a2enmod mpm_prefork
ADD . /var/www/html
EXPOSE 80 443 8080
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]