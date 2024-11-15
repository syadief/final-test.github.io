<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Models\Level;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        $user = Data::with('levels')
                    ->where('name', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('email', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('phone', 'LIKE', '%'.$keyword.'%')
                    ->orWhereHas('levels', function($query) use($keyword) {
                        $query->where('name', 'LIKE', '%'.$keyword.'%');
                    })
                    ->paginate(3);
        return view('web/user', ['userList' => $user ]);
    }

    public function create() 
    {
        $level = Level::select('id', 'name')->get();
        return view('web/user-add', ['level' => $level]);
    }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'unique:data|required',
            'phone' => 'unique:data|required',
            'levels_id' => 'required',
        ]);

        $user = Data::create($request->all());
        return redirect('/user');
    }

    public function edit(Request $request, $id)
    {
        $user = Data::with('levels')->findOrFail($id);
        $level = Level::where('id','!=', $user->levels_id )->get(['id', 'name']);
        return view('web/user-edit', ['user' => $user, 'level' => $level]);
    }

    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'name' => 'required',
            'email' => ''required|unique:data,email,' . $id,
            'phone' => 'required|unique:data,phone,' . $id,
            'levels_id' => 'required',
        ]);

        $user = Data::findOrFail($id);
        $user->update($request->all());
        return redirect('/user');
    }

    public function delete($id)
    {
        $user = Data::findOrFail($id);
        return view('web/user-delete', ['user' => $user]);
    }

    public function destroy($id)
    {
        $deletedUser = Data::findOrFail($id);
        $deletedUser->delete();

        return redirect('/user');
    }
}
