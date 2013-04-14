<?php
/* @var $this TechnicianController */
/* @var $model Technician */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'technician-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'userID'); ?>
		<?php echo $form->textField($model,'userID'); ?>
		<?php echo $form->error($model,'userID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fName'); ?>
		<?php echo $form->textField($model,'fName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'fName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lName'); ?>
		<?php echo $form->textField($model,'lName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'lName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'servCenterID'); ?>
		<?php echo $form->textField($model,'servCenterID'); ?>
		<?php echo $form->error($model,'servCenterID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->