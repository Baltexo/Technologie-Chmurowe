1) Wdrożone środowisko realizuje architekturę czterokontenerową w oparciu o narzędzie Docker compose. W tej wersji projektu wszystkie wrażliwe dane zostały całkowicie odizolowane od kodu i przeniesione do bezpiecznego miejsca z uzyciem Docker secrets. Hasło pobierane jest z zewnętrznego pliku secrets/mysql_root_password i montowane w bezpiecznej ścieżki /run/secrets/db_root_password wewnątrz kontenerów.

2)Użyte polecenia i wyniki ich działania:
Zawarte w sprawozdaniu w formie pdf.
