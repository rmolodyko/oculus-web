<?php
$this->count++;
?>
<div class="item-one">
    <a href="<?=$this->createAbsoluteUrl('manage/game',['id'=>$data->id])?>"><?=$this->count?>) <?=$data->name?></a>
</div>

