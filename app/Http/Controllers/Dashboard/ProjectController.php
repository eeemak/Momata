<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Helmesvs\Notify\Facades\Notify;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view = view(config('dashboard.view_root'). 'project.index');
        $view->with('project_list', Project::orderBy('id', 'desc')->get());
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
            'image' => 'file|mimes:'.config('dashboard.modules.project.upload_accept_file_type').'|max:'.config('dashboard.modules.project.upload_max_file_size'),
        ]);
        $project = new Project();
        $project->fill($request->input());
        if($request->image){
            $image = $request->image;
            $destination = config('dashboard.modules.project.upload_file_location');
            $image_path = $destination . time() . "-" . $image->getClientOriginalName();
            $image->move($destination, $image_path);
            $project->image_path = $image_path;
        }
        $project->date = Carbon::createFromFormat('d/m/Y',$request->date);
        $project->creator_user_id = Auth::id();
        $project->save();
        Notify::success('New project saved', 'Success');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $view = view(config('dashboard.view_root'). 'project.detail');
        $view->with('project', $project);
        return $view;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $view = view(config('dashboard.view_root'). 'project.edit');
        $view->with('project', $project);
        return $view;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
            'description' => 'required',
            'image' => 'file|mimes:'.config('dashboard.modules.project.upload_accept_file_type').'|max:'.config('dashboard.modules.project.upload_max_file_size'),
        ]);
        $project->fill($request->input());
        if($request->image){
            $image = $request->image;
            $destination = 'uploads/project/';
            $image_path = $destination . time() . "-" . $image->getClientOriginalName();
            $image->move($destination, $image_path);
            $this->delete_file($project->image_path);
            $project->image_path = $image_path;
        }
        $project->date = Carbon::createFromFormat('d/m/Y',$request->date);
        $project->updator_user_id = Auth::id();
        $project->update();
        Notify::success('Project updated', 'Success');
        return redirect()->route('project.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        $this->delete_file($project->image_path);
        Notify::success('Project deleted', 'Success');
        return redirect()->route('project.index');
    }
    private function delete_file($file_path){
        if(file_exists($file_path)){
            unlink($file_path);
        }
    }
}
