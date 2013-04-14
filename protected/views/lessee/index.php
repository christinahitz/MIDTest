<?php
/* @var $this LesseeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Lessees',
);

$this->menu=array(
	array('label'=>'Create Lessee', 'url'=>array('create')),
	array('label'=>'Manage Lessee', 'url'=>array('admin')),
);
?>

<h1>Lessees</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
