<?php //Testlink for terminal: curl --user peb7268:testpass http://api.ice.com/index.php/authtest

Route::any('/', function()
{
	$message = array('message' => 'Default Route');
	return View::make('hello', $message);
});

Route::any('/login', function(){
	return View::make('login');
});

Route::group(array('prefix' => 'api/v1', 'before' => 'apiauth'), function(){
	Route::resource('url', 'UrlController');
});