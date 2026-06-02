Sprawozdanie - zadanie1
Autor: Bartosz Kierepka

a) docker build -t bkierepka/weather-app:v1 .

b) docker run -d -p 5000:5000 --name weather-service bkierepka/weather-app:v1

c) docker logs weather-service

d) docker images bkierepka/weather-app:v1
docker history bkierepka/weather-app:v1
