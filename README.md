# Delfi RSS app


> Laravel 8

> Codebase PHP 7.3

> Database MySQL

## Installation

### Clone

- Clone this repo to your local machine using `https://github.com/shternberga/CSD.git`

### Setup

> install composer packages first

```shell
$ composer install
```

> now install npm

```shell
$ npm install
```

> add your database connection variables into your .env file

```shell
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=YourDatabeseName
DB_USERNAME=YourUsername
DB_PASSWORD=YourPassword
```


> run migrations

```shell
$ php artisan migrate
```

> seed delfi channels

```shell
$ php artisan db:seed --class=ChannelSeeder
```

> generate app key

```shell
$ php artisan key:generate
```
---

Be sure, you have Facebook APPs configured for facebook login
- Go to Facebook’s developers URL: <a href="https://developers.facebook.com/" target="_blank">FB APPS</a> and log in with your Facebook account.
- Go to ‘My Apps’, proceed to ‘Add New App’.
- Next, go to Settings -> Basic, copy your app_id and app_secret
- Next, click on the ‘+’ button beside ‘PRODUCTS’, select ‘Facebook Login’, also select ‘WWW’. Then add your website URL: https://localhost:8000 and click on ‘Save’
- Then go to Facebook Login -> Settings, scroll down to ‘Valid OAuth Redirect URL’ and add your callback /redirect URL: https://localhost:8000/auth/facebook/callback
- Now got to your ‘.env’ file and update it with copied app_id, app_secret and callback redirect url:

```shell
FACEBOOK_APP_ID=xxxxxxxxxxxxxxxx
FACEBOOK_APP_SECRET=xxxxxxxxxxxxxxxxxxxxxx
FACEBOOK_REDIRECT=http://localhost:8000/auth/facebook/callback
```
---
Now run `php artisan serve`

and test the app.

---
## Authors

* **Lilija Sternberga** - [GitHub](https://github.com/shternberga),
  [LinkedIn](https://www.linkedin.com/in/lilija-sternberga/)

