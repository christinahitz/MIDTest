<?php
/* @var $this TechnicianController */
/* @var $data Technician */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('userID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->userID), array('view', 'id'=>$data->userID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fName')); ?>:</b>
	<?php echo CHtml::encode($data->fName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lName')); ?>:</b>
	<?php echo CHtml::encode($data->lName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('servCenterID')); ?>:</b>
	<?php echo CHtml::encode($data->servCenterID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />


</div>