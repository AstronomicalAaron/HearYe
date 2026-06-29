## HearYe

An announcements board made with Laravel and Vue.js

---

## Setup and Run Local Environment

This project uses Laravel Sail, so Docker needs to be installed before running the app.

### Install Docker

Install Docker for your operating system:

- Docker Desktop for Mac, Windows, or Linux: https://docs.docker.com/desktop/
- Docker Engine for Linux servers: https://docs.docker.com/engine/install/

After installation, make sure Docker is running.

### Local Setup

It's probably worth mentioning that you may need to set the owner to the `hearye` directory on your machine if you're running into any permission issues (I'm using Pop-OS, so I always have to do this anytime I install Laravel):
```shell
sudo chown -R [your_user_name] /hearye
```

Install PHP dependencies:
```shell
composer install
```

Install frontend dependencies:
```shell
npm install
```

Copy the environment file and generate an app key:
```shell
cp .env.example .env
php artisan key:generate
```

Bring up the containers in the background using Sail (be sure to be in the project root directory):
```shell
./vendor/bin/sail up -d
```

Then you'll need to run the migrations with Artisan (this will also add in the seed data from the factories):
```shell
./vendor/bin/sail php artisan migrate:fresh --seed
```

After then, you should be able to log in with these credentials:
```
email: testmail@gmail.com
password: password
```

If you run into any permission errors here, in the `.env` changing `DB_USERNAME` to `root` should fix it.

To build the FE components run either:

1. Build the assets:
```shell
./vendor/bin/sail npm run build
```

2. ...or bring up Vite:
```shell
./vendor/bin/sail npm run dev
```

Open the app at:
```shell
http://localhost:8080
```

### Run Tests

Run the Laravel test suite:
```shell
./vendor/bin/sail php artisan test
```
