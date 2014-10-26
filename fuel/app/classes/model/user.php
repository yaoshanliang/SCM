<?php
use Orm\Model;

class Model_User extends Model
{
	protected static $_properties = array(
		'id',
		'name',
		'sex',
		'birthday',
		'education',
		'hobbies',
		'created_at',
		'updated_at',
	);

   /* protected static $_has_one = array(
        'profile' => array(
            'key_from' => 'id',
            'model_to' => 'Model_Login',
            'key_to' => 'userid',
            'cascade_save' => true,
            'cascade_delete' => false,
        )
    );*/

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
		$val->add_field('name', 'Name', 'required|max_length[255]');
		$val->add_field('sex', 'Sex', 'required|valid_string[numeric]');
		$val->add_field('birthday', 'Birthday', 'required|valid_string[numeric]');
		$val->add_field('education', 'Education', 'required|valid_string[numeric]');
		$val->add_field('hobbies', 'Hobbies', 'required|max_length[255]');

		return $val;
	}

}
