# Template Laravel9/Vite/Bootstrap with Authentication

Dopo la clonazione lanciare:

```bash
    composer install
    npm install
    cp .env.example .env
    php artisan key:generate
```

Dopo aver creato e collegato il DB nel file .env lanciare:
```bash
    php artisan serve //per lanciare il server
    php artisan migrate
    php artisan db:seed
```