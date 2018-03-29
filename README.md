BrmSklad
=========
Internal application for inventory management.

Installation
============

USefull info is at:
 * https://book.cakephp.org/2.0/en/installation.html
 * https://book.cakephp.org/2.0/en/getting-started.html

WWW server setup

 * Setup php-cgi (or FastCGI on your HTTP server)
 * Set document root to <SERVER_ROOT>/brmsklad/app/webroot
 * Setup mod-rewrite: https://book.cakephp.org/2.0/en/installation/url-rewriting.html

PHP dependencies

For PostgreSQL install php-pgsql and enable extension=pdo_pgsql and extension=pgsql in php.ini
For MySQL install and setup proper dependencies.

Create cache directories, set them writable by HTTP server user.

mkdir -p app/tmp/cache/models
mkdir -p app/tmp/cache/persistent
mkdir -p app/tmp/logs
chown -R http:http app/tmp/

CREATE USER brmsklad WITH PASSWORD 'SOME PASSWORD';
CREATE DATABASE brmsklad;
GRANT CONNECT ON DATABASE brmsklad TO brmsklad;
GRANT ALL ON DATABASE brmsklad TO brmsklad;

Create database objects using SQL in app/Config/Schema/db_schema.sql

Configure connection to database, copy and edit database.php according Your database setup.

cp lib/Cake/Console/Templates/skel/Config/database.php.default app/Config/database.php


API
===

* All Items

`/items/json_all` pro výpis všech položek v systému, včetně přiřazených uživatelských účtů

* Find

`/items/json_find/{barcode_id}` pro vyhledání dle barcode identifikátoru

např.:

`/items/json_find/33` (jediný objekt odpovídá filtru)

```json
[{"Item":{"id":"12","barcode":"33","regal":"9","nazev":"ploche kabely","popis":"","user_id":"2"},"User":{"id":"2","name":"brm"}}]
```

`/items/json_find/0` (nalezeno více objektů)

```json
[{"Item":{"id":"191","barcode":"0","regal":"1","nazev":"folie na infinity mirror","popis":"","user_id":"24"},"User":{"id":"24","name":"brmak"}},{"Item":{"id":"192","barcode":"0","regal":"1","nazev":"spachtle","popis":"","user_id":"2"},"User":{"id":"2","name":"brm"}},{"Item":{"id":"193","barcode":"0","regal":"3","nazev":"mysi","popis":"krabice","user_id":"2"},"User":{"id":"2","name":"brm"}},{"Item":{"id":"194","barcode":"0","regal":"3","nazev":"pc komponenty, ","popis":"krabice, sitovky, grafiky, zvukovky, pameti","user_id":"2"},"User":{"id":"2","name":"brm"}},{"Item":{"id":"195","barcode":"0","regal":"4","nazev":"TODO","popis":"obsahuje nezatridene veci","user_id":"2"},"User":{"id":"2","name":"brm"}},{"Item":{"id":"196","barcode":"0","regal":"4","nazev":"ventilatory, chladice","popis":"krabice","user_id":"2"},"User":{"id":"2","name":"brm"}},{"Item":{"id":"197","barcode":"0","regal":"6","nazev":"klavesnice ps2, usb","popis":"hromada","user_id":"2"},"User":{"id":"2","name":"brm"}},{"Item":{"id":"198","barcode":"0","regal":"6","nazev":"laminovacka","popis":"krabice","user_id":"2"},"User":{"id":"2","name":"brm"}},{"Item":{"id":"199","barcode":"0","regal":"6","nazev":"role papiru do pokladny","popis":"","user_id":"2"},"User":{"id":"2","name":"brm"}},{"Item":{"id":"200","barcode":"0","regal":"7","nazev":"univerzalni zdroj","popis":"","user_id":"2"},"User":{"id":"2","name":"brm"}},{"Item":{"id":"201","barcode":"0","regal":"8","nazev":"taska plna segmentovek na pcb","popis":"volne k pouziti","user_id":"25"},"User":{"id":"25","name":"brmak"}},{"Item":{"id":"202","barcode":"0","regal":"10","nazev":"utp solarix 5e","popis":"","user_id":"2"},"User":{"id":"2","name":"brm"}},{"Item":{"id":"203","barcode":"0","regal":"11","nazev":"Davis projektor","popis":"velky cerny","user_id":"26"},"User":{"id":"26","name":"brmak"}},{"Item":{"id":"204","barcode":"0","regal":"12","nazev":"eth kabely","popis":"krabice","user_id":"2"},"User":{"id":"2","name":"brm"}},{"Item":{"id":"205","barcode":"0","regal":"12","nazev":"sroubky","popis":"kelimek","user_id":"2"},"User":{"id":"2","name":"brm"}},{"Item":{"id":"206","barcode":"0","regal":"12","nazev":"sroubky","popis":"plastovy box","user_id":"2"},"User":{"id":"2","name":"brm"}},{"Item":{"id":"207","barcode":"0","regal":"13","nazev":"motherboardy, zakladove desky","popis":"","user_id":"2"},"User":{"id":"2","name":"brm"}},{"Item":{"id":"208","barcode":"0","regal":"14","nazev":"1 pc repro","popis":"","user_id":"2"},"User":{"id":"2","name":"brm"}},{"Item":{"id":"209","barcode":"0","regal":"15","nazev":"pc case na brmtender","popis":"","user_id":"27"},"User":{"id":"27","name":"brmak"}},{"Item":{"id":"210","barcode":"0","regal":"20","nazev":"TODO","popis":"obsahuje nezatridene veci","user_id":"2"},"User":{"id":"2","name":"brm"}}]
```

`/items/json_find/37` (nic nenalezeno)

```json
[]
```
