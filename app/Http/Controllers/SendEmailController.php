<?php

namespace App\Http\Controllers;

use App\Classes\ContactForm;
use Illuminate\Http\Request;

class SendEmailController extends Controller
{
    public function contactFormEmail(Request $request){
 
    $contactForm = new ContactForm();
    $msg = $contactForm->send($request);
    return redirect()->route('view.contact')->with('msg',$msg);
    
    }
}
