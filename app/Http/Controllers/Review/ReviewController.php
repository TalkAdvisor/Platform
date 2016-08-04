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
    public function AllReviews(){
      $reviews = DB::table('reviews')->count('id');
      echo $reviews;
    }
    public function AllComment(){
      $reviews = DB::table('reviews')->whereNull('comment')->count();
      echo $reviews;
    }
    public function AllQuotes(){
      $quotes = DB::table('reviews')->whereNull('quote')->count();
      echo $quotes;
    }
    public function newReview(){
        $now = Carbon::now();
        //$pre_month = ($now->month)-1;
        $pre = Carbon::now();
        $pre->setDate($now->year,$now->month,1)->setTime(0, 0, 0)->toDateTimeString();
        $newReview=Review::select('id')->whereBetween('created_at', [$pre, $now])->count();
        echo $newReview;
    }
    public function newComment(){
        $now = Carbon::now();
        //$pre_month = ($now->month)-1;
        $pre = Carbon::now();
        $pre->setDate($now->year,$now->month,1)->setTime(0, 0, 0)->toDateTimeString();
        $newComment=Review::select('comment')->where('comment', '!=', '')->whereBetween('created_at', [$pre, $now])->count();
        echo $newComment;
    }
    public function newQuote(){
        $now = Carbon::now();
        //$pre_month = ($now->month)-1;
        $pre = Carbon::now();
        $pre->setDate($now->year,$now->month,1)->setTime(0, 0, 0)->toDateTimeString();
        $newQuote=Review::select('quote')->where('quote', '!=', '')->whereBetween('created_at', [$pre, $now])->count();
        echo $newQuote;
    }
    public function maxReviewer(){
        //$reviewers = array(DB::select('select  user_id from reviews group by user_id order by count(user_id) desc LIMIT 3;'));
        $reviewers = DB::table('reviews')
                       ->select(DB::raw('count(*) as user_count, user_id'))
                       ->groupBy('user_id')
                       ->orderBy('user_count','desc')
                       ->take(3)
                       ->get();
        echo $reviewers[0]->user_id." ".$reviewers[1]->user_id." ".$reviewers[2]->user_id;

    }
    public function monthMaxReviewer(){
        $now = Carbon::now();
        //$pre_month = ($now->month)-1;
        $pre = Carbon::now();
        $pre->setDate($now->year,$now->month,1)->setTime(0, 0, 0)->toDateTimeString();
        $monthreviewers = DB::table('reviews')
                       ->select(DB::raw('count(*) as user_count, user_id'))
                       ->whereBetween('created_at',[$pre,$now])
                       ->groupBy('user_id')
                       ->orderBy('user_count','desc')
                       ->take(3)
                       ->get();
        echo $monthreviewers[0]->user_id." ".$monthreviewers[1]->user_id." ".$monthreviewers[2]->user_id;

    }

}
