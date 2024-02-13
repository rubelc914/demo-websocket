<?php

namespace App\Http\Controllers;

use App\Events\TestEvent;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function testData(Request $request){
        event(new TestEvent($request->all()));
    }
}
