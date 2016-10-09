<?php
class Controller_Author extends Controller_Template
{

	public function action_index()
	{
		$data['authors'] = Model_Author::find('all');
		$this->template->title = "Authors";
		$this->template->content = View::forge('author/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('author');

		if ( ! $data['author'] = Model_Author::find($id))
		{
			Session::set_flash('error', 'Could not find author #'.$id);
			Response::redirect('author');
		}

		$this->template->title = "Author";
		$this->template->content = View::forge('author/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Author::validate('create');

			if ($val->run())
			{
				$author = Model_Author::forge(array(
					'name' => Input::post('name'),
				));

				if ($author and $author->save())
				{
					Session::set_flash('success', 'Added author #'.$author->id.'.');

					Response::redirect('author');
				}

				else
				{
					Session::set_flash('error', 'Could not save author.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Authors";
		$this->template->content = View::forge('author/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('author');

		if ( ! $author = Model_Author::find($id))
		{
			Session::set_flash('error', 'Could not find author #'.$id);
			Response::redirect('author');
		}

		$val = Model_Author::validate('edit');

		if ($val->run())
		{
			$author->name = Input::post('name');

			if ($author->save())
			{
				Session::set_flash('success', 'Updated author #' . $id);

				Response::redirect('author');
			}

			else
			{
				Session::set_flash('error', 'Could not update author #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$author->name = $val->validated('name');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('author', $author, false);
		}

		$this->template->title = "Authors";
		$this->template->content = View::forge('author/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('author');

		if ($author = Model_Author::find($id))
		{
			$author->delete();

			Session::set_flash('success', 'Deleted author #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete author #'.$id);
		}

		Response::redirect('author');

	}

}
