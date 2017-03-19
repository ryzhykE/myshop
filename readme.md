# Laravel Myshop


In the project  I am creating Laravel application  with authentication and user roles.


### Implementing new Social Providers
Main beauty is modular approach in implementing new Socialite providers. 

To add new social provider you just need to insert new element in services.php like this:

```php
    'facebook' => [
        'client_id'     => env('FB_ID'),
        'client_secret' => env('FB_SECRET'),
        'redirect'      => env('FB_REDIRECT')
    ],

    'twitter' => [
        'client_id'     => env('TW_ID'),
        'client_secret' => env('TW_SECRET'),
        'redirect'      => env('TW_REDIRECT')
    ],
```

And now you need to create new login link using following route:
```php
route('social.redirect', ['provider' => 'provider_key_from_services']); //example
route('social.redirect', ['provider' => 'facebook']);
route('social.redirect', ['provider' => 'twitter']);
```