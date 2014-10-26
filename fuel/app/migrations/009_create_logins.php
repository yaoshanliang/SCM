<?php

namespace Fuel\Migrations;

class Create_logins
{
	public function up()
	{
		\DBUtil::create_table('logins', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'userid' => array('constraint' => 11, 'type' => 'int'),
			'type' => array('constraint' => 255, 'type' => 'varchar'),
			'createtime' => array('type' => 'datetime'),
			'status' => array('constraint' => 11, 'type' => 'int'),
			'lastloggedtime' => array('type' => 'datetime'),
			'errorloggedtime' => array('constraint' => 11, 'type' => 'int'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('logins');
	}
}