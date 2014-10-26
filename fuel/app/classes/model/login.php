<?php
use Orm\Model;

class Model_Login extends Model
{
	protected static $_properties = array(
		'id',
        'username',
		'userid',
		'password',
		'createtime',
		'status',
		'lastloggedtime',
		'errorloggedtime',
		'created_at',
		'updated_at',
        'email',
        'last_login'
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
		$val->add_field('userid', 'Userid', 'required|valid_string[numeric]');
        $val->add_field('username', 'username', 'required');
		$val->add_field('password', 'passwords', 'required');
        //$val->set_message('required', 'You have to fill in your :label so you can proceed');
		return $val;
	}

}
