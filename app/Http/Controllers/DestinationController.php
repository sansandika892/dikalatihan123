<?php

namespace App\Http\Controllers;

use App\Models\destination;
use Illuminate\Http\Request;


class DestinationController extends Controller

{
    public function index(Request $request)
    {
        
        $keyword=$request->input(key:'search');
    
    if ($keyword!=''){
        $destinations=destination::where('name', 'LIKE', '%' . $keyword .'%')->paginate(5);

        }else{
        $destinations=destination::orderby('id')->paginate(5);
     }
        return view('pages.indexdestinasi', compact('destinations'));
    }

    public function show($id)
    {
        $destinations = Destination::find($id);
        return view('pages.detail', compact('destinations'));
    }

    public function create()
    {
        return view('pages.createDestination');
    }

    public function store(Request $request)
    {
       
        Destination::create($request->all());
        return redirect('/destinations')->with('success', 'Destination created successfully.');
    }


     public function delete($id)
    {
        $destination = Destination::find ($id);
        if ($destination){
            $destination -> delete ();
            return redirect (to:'/destinations')-> with(key:'success', value: 'Destiantion delete successfully.');
        }else{
            return redirect(to:'/destination') -> with(key :'error',value:'Destination for found.');

        }
    }
      

    
 public function edit($id){
        $destination = Destination::find($id);
        return view('pages.editDestination', compact('destination'));
        
    }
public function update (Request $request, $id){
    $destination=Destination::find($id);
    if ($destination){
        $destination->update($request->all());
        return redirect('/destinations')->with('success',"destination  update successfully.");
     } else{
        return redirect('/destinations')->with('error',"destination non found.");
    }

}
}