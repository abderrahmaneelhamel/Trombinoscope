# Trombinoscope

## Introduction

This repository is an trombinoscope app implementing of the [Laravel](https://laravel.com/docs/starter-kits) application / authentication starter kit frontend in [Vue.js](https://vuejs.org). - powered by [Laravel Sanctum](https://laravel.com/docs/sanctum).

## Documentation

### Installation

First, create a Vue.js compatible Laravel backend by installing Laravel Breeze into a [fresh Laravel application](https://laravel.com/docs/installation) and installing Breeze's API scaffolding:

```bash
# Create the Laravel application...

cd trombinoscope_backend

# Install Breeze and dependencies...
composer install

cp .env.example .env

```

Next, ensure that your application's `APP_URL` and `FRONTEND_URL` environment variables are set to `http://localhost:8000` and `http://localhost:3000`, respectively.

After defining the appropriate environment variables, you may serve the Laravel application using the `serve` Artisan command:

```bash
# Serve the application...
php artisan serve
```

```bash

cd trombinoscope_frontend

```

```

Finally, run the application via `npm run dev`. The application will be available at `http://localhost:3000`:

```

npm run dev

```

> Note: Currently, we recommend using `localhost` during local development of your backend and frontend to avoid CORS "Same-Origin" issues.
```
