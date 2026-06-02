a)W potoku wdrożeniowym wykorzystano oficjalne akcje docker/setup/qemu-action oraz docker/setup/buildx-action. Dzięki temu środowisko automatyzacji zyskało możliwość emulacji procesorów i pełne wsparcie dla jednoczesnego budowania obrazów na architektury linux/amd64 oraz linux/arm64

b)Skonfigurowano optymalizację procesu budowania przy użyciu dedykowanego mechanizmu cache dla Docker Buildx. Dane pamięci podręcznej są pobierane i wysyłane do zewnętrznego, publicznego rejestru na Docker Hubie autora. Wykorzystano do tego eksporter typu registry

c)Do weryfikacji bezpieczeństwa kodu wybrano skaner Trivy od Aqua Security. Potok najpierw buduje lokalny obraz testowy, po czym Trivy skanuje go pod kątem luk bezpieczeństwa. Zgodnie z wytycznymi, skaner został zintegrowany tak, aby raportować wykryte luki w czytelnej tabeli w logach systemu GitHub Actions. 

Przyjęty sposób tagowania

1. Tagowanie obrazu końcowego 
Mój obraz wysyłany na GitHub Packages (ghcr.io/baltexo/zadanie2-app) dostaje automatycznie dwa tagi:
1.latest – żeby zawsze było wiadomo, która wersja jest najnowsza i przetestowana
2.github.sha` – czyli unikalny, długi ciąg znaków ) konkretnego commita z Gita

Dlaczego tak? Używanie samego tagu latest na produkcji to kiepski pomysł, bo można przypadkowo nadpisać działającą wersję i stracić kontrolę nad tym, co dokładnie działa na serwerze. Dodanie tagu z hashem commita gwarantuje powtarzalność. W razie wtopy dokładnie wiem, który commit odpowiada danej wersji kontenera i mogę jednym kliknięciem zrobić szybki powrót do starszej, stabilnej wersji.

2. Tagowanie pamięci podręcznej
Wszystkie warstwy cache na moim Docker Hubie lądują pod jednym stałym tagiem cache

Dlaczego tak? Docker rozpoznaje powtarzające się kroki po sumach kontrolnych warstw. Trzymanie całego cache pod jednym tagiem cache sprawia, że potok przy kolejnym uruchomieniu od razu wie, gdzie szukać gotowych elementów. 
