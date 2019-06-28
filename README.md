*Install PHP Unit*
```
composer install
```

*Run test*
```
./vendor/bin/phpunit src/Test/<test-class-file>Test.php
```

*Create `json` DB*
```
mkdir api && cd api && touch data.json && echo '{"users": []}' > data.json && json-server --watch data.jso
```

*To run test api server*

```json-server --watch api/data.json```
