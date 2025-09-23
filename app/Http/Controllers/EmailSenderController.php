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
            Mail::to(config('mail.to.address'))->send(new ContatoEmail($request->all()));
            return response()->json([
                'status' => 'success',
                'message' => 'E-mail enviado com sucesso',
            ], 200);
        } catch (\Exception $exception) {
            return response()->json([
                'status' => 'error',
                'message' => 'Ocorreu um erro ao enviar o e-mail',
            ], 500);
        }
    }
}
