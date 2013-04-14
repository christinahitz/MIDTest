<?php
/* @var $this ServicetypeController */
/* @var $data Servicetype */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('servID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->servID), array('view', 'id'=>$data->servID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc')); ?>:</b>
	<?php echo CHtml::encode($data->desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('duration')); ?>:</b>
	<?php echo CHtml::encode($data->duration); ?>
	<br />


</div>