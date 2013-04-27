<?php
/* @var $this ServicetypeController */
/* @var $model Servicetype */

$this->breadcrumbs=array(
	'Servicetypes'=>array('index'),
	$model->servID,
);

$this->menu=array(
	array('label'=>'List Servicetype', 'url'=>array('index')),
	array('label'=>'Create Servicetype', 'url'=>array('create')),
	array('label'=>'Update Servicetype', 'url'=>array('update', 'id'=>$model->servID)),
	array('label'=>'Delete Servicetype', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->servID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Servicetype', 'url'=>array('admin')),
);
?>

<h1>View Servicetype #<?php echo $model->servID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'servID',
		'desc',
		'price',
		'duration',
	),
)); ?>
