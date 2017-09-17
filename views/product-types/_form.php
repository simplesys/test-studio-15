<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\db\ProductTypes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-types-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'id_category')
    ->dropDownList(
        $model::getDropdownArray(new \app\models\db\ProductCategories())
    ) ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton(
            $model->isNewRecord ? 'Создать' : 'Обновить',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
