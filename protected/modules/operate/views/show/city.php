<?php
    $this->count++;
?>
<div class="item-one">
    <a href="<?=$this->createAbsoluteUrl('manage/city',['id'=>$data->id])?>"><?=$this->count?>) <?=$data->name?></a>
    <a href="<?=$this->createAbsoluteUrl('show/place',['id_city'=>$data->id])?>">Show places</a>
</div>

