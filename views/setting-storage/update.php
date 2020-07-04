<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model sergeylisitsyn\settingsStorage\models\SettingStorage */

$this->title = 'Update Setting Storage: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Setting Storage Module', 'url' => ['/admin/settings-storage']];
$this->params['breadcrumbs'][] = ['label' => 'Setting Storages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="setting-storage-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
