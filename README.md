# Curator Model
[![Build Status](https://travis-ci.org/benbjurstrom/curator-model.svg?branch=master)](https://travis-ci.org/benbjurstrom/curator-model)

Laravel package containing migrations, models, and seeds for the benbjurstrom/curator application.

### Setup Instructions

#### Package Installation
Install the package using composer:

``` bash
composer require benbjurstrom/curator-model
```

Register the service provider in your application:
```php
// config/app.php
'providers' => [
    ...
    BenBjurstrom\CuratorModel\CuratorModelServiceProvider::class,
];
```

#### Migrations
Once registered migrate your database to setup the following table structure: 

``` bash
artisan migrate
```

![Database Model](http://i.imgur.com/6zHK1g7.png)


#### Seeders
Optionally seed the database with sample data by including the package's seeder class:

```php
// database/seeds/DatabaseSeeder.php
class DatabaseSeeder extends Seeder
{
    public function run()
    {
        ...
        $this->call(BenBjurstrom\CuratorModel\Seeds\DatabaseSeeder::class);
    }
}
```

Note that when rolling back the migrations database records are saved to the seeds/json/ directory.
