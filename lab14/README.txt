1) Architektura i uzasadnienie podziału na sieci:

W projekcie zdefiniowano dwie odizolowane sieci typu bridge:
1. frontend: Do tej sieci podłączone są kontenery nginx oraz phpmyadmin. Sieć ta służy do przyjmowania i obsługi ruchu przychodzącego z zewnątrz od uzytkownika na wystawionych portach 4001 oraz 6001.
2. backend: Do tej sieci natomiast podłączone są usługi nginx, php-fpm, mysql oraz phpmyadmin. 

2) Uzasadnienie dla phpMyAdmin:
Serwer phpMyAdmin musi być podłączony jednocześnie do obu sieci:
1.frontend, aby użytkownik mógł otworzyć panel zarządzania w przeglądarce pod adresem "http://localhost:6001".
2.backend, aby aplikacja phpMyAdmin mogła bezpiecznie komunikować się z kontenerem bazy danych mysql-db. Baza danych MySQL celowo nie posiada wystawionych portów na świat zewnętrzny i nasłuchuje jedynie w sieci wewnętrznej, co zapewnia pełną izolację warstwy danych.

3)Użyte polecenia i wyniki ich działania:
Zawarte w sprawozdaniu w formie pdf.