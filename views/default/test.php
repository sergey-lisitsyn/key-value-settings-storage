<?php
use yii\bootstrap\Html;
use sergeylisitsyn\settingsStorage\KeyValueStorage;

$this->title = "Setting Storage Test";
$this->params['breadcrumbs'][] = ['label' => 'Setting Storage Module', 'url' => ['/admin/settings-storage']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="settingsStorage-default-index">
    <h1><?= $this->title ?></h1>
    <p>
        <?=Html::a('<i class="fa fa-arrow-left"></i> Back to main page', ['/admin/settings-storage'], [
            'class' => 'btn btn-primary'])?>
            
        <?=Html::a('<i class="fa fa-edit"></i> CRUD actions for Key-Value Settings Storage', ['/admin/settings-storage/setting-storage/index'], [
            'class' => 'btn btn-default'])?>
    </p>
    <p>
    	Try it in this way. First create setting that you want :
    	
    	<pre>$saved = Yii::$app->settingsStorage->createOrUpdate('foo', KeyValueStorage::TYPE_STRING, 'bar', 'xyz', 'test');<br />var_dump($saved);</pre>
        <?php $saved = Yii::$app->settingsStorage->createOrUpdate('foo', KeyValueStorage::TYPE_STRING, 'bar', 'xyz', 'test');?>
        <pre><?php var_dump($saved); ?></pre>
        
        Then try to read it's value :
        
        <pre>$foo = Yii::$app->settingsStorage->getValue('foo');<br />echo $foo;</pre>
        <?php $foo = Yii::$app->settingsStorage->getValue('foo');?>
        
        Result :
        <pre style="color: red"><?=$foo; ?></pre>
    </p>
</div>