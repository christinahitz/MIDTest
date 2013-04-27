<?php
/* @var $this ServicetypeController */
/* @var $model Servicetype */

$this->breadcrumbs=array(
	'Servicetypes'=>array('index'),
	$model->servID=>array('view','id'=>$model->servID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Servicetype', 'url'=>array('index')),
	array('label'=>'Create Servicetype', 'url'=>array('create')),
	array('label'=>'View Servicetype', 'url'=>array('view', 'id'=>$model->servID)),
	array('label'=>'Manage Servicetype', 'url'=>array('admin')),
);
?>

<h1>Update Servicetype <?php echo $model->servID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>