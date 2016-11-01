# Securimag web challenge september 2016

## Goal
>Find a way to access the administration panel

## How to start it?
You need to have Docker, Docker Compose and Composer installed.

In the ``src/`` folder:
```
$ cp .env.example .env # You can edit the file to remove the debug option for example
$ composer install
```
In the root folder:
```
$ docker-compose up -d
```
You can now access the challenge through https://localhost
