<form method="get" id="form_operate" action="<?=CController::createUrl('show/ajaxGetChart')?>">
   <input type="hidden" name="type" value="amount">
   <select name="country" id="country">
       <option value=""><?=$this->separatorForChainedSelect?></option>
   <?php foreach($country as $k=>$v): ?>
        <option value="<?=$v->id?>"><?=$v->name?></option>
   <?php endforeach; ?>
   </select>
    <select name="city" id="city">
        <option value=""><?=$this->separatorForChainedSelect?></option>
    </select>
    <select name="place" id="place">
        <option value=""><?=$this->separatorForChainedSelect?></option>
    </select>
    <hr>
    <select name="time" id="place">
        <option value="year">Month</option>
        <option value="month">Day</option>
        <option value="day">Hour</option>
    </select>
   <input type="submit" value="Submit">
</form>
<script>
    $(document).ready(function(){
        var server_url = '<?=$this->createAbsoluteUrl('show/getChainedList')?>';
        Helper.chainBind(server_url);
        Helper.sendForm("form_operate","id_chart_block","amount text");
    });
</script>
<div id="container_chart">
    <div id="columnchart_values"></div>
</div>