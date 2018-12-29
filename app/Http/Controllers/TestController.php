<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TestParser;


class TestController extends Controller
{

    public function execute(Request $request){

    	global $url;

    	if($request->isMethod('post')){

    		//message on validation
    		$messages = [
    			'required' => 'Поле обязательно к заполнению',
    			'url' => 'Введен не корректный url'
    		];

    		//validate url
    		$this->validate($request, [
    			'url_site' => 'required|url'
    		], $messages);

    		$url = $request['url_site'];

    		//call method parserSite() in class TestParser
    		$parser = new TestParser();
    		$parser->parserSite($url);

			return redirect()->route('testpage')->with('status', 'Введенный url получен.');
    		
    	}

    	return view('layouts.testpage');
    }

}
