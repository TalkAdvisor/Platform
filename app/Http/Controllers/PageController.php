<?php

namespace App\Http\Controllers;


use View;
use Redirect;
use Session;

use Illuminate\Http\Request;
use App\Model\Talker;
use App\Model\Util;
use App\Model\Event;
use App\Model\Review;
use App\Model\ReviewOption;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionnaireFormRequest;
use App\Http\Requests\TalkerFormRequest;

class PageController extends Controller
{


    public function getFormPage($type, Request $request)
    {
        switch($type){
            case 'speaker':
                return View::make('admin.form.speaker')->with("speakers",Talker::all());
            case 'event':
                $speakerId = $request->input('speakerId');
                $eventData = array(
                    "speaker" => Talker::find($speakerId),
                    "event" => Event::where("talker_id",'=', $speakerId)->get()
                );
                return View::make('admin.form.event')->with("eventData",$eventData);
            case 'review':
                $speakerId = $request->input('speakerId');
                $eventId = $request->input('eventId');
                $reviewData = array(
                    "speaker" => Talker::find($speakerId),
                    "event" => Event::where("talker_id",'=', $speakerId)->get(),
                    "score" => Util::getScores()
                );
                return View::make('admin.form.review',array('speakerId' => $speakerId, 'eventId' => $eventId))->with("reviewData",$reviewData);
            default:
                return Redirect::to('/');
        }
    }

    public function getAdminPage($type)
    {
        switch($type){
            case 'speaker':
                return View::make('admin.speaker.index')->with("speakers",Talker::all());
            case 'talk':
                return View::make('admin.event.index')->with("events",Event::all())->with("speakers",Talker::all());
            case 'review':
                return View::make('admin.review.index')->with("reviews",Review::all())->with("events",Event::all())->with("scores",Util::getScores());
            case 'dashboard':
                return View::make('admin.dashboard');
            default:
                return Redirect::to('/');
        }
    }

    public function getSpeakerPage(){
        return View::make('talkers.speakers')->with('speakers',Talker::all());
        //return View::make('talkers.speakers')->with('speakers',Talker::all()->whereIn('id', [110,114,139,140,141]));
    }

    public function getSpeakerDetailPage($id){
        $talker = Talker::find($id);
        $events = $talker->events;
        $eventId = array();
        foreach($events as $event){
            $eventId[] = $event->id;
        }
        $reviews = Review::whereIn('event_id',$eventId)->whereNotNull('comment')->get();
        //$review_options = ReviewOption::all();
        if(count($reviews) == 0){
            $review_options = array();
        }else{
            $review_options =  $reviews->first()->review_options()->get();
        }
        return View::make('talkers.speaker')->with('speaker',$talker)->with('events',$events)->with('reviews',$reviews)->with('review_options',$review_options);
    }

    public function getReviewPage($id){
        $talker = Talker::find($id);
        $events = $talker->events;
        return View::make('talkers.createReview')->with('speaker',$talker)->with('events',$events)->with('score', Util::getScores());;
    }

}
