<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function inicio(){
        return view('inicio');
    }


    public function getDashboard(){

        if( ! Auth::guest() ) {
            return view('dashboard');
        }else {
            return redirect('login');
        }

    }
}