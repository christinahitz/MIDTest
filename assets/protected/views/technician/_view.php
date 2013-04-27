<?php
/* @var $this TechnicianController */
/* @var $data Technician */
?>

<div class="view">    

	<b><?php echo CHtml::encode($data->getAttributeLabel('Username')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->user->username), array('view', 'id'=>$data->userID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Name')); ?>:</b>
	<?php echo (CHtml::encode($data->user->fName) . ' ' . CHtml::encode($data->user->lName)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->user->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php if($data->servCenter) {echo CHtml::encode($data->getAttributeLabel('Service Center')) . ':';} ?></b>
	<?php if($data->servCenter) {echo CHtml::encode($data->servCenter->name);} ?>
	<br />

</div>