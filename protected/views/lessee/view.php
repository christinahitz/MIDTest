<?php
/* @var $this LesseeController */
/* @var $model Lessee */

$this->breadcrumbs=array(
	'Lessees'=>array('index'),
	$model->userID,
);

$this->menu=array(
	array('label'=>'List Lessee', 'url'=>array('index')),
	array('label'=>'Create Lessee', 'url'=>array('create')),
	array('label'=>'Update Lessee', 'url'=>array('update', 'id'=>$model->userID)),
	array('label'=>'Delete Lessee', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->userID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Lessee', 'url'=>array('admin')),
);
?>

<h1>View Lessee #<?php echo $model->userID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'userID',
		'address',
		'homePhone',
		'mobilePhone',
		'homeDealer',
		'discount',
		'Comment',
		'removeDate',
	),
)); ?>
