<?php
/* @var $this TechnicianController */
/* @var $model Technician */

$this->breadcrumbs=array(
	'Technicians'=>array('index'),
	$model->userID=>array('view','id'=>$model->userID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Technician', 'url'=>array('index')),
	array('label'=>'Create Technician', 'url'=>array('create')),
	array('label'=>'View Technician', 'url'=>array('view', 'id'=>$model->userID)),
	array('label'=>'Manage Technician', 'url'=>array('admin')),
);
?>

<h1>Update Technician <?php echo $model->userID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>