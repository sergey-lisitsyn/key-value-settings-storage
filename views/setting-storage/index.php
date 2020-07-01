<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel sergeylisitsyn\settingsStorage\models\SettingStorageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Setting Storages';
$this->params['breadcrumbs'][] = ['label' => 'Setting Storage module', 'url' => ['/admin/settings-storage']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-storage-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Setting Storage', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
