<?php
/* @var $this OptionController */
/* @var $model Option */

$this->breadcrumbs=array(
	'Api'=>array('api/update','id'=>$model->api_id),
	'Create',
);

?>

<div class="blk-note">
	<h1>Create Option</h1>
    <p class="desc"></p>
</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>