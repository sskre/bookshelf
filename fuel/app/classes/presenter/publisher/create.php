<?php

class Presenter_Publisher_Create extends Presenter
{

	public function input()
	{
		$form = Fieldset::forge('publisher')->add_model(Model_Publisher::forge());
		$form->add('submit', '', array(
			'type' => 'submit',
			'class' => 'btn btn-primary submit',
			'value' => 'Create',
		));
		$form->populate(Model_Publisher::forge());

		$this->set('title', 'Publishers');
		$this->set_safe('form', $form->build());
	}

	public function error()
	{
		$form = Fieldset::forge('publisher')->add_model(Model_Publisher::forge());
		$form->add('submit', '', array(
			'type' => 'submit',
			'class' => 'btn btn-primary submit',
			'value' => 'Create',
		));

		// Run validation for getting error messages
		$form->validation()->run();

		$form->show_errors();
		$form->repopulate();
		$this->set('title', 'Publishers');
		$this->set_safe('form', $form->build());
	}

}
