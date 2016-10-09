<?php

class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		
		'id',
		'username',
		'password',
		'group',
		'email',
		'last_login',
		'login_hash',
		'profile_fields',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_table_name = 'users';

	protected static $_has_many = array(
		'books' => array(
			'key_from' => 'id',
			'model_to' => 'Model_Book',
			'key_to' => 'owner_user_id',
			'cascade_save' => true,
			'cascade_delete' => false,
		),
	);
}
