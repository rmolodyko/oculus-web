<?php
$this->count++;
?>
    <div class="item-one">
        <a href="<?=$this->createAbsoluteUrl('manage/place',['id'=>$data->id])?>"><?=$this->count?>) <?=$data->name?></a>
    </div>
