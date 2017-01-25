<?php

class AuthenticationController extends \BaseController {

	private $fb;

	// Every run
	public function __construct(FacebookHelper $fb) {
		$this->fb = $fb;
	}
	
	public function showLogin()
	{
		return View::make('login');
	}

	public function doLogin()
	{
		$user = array(
            'email' => Input::get('e-mail'),
            'password' => Input::get('password')
        );
        
        if (Auth::attempt($user)) {
            return Redirect::route('home');
        }
        
        // authentication failure! lets go back to the login page
        return Redirect::route('login')
        	->with('flash_error', 'Your username/password combination was incorrect.')
        	->with('flash_color', '#c0392b')
        	->with('inputLogin', Input::all());
	}

	// login/fb
	public function login() {
		return Redirect::to($this->fb->getUrlLogin());
	}


	// login/fb/callback
	public function callback() {
		if( !$this->fb->generateSessionFromRedirect() ) {
			return Redirect::route('home')
				->with('flash_error', 'Failed to connect on Facebook.')
        		->with('flash_color', '#c0392b');
		}

		$user_fb = $this->fb->getGraph();
		
		if(empty($user_fb)) {
			return Redirect::route('home')
				->with('flash_error', 'Failed to get data on Facebook.')
        		->with('flash_color', '#c0392b');
		}


		$user = User::whereFbid($user_fb->getProperty('id'))->first();

		if(empty($user)) {
			$user 					= new User;
			$user->role 			= 'user';
			$user->fbid 			= $user_fb->getProperty('id');
			$user->email 			= $user_fb->getProperty('email');
			$user->name 			= $user_fb->getProperty('name');
			$user->photo 			= 'http://graph.facebook.com/' . $user_fb->getProperty('id') . '/picture?type=large';
			$user->isBanned 		= 0;
			$user->save();
		}

		$user->access_token_fb = $this->fb->getToken();
		$user->save();

		Auth::login($user);

		$id = Auth::id();
		Session::put('user_id', $id);

		return Redirect::route('home')
				->with('flash_error', 'Successfully logged in using Facebook.')
				->with('flash_color', '#27ae60');
	}

	public function logout()
	{
		Auth::logout();
		Session::flush();
		//Session::put('cart_item', 'seller_id');
		//Session::getId();
		return Redirect::route('home');

	}
}
