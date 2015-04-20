<?php
/* @var $this ApiController */
/* @var $model Api */

$this->breadcrumbs=array(
	'Apis'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Api', 'url'=>array('admin')),
);
?>

<div class="blk-note">
    <h1>Create Api</h1>
    <p class="desc"></p>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>