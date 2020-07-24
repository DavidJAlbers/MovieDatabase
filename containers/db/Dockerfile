FROM mariadb

ENV MYSQL_ROOT_PASSWORD admin

ENV MYSQL_DATABASE movie
ENV MYSQL_USER movie-app
ENV MYSQL_PASSWORD movieappsecretpw

COPY init.sql /docker-entrypoint-initdb.d/