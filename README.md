# Laravel Demo of Tipoff Packages

Demonstration of Tipoff ecosystem of packages

## Installation

Follow the Instructions below to get the application up and running on your local development environment:

1 - Create auth.json file with Laravel Nova token:

```json
{
    "http-basic": {
        "nova.laravel.com": {
            "username": "admin@example.com",
            "password": "example-passsword"
        }
    }
}
```

2 - Create your branch to test your packages

3 - Run migrations with `php artisan migrate:fresh`
