# Instalacja dockera ubuntu 16

## Docker-compose

    apt install python-pip
    
    pip install --upgrade pip

    pip install docker-compose

## Docker

    sudo apt-get install apt-transport-https ca-certificates curl software-properties-common
    
    curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
    
    sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu xenial stable"
    
    sudo apt-get update
    
    sudo apt-get install docker-ce
    
## Lokalne wersje

```
docker -v
Docker version 17.09.0-ce, build afdb6d4
docker-compose -v
docker-compose version 1.15.0, build e12f3b9
```

Jeśli jest problem z komunikacja miedzy dockerami, to można instalować pinga przez:

    apt-get install iputils-ping
    
To clear containers:

    docker rm -f $(docker ps -a -q)

To clear images:

    docker rmi -f $(docker images -a -q)

To clear volumes:

    docker volume rm $(docker volume ls -q)

To clear networks:

    docker network rm $(docker network ls | tail -n+2 | awk '{if($2 !~ /bridge|none|host/){ print $1 }}')

To setup docker

    docker-compose up
