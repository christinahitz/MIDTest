<?php
/* @var $this TechnicianController */
/* @var $model Technician */

$this->breadcrumbs=array(
	'Technicians'=>array('index'),
	$model->userID,
);

$this->menu=array(
	array('label'=>'List Technician', 'url'=>array('index')),
	array('label'=>'Create Technician', 'url'=>array('create')),
	array('label'=>'Update Technician', 'url'=>array('update', 'id'=>$model->userID)),
	array('label'=>'Delete Technician', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->userID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Technician', 'url'=>array('admin')),
);
?>

<h1>View Technician #<?php echo $model->userID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
                'user.fName',
                'user.lName',                            
                'user.username',
                'user.email',
		'phone',
		'servCenter.name',
	),
)); ?>
