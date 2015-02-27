<?php
    $this->count++;
?>
<div class="item-one">
    <a href="<?=$this->createAbsoluteUrl('manage/country',['id'=>$data->id])?>"><?=$this->count?>) <?=$data->name?></a>
    <a href="<?=$this->createAbsoluteUrl('show/city',['id_country'=>$data->id])?>">Show cities</a>
</div>

