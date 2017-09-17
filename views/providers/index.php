<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\db\search\ProvidersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Поставщики';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="providers-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(
            'Создать поставщика', ['create'], ['class' => 'btn btn-success']
        ) ?>
    </p>
<?php
Pjax::begin();
echo GridView::widget(
    [
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'name',
            'inn',
            'kpp',
            'address:ntext',
            'phone',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]
);
Pjax::end();
?>
</div>
