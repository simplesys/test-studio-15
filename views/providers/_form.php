<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\db\Providers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="providers-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'inn')->textInput() ?>
    <?= $form->field($model, 'kpp')->textInput() ?>
    <?= $form->field($model, 'address')->textarea(['rows' => 3]) ?>
    <?= $form->field($model, 'phone')->textInput() ?>
    <div class="form-group">
        <?= Html::submitButton(
            $model->isNewRecord ? 'Создать' : 'Обновить',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
