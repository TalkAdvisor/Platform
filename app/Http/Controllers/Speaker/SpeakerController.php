<?php

namespace App\Http\Controllers\Speaker;


use View;
use Session;

use Illuminate\Http\Request;
use App\Model\Talker;
use App\Http\Controllers\Controller;

class SpeakerController extends Controller
{
    public function index()
    {
        $speaker = Talker::all();
        return $speaker;
    }
}
