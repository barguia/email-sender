<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailSenderRequest;
use Illuminate\Http\Request;

class EmailSenderController extends Controller
{
    public function send(EmailSenderRequest $request)
    {
        return $request->all();
    }
}
