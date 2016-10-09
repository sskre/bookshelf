<?php
use Orm\Model;

class Model_Book extends Model
{
	protected static $_properties = array(
		'id',
		'title',
		'isbn10',
		'isbn13',
		'publisher_id',
		'released_at',
		'owner_user_id',
		'status',
		'created_at',
		'updated_at',
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
	);

	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_field('title', 'Title', 'required|max_length[255]');
		$val->add_field('isbn10', 'Isbn10', 'required|max_length[255]');
		$val->add_field('isbn13', 'Isbn13', 'required|max_length[255]');
		$val->add_field('publisher_id', 'Publisher Id', 'required|valid_string[numeric]');
		$val->add_field('released_at', 'Released At', 'required|valid_string[numeric]');
		$val->add_field('owner_user_id', 'Owner User Id', 'required|valid_string[numeric]');
		$val->add_field('status', 'Status', 'required|valid_string[numeric]');

		return $val;
	}

}
