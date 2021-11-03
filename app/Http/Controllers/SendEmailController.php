<?php

namespace App\Http\Controllers;

use App\Classes\ContactForm;
use App\Classes\EmailNotification;
use Illuminate\Http\Request;

class SendEmailController extends Controller
{
    public function contactFormEmail(Request $request){
 
    $contactForm = new EmailNotification();
    $msg = $contactForm->sendContactEmail($request);
    return redirect()->route('view.contact')->with('msg',$msg);
    
    }
}
