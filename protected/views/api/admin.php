<?php
/* @var $this ApiController */
/* @var $model Api */
$this->breadcrumbs = array(
    'Apis' => array('admin'),
    'Manage',
);

$this->menu=array(
	array('label'=>'Create Api', 'url'=>array('create')),
);
?>
<div class="blk-note">
    <h1>Manage Api</h1>
    <p class="desc"></p>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'api-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'afterAjaxUpdate'=>'function(){
            update_current_option();
        }',
	'columns'=>array(
                array(
                    'class'=>'CLinkColumn',
                    'header'=>'Id',
                    'labelExpression'=>'$data->id',
                    'urlExpression'=>'Yii::app()->createUrl("api/update",array("id"=>$data->id))',
                ),
                'name',
                 array(
                    'name' => 'url',
                    'type' => 'raw',
                    'value' => 'CHtml::link($data->url,Yii::app()->request->getBaseUrl()."/".$data->url)'
                ),
                array(
                    'class'=>'CDataColumn',
                    'header'=>'Current_option',
                    'type'=>'raw',
                    'value'=>'$data->currentOption!=null?CHtml::dropDownList("current_option", $data->currentOption,  CHtml::listData($data->options, "id", "name"), array("style"=>"width:100%")):""'
                ),
                array(
                    'class'=>'CButtonColumn',
                    'template'=>'{duplicate}{delete}',
                    'buttons'=> array(
                        'delete'=>array(
                            'visible'=>'$data->name!=Yii::app()->params["default_api_name"]?true:false',
                            'imageUrl'=>Yii::app()->request->baseUrl."/img/icon_delete.png"
                        ),
                        'duplicate'=>array(
                            'label'=>'duplicate',
                            'imageUrl'=>Yii::app()->request->baseUrl."/img/icon_add.png",
                            'url'=>'Yii::app()->createUrl("api/duplicate",array("id"=>$data->id))',
                        ),
                    ),
                    'htmlOptions' => array('class' => 'gv-button')
		),
	),
)); 

/*Yii::app()->getClientScript()->registerScript(
    'undelete-default-api',
    'function disableDefaultDeleteButton(){
        $("#api-grid tr").each(function(index){
           apiName=$("td",this).eq(1).text();
           if(apiName=="'.Yii::app()->params['default_api_name'].'")
               $(".delete",this).attr("style","display:none");
        });
     }
     //disableDefaultDeleteButton();
    ',
    CClientScript::POS_END
);*/

Yii::app()->getClientScript()->registerScript(
    'update-current-option',
    '
        function update_current_option(){
            $("[name=\"current_option\"]").bind("focus",function(){
                $row=$(this).parents("tr");
                $row.siblings().removeClass("selected");
                $row.addClass("selected");
            });

            $("[name=\"current_option\"]").bind("change",function(){
                $.ajax({
                    type: "GET",
                    url: "'.Yii::app()->createUrl('api/updateCurrentOption').'",
                    data: {
                            id: $(this).parents("tr").find("td a")[0].text,
                            optionId: $(this).val(),
                            ajax: true
                          }  
                });
            });
        }
        update_current_option();
    ',
    CClientScript::POS_END
);   
?>
    
