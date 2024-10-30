Hello, this is my first project in PHP using the Laravel framework.

The service is implemented with an API that allows you to:

- check the current USD to UAH exchange rate;
- subscribe an email to receive updates on exchange rate changes;
- send daily emails with the current exchange rate to all subscribed users;
- additionally, when subscribing an email, you can choose the currency pair for receiving exchange rate updates.

Use ./vendor/bin/sail up to start the project and ./vendor/bin/sail artisan schedule:work to initiate the daily email dispatch.
