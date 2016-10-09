<h2>Listing <span class='muted'>Books</span></h2>
<br>
<?php if ($books): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Isbn10</th>
			<th>Isbn13</th>
			<th>Publisher id</th>
			<th>Released at</th>
			<th>Owner user id</th>
			<th>Status</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($books as $item): ?>		<tr>

			<td><?php echo $item->title; ?></td>
			<td><?php echo $item->isbn10; ?></td>
			<td><?php echo $item->isbn13; ?></td>
			<td><?php echo $item->publisher_id; ?></td>
			<td><?php echo $item->released_at; ?></td>
			<td><?php echo $item->owner_user_id; ?></td>
			<td><?php echo $item->status; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('book/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('book/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('book/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Books.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('book/create', 'Add new Book', array('class' => 'btn btn-success')); ?>

</p>
