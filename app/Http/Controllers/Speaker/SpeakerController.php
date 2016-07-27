<?php

namespace App\Http\Controllers\Speaker;


use View;
use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Model\Speaker;
use App\Http\Controllers\Controller;
use App\Http\Requests\SpeakerFormRequest;

class SpeakerController extends Controller
{
    public function index()
    {
        $speaker = Speaker::all();
        return $speaker;
    }

    public function getSpeaker($id)
    {
        $speaker = Speaker::find($id);
        return $speaker;
    }

    public function store($request)
    {
        try{
	        $speaker = new Speaker;
	        $speaker->speaker_name = $request->input('speaker-name');
	        $speaker->speaker_englishname = $request->input('speaker-en-name');
	        $speaker->speaker_company = $request->input('speaker-company');
	        $speaker->speaker_title = $request->input('speaker-title');
	        $speaker->speaker_description = $request->input('speaker-description');
          $speaker->source = $request->input('speaker-source');
	        $speaker->speaker_email = $request->input('speaker-email');
	        $file = $request->file('image');
	        if($file != null){
	            $image_name = time()."-".$file->getClientOriginalName();
	            $file->move('uploads/speakers/', $image_name);
	            $speaker->speaker_photo = $image_name;
	            $speaker->local_path = 'uploads/speakers/'.$image_name;
	        }
	        $speaker->save();
	        return array(
           		'status' => true,
           		'speaker' => $speaker,
           		'message' => 'Create Speaker '.$speaker->speaker_name.' Successful'
           	);
        }
        catch(\Exception $e){
           // do task when error
           return array(
           		'status' => false,
           		'message' => $e->getMessage()
           	);   // insert query
        }
    }

    public function update($request, $id)
    {
        try{
	        $speaker = Speaker::find($id);
	        $speaker->speaker_name = $request->input('speaker-name');
	        $speaker->speaker_englishname = $request->input('speaker-en-name');
	        $speaker->speaker_company = $request->input('speaker-company');
	        $speaker->speaker_title = $request->input('speaker-title');
	        $speaker->speaker_description = $request->input('speaker-description');
          $speaker->source = $request->input('speaker-source');
	        $speaker->speaker_email = $request->input('speaker-email');
	        $file = $request->file('image');
	        if($file != null){
	            $image_name = time()."-".$file->getClientOriginalName();
	            $file->move('uploads/speakers/', $image_name);
	            $speaker->speaker_photo = $image_name;
	            $speaker->local_path = 'uploads/speakers/'.$image_name;
	        }
	        $speaker->save();
	        return array(
           		'status' => true,
           		'speaker' => $speaker,
           		'message' => 'Update Speaker '.$speaker->speaker_name.' Successful'
           	);
        }
        catch(\Exception $e){
           // do task when error
           return array(
           		'status' => false,
           		'message' => $e->getMessage()
           	);   // insert query
        }
    }

    public function delete($id)
    {
        try{
        	$speaker = Speaker::find($id);
	        $speaker->delete();
	        
	        return array(
           		'status' => true,
           		'speaker' => $speaker,
           		'message' => 'Delete Speaker '.$speaker->speaker_name.' Successful'
           	);
        }
        catch(\Exception $e){
           // do task when error
           return array(
           		'status' => false,
           		'message' => $e->getMessage()
           	);   // insert query
        }
    }
   
  }
  public function newSpeaker(){
      $now = Carbon::now();
      $pre_month = ($now->month)-1;
      $pre->setDate($now->year,$pre_month, $now->day)->setTime($now->hour, $now->minute, $now->second)->toDateTimeString();

  }