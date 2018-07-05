<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function homepage(){
        $proyek = DB::table('proyeks')
        ->where('proyeks.status', '=', '0')
        ->paginate(10);
        // ->get();
        return view('homepage',compact('proyek'));
    }
}
