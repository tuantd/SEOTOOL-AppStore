<?php
/* @var $this AppCodeController */
/* @var $model AppCode */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'app-code-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	 <div class="row">
		
                <?php echo $form->labelEx($model,'country_id'); ?>
		<?php echo $form->dropDownList($model, 'country_id', CountryCode::allCountry());
                ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'package_id'); ?>
		<?php echo $form->textField($model,'package_id',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'package_id'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'app_name'); ?>
		<?php echo $form->textField($model,'app_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'app_name'); ?>
	</div>        
       
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->