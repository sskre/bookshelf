<?php

class Presenter_Publisher_Index extends Presenter
{

	public function view()
	{
		$this->set('title', 'Publishers');
		$this->set('publishers', Model_Publisher::find('all'));
	}

}
