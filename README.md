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

## Reminder

- The php container has static ip 172.20.0.10
- The node container has static ip 172.20.0.11

### Package, tools, ...
- php fpm 7.1
- nginx
- mysql 5.7
- maildev
- nvm
- phpmyadmin
- composer

### Port
- 8080:80 nginx
- 1080:80 maildev front web
- 1025:25 maildev smpt
- 10137:10137 Blackfire
- 9000:9000 xdebug
- 8888:80 phpmyadmin
