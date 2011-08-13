<?php

return array(

	'GET /auth' => array('name' => 'auth', 'before' => 'already_logged', 'do' => function()
	{
		return Redirect::to_login();
	}),

	'GET /auth/login' => array('name' => 'login', 'before' => 'already_logged', 'do' => function()
	{
		$username = Input::old('username', '');

		$error = Session::get('error', false);
		if ($error) {
			Session::forget('error');
		}

		$view = View::make('layout');

		$view->head_title = 'Log in';
		$view->content = View::make('partials/login')
												->bind('username', $username)
												->bind('error', $error);

		return $view;
	}),

	'POST /auth/login' => array('before' => 'csrf, already_logged', 'do' => function()
	{
		$username = Input::get('username');
		$password = Input::get('password');

		if (Auth::login($username, $password)) {
			return Redirect::to_home();
		}
		else {
			return Redirect::to_login()->with('error', true);
		}
	}),

	'GET /auth/register' => array('name' => 'register', 'before' => 'already_logged', 'do' => function()
	{
		$username = Input::old('username', '');
		$email = Input::old('email', '');

		$view = View::make('layout');

		$view->head_title = 'Register';
		$view->content = View::make('partials/register')
												->bind('username', $username)
												->bind('email', $email);

		$errors = array('error_username', 'error_email', 'error_password');

		foreach ($errors as $error) {
			$error_message = Session::get($error, NULL);
			if ($error_message) {
				Session::forget($error);
			}
			$view->content->bind($error, $error_message);
		}

		return $view;
	}),

	'POST /auth/register' => array('before' => 'csrf, already_logged', 'do' => function()
	{
		$username = (string)Input::get('username');
		$email = Input::get('email');
		$password = (string)Input::get('password');
		$password_confirmation = Input::get('password_confirmation');

		$rules = array(
			'username'  => 'required|between:3,40|unique:users,username',
			'email' => 'required|email',
			'password' => 'required|between:5,40|confirmed',
		);

		$validator = Validator::make(array('username' => $username,
										'email' => $email,
										'password' => $password,
										'password_confirmation' => $password_confirmation),
										$rules);

		if ($validator->invalid()) {
			$redirect = Redirect::to_register();
			foreach ($validator->errors->messages as $error => $message) {
				$redirect->with('error_'.$error, $message[0]);
			}
			return $redirect;
		}

		$user = new User;
		$user->username = $username;
		$user->email = $email;
		$user->password = Hash::make($password);
		$user->save();

		Auth::login($username, $password);

		return Redirect::to_auth();
	}),

	'GET /auth/logout' => array('name' => 'logout', 'do' => function()
	{
		Auth::logout();

		return Redirect::to_auth();
	}),

);
