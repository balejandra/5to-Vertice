<?php

namespace App\Http\Controllers\Proyectos;

use App\Http\Controllers\Controller;
use App\Mail\ProyectosMail;
use Illuminate\Support\Facades\Mail;

class MailProyectosController extends Controller
{

    public function mailProyecto($receiver,$subject,$data,$view){

        $mail= Mail::to($receiver)->send(new ProyectosMail($subject,$data,$view));
        return $mail;
    }
}
