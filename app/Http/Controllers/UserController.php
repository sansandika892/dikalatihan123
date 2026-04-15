<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class UserController extends Controller

{
    public function index(Request $request)
    {
        $keyword=$request->input(key:'search');
    
    if ($keyword!=''){
        $user=user::where('name', 'LIKE', '%' . $keyword .'%')->paginate(5);
        }else{
        $user=user::orderby('id')->paginate(5);
     }
        return view('pages.destinations.user.indexuser', compact('user'));
    }




    public function show($id)
    {
        $User = User::find($id);
        return view('pages.destinations.user.detail', compact('user'));
    }

    public function create()
    {
        return view('pages.destinations.user.createuser');
        
    }



    
    public function store(Request $request)
    {
       
        User::create($request->all());
        return redirect(route('user.index'))->with('success', 'user created successfully.');
        
    }


     public function delete($id)
    {
        $user = User::find ($id);
        if ($user){
            $user -> delete ();
            return redirect (to:'/user')-> with(key:'success', value: 'user delete successfully.');
        }else{
            return redirect(to:'/user') -> with(key :'error',value:'user for found.');

        }
    }
      

    
 public function edit($id){
        $user = User::find($id);
        return view('pages.destinations.user.edituser', compact('user'));
        
    }
public function update (Request $request, $id){
    $user=User::find($id);
    if ($user){
        $user->update($request->all());
        return redirect('/user')->with('success',"user  update successfully.");
     } else{
        return redirect('/user')->with('error',"user non found.");
    }

}
}