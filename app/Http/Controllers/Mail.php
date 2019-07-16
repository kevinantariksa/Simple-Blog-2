<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

    class Mail extends Controller
    {
      public function myTestMail()

    {

    $myEmail = 'aatmaninfotech@gmail.com';

    Mail::to($myEmail)->send(new MyTestMail());

    dd("Mail Send Successfully");

    }
}
