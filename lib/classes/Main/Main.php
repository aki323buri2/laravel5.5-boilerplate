<?php

namespace Main;

use Illuminate\Database\Eloquent\Model;

use View;
use Route;

class Main extends Model
{
    public static function boot()
    {
    	View::addLocation(base_path('/lib/views'));
    	Route::prefix('main')
    		-> group(function ($router)
    		{
    			$router->view('/show', 'main');
    		});
    }
}
