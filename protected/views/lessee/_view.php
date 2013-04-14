<?php
/* @var $this LesseeController */
/* @var $data Lessee */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('userID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->userID), array('view', 'id'=>$data->userID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('homePhone')); ?>:</b>
	<?php echo CHtml::encode($data->homePhone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mobilePhone')); ?>:</b>
	<?php echo CHtml::encode($data->mobilePhone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('homeDealer')); ?>:</b>
	<?php echo CHtml::encode($data->homeDealer); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('discount')); ?>:</b>
	<?php echo CHtml::encode($data->discount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Comment')); ?>:</b>
	<?php echo CHtml::encode($data->Comment); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('removeDate')); ?>:</b>
	<?php echo CHtml::encode($data->removeDate); ?>
	<br />

	*/ ?>

</div>