# Bushmen
A quote database and webpage that is hosted in a docker image with a PHP and Ubuntu environment
### Author

Daniel Gisolfi - All current work - dgisolfi

## Prerequisites

All requirements to run an instance of this project

- Bootstrap 4
- HTML 5
- Digital Ocean or an equivalent service
- Docker
- mySQL

## Deployment

Currently, this site exists on a Digital Ocean droplet. The droplet is pointed at the domain name: [dgisolfi.xyz](http://www.dgisolfi.xyz)

The site has been taken down to implement docker, the direct link will be placed above when all containers are up and running

## Docker Implementation

The site is currently taking advantage of a Docker container. The Dockerfile in the repository specifies, when building the image, what needs to be installed in the container as well as what files need to be copied over and to where.

To run an instance of the image execute the deploy_dgisolfi.sh file located in the repository. The script executes the commands below

```dockerfile
docker pull dgisolfi/bushmen-site
docker run --rm --name bushmen_prod -p 81:80 dgisolfi/bushmen-site
```
If necessary the port that the container is pointing to can be changed, do so change the first "80" to whatever port is desired to be used outside of the container.


## Goals

The following are possible additions and goals I would like to meet with this project

- A basic understanding and further experience using ssh with a LAMP stack and Digitial Ocean
- A basic understanding of creating and implementing a fully complete site
- A better understanding of Bootstrap and the possible advantages
- A testing ground for any future web apps
- An opportunity to gain more experience in Docker
- Additional practice creating makefiles
