## SolarPhase Application

### Requirements

* Composer
* PHP >= 5.4
  * Mcrypt PHP Extension
  * OpenSSL PHP Extension
  * Mbstring PHP Extension
  * Tokenizer PHP Extension
  * _As of PHP 5.5, some OS distributions may require you to manually install
the PHP JSON extension. When using Ubuntu, this can be done via `apt-get install
php5-json`._
* Node.JS & NPM
  * Bower (`npm install -g bower`)
  * Gulp (`npm install -g gulp`)

### Setup

The first thing you will need to do is to clone the Git repository to a local
repository on your computer:

    $ git clone https://github.com/solarphase/solarphase.git
    $ cd solarphase

Next, can run the supplied install script to finalize the installation:

    $ ./bin/setup

All that remains now is that you edit the `.env` file you just copied so that it
has valid database credentials. Then you will have to migrate the database and
create a user that you can login with:

    $ php artisan db:migrate
    $ php artisan tinker
    >>> $user = new \SolarPhase\User;
    >>> $user->name = 'Administrator';
    >>> $user->email = 'admin@example.com';
    >>> $user->password = bcrypt('admin');
    >>> $user->save();

That's it, really! The application is now ready to be deployed or developed, if
you're not using HHVM as a substitute to PHP you can run the application using
the PHP development server:

    $ php artisan serve

You can access the user login page at `<application-url>/user/login`.

### Permissions

Getting the permissions for deployment can get a little tricky but here's an
example of what works:

    # chown -R exampleuser:www-data ./

In the example, we give ownership to the `exampleuser` user and the `www-data`
group. The permissions are set up in a way where the group has sufficient access
to run the application while the owning user has full access. Others users that
aren't in the group `www-data` won't be able to access it.

### License

The SolarPhase application is open-sourced software licensed under the
[MIT license](http://opensource.org/licenses/MIT)
