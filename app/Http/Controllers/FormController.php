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

        return  Redirect::to('/admin/speaker1');
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
        $review = new Review;
        $review->user_id =  $request->input('interviewee-id');
        //$review->user_email =  $request->input('interviewee-email');
        $review->comment =  ($request->input('comment')!= "")? $request->input('comment') : null;
        $review->quote =  ($request->input('interviewee-quote')!= "")? $request->input('interviewee-quote') : null;
        $review->talk_id =  $request->input('talk_id');
        $review->speaker_id =  $request->input('speaker_id');
        $review->save();

        $review = Review::find($review->id);
        $score_array = array(
            1 => $request->input('total-score'),
            2 => $request->input('relevance-score'),
            3 => $request->input('clear-score'),
            4 => $request->input('inspiration-score'),
            5 => $request->input('interest-score'),
            //6 => $request->input('content-score')
        );
        for($i=1;$i<=count($score_array);$i++) {
            $review->review_options()->attach($i,['score'=>$score_array[$i]]);
        }
        $review->save();
        $formType = $request->input('form-type');
        $talkId = $review->id;
        $speakerId = $request->input('speaker_id');

        switch($formType) {
            case 'single':
                return  Redirect::to('/review');
            case 'flow':
                return  Redirect::to('/form/review?speakerId='.$talkId);
            case 'frontend':
                return  Redirect::to('/speaker/'.$speakerId);
        }
    }

    public function updateReview(ReviewFormRequest $request, $id)
    {
        $review = Review::find($id);
        $review->user_id =  $request->input('interviewee-id');
        //$review->user_email =  $request->input('interviewee-email');
        $review->comment =  ($request->input('comment')!= "")? $request->input('comment') : null;
        $review->quote =  ($request->input('interviewee-quote')!= "")? $request->input('interviewee-quote') : null;
        $review->talk_id =  $request->input('talk_id');
        $review->speaker_id =  $request->input('speaker_id');
        $review->save();

        $reviewController = new ReviewController;
        $response = $reviewController->deleteOption($id);

        $review = Review::find($review->id);
        $score_array = array(
            1 => $request->input('total-score'),
            2 => $request->input('relevance-score'),
            3 => $request->input('clear-score'),
            4 => $request->input('inspiration-score'),
            5 => $request->input('interest-score'),
            //6 => $request->input('content-score')
        );
        for($i=1;$i<=count($score_array);$i++) {
            $review->review_options()->attach($i,['score'=>$score_array[$i]]);
        }
        $review->save();
        $formType = $request->input('form-type');
        $talkId = $review->id;
        $speakerId = $request->input('speaker_id');

        switch($formType) {
            case 'single':
                return  Redirect::to('/review');
            case 'flow':
                return  Redirect::to('/form/review?speakerId='.$talkId);
            case 'frontend':
                return  Redirect::to('/speaker/'.$speakerId);
        }


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
