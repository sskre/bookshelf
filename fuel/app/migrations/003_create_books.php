<?php

namespace Fuel\Migrations;

class Create_books
{
	public function up()
	{
		\DBUtil::create_table('books', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'title' => array('constraint' => 255, 'type' => 'varchar'),
			'isbn10' => array('constraint' => 255, 'type' => 'varchar'),
			'isbn13' => array('constraint' => 255, 'type' => 'varchar'),
			'publisher_id' => array('constraint' => 11, 'type' => 'int'),
			'released_at' => array('constraint' => 11, 'type' => 'int'),
			'owner_user_id' => array('constraint' => 11, 'type' => 'int'),
			'status' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('books');
	}
}