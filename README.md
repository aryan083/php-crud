# php-crud
this is a helper for php crud operation.



# How to Use

<img src="https://imgbbb.com/images/2019/04/14/Screenshot-56.png" alt="folder screenshot" />

Create a new file `index.php`

Then, open `index.php` & `config.php` in your text editor.

In `config.php`, you need to set up the database connection first:

```php
define("DB_HOST", "localhost"); // your host name
define("DB_USER", "your_username"); // your database username
define("DB_PASS", "your_password"); // your database password
define("DB_NAME", "your_database_name"); // your database name

// Message Settings
define('insertSuccess', 'Insert Successfully');
define('updateSuccess', 'Update Successfully');
define('deleteSuccess', 'Deleted Successfully');


In index.php, include the necessary files at the top:

``` include 'database/index.php';```
include 'db_connection.php';
include 'config.php';

# For Insert :
```php
`DB::insert($table, $data);
````
`$table` = its your table name,

`$data`: An associative array where the key will be the column name of your table.

### Example :
````php
$table = 'users';
$data = [
    'name' => 'John Doe',
    'email' => 'john@example.com'
];
DB::insert($table, $data);
````

# For selectAll :
````php
DB::select($table);
````
`$table`: The name of your table. 

### Example :

````php
$results = DB::selectAll($table);

foreach ($results as $row) {
    echo $row['name'];
}
````

# For Select with Conditions :

````php
$conditions = ['id' => 1, 'status' => 'active'];

$results = DB::selectWithConditions($table, $conditions);

foreach ($results as $row) {
    echo $row['name'];
}
````
`$table`: The name of your table.
`$conditions`: An associative array of column names and values for the WHERE clause.


### Example :

````php

$table = 'users';
$conditions = ['status' => 'active'];
$results = DB::selectWithConditions($table, $conditions);

foreach ($results as $row) {
    echo $row['name'];
}
````



# For Update : 

````php
$data = ['name' => 'New Name'];
$conditions = ['id' => 1];
DB::update($table, $data, $conditions);
````

`$table`: The name of your table.
`$data`: An associative array where the key will be the column name of your table.
`$conditions`: An associative array of column names and values for the WHERE clause

### Example:
````php 
$table = 'users';
$data = ['name' => 'Jane Doe'];
$conditions = ['id' => 1];
DB::update($table, $data, $conditions);
````


# For Delete : 
````php
$conditions = ['id' => 1];
DB::delete($table, $conditions);
````
`$table`: The name of your table.
`$conditions`: An associative array of column names and values for the WHERE clause.


### Example 
```php 
$table = 'users';
$conditions = ['id' => 1];
DB::delete($table, $conditions);
```

### For more Links

- [GitHub](https://github.com/Ok9xNirab/)
- [Facebook](https://web.facebook.com/istiaq.nirab.1)

**Enjoy!**

### Few Notes after the update 
all `$conditions` are supposed to be a key value pairs where keys are column names and values are values of those columns 

