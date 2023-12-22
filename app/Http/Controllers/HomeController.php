<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        switch (Auth()->user()->role->name) {
            case 'admin':
                return redirect()->route('admin.dashboard.index');
                break;

                case 'supervisor':
                    return redirect()->route('supervisor.index');
                    break;

                    case 'defult_user':
                        return redirect()->route('admin.dashboard.index');
                        break;

            default:
                # code...
                break;
        }
    }
}