<?php
/* @var $this AppCodeController */
/* @var $data AppCode */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('app_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->app_id), array('view', 'id'=>$data->app_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('package_id')); ?>:</b>
	<?php echo CHtml::encode($data->package_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('app_name')); ?>:</b>
	<?php echo CHtml::encode($data->app_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country_id')); ?>:</b>
	<?php echo CHtml::encode($data->country_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('all_category')); ?>:</b>
	<?php echo CHtml::encode($data->all_category); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('app_specify_flag')); ?>:</b>
	<?php echo CHtml::encode($data->app_specify_flag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('artist_url')); ?>:</b>
	<?php echo CHtml::encode($data->artist_url); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('artist_name')); ?>:</b>
	<?php echo CHtml::encode($data->artist_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('current_version')); ?>:</b>
	<?php echo CHtml::encode($data->current_version); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('version_update_date')); ?>:</b>
	<?php echo CHtml::encode($data->version_update_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('require_android')); ?>:</b>
	<?php echo CHtml::encode($data->require_android); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('size')); ?>:</b>
	<?php echo CHtml::encode($data->size); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('insert_date')); ?>:</b>
	<?php echo CHtml::encode($data->insert_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('update_date')); ?>:</b>
	<?php echo CHtml::encode($data->update_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delete_date')); ?>:</b>
	<?php echo CHtml::encode($data->delete_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('delete_flag')); ?>:</b>
	<?php echo CHtml::encode($data->delete_flag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('display_flag')); ?>:</b>
	<?php echo CHtml::encode($data->display_flag); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('summary')); ?>:</b>
	<?php echo CHtml::encode($data->summary); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('app_icon')); ?>:</b>
	<?php echo CHtml::encode($data->app_icon); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('screenshot1')); ?>:</b>
	<?php echo CHtml::encode($data->screenshot1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('screenshot2')); ?>:</b>
	<?php echo CHtml::encode($data->screenshot2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('screenshot3')); ?>:</b>
	<?php echo CHtml::encode($data->screenshot3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('screenshot4')); ?>:</b>
	<?php echo CHtml::encode($data->screenshot4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('screenshot5')); ?>:</b>
	<?php echo CHtml::encode($data->screenshot5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('screenshot6')); ?>:</b>
	<?php echo CHtml::encode($data->screenshot6); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('screenshot7')); ?>:</b>
	<?php echo CHtml::encode($data->screenshot7); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('screenshot8')); ?>:</b>
	<?php echo CHtml::encode($data->screenshot8); ?>
	<br />

	*/ ?>

</div>