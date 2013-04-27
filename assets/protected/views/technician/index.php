<?php
/* @var $this TechnicianController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Technicians',
);

$this->menu=array(
	array('label'=>'Create Technician', 'url'=>array('create')),
	array('label'=>'Manage Technician', 'url'=>array('admin')),
);
?>

<h1>Technicians</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
