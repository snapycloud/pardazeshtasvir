<?php

use Illuminate\Foundation\Inspiring;
Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');


Artisan::command('video:hls', function(){
	$videos = App\Video::where([
		'deleted' => 0,
        'playlist' => null,
        'proccess' => 'None'
	])->get();

	foreach ($videos as $video) {
		// covnert
        $video->proccess = 'Start';
        $video->save();
        $tmp_upload = '/usr/share/nginx/stream/tmp/' . $video->attachment->name;

        if(file_exists($tmp_upload)){
            $logo = "/usr/share/nginx/stream/logo.png";
            $destination = "/usr/share/nginx/stream/repository/" . $video->id . "/";
            exec("createvod '{$tmp_upload}' '{$logo}' '{$destination}'");
        }

        $video->vod = "/{$video->id}/backup.mp4";
        $video->playlist = "/{$video->id}/playlist.m3u8";
        $video->proccess = 'End';
        $video->save();
		// update and save
	}

});
