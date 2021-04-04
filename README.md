# Uruk_Hard-Public

Hi, this was the first full fledged website I created for a friend of mine through the use of PHP, MYSQL, HTML, CSS/SASS, Bootstrap, Javascript/Jquery & NPM.

It began as a Wordpress site, but I found Wordpress to be too limiting, so I set out to remake the website from scratch. It's fully functional and I could consider it finished, although there are still some improvements/additions I'd like to make here and there.

It was originally procedurally programmed and fairly unorganised, however I've now completely reorganised the code into an MVC framework. It's not 'strict' MVC, as the controllers interact with the view and the models, but I think it's fine this way.

## Structure
In the root folder you'll find:

### /app <br>
This holds the majority of the code which I'll dive into further below <br><br>
### /public <br> 
This holds the public facing files such as the index.php, css, images, JS, fonts and a .htaccess <br> <br> 
This .htaccess rewrites the root URL to the public folder, and sets it so that when a URL is requested such as index.php/test, if no "test" file/folder can be found in the public folder, then the URL will be rewritten to index.php?url=test, which enables me to route everything through the index.php file<br><br>
### .htaccess <br> 
This rewrites the URL, so a URL that goes to url.com will actually be accessing url.com/public/
