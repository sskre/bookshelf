<h2>Editing <span class='muted'>Author</span></h2>
<br>

<?php echo render('author/_form'); ?>
<p>
	<?php echo Html::anchor('author/view/'.$author->id, 'View'); ?> |
	<?php echo Html::anchor('author', 'Back'); ?></p>
