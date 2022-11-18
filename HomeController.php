<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        $tasks = DB::table('tasks')->get();

        return view('index', compact('tasks'));
    }

    public function store(Request $request)
    {

        if ($request->name != null) {
            DB::table('tasks')->insert(['name' => $request->name]);
        } else {
            DB::table('tasks')->insert(['name' => 'Taslak Görev - ' . Str::random(5)]);
        }


        //  Task::create([
        //      'name' => $request->name,
        //  ]);

        return redirect()->back()->with('success', 'İşlem Başarılı Bir Şekilde Gerçekleşti');
    }

    public function update(Request $request, $id)
    {
        DB::table('tasks')->where('id', $id)->update(['name' => $request->name]);

        return redirect()->back()->with('success', 'İşlem Başarılı Bir Şekilde Gerçekleşti');
    }

    public function delete($id)
    {
        DB::table('tasks')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'İşlem Başarılı Bir Şekilde Gerçekleşti');
    }
}
