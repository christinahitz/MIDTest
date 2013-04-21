<?php
/* @var $this TechnicianController */
/* @var $tech Technician */

$this->breadcrumbs=array(
	'Technicians'=>array('index'),
	$tech->userID=>array('view','id'=>$tech->userID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Technician', 'url'=>array('index')),
	array('label'=>'Create Technician', 'url'=>array('create')),
	array('label'=>'View Technician', 'url'=>array('view', 'id'=>$tech->userID)),
	array('label'=>'Manage Technician', 'url'=>array('admin')),
);
?>

<h1>Update Technician <?php echo $tech->userID; ?></h1>

<?php echo $this->renderPartial('_form', array('tech'=>$tech, 'user'=>$user)); ?>