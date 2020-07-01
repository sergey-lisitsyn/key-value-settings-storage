<?php
use yii\bootstrap\Html;
use sergeylisitsyn\settingsStorage\SystemSetting;

$this->title = "Setting storage";
?>
<div class="settingsStorage-default-index">
    <h1><?= $this->title ?></h1>
    <p>
        <?=Html::a('CRUD for Settings Storage', ['/admin/settings-storage/setting-storage/index '], [
            'class' => 'btn btn-default'])?>
    </p>
    <p>
    	Try it in this way. First create setting that you want :
    	
    	<pre>$saved = Yii::$app->settingsStorage->createOrUpdate('foo', SystemSetting::TYPE_STRING, 'bar', 'xyz', 'test');<br />var_dump($saved);</pre>
        <?php $saved = Yii::$app->settingsStorage->createOrUpdate('foo', SystemSetting::TYPE_STRING, 'bar', 'xyz', 'test');?>
        <pre><?php var_dump($saved); ?></pre>
        
        Then try to read it's value :
        
        <pre>$foo = Yii::$app->settingsStorage->getValue('foo');<br />echo $foo;</pre>
        <?php $foo = Yii::$app->settingsStorage->getValue('foo');?>
        
        Result :
        <pre style="color: red"><?=$foo; ?></pre>
    </p>
</div>
