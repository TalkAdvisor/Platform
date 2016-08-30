<?php

namespace App\Http\Controllers\Review;

use DB;
use View;
use Session;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Model\Review;
use App\Model\ReviewOption;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewFormRequest;

class ReviewController extends Controller
{
    public function index()
    {
        $review = Review::all();
        return $review;
    }

    public function getReview($id)
    {
        $review = Review::find($id);
        return $review;
    }

    public function deleteOption($id)
    {
        $review = Review::find($id);
        $review->review_options()->detach();
    }

    public function store($request)
    {
        try{
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
          // $formType = $request->input('form-type');
          $talkId = $review->id;
          $speakerId = $request->input('speaker_id');

          // switch($formType) {
          //     case 'single':
          //         return  Redirect::to('/review');
          //     case 'flow':
          //         return  Redirect::to('/form/review?speakerId='.$talkId);
          //     case 'frontend':
          //         return  Redirect::to('/speaker/'.$speakerId);
          // }
          
          return array(
              'status' => true,
              'review' => $review,
              'message' => 'Create Review ID: '.$review->id.' Speaker: '.$review->speaker->speaker_name.' Successful'
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
          // $formType = $request->input('form-type');
          $talkId = $review->id;
          $speakerId = $request->input('speaker_id');
  
          // switch($formType) {
          //     case 'single':
          //         return  Redirect::to('/review');
          //     case 'flow':
          //         return  Redirect::to('/form/review?speakerId='.$talkId);
          //     case 'frontend':
          //         return  Redirect::to('/speaker/'.$speakerId);
          // }
          
          return array(
              'status' => true,
              'review' => $review,
              'message' => 'Update Review ID: '.$review->id.' Speaker: '.$review->speaker->speaker_name.' Successful'
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
          $review = Review::find($id);
          $review->review_options()->detach();
          $review->delete();
          
          return array(
              'status' => true,
              'review' => $review,
              'message' => 'Delete Review '.$review->id.' Successful'
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
    public static function AllReviews(){
      $reviews = DB::table('reviews')->count('id');
      return $reviews;
    }
    public static function AllComments(){
      $reviews = DB::table('reviews')->where('comment','!=',null)->where('comment','!=',' ')->count();
      return $reviews;
    }
    public static function AllQuotes(){
      $quotes = DB::table('reviews')->where('quote','!=',null)->where('quote','!=',' ')->count();
      return $quotes;
    }
    public static function newReview(){
        $now = Carbon::now();
        //$pre_month = ($now->month)-1;
        $pre = Carbon::now();
        $pre->setDate($now->year,$now->month,1)->setTime(0, 0, 0)->toDateTimeString();
        $newReview=Review::select('id')->whereBetween('created_at', [$pre, $now])->count();
        return $newReview;
    }
    public static function newComment(){
        $now = Carbon::now();
        //$pre_month = ($now->month)-1;
        $pre = Carbon::now();
        $pre->setDate($now->year,$now->month,1)->setTime(0, 0, 0)->toDateTimeString();
        $newComment=Review::select('comment')->where('comment', '!=', '')->whereBetween('created_at', [$pre, $now])->count();
        return $newComment;
    }
    public static function newQuote(){
        $now = Carbon::now();
        //$pre_month = ($now->month)-1;
        $pre = Carbon::now();
        $pre->setDate($now->year,$now->month,1)->setTime(0, 0, 0)->toDateTimeString();
        $newQuote=Review::select('quote')->where('quote', '!=', '')->whereBetween('created_at', [$pre, $now])->count();
        return $newQuote;
    }
    public static function lastReview(){
        $now = Carbon::now();
        $pre_month = ($now->month)-1;
        $pre_firstDay = Carbon::now();
        $pre_firstDay->setDate($now->year,$pre_month,1)->setTime(0, 0, 0)->toDateTimeString();
        $pre_lastDay = Carbon::now();
        $pre_lastDay->setDate($now->year,$pre_month,31)->setTime(23, 59, 59)->toDateTimeString();
        $newReview=Review::select('id')->whereBetween('created_at', [$pre_firstDay, $pre_lastDay])->count();
        return $newReview;
    }
    public static function lastComment(){
        $now = Carbon::now();
        $pre_month = ($now->month)-1;
        $pre_firstDay = Carbon::now();
        $pre_firstDay->setDate($now->year,$pre_month,1)->setTime(0, 0, 0)->toDateTimeString();
        $pre_lastDay = Carbon::now();
        $pre_lastDay->setDate($now->year,$pre_month,31)->setTime(23, 59, 59)->toDateTimeString();
        $newComment=Review::select('comment')->where('comment', '!=', '')->whereBetween('created_at', [$pre_firstDay, $pre_lastDay])->count();
        return $newComment;
    }
    public static function lastQuote(){
        $now = Carbon::now();
        $pre_month = ($now->month)-1;
        $pre_firstDay = Carbon::now();
        $pre_firstDay->setDate($now->year,$pre_month,1)->setTime(0, 0, 0)->toDateTimeString();
        $pre_lastDay = Carbon::now();
        $pre_lastDay->setDate($now->year,$pre_month,31)->setTime(23, 59, 59)->toDateTimeString();
        $newQuote=Review::select('quote')->where('quote', '!=', '')->whereBetween('created_at', [$pre_firstDay, $pre_lastDay])->count();
        return $newQuote;
    }
    public static function maxReviewer(){
        //$reviewers = array(DB::select('select  user_id from reviews group by user_id order by count(user_id) desc LIMIT 3;'));
        $reviewers = DB::table('reviews')
                       ->select(DB::raw('count(*) as user_count, user_id'))
                       ->groupBy('user_id')
                       ->orderBy('user_count','desc')
                       ->take(3)
                       ->get();
        return $reviewers;

    }
    public static function monthMaxReviewer(){
        $now = Carbon::now();
        //$pre_month = ($now->month)-1;
        $pre = Carbon::now();
        $pre->setDate($now->year,$now->month,1)->setTime(0, 0, 0)->toDateTimeString();
        //set $pre is the first of month
        $numbereviewers = DB::table('reviews')
                       ->select(DB::raw('user_id'))
                       ->whereBetween('created_at',[$pre,$now])
                       ->groupBy('user_id')
                       ->count();
                       if($numbereviewers!=0&&$numbereviewers<3){
                        //check has three reviewer create review
                        $monthreviewers = DB::table('reviews')
                           ->select(DB::raw('count(*) as user_count, user_id'))
                           ->whereBetween('created_at',[$pre,$now])
                           ->groupBy('user_id')
                           ->orderBy('user_count','desc')
                           ->take($numbereviewers)
                           ->get();

                           //foreach ($monthreviewers as $monthreviewer) {
                             return $monthreviewers;
                           //}
                       }
                       else if($numbereviewers==0){
                        return 0;
                       }
                       else if($numbereviewers>=3){
                        $monthreviewers = DB::table('reviews')
                           ->select(DB::raw('count(*) as user_count, user_id'))
                           ->whereBetween('created_at',[$pre,$now])
                           ->groupBy('user_id')
                           ->orderBy('user_count','desc')
                           ->take(3)
                           ->get();

                           //foreach ($monthreviewers as $monthreviewer) {
                             return $monthreviewers;
                           //}
                       }
      

    }

}
