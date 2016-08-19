<?php

namespace App\Http\Controllers;



use View;
use Redirect;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Speaker\SpeakerController;
use App\Http\Controllers\Speaker\TalkController;
use App\Http\Controllers\Review\ReviewController;
use App\Model\Speaker;
use App\Model\Talk;
use App\Model\Review;
use App\Model\Util;
use App\Http\Controllers\Controller;
use App\Http\Requests\SpeakerFormRequest;
use App\Http\Requests\TalkFormRequest;
use App\Http\Requests\ReviewFormRequest;

class FormController extends Controller
{


    public function createSpeaker(SpeakerFormRequest $request)
    {
        
        $speakerController = new SpeakerController;
        $response = $speakerController->store($request);

        if($response['status']){
            Session::flash('message', $response['message']);
            Session::flash('alert-class', 'alert-success'); 
        }else{
            Session::flash('message', $response['message']);
            Session::flash('alert-class', 'alert-danger'); 
        }

        return  Redirect::to('/speaker');
    }

    public function updateSpeaker(SpeakerFormRequest $request, $id)
    {
        
        $speakerController = new SpeakerController;
        $response = $speakerController->update($request, $id);

        if($response['status']){
            Session::flash('message', $response['message']);
            Session::flash('alert-class', 'alert-success'); 
        }else{
            Session::flash('message', $response['message']);
            Session::flash('alert-class', 'alert-danger'); 
        }

        return  Redirect::to('/speaker');
    }

    public function deleteSpeaker($id)
    {
        
        $speakerController = new SpeakerController;
        $response = $speakerController->delete($id);

        if($response['status']){
            Session::flash('message', $response['message']);
            Session::flash('alert-class', 'alert-success'); 
        }else{
            Session::flash('message', $response['message']);
            Session::flash('alert-class', 'alert-danger'); 
        }

        return  Redirect::to('/speaker');
    }

    public function createTalk(TalkFormRequest $request)
    {
        $talkController = new TalkController;
        $response = $talkController->store($request);

        if($response['status']){
            Session::flash('message', $response['message']);
            Session::flash('alert-class', 'alert-success'); 
        }else{
            Session::flash('message', $response['message']);
            Session::flash('alert-class', 'alert-danger'); 
        }

        return  Redirect::to('/talk');
    }

    public function createReview(ReviewFormRequest $request)
    {
        $reviewController = new ReviewController;
        $response = $reviewController->store($request);

        if($response['status']){
            Session::flash('message', $response['message']);
            Session::flash('alert-class', 'alert-success'); 
        }else{
            Session::flash('message', $response['message']);
            Session::flash('alert-class', 'alert-danger'); 
        }

        return  Redirect::to('/review');
    }

    public function updateReview(ReviewFormRequest $request, $id)
    {
        $reviewController = new ReviewController;
        $response = $reviewController->update($request, $id);

        if($response['status']){
            Session::flash('message', $response['message']);
            Session::flash('alert-class', 'alert-success'); 
        }else{
            Session::flash('message', $response['message']);
            Session::flash('alert-class', 'alert-danger'); 
        }

        return  Redirect::to('/review');
    }

    public function deleteReview($id)
    {
        
        $reviewController = new ReviewController;
        $response = $reviewController->delete($id);

        if($response['status']){
            Session::flash('message', $response['message']);
            Session::flash('alert-class', 'alert-success'); 
        }else{
            Session::flash('message', $response['message']);
            Session::flash('alert-class', 'alert-danger'); 
        }

        return  Redirect::to('/review');
    }


}
