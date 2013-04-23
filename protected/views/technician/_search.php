<?php
/* @var $this TechnicianController */
/* @var $model Technician */
/* @var $user User */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', 
        array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'userID'); ?>
		<?php echo $form->textField($model,'userID'); ?>
	</div>
    
    <div class="row">
		<label for="user.username">Username</label>
                <input size="25" maxlength="25" name="user.username" id="user.username" type="text" />
    </div>


	<div class="row">
		<?php echo $form->label($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'servCenterID'); ?>
		<?php echo $form->textField($model,'servCenterID'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->