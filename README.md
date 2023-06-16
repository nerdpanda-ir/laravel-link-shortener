
# About Project
this project is link shortener with custom Acl System 

## Installation
clone project and then execute this command  : 
```bash
    composer install
```
and then you should make ``.env`` file with this command 
```bash
    cp .env.example .env
```
 or you can manually make that and paste bellow text to that !!!  

```dotenv
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:iIfW2Q+DHydMOiqePEylGRwsZQdLqVK+xzofVaq/mw4=
APP_DEBUG=true
APP_URL=http://localhost
LOG_QUERIES=true
DISPLAY_EXECUTED_QUERY_ON_CONSOLE=false
DISPLAY_EXECUTED_QUERY_ON_WEB=false

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_link_shortener
DB_USERNAME=root
DB_PASSWORD=root

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=
MAIL_HOST=
MAIL_PORT= 
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME=

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```
and then set these variables to ``.env`` file  !!!

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_link_shortener
DB_USERNAME=root
DB_PASSWORD=root
```

```dotenv
MAIL_MAILER=
MAIL_HOST=
MAIL_PORT= 
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME=
```
then you should execute this commands : 
```bash
  php artisan key:generate
```
```bash
  php artisan migrate
```
```bash
  php artisan db:seed
```
now project is ready to work you can go to 
```
  http://domain.com/login
```
and login into the system with :

```
email : 

    administrator@linkshortener.com
    
password : 

    nerdpanda
```
after you see administrator panel and then you can define roles and after assign to users !!!

### Mady by :
- **PHP**
- **Laravel**
- **Laravel Package Development**
- **Design patterns**
- **MySql**
- **Html**
- **Css**
- **Bootstrap**
- **Javascript**

