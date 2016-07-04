### Faker to add records to a table (seeding)
**I will use the preorder table as an example**

*This seeder is already created, so you can view the [file](https://github.com/Pro542/remas/blob/master/database/seeds/PreordersTableSeeder.php)*

To make an empty seeder class: (in command prompt in your repository directory)

```bat
php artisan make:seeder PreordersTableSeeder
```

Now open database/seeds/PreordersTableSeeder.php

The code inside the run() function will get executed when you call the ItemTableSeeder class.

```bat
php artisan db:seed --class=PreordersTableSeeder
```

Delete records presently in the table:

```php
DB::table('preorders')->delete()
```

Create a Faker/Generator object (Faker package is installed by default in this version of Laravel)

```php
$faker = Faker\Factory::create();
```

Declare array to be inserted to table:

```php
$preorders = array();
```

Fill the array using $faker:

```php
for ($i=1; $i<10; $i++) {
        	$preorders [] = ['id' => $i, 'date' => $faker->dateTimeThisMonth(), 'description' => $faker->realText()];
        }
```
*(Note: I didn't assign values to all fields, you can, and should, assign to the applicable fields)*

  * `$faker->dateTimeThisMonth()` gives a random DateTime this month
  * `$faker->realText()` generates a random text

For more formats like this, go to [fzaninotto/Faker's page](https://github.com/fzaninotto/Faker)

Insert the data in array to table:

```php
DB::table('preorders')->insert($preorders);
```

That's it! Now whenever you run the line `php artisan db:seed --class=PreordersTableSeeder` it will populate the table with new values.

To make things easier, you can include the following line in database/seeds/DatabaseSeeder.php in between `Model::unguard();` and `Model::reguard();`

```php
$this->call('PreordersTableSeeder');
```

Now you can just run `php artisan db:seed` to run all the seeds
