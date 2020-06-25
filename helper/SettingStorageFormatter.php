<?php
namespace sergeylisitsyn\settingsStorage\helper;

use sergeylisitsyn\settingsStorage\components\SystemSettingStorageInterface;

class SettingStorageFormatter
{
    public function format(SystemSettingStorageInterface $set)
    {
        // echo '<b>'.__FILE__.' -- '.__LINE__.'</b><pre>'; var_dump($set); echo '</pre>'; die();
    }
}
