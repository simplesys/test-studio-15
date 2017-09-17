<?php

/* @var $this yii\web\View */

use \app\components\widgets\MenuBuilderWidget;

$this->title = 'Управление товарами';
?>
<div class="dashboard">
    <div class="dashboard__header">
        <h1>Панель управления</h1>
    </div>

    <div class="dashboard__content">
        <div class="col col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading">Справочники</div>
                <div class="panel-body">
                    <?php
                    $menuArray = [
                        ['text' => 'Товары', 'link' => '/items'],
                        [
                            'text' => 'Категории товаров',
                            'link' => '/product-categories'
                        ],
                        ['text' => 'Типы товаров', 'link' => '/product-types'],
                        ['text' => 'Поставщики', 'link' => '/providers']
                    ];
                    echo MenuBuilderWidget::widget(
                        ['elements' => $menuArray, 'type' => 'listLink']
                    );
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
