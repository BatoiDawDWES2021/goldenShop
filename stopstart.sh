docker stop $(docker ps -a -q)
docker-compose --project-directory ./.docker -f ./.docker/docker-compose.yml up --remove-orphans &

