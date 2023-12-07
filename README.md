<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
<p align="center"><a href="https://byte5.de" target="_blank"><img src="https://www.byte5.de/images/byte5-logo-white.svg" width="300" alt="byte5 Logo"></a></p>
<h1 align="center">Schulung Laravel PHP Framework Komplett</h1>

# Inhalt
- Einrichtung der Entwicklungsumgebung
- Grundlegende Routing- und Controller-Konzepte
- Erstellung einer Datenbank und Migration von Tabellen
- Erstellung von Eloquent-Modellen
- Erstellung von Factories und Seedern
- Arbeiten mit Datenbankabfragen und Beziehungen
- Validierung von Eingaben über Requests und Formularerstellung
- Implementierung der Benutzerregistrierung und -authentifizierung
- Einführung in Blade-Templates
- Erstellung von Seitenlayouts und Teilansichten
- Implementierung des Blog-Artikel-Anzeigebereichs
- Integration von Frontend-Frameworks am Beispiel von Tailwind CSS
- Integration von externen Modulen
- Testing und Fehlerbehandlung


# Einrichtung der Entwicklungsumgebung
Erstelle ein neues Projekt mit dem Composer
```shell
composer create-project laravel/laravel gfu-training-laravel-10
```

Sobald das neue Projekt erstellt wurde, kannst du den lokalen Entwicklungsserver von Laravel mit dem Serve-Befehl von
Laravel Artisan:
```shell
cd gfu-training-laravel-10
php artisan serve
```

Sobald du den Artisan-Entwicklungsserver gestartet hast, ist Ihre Anwendung in deinem Webbrowser unter 
http://localhost:8000 verfügbar.

## Zugang zur Datenbank einrichten

Nachdem du nun deine Laravel-Anwendung erstellt hast, möchtest du wahrscheinlich einige Daten in einer Datenbank 
speichern. Standardmäßig gibt die .env-Konfigurationsdatei Ihrer Anwendung an, dass Laravel mit einer MySQL-Datenbank 
interagiert und unter 127.0.0.1 auf die Datenbank zugreift.

Wenn du MySQL oder Postgres nicht auf deinem lokalen Rechner installieren möchten, kannst du jederzeit eine 
[SQLite](https://www.sqlite.org/index.html)-Datenbank verwenden. SQLite ist eine kleine, schnelle, eigenständige 
Datenbank-Engine. Aktualisiere zunächst deine _.env_-Konfigurationsdatei, um den SQLite-Datenbanktreiber von Laravel 
zu verwenden. Du kannst die anderen Datenbankkonfigurationsoptionen entfernen:
```dotenv
DB_CONNECTION=sqlite
```

Sobald du deine Datenbank konfiguriert hast, kannst du die Datenbankmigrationen ausführen, dadurch werden die 
Datenbanktabellen der Anwendung erstellt:
```shell
php artisan migrate
```

Den aktuellen Stand der Migration kannst du zu jeder Zeit mit folgendem Befehl prüfen:
```shell
php artisan migrate:status
```


# Benutzer-Authentifizierung
Laravel wäre nicht so ein bekanntes Framework, wenn für die bekanntesten Anwendungsfälle bereits Pakete existieren 
würden. So ist es auch mit der Registrierung und dem Login für Nutzer. Die bekanntesten Pakete sind 
[Laravel Breeze](https://laravel.com/docs/10.x/starter-kits#laravel-breeze),
[Laravel Jetstream](https://laravel.com/docs/10.x/starter-kits#laravel-jetstream), und
[Laravel Fortify](https://laravel.com/docs/10.x/fortify). In unserem Beispiel verwenden wir das Starterkit von Breeze.

## Laravel Breeze
Laravel Breeze ist eine minimale, einfache Implementierung aller 
[Authentifizierungsfunktionen](https://laravel.com/docs/10.x/authentication) von Laravel, wie  Anmeldung, Registrierung, 
Zurücksetzen des Passworts, E-Mail-Verifizierung und Passwortbestätigung. Darüber hinaus enthält Breeze eine einfache 
„Profil“-Seite, auf der der Benutzer seinen Namen, seine E-Mail-Adresse und sein Passwort aktualisieren kann.

Die Standardansichtsebene von Laravel Breeze besteht aus [Blade-Templates](https://laravel.com/docs/10.x/blade), die mit 
[Tailwind CSS](https://tailwindcss.com/) gestaltet wurden.

### Installation
Installiere Laravel Breeze mit Composer:
```shell
composer require laravel/breeze
```

Nachdem Composer das Laravel Breeze-Paket installiert hat, kannst du den Artisan-Befehl `breeze:install` ausführen. 
Dieser Befehl veröffentlicht die Authentifizierungsansichten, Routes, Controller und andere Ressourcen in deiner 
Anwendung. Laravel Breeze veröffentlicht seinen gesamten Code in deiner Anwendung, sodass du die volle Kontrolle und 
Transparenz über deren Funktionen und Implementierung hast.

Der Befehl `breeze:install` fordert Sie zur Eingabe Ihres bevorzugten Frontend-Stacks und Test-Frameworks auf, in 
unserem Beispiel verwenden wir `Blade with Alpine`. Zum Testen werden wir in einer der kommenden Lektionen PEST 
verwenden:
```shell
php artisan breeze:install
```

Und im Anschluss werden die Migrations auf der Datenbank ausgeführt und die `npm`-Pakete erstellt:
```shell
php artisan migrate
npm install
npm run dev
```

Bei Erfolg erscheinen jetzt in deiner lokalen _Laravel_-Instanz rechts oben in der Ecke die beiden neuen Links 
[Log in](http://127.0.0.1:8000/login) und [Register](http://127.0.0.1:8000/register). Nach der Registrierung kannst du
dein eigene sProfil aufrufen, bearbeiten und auch deinen eigenen Account wieder löschen.

