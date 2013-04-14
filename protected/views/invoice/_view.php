<?php
/* @var $this InvoiceController */
/* @var $data Invoice */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('invoiceNum')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->invoiceNum), array('view', 'id'=>$data->invoiceNum)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serviceDate')); ?>:</b>
	<?php echo CHtml::encode($data->serviceDate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('servTypeID')); ?>:</b>
	<?php echo CHtml::encode($data->servTypeID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subTotal')); ?>:</b>
	<?php echo CHtml::encode($data->subTotal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total')); ?>:</b>
	<?php echo CHtml::encode($data->total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lesseeID')); ?>:</b>
	<?php echo CHtml::encode($data->lesseeID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('servCenterID')); ?>:</b>
	<?php echo CHtml::encode($data->servCenterID); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('techID')); ?>:</b>
	<?php echo CHtml::encode($data->techID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('handsetID')); ?>:</b>
	<?php echo CHtml::encode($data->handsetID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('controlboxID')); ?>:</b>
	<?php echo CHtml::encode($data->controlboxID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />

	*/ ?>

</div>