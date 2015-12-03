<?php
use himiklab\jqgrid\JqGridWidget;
use yii\helpers\Url;
?>
<h1>jq-grid/index</h1>

<p>
    You may change the content of this page by modifying
    the file <code><?= __FILE__; ?></code>.
</p>

<?= JqGridWidget::widget([
    'requestUrl' => Url::to('jqgrid'),
    'gridSettings' => [
        'colNames' => ['Id', 'Name'],
        'colModel' => [
            ['name' => 'id', 'index' => 'id', 'editable' => false],
            ['name' => 'name', 'index' => 'name', 'editable' => true],
        ],
        'rowNum' => 15,
        'autowidth' => true,
        'height' => 'auto',
    ],
    'pagerSettings' => [
        'edit' => true,
        'add' => true,
        'del' => true,
        'search' => ['multipleSearch' => true]
    ],
    'enableFilterToolbar' => true,
]) ?>

<pre>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
</pre>