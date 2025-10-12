# Totara stats App

This project collects data from totara applications and displays statistics about those platforms


## 🛠
- PHP 8.1
- MySQL 8
- Vue 3
- Eloquent

Interacting with DB:

```
Making a new migration:
./artisan make:migration create_<table-name>_table --path=database/migrations

Run the migration:
 ./artisan migrate --path=database/migrations
```