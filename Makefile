# dgisolfi website
# Author:  Daniel Nicolas Gisolfi

DEV_HOME=./src
DOCKER_IMAGE=dgisolfi/bushmen-site
APPNAME=bushmen-site

#####################
# Common Commands
#####################

intro:
	@echo "\n					BUSHMEN - QUOTE SITE"

clean:
	@echo "Deleteting Old Files"

clean_images:
	@#clean images TODO: These commands need Makefile compatibility
	@docker rmi $(docker images | awk '{print $1}')
	@docker images

clean_containers:
	@#clean Containers TODO: These commands need Makefile compatibility
	@docker kill $(docker ps -a | awk '{print $1}')
	@docker rm $(docker ps -a | awk '{print $1}')
	@docker ps -a


#####################
# Docker Commands
#####################


docker_image:
	@# Initial commands used priming devops environment
	@# Note: If docker account "dan36911" is not used; This command required
	@echo "\n				Creating bushmen-site docker image"
	@# @ln -s /Users/daniel/code-repos/Blockchain/lib /Users/daniel/code-repos/Blockchain/src
	@docker build -t bushmen-site ./src/.

dev_container:
	@# This command should be run from the local computer
	@echo "\n Creating Docker container"
	@#dq;elrkgsocker pull ${DOCKER_IMAGE}
	@#wenfdocker run -it --name bushmen_devtest --rm -p 80:80 -v ${PWD}:/DNG ${DOCKER_IMAGE} bash
	@docker run --rm -p 82:80 -v /Users/daniel/code-repos/Bushmen/src:/var/www/html/ bushmen-site
publish_image: docker_image
	@echo "\n				Create bushmen-site docker image..."
	@#docker login
	@docker tag bushmen-site ${DOCKER_IMAGE}:latest
	@docker push ${DOCKER_IMAGE}
