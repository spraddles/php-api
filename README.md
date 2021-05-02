# php-api

1. Install docker on system

2. Build your own container
docker build -t php-api-dev . -f ./docker-files/Dockerfile.dev
-t:  tag
.: current DIR
-f: docker file name

3. Run container
docker run -p 8000:8000 -v $PWD:/php-api-run php-api-dev
-p: port mapping (host:container)
-v: volume mount DIR on local into container
-$PWD: is the DIR of the code, make sure you're in the right place

Note: Type 'exit' to leave container in terminal