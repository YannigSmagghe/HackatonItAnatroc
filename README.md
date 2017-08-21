# HackatonItAnatroc
Welcome !

Pré-requis :
Docker :
https://docs.docker.com/engine/installation/linux/docker-ce/ubuntu/#install-using-the-repository
sudo nano /etc/apt/sources.list.d/additional-repositories.list
ajouter : 
deb [arch=amd64] https://download.docker.com/linux/ubuntu trusty stable

sudo usermod -aG docker $USER
logout / login


Docker compose :
⇒ sudo curl -L https://github.com/docker/compose/releases/download/1.14.0/docker-compose-`uname -s`-`uname -m` -o /usr/local/bin/docker-compose
⇒ sudo chmod +x /usr/local/bin/docker-compose


lancer le projet :
⇒  docker-compose up -d
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
