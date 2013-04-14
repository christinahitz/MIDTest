<?php
/* @var $this TechnicianController */
/* @var $model Technician */

$this->breadcrumbs=array(
	'Technicians'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Technician', 'url'=>array('index')),
	array('label'=>'Manage Technician', 'url'=>array('admin')),
);
?>

<h1>Create Technician</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>