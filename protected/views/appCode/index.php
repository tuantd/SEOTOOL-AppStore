<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$this->breadcrumbs = array(
    'App Codes',
);

$this->menu = array(
    array('label' => 'Create AppCode', 'url' => array('create')),
    array('label' => 'Manage AppCode', 'url' => array('admin')),
);
?>

<h1>Applications</h1>

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
));
?>
