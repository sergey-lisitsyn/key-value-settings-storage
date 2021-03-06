<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model sergeylisitsyn\settingsStorage\models\SettingStorage */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Setting Storage Module', 'url' => ['/admin/settings-storage']];
$this->params['breadcrumbs'][] = ['label' => 'Setting Storages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="setting-storage-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute' => 'type',
                'format' => 'text',
                'value' => function ($model) {
                    return $model->listTypes()[$model->type];
                }
            ],
            'value',
            'default',
            'description:ntext',
        ],
    ]) ?>

</div>
