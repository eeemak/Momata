<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Mission;
use App\Models\News;
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
    public function mission_detail(Mission $mission){
        $view = view($this->getPage('mission_detail'));
        $view->with('mission', $mission);
        return $view;
    }
    public function missions(){
        $view = view($this->getPage('missions'));
        $view->with('mission_list', Project::where('active', true)->orderBy('id', 'desc')->paginate(9));
        return $view;
    }
    public function projects(){
        $view = view($this->getPage('projects'));
        $view->with('project_list', Project::where('active', true)->orderBy('id', 'desc')->paginate(9));
        return $view;
    }
    public function project_detail(Project $project){
        $view = view($this->getPage('project_detail'));
        $view->with('project', $project);
        return $view;
    }
    public function news(){
        $view = view($this->getPage('news'));
        $view->with('news_list', News::where('active', true)->orderBy('id', 'desc')->paginate(5));
        return $view;
    }
    public function news_detail(News $news){
        $view = view($this->getPage('news_detail'));
        $view->with('news', $news);
        return $view;
    }
    public function events(){
        $view = view($this->getPage('events'));
        $view->with('event_list', Event::where('active', true)->orderBy('id', 'desc')->paginate(5));
        return $view;
    }
    public function event_detail(Event $event){
        $view = view($this->getPage('event_detail'));
        $view->with('event', $event);
        return $view;
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
