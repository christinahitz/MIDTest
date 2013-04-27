<?php
/* @var $this ServicecenterController */
/* @var $model Servicecenter */

$this->breadcrumbs=array(
	'Servicecenters'=>array('index'),
	$model->name=>array('view','id'=>$model->servCenterID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Servicecenter', 'url'=>array('index')),
	array('label'=>'Create Servicecenter', 'url'=>array('create')),
	array('label'=>'View Servicecenter', 'url'=>array('view', 'id'=>$model->servCenterID)),
	array('label'=>'Manage Servicecenter', 'url'=>array('admin')),
);
?>

<h1>Update Servicecenter <?php echo $model->servCenterID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>