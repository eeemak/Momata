<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Helmesvs\Notify\Facades\Notify;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view = view(config('dashboard.view_root'). 'gallery.index');
        $view->with('gallery_list', Gallery::orderBy('id', 'desc')->get());
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
            'image' => 'required|file|mimes:'.config('dashboard.modules.gallery.upload_accept_file_type').'|max:'.config('dashboard.modules.gallery.upload_max_file_size'),
        ]);
        $gallery = new Gallery();
        $gallery->fill($request->input());
        if($request->image){
            $image = $request->image;
            $destination = config('dashboard.modules.gallery.upload_file_location');
            $image_path = $destination . time() . "-" . $image->getClientOriginalName();
            $image->move($destination, $image_path);
            $gallery->image_path = $image_path;
        }
        $gallery->creator_user_id = Auth::id();
        $gallery->save();
        Notify::success('New item saved to gallery', 'Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        $view = view(config('dashboard.view_root'). 'gallery.detail');
        $view->with('gallery', $gallery);
        return $view;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        $view = view(config('dashboard.view_root'). 'gallery.edit');
        $view->with('gallery', $gallery);
        return $view;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
            'image' => 'file|mimes:'.config('dashboard.modules.gallery.upload_accept_file_type').'|max:'.config('dashboard.modules.gallery.upload_max_file_size'),
        ]);
        $gallery->fill($request->input());
        if($request->image){
            $image = $request->image;
            $destination = 'uploads/gallery/';
            $image_path = $destination . time() . "-" . $image->getClientOriginalName();
            $image->move($destination, $image_path);
            $this->delete_file($gallery->image_path);
            $gallery->image_path = $image_path;
        }
        $gallery->updator_user_id = Auth::id();
        $gallery->update();
        Notify::success('Gallery item updated', 'Success');
        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        $this->delete_file($gallery->image_path);
        Notify::success('A item deleted from Gallery', 'Success');
        return redirect()->route('gallery.index');
    }
    private function delete_file($file_path){
        if(file_exists($file_path)){
            unlink($file_path);
        }
    }
}
