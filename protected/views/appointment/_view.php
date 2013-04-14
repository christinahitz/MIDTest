<?php
/* @var $this AppointmentController */
/* @var $data Appointment */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('appID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->appID), array('view', 'id'=>$data->appID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('servCenterID')); ?>:</b>
	<?php echo CHtml::encode($data->servCenterID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('custID')); ?>:</b>
	<?php echo CHtml::encode($data->custID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment')); ?>:</b>
	<?php echo CHtml::encode($data->comment); ?>
	<br />


</div>