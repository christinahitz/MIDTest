<?php
/* @var $this LesseeController */
/* @var $lessee Lessee */

$this->breadcrumbs=array(
	'Lessees'=>array('index'),
	$lessee->userID=>array('view','id'=>$lessee->userID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Lessee', 'url'=>array('index')),
	array('label'=>'Create Lessee', 'url'=>array('create')),
	array('label'=>'View Lessee', 'url'=>array('view', 'id'=>$lessee->userID)),
	array('label'=>'Manage Lessee', 'url'=>array('admin')),
);
?>

<h1>Update Lessee <?php echo $lessee->userID; ?></h1>

<?php echo $this->renderPartial('_form', array('lessee'=>$lessee, 'user'=>$user)); ?>