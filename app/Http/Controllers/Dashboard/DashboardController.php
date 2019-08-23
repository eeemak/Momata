<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use Notify;

class DashboardController extends Controller
{
    public function dashboard(){
        return view(config('dashboard.view_root'). 'dashboard');
    }
    public function login(Request $request){
        if($request->redirect_url){
            Session::put('redirect_url', $request->redirect_url);
        }
        $view = view($this->getPage('login'));
        $view->with('ControllerName', "AccountController");
        return $view;
    }
    // public function register(){
    //     $view = view($this->getPage('register'));
    //     return $view;
    // }
    public function attemptLogin(Request $request) {
        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
            if(Session::has('redirect_url')){
                return redirect(Session::pull('redirect_url'));
            }
            return redirect()->intended('/dashboard');
        }else if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            if(Session::has('redirect_url')){
                return redirect(Session::pull('redirect_url'));
            }
            return redirect()->intended('/dashboard');
        } else {
            Notify::error('Invalid username or password', 'Error');
            return redirect()->back();
        }
    }
    // public function attemptRegister(Request $request) {
    //     //  dd($request->all());
    //     $this->validate($request, [
    //         'name' => 'required|min:4',
    //         'username' => 'required|unique:users',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required|confirmed|min:4',
    //     ]);
    //     $user = new User();
    //     $user->fill($request->input());
    //     $user->password = bcrypt($request->password);
    //     $user->save();
    //     $user->assignRole('user');
    //     Session::put('alert-success', 'Registration successfull! Please login.');
    //     return redirect()->route('login');
    // }
    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }

    public function change_activation(Request $request){
        $model = app("App\Models\\".$request->model);
        $item = $model::findOrFail($request->id);
        $item->active = $request->active;
        $item->update();
        Notify::success($request->active ? 'Item status changed to <b>Active</b>!' : 'Item status changed to <b>Inactive' .'</b>!', 'Success');
        return redirect()->back();
    }
    public function change_feature(Request $request){
        $model = app("App\Models\\".ucfirst($request->model));
        $item = $model::findOrFail($request->id);
        $max_feature = config('dashboard.modules.'.strtolower($request->model).'.featured_max_item');
        if($item->where('featured', true)->count() >= $max_feature && $request->featured){
            Notify::error('Featured item can not more than '. $max_feature, 'Error');
            return redirect()->back();
        }
        $item->featured = $request->featured;
        $item->update();
        Notify::success($request->featured ? 'Item feature changed to <b>Featured</b>!' : 'Item feature changed to <b>Normal' .'</b>!', 'Success');
        return redirect()->back();
    }
    private function getPage($pageName){
        return config('dashboard.view_root') . $pageName;
    }
}
