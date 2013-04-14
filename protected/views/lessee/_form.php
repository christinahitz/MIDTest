<?php
/* @var $this LesseeController */
/* @var $model Lessee */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lessee-form',
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
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'homePhone'); ?>
		<?php echo $form->textField($model,'homePhone',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'homePhone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mobilePhone'); ?>
		<?php echo $form->textField($model,'mobilePhone',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'mobilePhone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'homeDealer'); ?>
		<?php echo $form->textField($model,'homeDealer'); ?>
		<?php echo $form->error($model,'homeDealer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'discount'); ?>
		<?php echo $form->textField($model,'discount',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'discount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Comment'); ?>
		<?php echo $form->textField($model,'Comment',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'Comment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'removeDate'); ?>
		<?php echo $form->textField($model,'removeDate'); ?>
		<?php echo $form->error($model,'removeDate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->