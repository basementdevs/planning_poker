<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class StartSessionController extends Controller
{
    /**
     * @return Response
     */
    public function  index() : Response
    {
        return Inertia::render('Session/Settings/SessionSettings');
    }

    /**
     * @return Response
     */
    public  function boards() : Response
    {
        return  Inertia::render('Session/Boards');
    }
}
