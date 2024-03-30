A custom module for [kingpalm.com](https://kingpalm.com) (Magento 2).

## How to install
```
bin/magento maintenance:enable
rm -rf composer.lock
composer clear-cache
composer require kingpalm/core:*
bin/magento cache:enable
bin/magento setup:upgrade
rm -rf var/di var/generation generated/code
bin/magento setup:di:compile
rm -rf pub/static/*
bin/magento setup:static-content:deploy \
	--area adminhtml \
	--theme Magento/backend \
	-f en_US
bin/magento setup:static-content:deploy \
	--area frontend \
	--theme Smartwave/porto_child \
	-f en_US
bin/magento maintenance:disable
```

## How to upgrade
```
bin/magento maintenance:enable
composer remove kingpalm/core
rm -rf composer.lock
composer clear-cache
composer require kingpalm/core:*
bin/magento cache:enable
bin/magento setup:upgrade
rm -rf var/di var/generation generated/code
bin/magento setup:di:compile
rm -rf pub/static/*
bin/magento setup:static-content:deploy \
	--area adminhtml \
	--theme Magento/backend \
	-f en_US
bin/magento setup:static-content:deploy \
	--area frontend \
	--theme Smartwave/porto_child \
	-f en_US
bin/magento maintenance:disable
```
