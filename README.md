# slim-phpdi-starter

This is a simple project to demonstrate the way in which I used <a href="http://php-di.org/">PHP-DI</a> within a <a href="http://www.slimframework.com">Slim PHP</a> app, as wanted to use its *Autowiring* abilities.

This project uses Slim's <a href="https://github.com/slimphp/Slim-Flash">Flash Messages</a>, <a href="https://github.com/slimphp/Slim-Csrf">CSRF Middleware</a>, <a href="https://github.com/slimphp/Twig-View">Twig views</a>, <a href="https://github.com/hassankhan/config">Noodlehaus's Config</a>, and <a href="https://github.com/Seldaek/monolog">Monolog's logger</a> to log when errors occur. It connects to a SQLite3 database using <a href="https://github.com/illuminate/database">Illuminate</a>.

There is also a simple csrfToken check within App.php which avoids the CSRF Middleware for specified routes, as it uses a session CSRF token, so is useful for Ajax forms that may send multiple HTTP requests from one page.

Most of the Interfaces are all dummy interfaces, existing purely for PHP-DI's autowiring to work.

There are some Developer mode settings withing bootstrap.php. The port 8080 config file is for when using the inbuilt PHP server with the command

```php -S localhost:8080 -t ./public/```

from within your project folder, then the url will be

<a href="http://localhost:8080">http://localhost:8080</a>

If using Apache on your dev machine, then the defaul url for the project will be something like

<a href="http://localhost/slim-phpdi-starter/public/index.php">http://localhost/slim-phpdi-starter/public/index.php</a>
