<h2>Viewing <span class='muted'>#<?php echo $author->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $author->name; ?></p>

<?php echo Html::anchor('author/edit/'.$author->id, 'Edit'); ?> |
<?php echo Html::anchor('author', 'Back'); ?>