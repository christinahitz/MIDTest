<?php
/* @var $this ServicetypeController */
/* @var $model Servicetype */

$this->breadcrumbs=array(
	'Servicetypes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Servicetype', 'url'=>array('index')),
	array('label'=>'Manage Servicetype', 'url'=>array('admin')),
);
?>

<h1>Create Servicetype</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>