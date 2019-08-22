<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home(){
        return view($this->getPage('home'));
    }
    public function our_causes(){
        return view($this->getPage('our_causes'));
    }
    public function news(){
        return view($this->getPage('news'));
    }
    public function events(){
        return view($this->getPage('events'));
    }
    public function about_us(){
        return view($this->getPage('about_us'));
    }
    public function contacts(){
        return view($this->getPage('contacts'));
    }

    private function getPage($pageName){
        return config('website.view_root') . $pageName;
    }
}
