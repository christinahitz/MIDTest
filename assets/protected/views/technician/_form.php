<?php
/* @var $this TechnicianController */
/* @var $tech Technician */
/* @var $form CActiveForm */
?>

<div class="form">
    
    <input name="Technician[userID]" id="Technician_userID" type="hidden" value="<?php $tech->userID ?>" />
    <input name="User[id]" id="User_id" type="hidden" value="<?php $tech->userID ?>" />
    <input name="User[role]" id="User_role" type="hidden" value="<?php $tech->user->role ?>" />

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'technician-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary(array($tech,$user)); ?>

        <div class="row">
		<?php echo $form->labelEx($user,'username'); ?>
		<?php echo $form->textField($user,'username',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($user,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'password'); ?>
		<?php echo $form->passwordField($user,'password',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($user,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'email'); ?>
		<?php echo $form->textField($user,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($user,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'fName'); ?>
		<?php echo $form->textField($user,'fName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($user,'fName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'lName'); ?>
		<?php echo $form->textField($user,'lName',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($user,'lName'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($tech,'phone'); ?>
		<?php echo $form->textField($tech,'phone',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($tech,'phone'); ?>
	</div>

	<div class="row">
	<?php echo CHtml::dropDownList('servCenterID', $tech->servCenterID, CHtml::listData(Servicecenter::model()->findAll(),'servCenterID', 'name')); ?>
        <?php // CHtml::dropDownList($name, $select, CHtml::listData($models, $this, $form)) ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($tech->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->