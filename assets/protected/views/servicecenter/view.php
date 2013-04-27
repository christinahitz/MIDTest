<?php
/* @var $this ServicecenterController */
/* @var $model Servicecenter */

$this->breadcrumbs=array(
	'Servicecenters'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Servicecenter', 'url'=>array('index')),
	array('label'=>'Create Servicecenter', 'url'=>array('create')),
	array('label'=>'Update Servicecenter', 'url'=>array('update', 'id'=>$model->servCenterID)),
	array('label'=>'Delete Servicecenter', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->servCenterID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Servicecenter', 'url'=>array('admin')),
);
?>

<h1>View Servicecenter #<?php echo $model->servCenterID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'servCenterID',
		'name',
		'address',
		'city',
		'state',
		'zip',
		'phone',
		'website',
		'fax',
		'email',
	),
)); ?>
