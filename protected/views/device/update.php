<?php
/* @var $this DeviceController */
/* @var $model Device */

$this->breadcrumbs=array(
	'Devices'=>array('index'),
	$model->deviceID=>array('view','id'=>$model->deviceID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Device', 'url'=>array('index')),
	array('label'=>'Create Device', 'url'=>array('create')),
	array('label'=>'View Device', 'url'=>array('view', 'id'=>$model->deviceID)),
	array('label'=>'Manage Device', 'url'=>array('admin')),
);
?>

<h1>Update Device <?php echo $model->deviceID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>