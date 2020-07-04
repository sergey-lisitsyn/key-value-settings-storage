<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model sergeylisitsyn\settingsStorage\models\SettingStorage */

$this->title = 'Create Setting Storage';
$this->params['breadcrumbs'][] = ['label' => 'Setting Storage Module', 'url' => ['/admin/settings-storage']];
$this->params['breadcrumbs'][] = ['label' => 'Setting Storages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-storage-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
