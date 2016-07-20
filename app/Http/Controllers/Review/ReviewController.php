<?php

namespace App\Http\Controllers\Review;


use View;
use Session;

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

}
