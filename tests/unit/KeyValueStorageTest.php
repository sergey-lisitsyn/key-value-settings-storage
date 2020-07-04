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
        // require_once __DIR__ . '/../../KeyValueStorage.php';
    }

    protected function _after()
    {
    }

    public function testCreate()
    {
        echo '<b>'.__FILE__.' -- '.__LINE__.'</b><pre>'; var_dump(222); echo '</pre>'; die();
        $storage = new KeyValueStorage();
        $foo = $storage::create('foo', SettingStorage::TYPE_STRING, 'bar', 'xyz', 'test');
        
        $this->assertInstanceOf(KeyValueStorageInterface::class, $foo);
//         $this->assertSame($expected, $actual);
    }
}