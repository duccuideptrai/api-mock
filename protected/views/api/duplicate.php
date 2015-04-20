<?php
/* @var $this ApiController */
/* @var $model Api */

$this->breadcrumbs=array(
	'Apis'=>array('admin'),
	'Duplicate',
);

$this->menu=array(
	array('label'=>'Manage Api', 'url'=>array('admin')),
);
?>

<div class="blk-note">
    <h1>Duplicate Api <?=$srcModel->name?></h1>
    <p class="desc"></p>
</div>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>