# chirper
This project demonstrates how to add Twitter's realtime likes functionality to your Laravel app with Pusher. [Walkthrough](https://blog.pusher.com/build-twitter-realtime-likes-feature-with-laravel/).

## Description
The app's homepage displays a list of chirps (i.e. tweets). If you open the app in several different browser windows or tabs simultaneously, you'll see that liking a chirp in one window reflects across all windows wthout needing a page refresh.

## Requirements
- PHP >= 5.6
- A [Pusher account](https://pusher.com/signup) and a [Pusher app credentials](http://dashboard.pusher.com/)

## Running the app
Put your Pusher app credentials in a `.env` file in the project root:
```
PUSHER_APP_ID=WWWWWWWWW
PUSHER_APP_KEY=XXXXXXXXX
PUSHER_APP_SECRET=YYYYYYYY
PUSHER_APP_CLUSTER=ZZZZZZZZ
```

Look for these lines of JavaScript in `views/index.hbs`:
```javascript
var pusher = new Pusher('your-app-id', {
            cluster: 'your-app-cluster'
        });
```
Insert your Pusher app ID and cluster in the appropriate places.

Ensure you've configured your database (see [here](https://laravel.com/docs/5.4/database)). At a minimum, set `DB_CONNECTION=sqlite` in your `.env` file.

Then:

```bash
php artisan key:generate
php artisan db:seed
php artisan serve
```
