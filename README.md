# Uruk_Hard-Public

This was my first full fledged website, created for a friend of mine using PHP, MYSQL, HTML, CSS/SASS, Bootstrap, Javascript/Jquery & NPM.

It began as a Wordpress site, but Wordpress was too limiting, so I remade the website from scratch. It's fully functional and I could consider it finished, although there are still some improvements/additions that could be made (such as with the front-end design).

It was originally procedurally programmed and fairly unorganised, however I've now completely reorganised the code into an MVC framework, all made from scratch using vanilla PHP.

# Features :

Multiple pages, dynamically loaded from a MySQL database <br>
Admin section for client CRUD operations, with login, passwords secured with PHP's built-in bcrypt algorithm <br>
All SQL queries secured against injection via PDO <br>
Uploaded comics are automatically resized and converted for improved page load through use of Imagick <br>
Responsive front-end design

# Structure :

In the root folder you'll find:

## .htaccess :

This rewrites the URL, so a URL that goes to example.com will actually be accessing example.com/public/

## /public :

This holds the public facing files such as the index.php, css, images, JS, fonts and a .htaccess
<br> <br>
The index.php loads the base file and instantiates a new Core class which I'll go into further down.
<br> <br>
The .htaccess rewrites the root URL to the public folder, and sets it so that when a URL is requested such as index.php/test, if no "test" file/folder can be found in the public folder, then the URL will be rewritten to index.php?url=test, which enables you to route everything through the index.php file

## /app :

This holds the majority of the code including:
<br>

### base.php :

This is loaded by index.php in the public folder. It loads the config file, helper functions and autoloads all classes in the libraries folder.

### /config/config.php : <br>

This is loaded by base.php. It contains database connection details and constant references to the URL root, the app folder root, and the site name(used for the <title> in the <head>.

### /libraries :

#### Controller.php :

This contains the core controller class which is inherited by all controller classes in the controllers folder. It contains methods for loading models, views and services. It also has a constructor which loads and instantiates the Dbh model, for use in establishing a database connection in all classes.

#### Core.php : <br>

This contains all the routing logic. It checks the url, which must be entered in this style: example.com/controller/method/params . It's then exploded with the "/" as the separator, with each argument being used to load the controller, a method in that controller, and to pass in parameters to that method, respectively.

By default it will load the Pages controller and the index method, even if you only put the base "example.com" URL, so the Pages/index method should load the main index of the site.
This also means that if you try to load any other controller, it will always try to load an index method, meaning you must always have an index method in each controller. This also means once you've set an index method in a controller, you can call that controller without specifying a method, i.e. example.com/posts.
Parameters are optional, and there can be multiple, like so: example.com/controller/method/param1/param2 etc, which must be loaded into the controller method as an additional argument, e.g. index(param1, param2, ...) {index code here}

#### Database.php :

This connects to the database through PDO. It's inherited into the Dbh model, which is instantiated in the controllers. It may not have been neccesary to separate the Dbh and Database files and create a further layer of abstraction, but I just preferred to do it this way and keep it separated into it's own file.
