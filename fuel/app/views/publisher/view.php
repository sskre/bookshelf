<h2>Viewing <span class='muted'>#<?php echo $publisher->id; ?></span></h2>

<p>
	<strong>Name:</strong>
	<?php echo $publisher->name; ?></p>

<?php echo Html::anchor('publisher/edit/'.$publisher->id, 'Edit'); ?> |
<?php echo Html::anchor('publisher', 'Back'); ?>