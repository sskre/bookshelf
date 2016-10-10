<?php
use Orm\Model;

class Model_Publisher extends Model
{
	protected static $_properties = array(
		'id',
		'name' => array(
			'data_type' => 'string',
			'label' => 'Name',
			'validation' => array(
				'required',
				'max_length' => array(255),
			),
			'form' => array(
				'type' => 'text',
				'class' => 'form-control',
				'placeholder' => 'Name',
			),
		),
		'created_at' => array(
			'data_type' => 'int',
			'form' => array(
				'type' => false,
			),
		),
		'updated_at' => array(
			'data_type' => 'int',
			'form' => array(
				'type' => false,
			),
		),
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_Validation' => array(
			'events' => array('before_save'),
		),
	);

	protected static $_has_many = array(
		'books' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Book',
			'key_to' => 'publisher_id',
			'cascade_save' => true,
			'cascade_delete' => false,
		),
	);

}
