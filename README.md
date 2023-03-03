# fast-foodies
FastFoodies is a web application designed to make food ordering and delivery easy and convenient. 
* Customers can search for their favorite restaurants, browse menus, and place orders with the click of a button.
* The app also provides integrated payment options, order tracking, and real-time notifications.
*  FastFoodies is the perfect solution for busy people who want a hassle-free way to order meals and get them delivered quickly.

# Requirements

- PHP: version 8.2.0 and above

# Running on localhost / xampp
* You will need composer installed
* then in the project root directory, open a terminal and type `composer update` or `composer install`


# Live Demo
`http://13.41.186.245/`

## Possible Routing Issue while Testing locally on Xampp
* There is a custom routing system, so incase there is a routing problem, you may have to check the configuration of the apache server on the xampp/mamp/lamp
* Always check the RewriteBase in the .htaccess based on your apache server configuration.
* If the apache server is configured to server the project root directory, you may have to change all the internal href urls, by removing /fast-foodies from each url; 
* With this it is okay to leave the .htaccess file to override your apahce configuration; this will make everything work without changing anything from the code once you have done `composer install or composer update`
