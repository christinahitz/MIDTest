<?php
/* @var $this ServicecenterController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Servicecenters',
);

$this->menu=array(
	array('label'=>'Create Servicecenter', 'url'=>array('create')),
	array('label'=>'Manage Servicecenter', 'url'=>array('admin')),
);
?>

<h1>Servicecenters</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
