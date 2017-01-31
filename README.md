![Nova Framework](https://novaframework.com/templates/nova4/assets/img/nova.png)

# Nova CMS

[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/nova-framework/cms/blob/master/LICENSE.txt)
[![GitHub stars](https://img.shields.io/github/stars/nova-framework/cms.svg)](https://github.com/nova-framework/cms/stargazers)
[![GitHub forks](https://img.shields.io/github/forks/nova-framework/cms.svg)](https://github.com/nova-framework/cms/network)

Nova CMS is built on top of Nova Framework.

## Requirements

**The framework requirements are limited.**

- PHP 5.6 or greater.
- Apache Web Server or equivalent with mod rewrite support.
- IIS with URL Rewrite module installed - [http://www.iis.net/downloads/microsoft/url-rewrite](http://www.iis.net/downloads/microsoft/url-rewrite)

**The following PHP extensions should be enabled:**

- Fileinfo (edit php.ini and uncomment php_fileinfo.dll or use php selector within cpanel if available.)
- OpenSSL
- INTL

## Installation

This framework was designed and is **strongly recommended** to be installed above the document root directory, with it pointing to the `public` folder.

Additionally, installing in a sub-directory, on a production server, will introduce severe security issues. If there is no choice still place the framework files above the document root and have only index.php and .htacess from the public folder in the sub folder and adjust the paths accordingly.

- Upload the files above the document root and point your web root to the public folder.
- Edit app/Config/Database.php and set your database credentials.
- Edit app/Config/App.php and update your settings as desired.
- Import scripts/cms.sql into your database.

At this point the CMS should be up and running to login to the admin go to /admin with the sample user account:

username: admin
password: admin

## License

The Nova Framework is under the MIT License, you can view the license [here](https://github.com/nova-framework/framework/blob/master/LICENSE.txt).
