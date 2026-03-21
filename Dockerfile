# Obraz bazowy Ubuntu 
FROM ubuntu:latest

LABEL author="Bartosz Kierepka <Bartoszkierepka@outlook.com>"

RUN apt-get update && \
    apt-get upgrade -y && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y apache2 && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

COPY index.html /var/www/html/index.html

# Informacja o porcie
EXPOSE 80

# Uruchomienie serwera
CMD ["apachectl", "-D", "FOREGROUND"]