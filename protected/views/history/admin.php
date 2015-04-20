<?php
/* @var $this HistoryController */
/* @var $model History */

$this->breadcrumbs = array(
    'Histories' => array('admin'),
    'Manage',
);

$this->menu=array(
	array('label'=>'Delete All History', 'url'=>array('deleteAll')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#history-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="blk-note">
	<h1>Manage Histories</h1>

	<p class="desc"></p>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'history-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
                    'class'=>'CLinkColumn',
                    'header'=>'Id',
                    'labelExpression'=>'$data->id',
                    'urlExpression'=>'Yii::app()->createUrl("history/update",array("id"=>$data->id))',
                ),
                array(
                    'name' => 'url',
                    'header' => 'Api',
                    'type' => 'raw',
                    'value' => 'CHtml::link(Yii::app()->format->formatNtext($data->url),Yii::app()->createUrl("api/update",array("id"=>$data->api_id)))'
                ),
                'name',
		'ip',
		'method',
		'create_time',
		/*
		'response',
		*/
		array(
			'class'=>'CButtonColumn',
            'template'=>'{delete}',
            'buttons'=>array(
            	'delete'=>array(
                    'imageUrl'=>Yii::app()->request->baseUrl."/img/icon_delete.png"
            	)
            )
		),
	),
)); 
Yii::app()->getClientScript()->registerCss('resize-apiname-col','#history-grid_c0 {width:30px}');
?>
