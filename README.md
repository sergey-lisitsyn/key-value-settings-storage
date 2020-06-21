Key - Value setting storage
===========================
Storage in database for persist, retrieve and manage system settings for web application

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist sergey-lisitsyn/yii2-key-value-settings-storage "*"
```

or add

```
"sergey-lisitsyn/yii2-key-value-settings-storage": "*"
```

to the require section of your `composer.json` file.

Add migration path to migrationNamespaces section in main config file.
```php
return [
    'controllerMap' => [
        'migrate' => [
            'class' => 'yii\console\controllers\MigrateController',
            'migrationNamespaces' => [
                ...
                'sergeylisitsyn\settingsStorage\migrations',
            ],
        ],
    ],
];
```
Add to components:
```
'components' => [
    'settingsStorage' => [
        'class' => 'sergeylisitsyn\settingsStorage\SystemSetting',
        'storage' => 'sergeylisitsyn\settingsStorage\models\SettingStorage'
    ],
],
```

Usage
-----

Once the extension is installed, simply use it in your code to create property  :

```php
<?=\sergeylisitsyn\settingsStorage\SystemSetting::create('settingName', $type, 'default value', 'Setting description'); ?>
```
Or retrieve value by the name :

```php
<?=\sergeylisitsyn\settingsStorage\SystemSetting::get('settingName'); ?>
```
Or set with name and value :

```php
<?=\sergeylisitsyn\settingsStorage\SystemSetting::set('settingName', 'value'); ?>
```

