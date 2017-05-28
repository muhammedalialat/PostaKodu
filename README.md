# Turkey Zip Codes PHP Project on Docker

## Data Source
The data we are using for turkish zip codes belongs to the zip archive on
http://postakodu.ptt.gov.tr/Dosyalar/pk_list.zip . The data comes from the official page of the turkish post PTT.

## Docker
The Projects runs on docker. We use docker-compose to be able to include multiple services on it. Currently we are
using the option to mount the src directory directly into the docker container. This gives us the possibility to change
files directly on the host system while seeing the effect on the docker container.

## PHP
As PHP Developer we are using inside the src director PHP to execute all operations. Further the main docker container
runs with an image from the official php docker repository.
