<?php

class Presenter_Publisher_View extends Presenter
{

	public function view()
	{
		$this->set('title', 'Publisher');
		$this->set('publisher', Model_Publisher::find(Request::active()->param('id')));
	}

}
