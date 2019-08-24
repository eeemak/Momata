<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Mission;
use App\Models\Project;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home(){
        $view = view($this->getPage('home'));
        $view->with('mission_list', Mission::where('active', true)->where('featured', true)->orderBy('id', 'desc')->get());
        $view->with('project_list', Project::where('active', true)->where('featured', true)->orderBy('id', 'desc')->get());
        $view->with('event_list', Event::where('active', true)->where('featured', true)->orderBy('id', 'desc')->get());
        return $view;
    }
    public function projects(){
        return view($this->getPage('projects'));
    }
    public function news(){
        return view($this->getPage('news'));
    }
    public function events(){
        return view($this->getPage('events'));
    }
    public function event_detail(){
        return view($this->getPage('event_detail'));
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
