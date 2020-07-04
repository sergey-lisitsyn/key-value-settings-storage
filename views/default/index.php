<?php
use yii\bootstrap\Html;

/** @var $readme string */

$this->title = "Setting Storage Module";

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="settingsStorage-default-index">
    <h1><?= $this->title ?></h1>
    <p>
        <?=Html::a('<i class="fa fa-edit"></i> CRUD actions for Key-Value Settings Storage', ['/admin/settings-storage/setting-storage/index '], [
            'class' => 'btn btn-default'])?>

        <?=Html::a('<i class="fa fa-key"></i> Try the test for Key-Value Storage', ['/admin/settings-storage/default/test '], [
            'class' => 'btn btn-warning',
            'title' => 'This action will create test key-value item in the storage.'
        ])?>
        <pre><?=$readme; ?></pre>
    </p>
</div>
