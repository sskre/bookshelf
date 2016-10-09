<h2>Editing <span class='muted'>Publisher</span></h2>
<br>

<?php echo render('publisher/_form'); ?>
<p>
	<?php echo Html::anchor('publisher/view/'.$publisher->id, 'View'); ?> |
	<?php echo Html::anchor('publisher', 'Back'); ?></p>
