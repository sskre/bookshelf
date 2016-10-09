<?php

namespace Fuel\Migrations;

class Create_authorsbooks
{
	public function up()
	{
		\DBUtil::create_table('authors_books', array(
			'author_id' => array('constraint' => 11, 'type' => 'int'),
			'book_id' => array('constraint' => 11, 'type' => 'int'),
		), array('author_id', 'book_id'));
	}

	public function down()
	{
		\DBUtil::drop_table('authors_books');
	}
}
