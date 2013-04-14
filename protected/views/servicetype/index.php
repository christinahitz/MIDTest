<?php
/* @var $this ServicetypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Servicetypes',
);

$this->menu=array(
	array('label'=>'Create Servicetype', 'url'=>array('create')),
	array('label'=>'Manage Servicetype', 'url'=>array('admin')),
);
?>

<h1>Servicetypes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
