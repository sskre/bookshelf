<h2>Viewing <span class='muted'>#<?php echo $book->id; ?></span></h2>

<p>
	<strong>Title:</strong>
	<?php echo $book->title; ?></p>
<p>
	<strong>Isbn10:</strong>
	<?php echo $book->isbn10; ?></p>
<p>
	<strong>Isbn13:</strong>
	<?php echo $book->isbn13; ?></p>
<p>
	<strong>Publisher id:</strong>
	<?php echo $book->publisher_id; ?></p>
<p>
	<strong>Released at:</strong>
	<?php echo $book->released_at; ?></p>
<p>
	<strong>Owner user id:</strong>
	<?php echo $book->owner_user_id; ?></p>
<p>
	<strong>Status:</strong>
	<?php echo $book->status; ?></p>

<?php echo Html::anchor('book/edit/'.$book->id, 'Edit'); ?> |
<?php echo Html::anchor('book', 'Back'); ?>