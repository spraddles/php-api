# php-api


###########################################################

API procedure on LOCAL:  

Step 1. Drop database:  
dropdb postgres (first stop all services)  

Step 2. Create database:  
createdb -U postgres postgres (first start the DB server)  

Step 3. Create tables (user, user_events, temp_table):  
-php artisan migrate --path=database/migrations/2021_04_30_084401_create_tables.php  
-php artisan migrate --path=database/migrations/2021_05_02_113342_create_temp_table.php  

Step 4. Import CSV data (with PostGres):  
>> psql postgres   
>> \COPY temp_table ("userFirstname", "userSurname", "userEmail", "eventDate", "eventType", "eventMessage") from 'database/seeders/sample_data.csv' DELIMITER ',' CSV HEADER;  
>> exit  

Step 5. Run SQL:  
psql -h 127.0.0.1 -d postgres -U postgres -f ./database/seeders/import.sql  
psql -h 127.0.0.1 -d postgres -U postgres -f ./database/seeders/manipulate.sql  

Step 6. Set tables:  
-php artisan migrate --path=database/migrations/2021_05_02_233014_set_tables.php  

Step 7. Run Laravel  
-php artisan serve  

Step 8. Test endpoints (with Postman)  
List users [GET:http://127.0.0.1:8000/api/users]  
Delete users [DELETE:http://127.0.0.1:8000/api/users/delete/$id]  
Get users events [GET:http://127.0.0.1:8000/api/events]  
Get users event count grouped by event type [GET:http://127.0.0.1:8000/api/events/grouped]  

###########################################################  

API procedure with DOCKER:  

Step 1. Install docker on system  
https://docs.docker.com/get-docker/  

Step 2. Build your own container from Docker-file:  
docker build -t php-api-dev . -f ./docker-files/Dockerfile.dev  
-t:  tag of image (php-api-dev)  
.: current DIR  
-f: docker file name ./location of dockerfile  
Note: re-build every time you make changes to a Dockerfile  

Step 3. Create Docker network:  
docker network create php-api-network  
Note: this will link the 2 containers together via a network  
Note: there are current issues with networking config, needs diagnosing   

Step 4. Run containers  
Postgres: docker run -p 5432:5432 -it -e POSTGRES_DB=postgres -e POSTGRES_USER=postgres -e POSTGRES_PASSWORD=postgres --network="php-api-network" postgres:12.6
PHP container: docker run -it -p 8000:8000 -v $PWD:/php-api-run --network="php-api-network" php-api-dev  
-it: interactive terminal (places your into terminal session of the container once run)  
-p: port mapping (host:container)  
-v: volume mount DIR on local into container  
-$PWD: is the DIR of the code, make sure you're in the right place  
-php-api-dev: tag of image  
Note: Type 'exit' to leave container in terminal  

###########################################################

Notes 1:  
Assumption: CSV is used to create a new database not add to existing database  
Using migrations/seeds may not be the best method if this is the case (but used them anyways)  
Key issue: migrations creates blank tables, seeds inserts existing data (whereas we need to do BOTH simultaneously) to get the data to match up  

Notes 2:  
Not using Docker Mounted Volumes, nor persistent states (for simplicity)  
Currently the 2 containers are netoworked but aren't connecting (needs more diagnosing)  

Notes 3:  
No unit tests have been created  

Notes 4:  
API doesn't use any authentication or store  

Notes 5:  
Database: date fields need to be formatted correctly for better (future task)  
