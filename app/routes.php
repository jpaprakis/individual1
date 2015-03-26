<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------

*/

Route::pattern('any', '[0-9a-zA-Z%=]+');
Route::pattern('folder', '[a-zA-Z]+');
Route::pattern('num', '[0-9]+');
Route::pattern('id', '[0-9]+');


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
    'as' => 'sparkhub-search',
    'before' => 'auth|verified', 
    'uses' => 'SparkController@getMain'));

Route::get('/createspark', array(
    'before' => 'auth|verified',
    'uses' => 'SparkController@onCreate'));

Route::post('/createspark', 'SparkController@onCreate_Submit');

Route::get('/mysparks', array(
    'before' => 'auth|verified',
    'uses' => 'SparkController@mySparks'));

Route::get('/edit_idea/{sparkID}', array(
    'before' => 'auth|verified',
    'uses' => 'SparkController@onEdit',
    'as' => 'IdeaEditor'));

Route::post('/edit_idea/{sparkID}', array(
    'before' => 'auth|verified',
    'uses' => 'SparkController@onEditSubmit'));

Route::get('/delete_idea/{sparkID}', array(
    'before' => 'auth|verified',
    'uses' => 'SparkController@onDelete'));

Route::get('/view_idea/{sparkID}', array(
    'before' => 'auth|verified',
    'uses' => 'SparkController@onView'));

Route::post('/ratings/{sparkID}/{upOrDown}', array(
    'before' => 'auth|verified',
    'uses' => 'RatingController@onRate'));

Route::post('/sparkhub', array(
    'before' => 'auth|verified',
    'uses' => 'SparkController@onFilter'));

Route::get('/clear_filters', array(
    'before' => 'auth|verified',
    'uses' => 'SparkController@clearFilter'));

Route::get('/top', array(
    'before' => 'auth|verified',
    'uses' => 'TopController@getMain',
    'as' => 'searchTop'));

Route::post('/top', array(
    'before' => 'auth|verified',
    'uses' => 'TopController@showTop'));

Route::get('/topSparks', array(
    'before' => 'auth|verified',
    'uses' => 'TopController@getTop',
    'as' => 'getTop'));

Route::get('/graph', array(
    'before' => 'auth|verified',
    'uses' => 'GraphController@getMain'));

Route::get('/about', array(
    'uses' => 'MiscController@getAbout'));

Route::get('/contact_us', array(
    'uses' => 'MiscController@getContact'));

Route::post('/contact_us', array(
    'uses' => 'MiscController@onContact_Submit'));


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