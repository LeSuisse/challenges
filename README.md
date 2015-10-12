# Securimag web challenge september 2015
Quick & dirty, please don't look at the code ;)

## Objectifs
>Une page a été mise en place pour récupérer quelques informations techniques.
>Les administrateurs peuvent accèder à une zone dédiée et certains administrateurs ont des droits supplémentaires.
>Trouver un moyen d'accèder à la zone d'administration puis de capturer l'accès d'un de ces super-admins.

## What do you need to do?
* Step 1: Access the admin area
* Step 2: Capture the cookie of a super admin

The super admin come to the admin page every 30 seconds and does not have Flash
installed (we are in 2015 for for crying out loud!).

## How to start it
You need to have Docker and Docker Compose installed.

In the root folder just run:
```
$ docker-compose up -d
```
You can now access the challenge through http://localhost
