<style>
   .c-menu{
       width: 20%;
       padding-left: 30px;
   }
   .c-content{
       width: 78%;
   }
</style>
<?php Yii::app()->bootstrap->register(); ?>
<?php $this->beginContent('//layouts/main'); ?>
    <div class="container grid">
        <div class="c-menu">
            <?php $this->widget('zii.widgets.CMenu',array(
                'items'=>array(
                    array('label'=>'-------------'),
                    array('label'=>'Add country', 'url'=>array('manage/country')),
                    array('label'=>'Add city', 'url'=>array('manage/city')),
                    array('label'=>'Add place', 'url'=>array('manage/place')),
                    array('label'=>'Add employee', 'url'=>array('manage/employee') /*'visible'=>Yii::app()->user->isGuest*/),
                    array('label'=>'Add game', 'url'=>array('manage/game')),
                    array('label'=>'Add bind place', 'url'=>array('manage/bindPlace')),
                    array('label'=>'Add float cost', 'url'=>array('manage/costFloat')),
                    array('label'=>'-------------'),
                    array('label'=>'Show country', 'url'=>array('show/country')),
                    array('label'=>'Show city', 'url'=>array('show/city')),
                    array('label'=>'Show place', 'url'=>array('show/place')),
                    array('label'=>'Show game', 'url'=>array('show/game')),
                    array('label'=>'Show employee', 'url'=>array('show/employee')),
                    array('label'=>'Show bind place', 'url'=>array('show/bindPlace')),
                    array('label'=>'Show bind cost', 'url'=>array('show/costFloat')),
                ),
            )); ?>
        </div>
        <?php
            if(Yii::app()->user->hasFlash('status')):
        ?>
        <div class="c-status"><?=Yii::app()->user->getFlash('status')?></div>
        <?php
            endif;
        ?>
        <div class="c-content">
            <?php echo $content; ?>
        </div><!-- content -->
    </div>
<?php $this->endContent(); ?>