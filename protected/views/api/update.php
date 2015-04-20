<?php
/* @var $this ApiController */
/* @var $model Api */

$this->breadcrumbs=array(
	'Api'=>array('admin'),
	$model->name.' Update',
);

$this->menu=array(
	array('label'=>'Create Api', 'url'=>array('create')),
	array('label'=>'Manage Api', 'url'=>array('admin')),
    array('label'=>'Create Option', 'url'=>array('option/create','api_id'=>$model->id)),
    array('label'=>'Duplicate', 'url'=>array('api/duplicate','id'=>$model->id)),
);
?>
<div class="blk-note">
    <h1>Update Api <?php echo $model->name; ?></h1>
    <p class="desc"></p>
</div>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>