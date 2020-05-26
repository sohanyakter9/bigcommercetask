
# Customer Browser

* A list of Customers, including the total number of orders they have placed
* A Customer Details screen that displays the Order History for that Customer and their Lifetime Value (defined as the
  total value of all of their orders)

My code has been added for you to complete the mentioned task in the following files:
```
app/Http/Controllers/CustomerDetailsController.php
app/Http/Controllers/CustomersController.php
app/Services/CustomerService.php
app/Customer.php
app/Order.php
resources/views/customers.blade.php
resources/views/details.blade.php
```


## Dependencies
This application uses the [Laravel framework](https://laravel.com/docs/5.6) which requires PHP >= 7.1 to run. If you do
not already have PHP available on your machine, we suggest you use [Homebrew](https://brew.sh/) to install it:
```
/usr/bin/ruby -e "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/master/install)"
brew install php
brew install php72-xdebug
```

You will also need to install [Composer](https://getcomposer.org/download/). Once setup, install dependencies:
```
composer install
```

## Configuration
Copy the included `.env.example` file:
```
cp .env.example .env
```

Open the newly created `.env` file and fill in the `API_KEY` field with the key supplied in the email along with this
assignment.

Before you can run the application, you need to generate an application key. You can do so by running:
```
php artisan key:generate
```

## API Client
The [Bigcommerce PHP API](https://github.com/bigcommerce/bigcommerce-api-php) client is already installed as a
dependency and automatically initialised using the relevant fields in the `.env` file (see `AppServiceProvider::boot`).
When working correctly, you will see the store's time appear on the homepage. For instructions on accessing resources
using the API client, refer to the GitHub repository.

## Developing

To serve the application:
```
php -S localhost:8000 -t public
```                               

## Test

```
vendor/bin/phpunit --filter testCustomerListPage
```
