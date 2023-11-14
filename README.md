# Cryptomus Payment integration for Magento 2

 - [Main Functionalities](#markdown-header-main-functionalities)
 - [Installation](#markdown-header-installation)
 - [Configuration](#markdown-header-configuration)
 - [Specifications](#markdown-header-specifications)
 - [Attributes](#markdown-header-attributes)


## Installation
\* = in production please use the `--keep-generated` option

### Type 1: Zip file

 - Unzip the zip file in `app/code/Cryptomus`
 - Enable the module by running `php bin/magento module:enable Cryptomus_Payment`
 - Apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`

### Type 2: Composer

 - Make the module available in a composer repository for example:
 - 
 - Install the module composer by running `composer require magebrains/cryptomus-magento2`
 - enable the module by running `php bin/magento module:enable Cryptomus_Payment`
 - apply database updates by running `php bin/magento setup:upgrade`\*
 - Flush the cache by running `php bin/magento cache:flush`


## Configuration

 - System Settings->Sales->Payment methods->Cryptomus
 - Set API key(Payment key) from Cryptomus merchant settings
 - Set Merchant UUID(Secret) from Cryptomus merchant settings 


## Specifications

 - Payment Method
	- cryptomus



