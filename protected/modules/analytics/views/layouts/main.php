<style>
</style>
<?php Yii::app()->bootstrap->register(); ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="container grid">
    <div class="c-menu">
    </div>
    <div class="c-content">
        <?php echo $content; ?>
    </div><!-- content -->
</div>
<?php $this->endContent(); ?>