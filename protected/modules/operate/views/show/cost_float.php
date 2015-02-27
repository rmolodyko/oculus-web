<?php
$this->count++;
?>
<div class="item-one">
    <?=$this->count?>)
    <a href="<?=$this->createAbsoluteUrl('manage/place',['id'=>$data->id_place])?>"><?=Place::model()->findByPk($data->id_place)->name?></a>
    <a href="<?=$this->createAbsoluteUrl('manage/costFloat',['id'=>$data->id])?>">Manage bind</a>
</div>