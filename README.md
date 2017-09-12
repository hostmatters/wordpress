# WordPress Boilerplate
## ACF Pro + Webpack + SCSS + BootStrap 4 + Composer + Docker

This project aims to provide a simple to use boilerplate for WordPress by bringing in multiple modern web technologies for client side, server side and hosting. This project approaches WordPress from a professional development perspective and is aimed at developers. It is not intended to be used by non developers or people new to WordPress. It is designed to create a philosphy for modern WordPress development using NodeJS, composer, docker and be continious integration ready.

## Advanced Custom Fields Pro

Please note that you will be required to have an ACF Pro key in order to use this boilerplate out of the box. If you do not intend to use ACF then you can remove the acf component from composer.json however this is highly advised against doing.

## Local Development

For local development update the docker-compose configuration file found within .docker/local (if needed) and then perform the following actions. Remember that local will spin up an internal apache and mysql server unique to your project. They will be mapped against port 80, 443 and 3306 on your computer. If you already have services listening on theses addresses you will encounter errors. Either close existing services or change the mapping within the docker compose configuration file.

1. Update ACF PRO KEY in the .env file
2. Run composer install
3. Run yarn install
4. Run yarn build:dev
5. Run sudo docker-compose -f .docker/local/docker-compose.yml build
6. Run sudo docker-compose -f .docker/local/docker-compose.yml up
7. Access and perform the setup at http://localhost

## Theme Development

All theme development is done within the \theme folder. When deployed the theme folder will be moved or symlinked (depending on the deployment) to public/wp-content/themes/boilerplate. These settings can be changed within the docker-compose.yml files and the Dockerfile however it is recommended to leave as default.

## SCSS and JS development

All JS and SCSS development is done within the src folder. When webpack is run a dist folder will be created within the theme folder. A webpack helper class will include the compiled JS and CSS assets within your theme.

Be sure to run yarn install and then yarn build:dev when you first setup your project

## Adding plugins

The project is set up to easily work with deployments such as AWS or Google cloud where uploads, plugins, cache is better stored in persistent storage and shared with multiple instances. This is of course only optional. If you wish to install custom plugins place them within the storage/plugins folder. They will automatically be copied to /public/wp-content during deploy

## File uploads

To better work with AWS and Google persistent storage all uploads can be found within the /storage/uploads folder. This folder will be copied to /public/wp-content/uploads when deployed.

## Mounting persistent storage

Mount your persistent volumes individually to /public/wp-content/plugins, /public/wp-content/uploads etc

## Adding ACF Key

TODO

## Customizing BootStrap

TODO

## Adding fonts

TODO

## Private networks

Add the following to the container instance

networks:
  - docker-net

Add the following to the docker-compose

networks:
  docker-net:
    external: true
