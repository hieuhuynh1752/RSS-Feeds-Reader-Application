# NFQ Final Assignment - Feed Reader Application

An Laravel-based Feed reader application

## Getting Started

In order to fullfill the requirements provided in the Final Assignment Brief from NFQ.Asia to complete the PHP Training course, this project has been developed with following features:
* **For developers:**
    * Setup the application's database using Command-line
    * Insert new data to the database using Command-line
    * Insert RSS Feed URLs from the Internet using Command-line
    * Generate Log files that log the output of the Console after using database-insertion command-lines

* **For users:**
    * Filter items based on its ***name*** and ***category***
    * Create new item 
    * Update and Delete any item
    

### Prerequisites

This application requires:
 * PHP v7.2
 * Laravel v6.5.0
 * Composer
 * XAMPP (for Apache and MySQL services)


### Installing

To install the application, after cloning the project, please update your composer:

```
composer update
```

Start Apache and MySQL services from XAMPP. Then run this command to setup the database:

```
php artisan db:createdb
```

Then migrate the database:

```
php artisan migrate
```

## Usage

### For developers
#### Insert data using CLI

Insert the data to the database by using this command: 

```
php artisan db:insertdb 
```
For example, adding to the database the following item:
* **Title**: Huynh Thai Hieu's NFQ Final assessment
* **Category**: Project
* **Link**: https://bit.ly/2CAs8DE
* **Description**: Please checkout the README.md

![Alt Text](https://media.giphy.com/media/MFPKaBfnK4fdFnMVpG/giphy.gif)

The result of this command will then be displayed on the Console and in the Log file which could be found in `storage/logs/db/insertdb`

#### Insert RSS feeds data using CLI

Insert RSS feeds data to the database by following this syntax: 

```
php artisan db:feedurl [<URL(s)>]
```
This command provide the ability to feed RSS data from multiple specific URLs.
<br>For example, you have a list of RSS feeds URLs, such as:
* https://vnexpress.net/rss/tin-moi-nhat.rss
* https://www.nasa.gov/rss/dyn/educationnews.rss
* https://rss.nytimes.com/services/xml/rss/nyt/AsiaPacific.xml
* https://www.feedforall.com/sample.xml
* https://www.feedforall.com/sample-feed.xml

To add feed data from those URLs to the database, this following command should be executed:
```
php artisan db:feedurl https://vnexpress.net/rss/tin-moi-nhat.rss https://www.nasa.gov/rss/dyn/educationnews.rss https://rss.nytimes.com/services/xml/rss/nyt/AsiaPacific.xml https://www.feedforall.com/sample.xml https://www.feedforall.com/sample-feed.xml
 
```
The process bar and result of this command will then be displayed on the Console.
![Alt Text](https://media.giphy.com/media/H3HLLVouBBry1za08b/giphy.gif) 
<br>The Log file of this command could be found in `storage/logs/db/feedurl`

### For users
>NOTICE: please use ```php artisan serve``` command to access the Web page via: http://127.0.0.1:8000

#### Webpage Interface
![Alt Text](https://media.giphy.com/media/lnrpDAhwA7s5oOkqfs/giphy.gif) 

#### Add new item
![Alt Text](https://media.giphy.com/media/kdjZa3m07w9iIU0uVy/giphy.gif)

#### Update/Edit item
![Alt Text](https://media.giphy.com/media/WqAI9bn1RIR83D2HRw/giphy.gif)

#### Delete item
![Alt Text](https://media.giphy.com/media/mBq6bIOTT8zJ72qqQk/giphy.gif)

#### Search item
![Alt Text](https://media.giphy.com/media/H1ZGPjlTujdHI5llEx/giphy.gif)

## Tools and Libraries used
* [Yajra](https://github.com/yajra/laravel-datatables) Laravel Datatables 
* [Dmitry-Ivanov](https://github.com/dmitry-ivanov/laravel-console-logger) Laravel Console Logger


## Authors

* **Huynh Thai Hieu** - *University of Greenwich (Vietnam)- Da Nang campus* 


