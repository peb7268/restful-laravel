<?php
//Global before and after filters for all routes
App::before(function($request){});
App::after(function($request, $response){});

//Api filter
Route::filter('apiauth', function()
{
	$creds = array(
		'username' => Request::getUser(),
		'password' => Request::getPassword()
	);

	if( ! Auth::attempt($creds) )
	{
		return Response::json([
			'error' 	=> 'true',
			'message' 	=> 'Unauthorized Request',
			], 401
		);
	} else {
		$user = Auth::user();
		//echo $user->id;
		//echo $user->username;
	}
});



#-- Standard Auth Stuff: laravel.com/docs/auth/usage ------------------------------------------------------------
Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::guest('login');
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});