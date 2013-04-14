<?php
/* @var $this InvoiceController */
/* @var $model Invoice */

$this->breadcrumbs=array(
	'Invoices'=>array('index'),
	$model->invoiceNum,
);

$this->menu=array(
	array('label'=>'List Invoice', 'url'=>array('index')),
	array('label'=>'Create Invoice', 'url'=>array('create')),
	array('label'=>'Update Invoice', 'url'=>array('update', 'id'=>$model->invoiceNum)),
	array('label'=>'Delete Invoice', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->invoiceNum),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Invoice', 'url'=>array('admin')),
);
?>

<h1>View Invoice #<?php echo $model->invoiceNum; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'invoiceNum',
		'serviceDate',
		'servTypeID',
		'subTotal',
		'total',
		'lesseeID',
		'servCenterID',
		'techID',
		'handsetID',
		'controlboxID',
		'comment',
	),
)); ?>
