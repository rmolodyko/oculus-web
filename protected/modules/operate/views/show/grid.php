<?php
    $this->pageTitle=Yii::app()->name . ' - Show Country';
?>
<style>
.c-item-one{

}
</style>
<div class="grid">

<?php
$this->widget('zii.widgets.CListView', array(
    'dataProvider'=>$dataProvider,
    'itemView'=>$itemView, // представление для одной записи
    'ajaxUpdate'=>false, // отключаем ajax поведение
    'emptyText'=>'Table is empty',
    'summaryText'=>"",
    'pager' => array(
        'header' => '',
        'nextPageLabel' => 'Next >',
        'prevPageLabel' => '< Previous',
        'lastPageCssClass' => 'pLast',
        'nextPageCssClass' => 'pNext',
        'previousPageCssClass' => 'pPrevious',
        'selectedPageCssClass' => 'pSelected',
        'internalPageCssClass' => 'pPage',
    ),
));
?>
</div>