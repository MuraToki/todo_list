<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

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
        $todos = Todo::all();
        return view('home', compact('todos'));
    }

    public function store(Request $request) {
        $todo = new Todo();
        $todo->text = $request->text;
        $todo->save();

        return redirect()->route('index');
    }

    public function delete($id) {
        try {
            //Delte Todo
            Todo::destroy($id);
        } catch (\Throwable $th) {
            //throw $th;
            abort(500);
        }

        return redirect(route('index'));
    }

}
