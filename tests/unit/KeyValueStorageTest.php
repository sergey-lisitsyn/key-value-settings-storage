<?php

use sergeylisitsyn\settingsStorage\models\SettingStorage;
use sergeylisitsyn\settingsStorage\components\KeyValueStorageInterface;
use sergeylisitsyn\settingsStorage\KeyValueStorage;

class KeyValueStorageTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
//         require(__DIR__ . '/../../../../../../vendor/autoload.php');
//         require(__DIR__ . '/../../../../../../vendor/yiisoft/yii2/Yii.php');
//         require_once 'models/KeyValueStorage.php';
    }

    protected function _after()
    {
    }

    public function testCreate()
    {
        $storage = new KeyValueStorage();
        $foo = $storage::create('foo', SettingStorage::TYPE_STRING, 'bar', 'xyz', 'test');
        
        $this->assertInstanceOf(KeyValueStorageInterface::class, $foo);
//         $this->assertSame($expected, $actual);
    }
}