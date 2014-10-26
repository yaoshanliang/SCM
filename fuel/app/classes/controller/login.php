<?php
class Controller_Login extends Controller_Common
{

	public function action_index()
	{
		$data['logins'] = Model_Login::find('all');
        $users = Model_User::find('all');
        foreach($users as $v)
        {
            $data['users'][$v->id] = $v->name;
        }
		$this->template->title = "Logins";
		$this->template->content = View::forge('login/index', $data);

	}

	public function action_create()
	{
        $data['logins'] = Model_Login::find('all');
        $users = Model_User::find('all');
		if (Input::method() == 'POST')
		{
			$val = Model_Login::validate('create');

			if ($val->run())
			{
                $userifo = Model_Login::find_by_username(Input::post('username'));
                $userifo_by_userid = Model_Login::find_by_userid(Input::post('userid'));

                if(!is_null($userifo_by_userid) && $userifo_by_userid->username != '')
                {
                    Session::set_flash('error', '该用户已存在账户，无需再为该用户分配账户.');
                }
                else if(!empty($userifo))
                {
                    Session::set_flash('error', '该账户名已存在，请为该用户重新选取帐户名.');
                }
                else
                {
                    $login = Model_Login::forge(array(
                        'userid' => Input::post('userid'),
                        'username' => Input::post('username'),
                        'password' => md5(Input::post('password')),
                        'createtime' => date("Y-m-d H:i:s"),
                        'status' => 0,
                        'lastloggedtime' => 0,
                        'errorloggedtime' => 0,
                    ));

                    if ($login and $login->save())
                    {
                        Session::set_flash('success', '新增登录帐号成功 #'.$login->id.'.');

                        Response::redirect('login');
                    }

                    else
                    {
                        Session::set_flash('error', '新增失败.');
                    }
                }
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

        foreach($users as $v)
        {
            $data['users'][$v->id] = $v->name;
        }

		$this->template->title = "Logins";
		$this->template->content = View::forge('login/create', $data);

	}

    public function action_lock($id = null)
    {
        is_null($id) and Response::redirect('login');

        if ( ! $login = Model_Login::find($id))
        {
            Session::set_flash('error', 'Could not find login #'.$id);
            Response::redirect('login');
        }
        if ( $login->status == 10)
        {
            Session::set_flash('error', '该用户已经锁定，不需要再次锁定 #' . $id);
            Response::redirect('login');
        }
        $login->status = 10;
        if ($login->save())
        {
            Session::set_flash('success', '锁定成功 #' . $id);

            Response::redirect('login');
        }

        else
        {
            Session::set_flash('error', '锁定失败 #' . $id);
        }
    }

    public function action_unlock($id = null)
    {
        is_null($id) and Response::redirect('login');

        if ( ! $login = Model_Login::find($id))
        {
            Session::set_flash('error', 'Could not find login #'.$id);
            Response::redirect('login');
        }
        if ( $login->status == 0)
        {
            Session::set_flash('error', '该用户已经解锁，不需要再次解锁 #' . $id);
            Response::redirect('login');
        }
        $login->status = 0;
        if ($login->save())
        {
            Session::set_flash('success', '解锁成功 #' . $id);

            Response::redirect('login');
        }

        else
        {
            Session::set_flash('error', '解锁失败 #' . $id);
        }

    }


}
