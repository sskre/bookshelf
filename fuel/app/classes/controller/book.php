<?php
class Controller_Book extends Controller_Template
{

	public function action_index()
	{
		$data['books'] = Model_Book::find('all');
		$this->template->title = "Books";
		$this->template->content = View::forge('book/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('book');

		if ( ! $data['book'] = Model_Book::find($id))
		{
			Session::set_flash('error', 'Could not find book #'.$id);
			Response::redirect('book');
		}

		$this->template->title = "Book";
		$this->template->content = View::forge('book/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Book::validate('create');

			if ($val->run())
			{
				$book = Model_Book::forge(array(
					'title' => Input::post('title'),
					'isbn10' => Input::post('isbn10'),
					'isbn13' => Input::post('isbn13'),
					'publisher_id' => Input::post('publisher_id'),
					'released_at' => Input::post('released_at'),
					'owner_user_id' => Input::post('owner_user_id'),
					'status' => Input::post('status'),
				));

				if ($book and $book->save())
				{
					Session::set_flash('success', 'Added book #'.$book->id.'.');

					Response::redirect('book');
				}

				else
				{
					Session::set_flash('error', 'Could not save book.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Books";
		$this->template->content = View::forge('book/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('book');

		if ( ! $book = Model_Book::find($id))
		{
			Session::set_flash('error', 'Could not find book #'.$id);
			Response::redirect('book');
		}

		$val = Model_Book::validate('edit');

		if ($val->run())
		{
			$book->title = Input::post('title');
			$book->isbn10 = Input::post('isbn10');
			$book->isbn13 = Input::post('isbn13');
			$book->publisher_id = Input::post('publisher_id');
			$book->released_at = Input::post('released_at');
			$book->owner_user_id = Input::post('owner_user_id');
			$book->status = Input::post('status');

			if ($book->save())
			{
				Session::set_flash('success', 'Updated book #' . $id);

				Response::redirect('book');
			}

			else
			{
				Session::set_flash('error', 'Could not update book #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$book->title = $val->validated('title');
				$book->isbn10 = $val->validated('isbn10');
				$book->isbn13 = $val->validated('isbn13');
				$book->publisher_id = $val->validated('publisher_id');
				$book->released_at = $val->validated('released_at');
				$book->owner_user_id = $val->validated('owner_user_id');
				$book->status = $val->validated('status');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('book', $book, false);
		}

		$this->template->title = "Books";
		$this->template->content = View::forge('book/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('book');

		if ($book = Model_Book::find($id))
		{
			$book->delete();

			Session::set_flash('success', 'Deleted book #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete book #'.$id);
		}

		Response::redirect('book');

	}

}
