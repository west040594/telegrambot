<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\widgets\Pjax;
use kartik\icons\Icon;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CitySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Города';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="city-index box box-solid">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax'=>true,
        'columns' => [
            [
                'class' => 'kartik\grid\SerialColumn',
                'width' => '30px',
            ],
            [
                'attribute'=>'city',
                'vAlign'=>'middle',
                'hAlign'=>'center',
                'width'=>'200px',
            ],

            [
                'attribute'=>'country_id',
                'vAlign'=>'middle',
                'hAlign'=>'center',
                'width'=>'200px',
                'value'=>function($model) {
                    return $model->country->country;
                }
            ],

            [
                'class' => 'kartik\grid\ActionColumn',
                //'template' => '{update} {delete}',
                'dropdown'=>false,
                'vAlign'=>'middle',
                'deleteOptions'=>['role'=>'modal-remote','title'=>'Удалить',
                    'data-confirm'=>true, 'data-method'=>'post',// for overide yii data api
                    'data-request-method'=>'post',
                    'data-toggle'=>'tooltip',
                    'data-confirm-title'=>'Вы уверены?',
                    'message'=>'Вы уверены что хотите удалить эту запись?'
                ],
            ],
        ],
        'toolbar'=> [
            ['content'=>
                Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'],
                    ['title'=> 'Создать новый город','class'=>'btn btn-default']).
                Html::a('<i class="glyphicon glyphicon-repeat"></i>', [''],
                    ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Обновить таблицу'])
            ],
            '{toggleData}'.
            '{export}'
        ],
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'panel' => [
            'type' => 'primary',
            'heading' => '<i class="glyphicon glyphicon-list"></i> ' . $this->title,
            'before'=>'<em>* Список всех городов. </em>',
        ],
    ]); ?>
</div>
