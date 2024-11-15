<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index (Request $request)
    {
        $keyword = $request->keyword;
        
        $level = Level::where('name', 'LIKE', '%'.$keyword.'%')
                        ->Paginate(3);
        return view('web/level-user', ['levelList' => $level ]);
    }

    public function create ()
    {
        return view ('web/level-user-add');
    }

    public function store(Request $request) 
    {

        $validated = $request->validate([
            'name' => 'unique:levels|required',
        ]);

        $level = Level::create($request->all());
        return redirect('/level-user');
    }

    public function edit(Request $request, $id)
    {
        $level = Level::findOrFail($id);
        return view ('web/level-user-edit', ['level' => $level]);
    }

    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'name' => 'unique:levels|required',
        ]);

        $level = Level::findOrFail($id);
        $level->update($request->all());
        return redirect('/level-user');
    }

    public function delete($id)
    {
        $level = Level::findOrFail($id);
        return view ('web/level-user-delete', ['level' => $level]);
    }

    public function destroy($id)
    {
        $deletedLevel = Level::findOrFail($id);
        $deletedLevel->delete();

        return redirect('/level-user');
    }
}
