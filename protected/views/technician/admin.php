<?php
/* @var $this TechnicianController */
/* @var $model Technician */

$this->breadcrumbs=array(
	'Technicians'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Technician', 'url'=>array('index')),
	array('label'=>'Create Technician', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#technician-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Technicians</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'technician-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array('name'=>'username', 'value'=>'$data->user->username'),
                array('name'=>'first_name', 'value'=>'$data->user->fName'),
                array('name'=>'last_name', 'value'=>'$data->user->lName'),
                array('name'=>'email', 'value'=>'$data->user->email'),
                array('name'=>'service_center', 'value'=>'$data->servCenter->name'),
		'phone',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
