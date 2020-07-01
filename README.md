Key - Value settings storage
============================
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
```php
return [
    'components' => [
        'settingsStorage' => [
            'class' => 'sergeylisitsyn\settingsStorage\SystemSetting',
            'storage' => 'sergeylisitsyn\settingsStorage\models\SettingStorage',
            'formatters' => [
                'string' => 'sergeylisitsyn\settingsStorage\models\formatters\StringStorageFormatter',
                'number' => 'sergeylisitsyn\settingsStorage\models\formatters\NumberStorageFormatter',
                'bool' => 'sergeylisitsyn\settingsStorage\models\formatters\BooleanStorageFormatter',
                'array' => 'sergeylisitsyn\settingsStorage\models\formatters\ArrayStorageFormatter'
            ],
        ],
    ],
]
```

To access the module, you need to add this to your application configuration:
```php
<?php
    ......
    'modules' => [
        'settings-storage' => [
            'class' => 'sergeylisitsyn\settingsStorage\Module',
        ],
    ],
    ......
```

Usage
-----

Once the extension is installed, simply use it in your code to create and persist property in storage :

```php
$foo = Yii::$app->settingsStorage::create('foo', SystemSetting::TYPE_STRING, 'bar', 'xyz', 'test');
$foo->save();
// or just
$saved = Yii::$app->settingsStorage->put('foo', SystemSetting::TYPE_STRING, 'bar', 'xyz', 'test');
```
Getting and setting value into storage :
```php
$fooVal = Yii::$app->settingsStorage->getValue('foo');
echo($fooVal); // bar
Yii::$app->settingsStorage->set('foo', 'baz');
$fooVal = Yii::$app->settingsStorage->getValue('foo');
echo($fooVal); // baz
```
Or just retrieve value by the name :

```php
<?=Yii::$app->settingsStorage->getValue('foo'); ?>
```
Or only set with name and value :

```php
<?=Yii::$app->settingsStorage->set('foo', 'baz'); ?>
```

Change setting type by name :

```php
<?=Yii::$app->settingsStorage->setType('foo', SystemSetting::TYPE_NUMBER); ?>
<?=Yii::$app->settingsStorage->set('foo', 1000000); ?>
```
or change all properties by the edit method :

```php
<?php
$foo = Yii::$app->settingsStorage->get('foo');
$foo->edit('foo', SystemSetting::TYPE_STRING, 'baz', 'zyx', 'another description');
$foo->save();
// or just
Yii::$app->settingsStorage->update('foo', SystemSetting::TYPE_STRING, 'baz', 'zyx', 'another description');
?>
```
X11 License.