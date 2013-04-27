<?php
/* @var $this LesseeController */
/* @var $model Lessee */

$this->breadcrumbs=array(
	'Lessees'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Lessee', 'url'=>array('index')),
	array('label'=>'Manage Lessee', 'url'=>array('admin')),
);
?>

<h1>Create Lessee</h1>

<?php echo $this->renderPartial('_form', array('lessee'=>$lessee, 'user'=>$user)); ?>