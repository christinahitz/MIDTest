<?php
/* @var $this LesseeController */
/* @var $lessee Lessee */
/* @var $form CActiveForm */
?>

<div class="form">
    
    <input name="Lessee[userID]" id="Lessee_userID" type="hidden" value="<?php $lessee->userID ?>" />
    <input name="User[id]" id="User_id" type="hidden" value="<?php $lessee->userID ?>" />
    <input name="User[role]" id="User_role" type="hidden" value="<?php $lessee->user->role ?>" />

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lessee-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($lessee,$user); ?>
        
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
		<?php echo $form->labelEx($lessee,'address'); ?>
		<?php echo $form->textField($lessee,'address',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($lessee,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($lessee,'homePhone'); ?>
		<?php echo $form->textField($lessee,'homePhone',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($lessee,'homePhone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($lessee,'mobilePhone'); ?>
		<?php echo $form->textField($lessee,'mobilePhone',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($lessee,'mobilePhone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($lessee,'Comment'); ?>
		<?php echo $form->textField($lessee,'Comment',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($lessee,'Comment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($lessee,'removeDate'); ?>
		<?php echo $form->textField($lessee,'removeDate'); ?>
		<?php echo $form->error($lessee,'removeDate'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($lessee->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->