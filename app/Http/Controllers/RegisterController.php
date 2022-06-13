<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kelas;
use Illuminate\Http\Request;


class RegisterController extends Controller
{
    public function index(){
        $data = user::all();
        return view('user.index',[
            'data' => $data
        ]);
    }

    public function insert(Request $request){

        $validatedData = $this->validate($request,[
            'name' => ['required'],
            'role' => ['required'],
            'username' => ['required'],
            'email' => ['required','email'],
            'password' => ['required']
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);

        return redirect()->route('user');
    }

    public function destroy($id){
        $data = user::find($id);
        $data->delete();
        
        return redirect()->route('user');
    }

    public function edit($id){
        $data = User::find($id);

        return view('user.edit',[
            'data' => $data
        ]);
    }

    public function update(Request $request,$id){
        $data = user::find($id);

        $request['password'] = bcrypt($request['password']);
        $data->update($request->all());
        
        return redirect()->route('user');
    }
}
