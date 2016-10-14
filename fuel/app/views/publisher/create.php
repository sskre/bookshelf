<?php echo render('header', array('title' => $title)); ?>
<h2>New <span class='muted'>Publisher</span></h2>
<br>

<?php echo $form; ?>

<p><?php echo Html::anchor('publisher', 'Back'); ?></p>
<?php echo render('footer'); ?>
