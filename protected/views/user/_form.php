<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($user); ?>


	<div class="row">
		<?php echo $form->labelEx($user,'username'); ?>
		<?php echo $form->textField($user,'username',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($user,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'password'); ?>
		<?php echo $form->passwordField($user,'password',array('size'=>20,'maxlength'=>255)); ?>
		<?php echo $form->error($user,'password'); ?>
	</div>
        
        <div class="row">
                <?php echo $form->labelEx($user,'password_repeat'); ?>
                <?php echo $form->passwordField($user,'password_repeat',array
                ('size'=>20,'maxlength'=>255)); ?>
                <?php echo $form->error($user,'password_repeat'); ?>
        </div>

	<div class="row">
		<?php echo $form->labelEx($user,'email'); ?>
		<?php echo $form->textField($user,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($user,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'verification'); ?>
		<?php echo $form->textField($user,'verification',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($user,'verification'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($user,'role'); ?>
		 <?php echo $form->dropDownList($user,'role', array(0=> 'Admin', '1' => 'Tech', 2 => 'User'), array('prompt' =>'Select'), array('size' =>45, 'maxlength'=>45)); ?>
		<?php echo $form->error($user,'role'); ?>
	</div>
        
        <!--<div class="formDivs">
           
		<label>Role
			<select name="role" id="role" class="textfield" rel="role">
			<!-- you'll need to work out what's actual roles will be -->
			<!--<option value="1">Role 1</option>
			<option value="2">Role 2</option>
			<option value="3">Role 3</option>
			</select> </label>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($user->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->