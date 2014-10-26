<?php

namespace Fuel\Migrations;

class Create_operate_records
{
	public function up()
	{
		\DBUtil::create_table('operate_records', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'loginid' => array('constraint' => 11, 'type' => 'int'),
			'type' => array('constraint' => 11, 'type' => 'int'),
			'param' => array('constraint' => 255, 'type' => 'varchar'),
			'time' => array('type' => 'datetime'),
			'created_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('operate_records');
	}
}