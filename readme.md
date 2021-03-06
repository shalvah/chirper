# chirper
This project demonstrates how to add Twitter's realtime likes functionality to your Laravel app with Pusher. [Here's a walkthrough](https://blog.pusher.com/build-twitter-realtime-likes-feature-with-laravel/).

## Description
The app's homepage displays a list of chirps (i.e. tweets). When you open the app in several different browser windows or tabs simultaneously, you'll see that liking a chirp in one window reflects across all windows wthout needing a page refresh.

## Prerequisites
- PHP >= 5.6
- A [Pusher account](https://pusher.com/signup) and a [Pusher app credentials](http://dashboard.pusher.com/)

## Getting started
Clone the project:

```bash
git clone https://github.com/shalvah/chirper
```

Put your Pusher app credentials in a `.env` file in the project root:
```
PUSHER_APP_ID=your-app-id
PUSHER_APP_KEY=your-app-key
PUSHER_APP_SECRET=your-app-secret
PUSHER_APP_CLUSTER=your-app-cluster
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
## Built With

* [Pusher](https://pusher.com/) - APIs to enable devs building realtime features
* [Laravel](http://laravel.com) - the PHP framework for web artisans :sunglasses:

## Acknowledgements

- Twitter!
