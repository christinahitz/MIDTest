<?php
/* @var $this InvoiceController */
/* @var $model Invoice */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'invoice-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'serviceDate'); ?>
		<?php echo $form->textField($model,'serviceDate'); ?>
		<?php echo $form->error($model,'serviceDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'servTypeID'); ?>
		<?php echo $form->textField($model,'servTypeID'); ?>
		<?php echo $form->error($model,'servTypeID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subTotal'); ?>
		<?php echo $form->textField($model,'subTotal',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'subTotal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total'); ?>
		<?php echo $form->textField($model,'total',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'total'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lesseeID'); ?>
		<?php echo $form->textField($model,'lesseeID'); ?>
		<?php echo $form->error($model,'lesseeID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'servCenterID'); ?>
		<?php echo $form->textField($model,'servCenterID'); ?>
		<?php echo $form->error($model,'servCenterID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'techID'); ?>
		<?php echo $form->textField($model,'techID'); ?>
		<?php echo $form->error($model,'techID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'handsetID'); ?>
		<?php echo $form->textField($model,'handsetID'); ?>
		<?php echo $form->error($model,'handsetID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'controlboxID'); ?>
		<?php echo $form->textField($model,'controlboxID'); ?>
		<?php echo $form->error($model,'controlboxID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'comment'); ?>
		<?php echo $form->textField($model,'comment',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->