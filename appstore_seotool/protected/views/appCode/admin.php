<?php
/* @var $this AppCodeController */
/* @var $model AppCode */

$this->breadcrumbs=array(
	'App Codes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List AppCode', 'url'=>array('index')),
	array('label'=>'Create AppCode', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('app-code-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage App Codes</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'app-code-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'app_id',
		'package_id',
		'app_name',
		'country_id',
		'all_category',
		'app_specify_flag',
		/*
		'artist_url',
		'artist_name',
		'price',
		'current_version',
		'version_update_date',
		'require_android',
		'size',
		'insert_date',
		'update_date',
		'delete_date',
		'delete_flag',
		'display_flag',
		'summary',
		'app_icon',
		'screenshot1',
		'screenshot2',
		'screenshot3',
		'screenshot4',
		'screenshot5',
		'screenshot6',
		'screenshot7',
		'screenshot8',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
