<?php

use Illuminate\Foundation\Inspiring;
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');


Artisan::command('video:hls', function(){
	$videos = App\Video::where([
		'deleted' => 0,
		'converted' => 0
	])->get();

	foreach ($videos as $video) {
		// covnert
		
		// update and save
	}

});