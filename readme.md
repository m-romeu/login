This is a simple Laravel app test with login and TDD.

To test it, create a fake user:
php artisan tinker
factory('App\User')->create()

After create it, will be displayed the email (username) and Password will be 'secret'
