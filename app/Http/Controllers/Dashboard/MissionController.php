<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use Helmesvs\Notify\Facades\Notify;
use Illuminate\Http\Request;
use Auth;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view = view(config('dashboard.view_root'). 'mission.index');
        $view->with('mission_list', Mission::orderBy('id', 'desc')->get());
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
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'image' => 'file|mimes:jpg,jpeg,png,bmp|max:500',
        ]);
        $mission = new Mission();
        $mission->fill($request->input());
        if($request->image){
            $image = $request->image;
            $destination = 'uploads/mission/';
            $image_path = $destination . time() . "-" . $image->getClientOriginalName();
            $image->move($destination, $image_path);
            $mission->image_path = $image_path;
        }
        $mission->creator_user_id = Auth::id();
        $mission->save();
        Notify::success('New mission saved', 'Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function show(Mission $mission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function edit(Mission $mission)
    {
        $view = view(config('dashboard.view_root'). 'mission.edit');
        $view->with('mission', $mission);
        return $view;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mission $mission)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'image' => 'file|mimes:jpg,jpeg,png,bmp|max:500',
        ]);
        $mission->fill($request->input());
        if($request->image){
            $image = $request->image;
            $destination = 'uploads/mission/';
            $image_path = $destination . time() . "-" . $image->getClientOriginalName();
            $image->move($destination, $image_path);
            $mission->image_path ? unlink($mission->image_path) : null;
            $mission->image_path = $image_path;
        }
        $mission->updator_user_id = Auth::id();
        $mission->update();
        Notify::success('Mission updated', 'Success');
        return redirect()->route('mission.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mission  $mission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mission $mission)
    {
        //
    }
}
