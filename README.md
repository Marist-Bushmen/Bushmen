# Bushmen
A webpage built with a mobile first design for the purpose of displaying and managing a database of quotes for the Bushmen.

Currently, this site exists on a Digital Ocean droplet. The droplet is pointed at the domain name: [dgisolfi.xyz](http://www.dgisolfi.xyz)

The site is currently deployed and on port 82 of the domain name above. 

### Author
Daniel Gisolfi - All current work - dgisolfi

## Prerequisites

All requirements to run an instance of this project

- Bootstrap 4
- Digital Ocean or an equivalent service
- Docker(and Docker compose)
- mySQL
- Apache or and equivalent web serve 


## Docker Implementation




The site is currently taking advantage of Docker Compose. As defined in the "docker-compose.yml" file the web-app consists of two services. The site and the database. Each service exists as its own container on the VM. These two containers are linked to each-other in order to allow the web site to request data from the database.

### Website
The Dockerfile in the "src/" repository specifies, when building the image, what needs to be installed in the container as well as what files need to be copied over and to where.

### Database

The db directory which holds the database files does not need a Dockerfile as it uses the mySQL:5.7.13 image. When the container is created based of this image the compose file mounts the db_init.sh script and master.sql files from the db folder.

## Deployment

To run an instance of this project you will need the following from the repository:

- docker-compose.yml
- db directory 

In the "db" directory make sure to include a database in the form of a sql file name "master.sql" as well as a folder to store backups of the database.

Once the production environment is setup with the above requirements and has docker as well as docker-compose installed, the project can be run. To do so in the directory containing the docker compose file enter the following in the command line:
```shell
docker-compose up
```
This will do a number of things 
1. Pull the latest version of both the bushmen and mysql image.
2. Initialize the php apache site on port 82
3. Initialize the mysql container on port 3306
4. Create a Database and  run the db_init.sh bash script.
5. db_init.sh will take the master.sql file and run a data dump on the newly created database

After a few moments all systems should be up and the site should be operational at port 82. 

Next, to set up the automatic backup of the mySQL container create a cron job to run at any interval, in this case I use once a day at 11:55. In the cron job set the command to run to the absolute path of where the db_backup.sh script is located. After saving, the crontab the db_backup.sh script will run at the interval set and run a data dump into the backup folder naming the file as the date it is saved on. Example of cronjob:
```shell
m  h  dom mon dow   command
55 23  *   *   *    /home/dgisolfi/projects/bushmen-site/db/db_backup.sh
``` 

## Goals

The following are goals I met with this project as well as what I had to learn to accomplish it.

- A basic understanding and further experience using ssh with a LAMP stack and Digitial Ocean
- Further experience with Bootstrap 
- An opportunity to gain more experience in Docker
- Learn Docker compose
- Additional practice creating makefiles
