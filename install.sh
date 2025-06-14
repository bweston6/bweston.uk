#!/bin/sh

mkdir php/public/assets/.cache
sudo chown www-data:www-data php/public/assets/.cache

# create a new network called "server"
docker network create server

# pull and start all services 
docker compose up -d
