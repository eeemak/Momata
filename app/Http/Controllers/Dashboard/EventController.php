<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Helmesvs\Notify\Facades\Notify;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view = view(config('dashboard.view_root'). 'event.index');
        $view->with('event_list', Event::orderBy('id', 'desc')->get());
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
            'vanue' => 'max:120',
            'start_date' => 'nullable|date_format:'.config('dashboard.input_date_format'),
            'end_date' => 'nullable|after_or_equal:start_date|date_format:'.config('dashboard.input_date_format'),
            'image' => 'file|mimes:'.config('dashboard.modules.event.upload_accept_file_type').'|max:'.config('dashboard.modules.event.upload_max_file_size'),
        ]);
        $event = new Event();
        $event->fill($request->input());
        if($request->image){
            $image = $request->image;
            $destination = config('dashboard.modules.event.upload_file_location');
            $image_path = $destination . time() . "-" . $image->getClientOriginalName();
            $image->move($destination, $image_path);
            $event->image_path = $image_path;
        }
        $event->start_date = $request->start_date ? Carbon::createFromFormat(config('dashboard.input_date_format'),$request->start_date) : null;
        $event->end_date = $request->end_date ? Carbon::createFromFormat(config('dashboard.input_date_format'),$request->end_date) : null;
        $event->creator_user_id = Auth::id();
        $event->save();
        Notify::success('New event saved', 'Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $view = view(config('dashboard.view_root'). 'event.detail');
        $view->with('event', $event);
        return $view;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $view = view(config('dashboard.view_root'). 'event.edit');
        $view->with('event', $event);
        return $view;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
            'description' => 'required',
            'vanue' => 'max:120',
            'start_date' => 'nullable|date_format:'.config('dashboard.input_date_format'),
            'end_date' => 'nullable|after_or_equal:start_date|date_format:'.config('dashboard.input_date_format'),
            'image' => 'file|mimes:'.config('dashboard.modules.event.upload_accept_file_type').'|max:'.config('dashboard.modules.event.upload_max_file_size'),
        ]);
        $event->fill($request->input());
        if($request->image){
            $image = $request->image;
            $destination = 'uploads/event/';
            $image_path = $destination . time() . "-" . $image->getClientOriginalName();
            $image->move($destination, $image_path);
            $this->delete_file($event->image_path);
            $event->image_path = $image_path;
        }
        $event->start_date = $request->start_date ? Carbon::createFromFormat(config('dashboard.input_date_format'),$request->start_date) : null;
        $event->end_date = $request->end_date ? Carbon::createFromFormat(config('dashboard.input_date_format'),$request->end_date) : null;
        $event->updator_user_id = Auth::id();
        $event->update();
        Notify::success('Event updated', 'Success');
        return redirect()->route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        $this->delete_file($event->image_path);
        Notify::success('Event deleted', 'Success');
        return redirect()->route('event.index');
    }
    private function delete_file($file_path){
        if(file_exists($file_path)){
            unlink($file_path);
        }
    }
}
