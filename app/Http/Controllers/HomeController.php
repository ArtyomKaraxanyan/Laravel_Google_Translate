<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tr = new GoogleTranslate();
        return view('home',compact('tr'));
    }



    public function translate(Request $request)

    {
        $data = $this->validate($request, [
            'one' => 'required',
            'language'=>'required',
            'translate'=>'required',

        ]);

            $word= $data['one'];
             $l=   $data['language'];
             $t=   $data['translate'];

            $tr = new GoogleTranslate();
            $tr->setSource("$l");
            $tr->setSource();
            $tr->setTarget("$t");
            return view('home', compact('tr', 'word'));


    }



}
