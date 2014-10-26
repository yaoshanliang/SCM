<?php
use Orm\Model;

class Model_Operate_Record extends Model
{
	protected static $_properties = array(
		'id',
		'loginid',
		'type',
		'param',
		'time',
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
		$val->add_field('loginid', 'Loginid', 'required|valid_string[numeric]');
		$val->add_field('type', 'Type', 'required|valid_string[numeric]');
		$val->add_field('param', 'Param', 'required|max_length[255]');
		$val->add_field('time', 'Time', 'required');

		return $val;
	}

    public static function add($loginid, $type, $param)
    {
        $operate_record = Model_Operate_Record::forge(array(
            'loginid' => $loginid,
            'type' => $type,
            'param' => $param,
            'time' => date("Y-m-d H:i:s"),
        ));

        if ($operate_record and $operate_record->save())
        {
           return true;
        }
        return false;
    }

}
