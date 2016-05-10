<?php

namespace App\Http\Controllers;


use View;
use Redirect;
use Session;

use Illuminate\Http\Request;
use App\Model\Talker;
use App\Model\Event;
use App\Model\Review;
use App\Model\Util;
use App\Http\Controllers\Controller;
use App\Http\Requests\TalkerFormRequest;
use App\Http\Requests\EventFormRequest;
use App\Http\Requests\ReviewFormRequest;

class FormController extends Controller
{


    public function createTalker(TalkerFormRequest $request)
    {
        $talker = new Talker;
        $talker->talker_name = $request->input('talker-name');
        $talker->talker_englishname = $request->input('talker-en-name');
        $talker->talker_company = $request->input('talker-company');
        $talker->talker_title = $request->input('talker-title');
        $talker->talker_language = $request->input('talker-lang');
        $talker->talker_description = $request->input('talker-description');
        $talker->talker_email = $request->input('talker_email');
        $file = $request->file('image');
        if($file != null){
            $image_name = time()."-".$file->getClientOriginalName();
            $file->move('uploads/speakers/', $image_name);
            $talker->talker_photo = 'uploads/speakers/'.$image_name;
            $talker->local_path = $image_name;
        }
        $formType = $request->input('form-type');
        $talker->save();
        $talkerId = $talker->id;
        switch($formType) {
            case 'single':
                return  Redirect::to('/admin/speaker');
            case 'flow':
                return  Redirect::to('/admin/form/event?speakerId='.$talkerId);
        }
    }
    public function createEvent(EventFormRequest $request)
    {
        $event = new Event;
        $event->topic =  $request->input('topic');
        $event->event =  $request->input('event');
        $event->event_series =  $request->input('series');
        $event->start_date =  $request->input('date');
        $event->talk_city =  $request->input('city');
        $event->extend_city =  $request->input('city-field');
        $event->talk_location =  $request->input('location');
        $event->extend_location =  $request->input('location-field');
        $event->organizer =  implode('|',$request->input('organizer'));
        $event->extend_organizer =  $request->input('organizer-field');
        $event->talker_quote =  $request->input('quote');
        $event->talker_id =  $request->input('talker_id');
        $event->save();

        $formType = $request->input('form-type');
        $eventId = $event->id;

        switch($formType) {
            case 'single':
                return  Redirect::to('/admin/talk');
            case 'flow':
                return  Redirect::to('/admin/form/review?speakerId='.$eventId);
        }
    }

    public function createReview(ReviewFormRequest $request)
    {
        $review = new Review;
        $review->user_name =  $request->input('interviewee-name');
        $review->user_email =  $request->input('interviewee-email');
        $review->comment =  ($request->input('comment')!= "")? $request->input('comment') : null;
        $review->event_id =  $request->input('event_id');
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
        for($i=1;$i<count($score_array);$i++) {
            $review->review_options()->attach($i,['score_id'=>$score_array[$i]]);
        }
        $review->save();
        $formType = $request->input('form-type');
        $eventId = $review->id;
        $talkerId = $request->input('talker_id');

        switch($formType) {
            case 'single':
                return  Redirect::to('/admin/review');
            case 'flow':
                return  Redirect::to('/admin/form/review?speakerId='.$eventId);
            case 'frontend':
                return  Redirect::to('/speaker/'.$talkerId);
        }
    }

}
