<?php
/* @var $this RoleController */
/* @var $data Role */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('roleID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->roleID), array('view', 'id'=>$data->roleID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('roleName')); ?>:</b>
	<?php echo CHtml::encode($data->roleName); ?>
	<br />


</div>