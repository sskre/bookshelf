<h2>Editing <span class='muted'>Book</span></h2>
<br>

<?php echo render('book/_form'); ?>
<p>
	<?php echo Html::anchor('book/view/'.$book->id, 'View'); ?> |
	<?php echo Html::anchor('book', 'Back'); ?></p>
