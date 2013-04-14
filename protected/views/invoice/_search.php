<?php
/* @var $this InvoiceController */
/* @var $model Invoice */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'invoiceNum'); ?>
		<?php echo $form->textField($model,'invoiceNum'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'serviceDate'); ?>
		<?php echo $form->textField($model,'serviceDate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'servTypeID'); ?>
		<?php echo $form->textField($model,'servTypeID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subTotal'); ?>
		<?php echo $form->textField($model,'subTotal',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total'); ?>
		<?php echo $form->textField($model,'total',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'lesseeID'); ?>
		<?php echo $form->textField($model,'lesseeID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'servCenterID'); ?>
		<?php echo $form->textField($model,'servCenterID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'techID'); ?>
		<?php echo $form->textField($model,'techID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'handsetID'); ?>
		<?php echo $form->textField($model,'handsetID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'controlboxID'); ?>
		<?php echo $form->textField($model,'controlboxID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comment'); ?>
		<?php echo $form->textField($model,'comment',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->