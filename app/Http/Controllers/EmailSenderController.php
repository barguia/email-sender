<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailSenderRequest;
use App\Mail\ContatoEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailSenderController extends Controller
{
    public function send(EmailSenderRequest $request)
    {
        try {

            return $email = new ContatoEmail($request->all());

            Mail::to('eduardo.barbelino@gmail.com')->send(new ContatoEmail($request->all()));
        } catch (\Exception $exception) {
            return $exception;
        }


        return response()->json([
            'status' => 'success',
            'message' => 'E-Emails enviado com sucesso',
        ], 200);
//        return $request->all();
    }
}
