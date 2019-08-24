<?php

namespace App\Http\Controllers;

use App\Models\News;
use Helmesvs\Notify\Facades\Notify;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view = view(config('dashboard.view_root'). 'news.index');
        $view->with('news_list', News::orderBy('id', 'desc')->get());
        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
            'description' => 'required',
            'image' => 'file|mimes:'.config('dashboard.modules.news.upload_accept_file_type').'|max:'.config('dashboard.modules.news.upload_max_file_size'),
        ]);
        $news = new News();
        $news->fill($request->input());
        if($request->image){
            $image = $request->image;
            $destination = config('dashboard.modules.news.upload_file_location');
            $image_path = $destination . time() . "-" . $image->getClientOriginalName();
            $image->move($destination, $image_path);
            $news->image_path = $image_path;
        }
        $news->date = Carbon::createFromFormat('d/m/Y',$request->date);
        $news->creator_user_id = Auth::id();
        $news->save();
        Notify::success('New news saved', 'Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        $view = view(config('dashboard.view_root'). 'news.detail');
        $view->with('news', $news);
        return $view;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $view = view(config('dashboard.view_root'). 'news.edit');
        $view->with('news', $news);
        return $view;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
            'description' => 'required',
            'image' => 'file|mimes:'.config('dashboard.modules.news.upload_accept_file_type').'|max:'.config('dashboard.modules.news.upload_max_file_size'),
        ]);
        $news->fill($request->input());
        if($request->image){
            $image = $request->image;
            $destination = 'uploads/news/';
            $image_path = $destination . time() . "-" . $image->getClientOriginalName();
            $image->move($destination, $image_path);
            $this->delete_file($news->image_path);
            $news->image_path = $image_path;
        }
        $news->date = Carbon::createFromFormat('d/m/Y',$request->date);
        $news->updator_user_id = Auth::id();
        $news->update();
        Notify::success('News updated', 'Success');
        return redirect()->route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        $this->delete_file($news->image_path);
        Notify::success('News deleted', 'Success');
        return redirect()->route('news.index');
    }
    private function delete_file($file_path){
        if(file_exists($file_path)){
            unlink($file_path);
        }
    }
}
