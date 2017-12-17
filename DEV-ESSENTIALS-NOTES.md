#Magento 2.0:
- Compresses JavaScript files and images
- Gives support to Apache Varnish
- Uses PSR1-4 Standards (PSR-0 is deprecated)
  - PSR1: Basic Good Practices
  - PSR2: Coding Style Guide
  - PSR3: Logger interface (debug, info, notice, warning, error, critical, alert and emergency)
  - PSR4: Autoloading Standard
- Uses LESS, jQuery, Require.js
- Have:
  - Web Users (frontend/backend)
    - Products
    - Marketing
    - Content
    - Customers
    - Sales
      - up-sells and cross-sells features
      - Persistend Cart
      - Native support to Google Checkout and Paypal
  - Reports
  - Service Consumers (API and endpoints)
  - Service Layers (interface/contracts)
  - Models (resources and database)
- Command Line Utility
  - Install magento
  - Manage the cache
  - Manage Indexers
  - Configure and run cron
  - Compile code
  - Set the Magento mode
  - Set the URN hightlighter
  - Create dependency reports
  - Translate dictionaries and language packages
  - Deploy static view files
  - Create symlinks to LESS files
  - Run unit tests
  - Convert layout into XML files
  - Generate data for perfonarmance testing
  - Create CSS from LESS

#Working with Search Engine Optimization (SEO)
- Build your site following W3C Consortium and search engines to increase your site's visitation and ranking
- SEO for products, categories and CMS Pages
  - Titles
  - Metas
  - Headings
- SEO Management:
  - Content Configuration:
    - Keep Default Description and Default Keywords empty to Give density to the content for SEO Engines
  - SEO Configuration
    - Url Rewrites
    - Search Terms
    - Site Map
- SEO Catalog Configuration:
  - Popular Search Terms
  - Product Url Suffix
  - Category Url Suffix
  - Use Categories Path for Product Urls
  - Create Permanent Redirect for URLs if URL Key Changed
  - Page Title Separator
  - Use Canonical Link Meta Tag For Categories
  - Use Canonical Link Meta Tag For Products
- SEO XML Sitemap Manager
- SEO Google Analytics tracking code
  - Only on hosted Magento sites
- SEO CMS Pages
  - Page information
    - Title
    - Url Key
    - Store View
    - Status
  - Meta Data
    - Keywords
    - Description
- SEO Product Pages:
  - Name
  - Description
  - Categories
  - Url Key
  - Meta Information
- SEO Category Pages
  - Name
  - Description
  - Meta Keywords
  - Meta Description

#Magento2.0 Theme:
- It's a component that provides the visual design for an entire application area using:
  - Templates
  - Layout
  - Styles
  - Images
  - ...
- Are implemented by different vendors (frontend developers)
- It's based on Zend Framework
  - MVC architecture as a Software Design Pattern
- Are located in app/design/frontend/[Vendor]/
- Each vendor can have one or more themes attached to it. So, you can develop different themes inside the same vendor.
- Main files:
  - composer.json
  - registration.php
  - theme.xml
- Static view files
  - Have no processing by the server
  - Folders:
    - /pub/static/frontend/[Vendor]/[theme]/[language]/
    - [theme_dir]/media/
    - [theme_dir]/web/
  - When we activate a new theme, Magento processes the static files and copies them to the pub/static directory
  - Static files can be cached by Magento, and the correct directory for this is pub
  - We need to create the web directory for Magento to recognize the files as static files
- Dynamic view files
  - are processed by the server before delivering content to the user
  - template and layout files

#LUMA
- Implements Responsive Web Design (RWD) practices
- It's based on the Magento User Interface (UI) library
- Uses CSS3 media queries, adapting the layout according to device access
- Uses some of the blank theme features to be functional

#Magento2.0 Blank theme
- Available in vendor/magento/theme-frontend-blank
- It's declared the parent theme of Luma

#Magento UI
- Elements
  - The actions toolbar
  - Breadcrumbs
  - Buttons
  - Drop-down menus
  - Forms
  - Icons
  - Layout
  - Loaders
  - Messages
  - Pagination
  - Popups
  - Ratings
  - Sections
  - Tab and accordions
  - Tables
  - Tooltips
  - Typography
  - A list of theme variables

#Magento Theme Inheritance
- The frontend of Magento allows designers to create new themes based on the basic blank theme
- Allows developers to create only the files that are necessary for customization
- Inheritance works similar to an override system. Replacing an existing file with the same name but in your specific theme folder (child)

#CMS Blocks and pages
- CMS pages and blocks give you the power to embeb HTML code in your page

# Custom variables
- Are pieces of HTML code that contain specific values as programming variables

#Disable magento cache
`php bin/magento cache:disable`

#Create a Magento 2.0 theme
`mkdir -p app/design/frontend/Packt/basic`
```
echo '<theme xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:Config/etc/theme.xsd">
    <title>Basic theme</title>
    <parent>Magento/blank</parent>
</theme>
' >  app/design/frontend/Packt/basic/theme.xml
```
```
echo '<?php
\Magento\Framework\Component\ComponentRegistrar::register(
  \Magento\Framework\Component\ComponentRegistrar::THEME,
  'frontend/Packt/basic',
  __DIR__
);' > app/design/frontend/Packt/basic/registration.php
```
`mkdir app/design/frontend/Packt/basic/etc`
```
`echo '<image id="category_page_grid" type="small_image">
    <width>250</width>
    <height>250</height>
</image>' > app/design/frontend/Packt/basic/etc/view.xml`
```
`mkdir -p app/design/frontend/Packt/basic/web/css/source`
`mkdir -p app/design/frontend/Packt/basic/web/fonts`
`mkdir -p app/design/frontend/Packt/basic/web/images`
`mkdir -p app/design/frontend/Packt/basic/web/js`
- Activate Themes in Stores | Configuration | Design

#Composer
- It's a Dependency Manager for PHP
- Generate a reliable deployment of Magento Components
- Manages the dependencies of your project and installs packages using composer.json in the Magento module or theme
```
mkdir -p app/design/frontend/Packt/compstore/etc
mkdir -p app/design/frontend/Packt/compstore/Magento_Theme/layout
mkdir -p app/design/frontend/Packt/compstore/media
mkdir -p app/design/frontend/Packt/compstore/web/css/source
mkdir -p app/design/frontend/Packt/compstore/web/images
```
- The etc directory handles the XML configuration of some components
- The Magento_Theme directory will override the native Magento_Theme module by adding functionalities
- The media directory will store the preview image of the new module
- The web directory store CSS and Image files
```
echo '<theme xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:noNamespaceSchemaLocation="urn:magento:framework:Config/etc/theme.xsd">
    <title>CompStore Electronics</title>
    <parent>Magento/luma</parent>
    <media>
        <preview_image>media/preview.jpg</preview_image>
    </media>
</theme>' >  app/design/frontend/Packt/compstore/theme.xml
```
- The theme.xml file declares the title and parent of the CompStore theme
```
echo '<?php
\Magento\Framework\Component\ComponentRegistrar::register(
  \Magento\Framework\Component\ComponentRegistrar::THEME,
  'frontend/Packt/compstore',
  __DIR__
);' > app/design/frontend/Packt/compstore/registration.php
```
- The registration.php file registers the new theme of the Magento system
```
echo '{
  "name": "packt/compstore",
  "description": "CompStore electronics theme",
  "require": {
    "php": "~5.6.0|~7.0.0|~7.1.0",
    "magento/theme-frontend-luma": "~100.2.1",
    "magento/framework": "~101.0.*"
  },
  "type": "magento2-theme",
  "version": "1.0.0",
  "license": [
    "OSL-3.0",
    "AFL-3.0"
  ],
  "autoload": {
    "files": [ "registration.php" ]
  }
}' > app/design/frontend/Packt/compstore/composer.json
```
- composer.json has the .json format and handles information of the project and its dependencies
  - Name: Name of the component
  - Description: Description of the component
  - Require: Dependencies of the project
  - Type: Describe the type of component (theme or module)
  - Version: Version of the component
  - License: Describes the licenses applied on a component (Open Source License or Academic Free License)
  - Autoload: Defines the files and classes that will be autoloaded upon component activation

#CSS preprocessing with LESS
- The stylesheets in M2 are preprocessed and compiled to CSS using LESS technology
- Includes variables and functions to generate a powerful CSS code
- All the .less files that you will save in your theme are compiled by the LESS engine
- You will always declare .css in the Magento theme frontend
  - Frontend declaration: `<css src="css/styles.css" />`
  - Root source file: `<Magento_theme_dir>/web/css/styles.less`

#Deploy your changes
1. `rm -rf pub/static/frontend/<Vendor>/<theme>/<locale>/*`
2. `rm -rf var/cache/*`
3. `rm -rf var/view_preprocessed/*`
4. `php bin/magento setup:static-content:deploy`

#Customizing templates
- Magento works with .phtml files to generate the view layer for the users
- The modules and themes in Magento have its specific groups of .phtml files to shop data to the users

#Zend Framework
- Magento is an MVC-based application divided into modules following a mature software pattern
- Zend Framework Case Stydy
  - Go with industry-standard PHP
  - Object-oriented
  - Testing Methodologies
  - Magento Contributors
  - Web services support
  - MVC design patter
  - Modular system

#Magento Module Directories
- Block: The View Classes
- Controller: Control the actions of Magento. Web servers process the requests and Controller redirects them to specific modules
- etc: Stores the module XML configuration files
- Helper: Auxiliary classes that provide forms, validators and formatters
- Model: Business logic and the access layer to the data
- Setup: Installation and upgrading functionalities
- Api: Controls the API's layer
- i18n: translating the module layer
- Plugins: Handles plugins if neccessary
- view: template and layout files
- LICENSES and README files

#Representational State Transfer (REST)
- It's an architecture created to provide a communication channel between applications using the HTTP protocol
- Twitter: The REST API identifies Twitter applications ans users using Oauth and the responses are available in JSON

#TweetsAbout
- Module Structure
```
mkdir -p app/code/Packt/TweetsAbout/Api
mkdir -p app/code/Packt/TweetsAbout/Block
mkdir -p app/code/Packt/TweetsAbout/Controller
mkdir -p app/code/Packt/TweetsAbout/etc
mkdir -p app/code/Packt/TweetsAbout/Observer
mkdir -p app/code/Packt/TweetsAbout/view
touch app/code/Packt/TweetsAbout/composer.json
touch app/code/Packt/TweetsAbout/LICENSE.txt
touch app/code/Packt/TweetsAbout/LICENSE_AFL.txt
touch app/code/Packt/TweetsAbout/README.md
touch app/code/Packt/TweetsAbout/registration.php
```
- Under app/code/Packt/TweetsAbout/Api
  - `composer require abraham/twitteroauth`
- Magento 2.0 works with Uniform Resource Names (URN) schema validation to reference XML declarations
   - The module.xsd file works by validating whether your module declaration follows the module declaration schema
- Under etc folder
  - module.xml
    - Contains the vendor and module name
  - frontend/routes.xml
    - Tells magento where to look for the controllers when the URL is accesed
  - frontend/events.xml
    - Declares an Observer event handler in the module
    - Observer listens to event triggered by the user or system
    - http://goo.gl/0CTzmn
- Controller
  - Magento 2.0 uses namespaces as a PHP standard recommendation (PSR4 pattern) to avoid name collisions between classes and to improve the readability of the code
 - Extends functionality (inheritance) of \Magento\Framework\App\Action\Action provides a functionality to handle actions triggered by the URL access
 - The dependency injection of the `__contruct()` method declares the initial construct of the Action class and the view layer to work with the template
  - The execute() method renders the layout
- Blocks
  - Provide presentation logic for your view templates
  - getMagentoUrl, getPHPUrl() and get PacktUrl(), get data from layout declaration files to define a URL for each kind of controller and give it to the initial layout of the module
- Views
 - Layout files (xml) to handle template behavior and to pass arguments to the template via blocks.
 - Allows the Magento system to assign the correct files according to its controller automatically

#Deploy a module
```
php bin/magento module:enable --clear-static-content ($module_name) ;
php bin/magento setup:upgrade ;
php bin/magento php bin/magento setup:static-content:deploy ;
```

#Magento UI
- The Magento UI is based on LESS and provides a set of components to develop themes and frontend solutions
  - Actions toolbar
  - Breadcrumbs
  - Buttons
  - Drop-down menus
  - Forms
  - Icons
  - Layouts
  - Loaders
  - Messages
  - Pagination
  - Popupsç
  - Ratings
  - Sections
  - Tabs and accordions
  - Tables
  - Tooltips
  - Typography
  - A list of theme variables
- Mixin capability
  - The mixin allows developers to group style rules to work with different devices
- Magento UI break points predefined variables
  - @screen__xxs: 320px
  - @screen__xs:  480px
  - @screen__s:   640px
  - @screen__m:   768px
  - @screen__l:  1024px
  - @screen__xl: 1440px

#Magento Entity Attribute Value
- Allows an unlimited numbers of attributes to any item

#Indexing and Re-indexing data
- You can precompile database relationships using the Flat Table option
  - This technique combines EAV relationships in one table to increase the speed of queries
- `php bin/magento indexer:reindex`
- Rebuilds all the product, catalog, customer and stock information

#Cron jobs
- Automated executions to handle the updates made by the user and administrator
- Works with UNIX systems and can schedule specific tasks to be executed in a predetermined time on the server
- `sudo crontab -u magento_user -e`
```
*/1 * * * * php -c <php-ini-file-path> <your Magento install dir>/bin/magento cron:run
*/1 * * * * php -c <php-ini-file-path> <your Magento install dir>/update/cron.php
*/1 * * * * php -c <php-ini-file-path> <your Magento install dir>/bin/magento setup:cron:run
```
- The cron job will be executed every minute

#Cache
- Enable cache to improve performance
- You can work with third-party cache solutions
  - Redis
  - Memcached
  - Varnish

#Apache web server deflation
- Magento uses mod_deflate to speed up server response
- Allows output from your server to be compressed before being sent to the client over the network
- Reduces about 70% of the amount of data delivered

#Expires header
- Apache mod_expires module
- The client can store a cache of the site until the client receives a new message from the server expiration of data
- Increases the speed of download

#Minifying Scripts
- Remove unnecessary characters from the source code
- Available to JS and CSS files

#Content Delivery Networks (CDN)
- Servers of fast access to your non dynamic content (îmages, css, js...)

#Other optimizations
- PHP memory configuration
- Mysql query cache

#Install Magento Extensions via Composer
- `composer config repositories.magento composer http://packages.magento.com`
- `composer require <Vendor>/<module>`
- `composer update`
- `php bin/magento setup:upgrade`

#Install Magento Extensions Manually
- Download and extract the .zip in the app/code directory
- `php bin/magento setup:upgrade`

#Grunt Task Manager
- Grunt.js is a task runner to automate tasks
- Automatic CSS changes
- How to install:
  - Intall Node.js
```
sudo npm install -g grunt-cli ;
sudo npm install grunt --save-dev ;
sudo npm install grunt-clean --save-dev ;
cp package.json.sample package.json ;
sudo apt-get install nodejs-legacy ;
sudo npm install ;
sudo npm update ;
```
  - `vi dev/tools/grunt/configs/theme.js ;`
```
    'use strict';

    module.exports = {
        blank: {
            area: 'frontend',
            name: 'Magento/blank',
            locale: 'en_US',
            files: [
                'css/styles-m',
                'css/styles-l',
                'css/email',
                'css/email-inline'
            ],
            dsl: 'less'
        },
        luma: {
            area: 'frontend',
            name: 'Magento/luma',
            locale: 'en_US',
            files: [
                'css/styles-m',
                'css/styles-l'
            ],
            dsl: 'less'
        },
        backend: {
            area: 'adminhtml',
            name: 'Magento/backend',
            locale: 'en_US',
            files: [
                'css/styles-old',
                'css/styles'
            ],
            dsl: 'less'
        }
        compstore: {
            area: 'frontend',
            name: 'Packt/compstore',
            locale: 'en_US',
            files: [
                'css/styles-m'
                'css/styles-l'
                'css/source/compstore'
            ],
            dsl: 'less'
        }
    }
```
  - Gruntfile
```
cp Gruntfile.js.sample Gruntfile.js ;
grunt exec:compstore ;
grunt less:compstore ;
grunt watch ;
```

#Improve Magento Skills
- Magento Documentation
- Magento Training Program
- Magento Study Guide
- Magento Certification
