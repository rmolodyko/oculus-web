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
                    array('label'=>'Add country', 'url'=>array('create/country')),
                    array('label'=>'Add city', 'url'=>array('create/city')),
                    array('label'=>'Add place', 'url'=>array('create/place')),
                    array('label'=>'Add employee', 'url'=>array('create/employee') /*'visible'=>Yii::app()->user->isGuest*/),
                    array('label'=>'Add game', 'url'=>array('create/game'))
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