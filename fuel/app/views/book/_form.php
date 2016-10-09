<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Title', 'title', array('class'=>'control-label')); ?>

				<?php echo Form::input('title', Input::post('title', isset($book) ? $book->title : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Title')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Isbn10', 'isbn10', array('class'=>'control-label')); ?>

				<?php echo Form::input('isbn10', Input::post('isbn10', isset($book) ? $book->isbn10 : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Isbn10')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Isbn13', 'isbn13', array('class'=>'control-label')); ?>

				<?php echo Form::input('isbn13', Input::post('isbn13', isset($book) ? $book->isbn13 : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Isbn13')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Publisher id', 'publisher_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('publisher_id', Input::post('publisher_id', isset($book) ? $book->publisher_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Publisher id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Released at', 'released_at', array('class'=>'control-label')); ?>

				<?php echo Form::input('released_at', Input::post('released_at', isset($book) ? $book->released_at : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Released at')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Owner user id', 'owner_user_id', array('class'=>'control-label')); ?>

				<?php echo Form::input('owner_user_id', Input::post('owner_user_id', isset($book) ? $book->owner_user_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Owner user id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Status', 'status', array('class'=>'control-label')); ?>

				<?php echo Form::input('status', Input::post('status', isset($book) ? $book->status : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Status')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>