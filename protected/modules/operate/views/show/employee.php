<?php
$this->count++;
?>
<div class="item-one">
    <a href="<?=$this->createAbsoluteUrl('manage/employee',['id'=>$data->id])?>"><?=$this->count?>) <?=$data->email?> <?=$data->first_name?> <?=$data->last_name?></a>
    <a href="<?=$this->createAbsoluteUrl('show/bindPlace',['id_employee'=>$data->id])?>">Show bind places</a>
</div>

