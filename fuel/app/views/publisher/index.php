<h2>Listing <span class='muted'>Publishers</span></h2>
<br>
<?php if ($publishers): ?>
<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($publishers as $item): ?>		<tr>

			<td><?php echo $item->name; ?></td>
			<td>
				<div class="btn-toolbar">
					<div class="btn-group">
						<?php echo Html::anchor('publisher/view/'.$item->id, '<i class="icon-eye-open"></i> View', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('publisher/edit/'.$item->id, '<i class="icon-wrench"></i> Edit', array('class' => 'btn btn-default btn-sm')); ?>						<?php echo Html::anchor('publisher/delete/'.$item->id, '<i class="icon-trash icon-white"></i> Delete', array('class' => 'btn btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')")); ?>					</div>
				</div>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Publishers.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('publisher/create', 'Add new Publisher', array('class' => 'btn btn-success')); ?>

</p>
