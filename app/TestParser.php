<?php

namespace App;

use Storage;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;
use File;
use phpQuery;
use ZanySoft\Zip\ZipManager;
use Zip;

class TestParser extends Model
{

	//minimal parser and create file to download
    public function parserSite($link){

    		//get main url
    		$domainName = parse_url($link);
    		$domainName = $domainName['host'];

    		// create dir resurs
    		$domainDir = Storage::makeDirectory($domainName);
    		$domainDir_images = Storage::makeDirectory($domainName.'/'.'img');
    		$domainDir_css = Storage::makeDirectory($domainName.'/'.'css');
    		$domainDir_js = Storage::makeDirectory($domainName.'/'.'js');

    		//parser main page
    		$contentMainPage = file_get_contents($link);
    		$file = Storage::disk('public')->put($domainName.'/index.html', $contentMainPage);

    		//create DOM for parser
    		$domainDom = phpQuery::newDocument($contentMainPage);

    		//create file .zip and add catalog site to download
    		if(file_exists(storage_path('app/public/').$domainName.'.zip')){
    			unlink(storage_path('app/public/').$domainName.'.zip');
	    		$zip = Zip::create(storage_path('app/public/').$domainName.'.zip');
	    		$zip->add(storage_path('app/public/').$domainName);
	    		$zip->close();
    		}else{
    			$zip = Zip::create(storage_path('app/public/').$domainName.'.zip');
	    		$zip->add(storage_path('app/public/').$domainName);
	    		$zip->close();
    		}               
                        
    }

    //get files to create a list
    public function getFiles(){

    	//get files
    	$files = Storage::disk('public')->files();
    	$linkSite = File::files('storage');

    	//create array for data
    	$nameSite = [];
    	$sizeSite = [];
    	$infoSite = [];

    	//get name file
    	foreach ($files as $f => $file) {
    		if(strpos($file, '.zip') !== false){
    			$nameSite[$f] = $file;
    		}
    	}

    	//get size file
    	foreach ($nameSite as $f => $file) {
    		$sizeSite[$f] = number_format((int)(filesize(storage_path('app/public/').$file))/(1024), 2, '.', '').' Кб';
    	}

    	//get link file
    	foreach ($linkSite as $key => $l) {
    		$linkSite[$key] = asset($l);
    	}

    	//generated data array
    	for($i=1; $i<count($nameSite)+1; $i++){
    		$infoSite[$i] = array('name'=>'','size'=>'', 'link'=>'');
    		$infoSite[$i]['name'] = $nameSite[$i];
    		$infoSite[$i]['size'] = $sizeSite[$i];
    		$infoSite[$i]['link'] = $linkSite[$i-1];
    	}
    	
    	return $infoSite;

    }
}
