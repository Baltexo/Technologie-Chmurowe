Lab 5 - Bartosz Kierepka 101591

Opis etapów budowania:
1. **Stage 1 (builder)**: Wykorzystuje obraz bazowy `alpine`. Generuje dynamiczny plik `index.html` zawierający wersję aplikacji (przekazaną przez `ARG`), hostname oraz adres IP.
2. **Stage 2 (production)**: Wykorzystuje lekki obraz `nginx:alpine`. Kopiuje zbudowany plik HTML z poprzedniego etapu i serwuje go jako stronę domyślną.

Funkcjonalności:
* **Zmienna wersji**: Wersja aplikacji jest wstrzykiwana podczas budowania.
* **Healthcheck**: Kontener posiada zdefiniowany mechanizm sprawdzania statusu zdrowia co 10 sekund.

Jak uruchomić projekt:
1. **Budowanie obrazu** (podstawienie wersji pod ARG):
   ```bash
   docker build --build-arg VERSION=1.0.5 -t aplikacja-web:1.0 .
