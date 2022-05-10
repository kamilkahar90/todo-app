<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\SendEmail;

class JobController extends Controller
{
    public function enqueue(Request $request)
    {
        $details = ['email' => 'recipient@example.com'];
        
        //should get reminder date minus now() and delay the emailjob, then run php artisan queue:work
        $emailJob = (new SendEmail($details))->delay(Carbon::now()->addMinutes(5));
        dispatch($emailJob);
        
    }
}
