# bushmen quote website(bushmen-site)
FROM       php:7.1.2-apache
#EXPOSE 80
MAINTAINER  Daniel

#RUN apt-get update \
#        && apt-get install -y \
#                && apt-get update \
#                && apt-get install -y \
#                    make \
#                    git \
#                    curl \
#                    vim \
#                    vim-gnome


RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
 # Create application environment
COPY src/ /var/www/html/
