<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller{

    public readonly User $user;
    
    public function __construct(){
        $this->user = new User();
    }
    
    public function index(){
        $user = $this->user->all();
        return view('users.edit_users',['users'=>$user]);
    }
   
    public function update(Request $request, string $id){
        $user = new User;
        $data = $request->except(['_token','_method']);
            $user->typeUser = $data['typeUser'];
            $user->where('id', $id)->update($data);
                return redirect()->back();
    }

    
    public function destroy(string $id){
        $this->user->where('id', $id)->delete();
            return redirect()->route('users.index');
    }
}
