# Development stack with Docker, [PHP 7.1 FPM, MySQL 5.7, PhpMyAdmin]

This is a simple stack for development based on docker for multi sites

## How to use

Add your nginx configuration file in sites directory, execute the `domain.sh` to update your /etc/hosts :boom: then run `docker-compose up -d` enter to the php container and execute `sudo service nginx start`.

Type the server_name you've setup in your nginx configuration, if your nginx configuration is good the website must be up.

## In depth

A user is created in the php container to avoid permissions problems with your host with guid uuid 1000:1000 (maybe you need to adapt this).
The password of the user is his name.

NVM is installed from https://github.com/creationix/nvm you can set by default nvm and node version by passing `node_version` and `nvm_version` as argument to the php definition in `docker-compose.yml`

Two important directories is shared from the host to the php container `./app:/usr/share/nginx/html` and `./sites/:/etc/nginx/sites-enabled/`.
You need to put your code under the `app` directory like that `app/my_dir_to_code`.
Add the nginx configuration to `sites` directory, this directory is shared to avoid a copy from the build of the image or copy the files into container from command (annoying).

    root /usr/share/nginx/html/example.mysite/; (example.mysite is your dir code under app host directory app/example.mysite)
    server_name example.mysite; (Add your domain name and in your /etc/hosts or equivalent on your host with the ip php container 172.20.0.10 or use the domain.sh script)

## Why i'm not using nginx and node as container ?

I've alreay experienced a complicated issue with the nginx container and other tools (not the container himself but other tools).
For the node container i've some tools from php container that trigger npm, gulp like composer install and other stuff.

## Reminder

- The php container has static ip 172.20.0.10.

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