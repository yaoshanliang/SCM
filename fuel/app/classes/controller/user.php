<?php
class Controller_User extends Controller_Common
{
    private $userid;
    public function __construct()
    {
        if(Auth::instance()->get_screen_name() != 'guest')
        {
            $userinfo = Model_Login::find_by_username(Auth::instance()->get_screen_name());
            $this->userid = $userinfo->userid;
        }
    }
    public function action_login()
    {
        $view = View::forge('user/login');
        $form = Form::forge('login');
        $auth = Auth::instance();
        $form->add('username', 'Username:');
        $form->add('password', 'Password:', array('type' => 'password'));
        $form->add('submit', ' ', array('type' => 'submit', 'value' => 'Login'));
        if (Input::post())
        {

        	$userinfo = Model_Login::find_by_username(Input::post('username'));
        	if(!is_null($userinfo) && $userinfo->status == 10)
        	{
        		Session::set_flash('error', '该账户已锁定，无法登录！');
        	}
            else if ($auth->login(Input::post('username'), Input::post('password')))
            {
                if(Auth::instance()->get_screen_name() != 'guest')
                {
                    $userinfo = Model_Login::find_by_username(Auth::instance()->get_screen_name());
                    $this->userid = $userinfo->userid;
                }
                Model_Operate_Record::add($this->userid, 10, '');
                Session::set_flash('success', '登录成功! 欢迎您 '.$auth->get_screen_name());
                Response::redirect('user/index');
            }
            else
            {
                Session::set_flash('error', '用户名或密码错误.');
                $userinfo = Model_Login::find_by_username(Input::post('username'));
                if(!is_null($userinfo))
                {
                    $userinfo->errorloggedtime += 1;
                    $userinfo->save();
                }
            }
        }
        $view->set('form', $form, false);
        $this->template->title = '账户登录';
        $this->template->content = $view;

    }

    public function action_logout()
    {
        Model_Operate_Record::add($this->userid, 11, '');
        $auth = Auth::instance();
        $auth->logout();

        Session::set_flash('success', '退出成功.');
        Response::redirect('user/login');
    }

	public function action_index()
	{
		$data['users'] = Model_User::find('all');
        $logins = Model_Login::find('all');
        foreach($logins as $v)
        {
            $data['logins'][$v->userid] = $v->username;
        }
		$this->template->title = "Users";
		$this->template->content = View::forge('user/index', $data);

	}


	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_User::validate('create');

			if ($val->run())
			{
				$user = Model_User::forge(array(
					'name' => Input::post('name'),
					'sex' => Input::post('sex'),
					'birthday' => Input::post('birthday'),
					'education' => Input::post('education'),
					'hobbies' => Input::post('hobbies'),
				));

				if ($user and $user->save())
				{
                    Model_Operate_Record::add($this->userid, 20, $user->id);
					Session::set_flash('success', 'Added user #'.$user->id.'.');

					Response::redirect('user');
				}

				else
				{
					Session::set_flash('error', 'Could not save user.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('user/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('user');

		if ( ! $user = Model_User::find($id))
		{
			Session::set_flash('error', 'Could not find user #'.$id);
			Response::redirect('user');
		}

		$val = Model_User::validate('edit');

		if ($val->run())
		{
			$user->name = Input::post('name');
			$user->sex = Input::post('sex');
			$user->birthday = Input::post('birthday');
			$user->education = Input::post('education');
			$user->hobbies = Input::post('hobbies');

			if ($user->save())
			{
                Model_Operate_Record::add($this->userid, 21, $user->id);
				Session::set_flash('success', 'Updated user #' . $id);

				Response::redirect('user');
			}

			else
			{
				Session::set_flash('error', 'Could not update user #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$user->name = $val->validated('name');
				$user->sex = $val->validated('sex');
				$user->birthday = $val->validated('birthday');
				$user->education = $val->validated('education');
				$user->hobbies = $val->validated('hobbies');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('user', $user, false);
		}

		$this->template->title = "Users";
		$this->template->content = View::forge('user/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('user');

		if ($user = Model_User::find($id))
		{
			$user->delete();
            Model_Operate_Record::add($this->userid, 22, '');
			Session::set_flash('success', 'Deleted user #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete user #'.$id);
		}

		Response::redirect('user');

	}

    public function action_work()
    {
        $this->template->title = "Cooperation";
        $this->template->content = View::forge('user/work');
    }

    public function action_suggest()
    {
        $this->template->title = "Suggestion";
        $this->template->content = View::forge('user/suggest');
    }

}
