<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{

    public function login()
    {
        return view('pages/home/login');
    }   
  
    public function home()
    {
        return view('pages/home/home');
    }  
    public function enlistment()
    {
        return view('pages/home/enlistment');
    }  
    public function application()
    {
        return view('pages/home/application');
    } 
    public function email_verification()
    {
        // return 'hello';
        return view('pages/home/email_verification');
    }   
    public function schedule()
    {
        return view('pages/home/schedule');
    } 
    public function enrollment()
    {
        return view('pages/home/enrollment');
    } 
    
}
