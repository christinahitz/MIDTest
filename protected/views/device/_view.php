<?php
/* @var $this DeviceController */
/* @var $data Device */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('deviceID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->deviceID), array('view', 'id'=>$data->deviceID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('serialNum')); ?>:</b>
	<?php echo CHtml::encode($data->serialNum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastCal')); ?>:</b>
	<?php echo CHtml::encode($data->lastCal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastServ')); ?>:</b>
	<?php echo CHtml::encode($data->lastServ); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastDraegerServ')); ?>:</b>
	<?php echo CHtml::encode($data->lastDraegerServ); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('leased')); ?>:</b>
	<?php echo CHtml::encode($data->leased); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('locationID')); ?>:</b>
	<?php echo CHtml::encode($data->locationID); ?>
	<br />

	*/ ?>

</div>