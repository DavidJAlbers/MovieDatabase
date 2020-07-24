# MovieDatabase
This is an example web application on a Docker LAMP stack (Linux, Apache, MariaDB, PHP).

> **It was created for self-educational purposes only and is by no means guaranteed to function properly!**

## Features
You can add movies to track with their title, producer, publishing date, and price.
Details on a movie can be seen on a separate details page, and movie records can also be deleted.

## Usage
After cloning the repo, use `docker-compose up` to initially build and start the two containers powering the application.
Make sure you have Docker installed (https://www.docker.com/). Use `docker-compose down` to stop the containers.

Application data will be persisted using a Docker volume.
To also remove the volume on stop, use `docker-compose down -v`.
On restart, a new database schema will be generated.
