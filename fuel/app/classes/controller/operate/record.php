<?php
class Controller_Operate_Record extends Controller_Common
{

	public function action_index()
	{
		$data['operate_records'] = Model_Operate_Record::find('all');
        $logins = Model_Login::find('all');
        foreach($logins as $v)
        {
            $data['logins'][$v->userid] = $v->username;
        }
        $users = Model_User::find('all');
        foreach($users as $v)
        {
            $data['users'][$v->id] = $v->name;
        }
		$this->template->title = "Operate_records";
		$this->template->content = View::forge('operate/record/index', $data);

	}



	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Operate_Record::validate('create');

			if ($val->run())
			{
				$operate_record = Model_Operate_Record::forge(array(
					'loginid' => Input::post('loginid'),
					'type' => Input::post('type'),
					'param' => Input::post('param'),
					'time' => Input::post('time'),
				));

				if ($operate_record and $operate_record->save())
				{
					Session::set_flash('success', 'Added operate_record #'.$operate_record->id.'.');

					Response::redirect('operate/record');
				}

				else
				{
					Session::set_flash('error', 'Could not save operate_record.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Operate_Records";
		$this->template->content = View::forge('operate/record/create');

	}



}
