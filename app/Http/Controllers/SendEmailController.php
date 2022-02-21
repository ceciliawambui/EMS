<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\NotifyMail;
use App\Models\Employee;
use App\Http\Controllers\EmployeesController;

use Illuminate\Http\Request;

class SendEmailController extends Controller
{

    public function index()
    {
        Mail::to($email)->send(new NotifyMail());
        if (Mail::failures()){
            return response()->Fail('Sorry! Please try again later');
        }else{
            return response()->success('Great! Successfully sent the email!');
        }
    }

}