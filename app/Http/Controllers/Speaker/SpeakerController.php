<?php

namespace App\Http\Controllers\Speaker;

use DB;
use View;
use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
	        $image = $request->input('hidden-speaker-img-name');
          $file = $request->input('hidden-speaker-img');
	        if($file != null){
	            $image_name = time()."-".$image;
	            $speaker->speaker_photo = $image_name;
	            $speaker->local_path = env('your-url') . $image_name;
              header('Content-Type: image/png');
              $data = $file;
              // define('UPLOAD_DIR', 'uploads/speakers/');
              $img = $data;
              $img = str_replace('data:image/png;base64,', '', $img);
              $img = str_replace(' ', '+', $img);
              $data = base64_decode($img);
              // $file = UPLOAD_DIR . $image_name;
              // $success = file_put_contents($file, $data);
              $filePath = 'speakers/' . $image_name;
              $s3 = Storage::disk('s3');
              $s3->put($filePath, $data, 'public');
              // print $success ? $file : 'Unable to save the file.';
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
	        $image = $request->input('hidden-speaker-img-name');
          $file = $request->input('hidden-speaker-img');
          $deleteName = $request->input('hidden-img-name');
          if($file != null){
              $image_name = time()."-".$image;
              $speaker->speaker_photo = $image_name;
              $speaker->local_path = env('your-url') . $image_name;
              header('Content-Type: image/png');
              $data = $file;
              define('UPLOAD_DIR', 'uploads/speakers/');
              $img = $data;
              $img = str_replace('data:image/png;base64,', '', $img);
              $img = str_replace(' ', '+', $img);
              $data = base64_decode($img);
              // $file = UPLOAD_DIR . $image_name;
              // $success = file_put_contents($file, $data);
              $filePath = 'speakers/' . $image_name;
              $s3 = Storage::disk('s3');
              $s3->delete('speakers/' . $deleteName);
              $s3->put($filePath, $data, 'public');
              // print $success ? $file : 'Unable to save the file.';
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

    public function AllSpeakers(){
      $speakers = DB::table('speakers')->count('id');
      echo $speakers;
    }
    public function newSpeaker(){
      $now = Carbon::now();
      //$pre_month = ($now->month)-1;
      $pre = Carbon::now();
      $pre->setDate($now->year,$now->month,1)->setTime(0, 0, 0)->toDateTimeString();
      $newSpeaker=Speaker::select('id')->whereBetween('created_at', [$pre, $now])->count();
      echo $newSpeaker;
   }
  }
}

