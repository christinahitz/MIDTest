<?php
/* @var $this ServicecenterController */
/* @var $model Servicecenter */

$this->breadcrumbs=array(
	'Servicecenters'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Servicecenter', 'url'=>array('index')),
	array('label'=>'Manage Servicecenter', 'url'=>array('admin')),
);
?>

<h1>Create Servicecenter</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>