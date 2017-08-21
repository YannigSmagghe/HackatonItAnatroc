# HackatonItAnatroc
Welcome !
lancer le projet :
docker-compose up -d
⇒  docker-compose exec node bash
⇒  npm i
⇒  node_modules/.bin/gulp

Pour le dev
⇒  node_modules/.bin/gulp watch
autre terminal
⇒  npm start

https://github.com/GoogleChrome/webplatform-samples/blob/master/webspeechdemo/webspeechdemo.html



## Setup project

To start all containers

`$ docker-compose up -d`

Then execute these following command to enter in node container (front)

`$ docker-compose exec node bash`

Then execute these following command to enter in php container (back)

`$ docker-compose exec php bash`

(For back-end developers)
You can execute domain.sh to add hostname for ip container

## Network configuration

A reverse proxy with static ip `172.40.0.10` is used to serve api.anatroc and front.anatroc apps.

You need to edit your local `/etc/hosts` and add this configuration `172.40.0.10 api.anatric front.anatroc`

Front : [http://front.anatroc](http://front.anatroc)
Api : [http://front.anatroc](http://front.anatroc)
