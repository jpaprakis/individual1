<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|       Route::get('hello', function()
|       {
|           return 'Hello World!';
|       });
|
| You can even respond to more than one URI:
|
|       Route::post(array('hello', 'world'), function()
|       {
|           return 'Hello World!';
|       });
|
| It's easy to allow URI wildcards using {num} or {any}:
|
|       Route::put('hello/{any}', function($name)
|       {
|           return "Welcome, $name.";
|       });
|
*/

Route::pattern('any', '[0-9a-zA-Z%=]+');
Route::pattern('folder', '[a-zA-Z]+');
Route::pattern('num', '[0-9]+');
Route::pattern('id', '[0-9]+');


//this is bad form, sending a view directly. Use the other way below using the controller function!
Route::get('test', function()
{
    return View::make('hello');
});


//saying to get the main function that's located in the homecontroller
Route::get('/', 'HomeController@getMain');

Route::get('/logout', array(
    'before' => 'auth',
    'uses' => 'HomeController@onLogout'));

//once the post goes through, this route is called
Route::post('/', 'HomeController@onSubmit');

//The create_user page will call the main function in its controller
Route::get('/create_user', 'NewUserController@getMain');

//once the post goes through, this route is called
Route::post('/create_user', 'NewUserController@onSubmit');

Route::get('/resend', 'NewUserController@reverify');

//for account activation
Route::get('/create_user/activate/{code}', array(
    'as' => 'account-activate',
    'uses' => 'NewUserController@getActivate'));

Route::get('/sparkhub', array(
    'before' => 'auth|verified', 
    'uses' => 'SparkController@getMain'));

Route::get('/createspark', array(
    'before' => 'auth|verified',
    'uses' => 'SparkController@onCreate'));







Route::post('/edit_profile', array(
    'before' => 'auth|verified',
    'uses' => 'ProfileController@onEditSubmit'));   

Route::get('/view_profile', array(
    'before' => 'auth|verified',
    'uses' => 'ProfileController@getMain'));

Route::get('/my_listings', array(
    'before' => 'auth|verified',
    'uses' => 'SpaceController@getMain'));

Route::get('/view_listings/{ID}', array(
    'before' => 'auth|verified',
    'uses' => 'SpaceController@onView'));

Route::get('/create_listing', array(
    'before' => 'auth|verified',
    'uses' => 'SpaceController@onCreate'));

Route::post('/create_listing', 'SpaceController@onCreate_Submit');

Route::get('/edit_listing/{space_ID}', array(
    'before' => 'auth|verified',
    'uses' => 'SpaceController@onEdit',
    'as' => 'ListingEditor'));

Route::post('/edit_listing/{space_ID}', array(
    'before' => 'auth|verified',
    'uses' => 'SpaceController@onEditSubmit'));

Route::get('/delete_listing/{space_ID}', array(
    'before' => 'auth|verified',
    'uses' => 'SpaceController@onDelete'));

Route::get('/contact_us', array(
 'uses' => 'ContactController@getMain'));

Route::post('/contact_us', 'ContactController@onContact_Submit');

Route::get('/about', array(
 'uses' => 'AboutController@getMain'));

Route::get('/find_spaces', array(
 'uses' => 'SearchController@findSpaces'));

Route::post('/find_spaces', 'SearchController@onFindSpaces_Submit');

Route::get('/find_coworkers', array(
 'uses' => 'SearchController@findCoworkers'));

Route::post('/find_coworkers', 'SearchController@onFindCoworkers_Submit');



/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application. The exception object
| that is captured during execution is then passed to the 500 listener.
|
*/

Event::listen('404', function()
{
    return Response::error('404');
});

Event::listen('500', function($exception)
{
    return Response::error('500');
});

if (Config::get('database.log', false))
{           
    Event::listen('illuminate.query', function($query, $bindings, $time, $name)
    {
        $data = compact('bindings', 'time', 'name');

        // Format binding data for sql insertion
        foreach ($bindings as $i => $binding)
        {   
            if ($binding instanceof \DateTime)
            {   
                $bindings[$i] = $binding->format('\'Y-m-d H:i:s\'');
            }
            else if (is_string($binding))
            {   
                $bindings[$i] = "'$binding'";
            }   
        }       

        // Insert bindings into query
        try{
            $query = str_replace(array('%', '?'), array('%%', '%s'), $query);
            $query = vsprintf($query, $bindings); 


            Log::info($query, $data);
        }
        catch(Exception $e){
            
        }
    });
}

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|       Route::filter('filter', function()
|       {
|           return 'Filtered!';
|       });
|
| Next, attach the filter to a route:
|
|       Route::get('/', array('before' => 'filter', function()
|       {
|           return 'Hello World!';
|       }));
|
*/