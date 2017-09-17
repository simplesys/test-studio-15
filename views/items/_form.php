<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\db\Items */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="items-form">
    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'id_category')->dropDownList(
        $model::getDropdownArray(new \app\models\db\ProductCategories())
    ) ?>
    <?= $form->field($model, 'id_product_type')->dropDownList(
        $model::getDropdownArray(new \app\models\db\ProductTypes())
    ) ?>
    <?= $form->field($model, 'quantity')->textInput() ?>
    <?= $form->field($model, 'id_provider')->dropDownList(
        $model::getDropdownArray(new \app\models\db\Providers())
    ) ?>
    <?= $form->field($model, 'date_delivery')->textInput() ?>
    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
    <div class="form-group">
        <?= Html::submitButton(
            $model->isNewRecord ? 'Создать' : 'Обновить',
            ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
        ) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
