<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Results;
use App\Models\Terminology;

class AjaxCOMMENTCRUDController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public static function checkCommentType(string $comment){
        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";    
        return str_contains($actual_link, $comment);
    }

    public function index()
    {
        if(AjaxCOMMENTCRUDController::checkCommentType('results')){
            $data['results'] = Results::orderBy('id','asc')->paginate(5);
            return view('ajax-results-crud',$data);
        }
        else if(AjaxCOMMENTCRUDController::checkCommentType('terminology')){
            $data['terminology'] = Terminology::orderBy('id','asc')->paginate(5);
            return view('ajax-terminology-crud',$data);
        }
        
    }
    
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(AjaxCOMMENTCRUDController::checkCommentType('results')){
            $results   =   Results::updateOrCreate(
                        [
                            'id' => $request->id
                        ],
                        [
                            'comment' => $request->comment, 
                            'author' => $request->author,
                        ]);
                        return response()->json(['success' => true]);
                    }
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
        $result  = Results::where($where)->first();
 
        return response()->json($result);
    }
 
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $result = Results::where('id',$request->id)->delete();
   
        return response()->json(['success' => true]);
    }
}
