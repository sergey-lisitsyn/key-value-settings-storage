<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model sergeylisitsyn\settingsStorage\models\SettingStorage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-storage-form row">

    <?php $form = ActiveForm::begin(); ?>

	<div class="col-md-4">
    	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
	</div>

	<div class="col-md-4">
    	<?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>
	</div>

	<div class="col-md-4">
    	<?= $form->field($model, 'default')->textInput(['maxlength' => true]) ?>
	</div>

	<div class="col-md-4">
    	<?= $form->field($model, 'type')->dropDownList($model->listTypes()) ?>
	</div>

	<div class="col-md-8">
    	<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    </div>

    <div class="form-group col-md-12">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
