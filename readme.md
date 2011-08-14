## Laravel implementation on Pagodabox

This is just a simple implementation of a [Laravel](http://laravel.com) application on [Pagodabox](http://www.pagodabox.com/).

The working deployment can be found at [this link](http://oni-laravel-test.pagodabox.com/).

It just has a very basic login/register functionality.

## How is it different from a standard Laravel app?

First of all, the `.htaccess` in the `/public` directory is ignored. Instead Pagodabox uses the `.box` file in the root directory.

The database configuration file `db.php` uses server globals in order to get database credentials. Using plaintext values isn't dangerous, but this way it's even simpler to deploy an application: you can use the same `db.php` and bind the database later from Pagodabox admin panel.

Remember to add these variables from Pagodabox:

    db_host = "localhost;unix_socket=/tmp/mysql/<database name>.sock"
    db_name = "<database name>"
    db_user = "<database username>"
    db_pass = "<database password>"

The database itself must be initialized [using a tunnel](http://guides.pagodabox.com/database/creating-database-tunnel). You can use it to make backups too.
