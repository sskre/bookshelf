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

	protected static $_belongs_to = array(
		'publisher' => array(
			'key_from' => 'publisher_id',
			'model_to' => 'Model_Publisher',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		),
		'owner' => array(
			'key_from' => 'owner_user_id',
			'model_to' => 'Model_User',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
		),
	);

	protected static $_many_many = array(
		'authors' => array(
			'key_from' => 'id',
			'key_through_from' => 'book_id',
			'table_through' => 'authors_books',
			'key_through_to' => 'author_id',
			'model_to' => 'Model_Author',
			'key_to' => 'id',
			'cascade_save' => true,
			'cascade_delete' => false,
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
