<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestParser;

class FilesController extends Controller
{
    public function getFiles(){

    	//call method getFiles() in class TestParser
    	$parser = new TestParser();
    	$files = $parser->getFiles();

    	return view('layouts.testpage', array('files'=> json_encode($files)));

    }
}
