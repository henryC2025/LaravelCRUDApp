<?php

namespace App\Http\Controllers;

use App\Models\Terminology;
use Illuminate\Http\Request;

class AjaxTERMINOLOGYCRUDController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['terminology'] = Terminology::orderBy('id','asc')->paginate(5);
   
        return view('ajax-terminology-crud',$data);
    }
    
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $terminology   =   Terminology::updateOrCreate(
                    [
                        'id' => $request->id
                    ],
                    [
                        'comment' => $request->comment, 
                        'author' => $request->author,
                    ]);
    
        return response()->json(['success' => true]);
    }
    
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {   

        $where = array('id' => $request->id);
        $terminology  = Terminology::where($where)->first();
 
        return response()->json($terminology);
    }
 
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $terminology = Terminology::where('id',$request->id)->delete();
   
        return response()->json(['success' => true]);
    }
}
