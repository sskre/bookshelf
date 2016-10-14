<?php
class Controller_Publisher extends Controller
{

	public function action_index()
	{
		return Response::forge(
			Presenter::forge('publisher/index')
		);
	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('publisher');

		if ( ! Model_Publisher::find($id))
		{
			Session::set_flash('error', 'Could not find publisher #'.$id);
			Response::redirect('publisher');
		}

		return Response::forge(
			Presenter::forge('publisher/view')
		);
	}

	public function get_create()
	{
		return Response::forge(
			Presenter::forge('publisher/create', 'input')
		);
	}

	public function post_create()
	{
		try
		{
			$publisher = Model_Publisher::forge(array('name' => Input::post('name')));

			if ($publisher->save())
			{
				Session::set_flash('success', 'Added publisher #'.$publisher->id.'.');
				Response::redirect('publisher');
			}
			else
			{
				Session::set_flash('error', 'Could not save publisher.');
			}
		}
		catch (Orm\ValidationFailed $e)
		{
			// Validation error has occurred
			Session::set_flash('error', 'There are some errors in the input.');
		}

		return Response::forge(
			Presenter::forge('publisher/create', 'error')
		);
	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('publisher');

		if ( ! $publisher = Model_Publisher::find($id))
		{
			Session::set_flash('error', 'Could not find publisher #'.$id);
			Response::redirect('publisher');
		}

		$val = Model_Publisher::validate('edit');

		if ($val->run())
		{
			$publisher->name = Input::post('name');

			if ($publisher->save())
			{
				Session::set_flash('success', 'Updated publisher #' . $id);

				Response::redirect('publisher');
			}

			else
			{
				Session::set_flash('error', 'Could not update publisher #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$publisher->name = $val->validated('name');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('publisher', $publisher, false);
		}

		$this->template->title = "Publishers";
		$this->template->content = View::forge('publisher/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('publisher');

		if ($publisher = Model_Publisher::find($id))
		{
			$publisher->delete();

			Session::set_flash('success', 'Deleted publisher #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete publisher #'.$id);
		}

		Response::redirect('publisher');

	}

}
