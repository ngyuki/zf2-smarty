# Smarty module for Zend Framework 2

## Installation

Copy *config/smarty.global.php* to your *config/autoload/* directory.

```console
$ cp vendor/ngyuki/zf2-smarty/config/smarty.global.php config/autoload/
```

Fix *config/autoload/smarty.global.php*

```php
<?php
return array(
    'smarty' => array(
        // ...
    ),
);
```

Add `ZendSmarty` in your `application.config.php`

```php
<?php
return array(
    'modules' => array(
        'Application',
        'ZendSmarty', // this is it!
    ),

    // ...
);
```

## Using ZF2 View Helpers

```
{* simple with echo (not support method chain) *}
{url bar [id => 12345]}

{* simple without echo (not support method chain) *}
{do headTitle "Index Page"}

{* method chain *}
{$this->headTitle("ZF2 Smarty")->setSeparator(' - ') nofilter}
```
