<?php
/* @var $this LesseeController */
/* @var $model Lessee */

$this->breadcrumbs=array(
	'Lessees'=>array('index'),
	$model->userID=>array('view','id'=>$model->userID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Lessee', 'url'=>array('index')),
	array('label'=>'Create Lessee', 'url'=>array('create')),
	array('label'=>'View Lessee', 'url'=>array('view', 'id'=>$model->userID)),
	array('label'=>'Manage Lessee', 'url'=>array('admin')),
);
?>

<h1>Update Lessee <?php echo $model->userID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>