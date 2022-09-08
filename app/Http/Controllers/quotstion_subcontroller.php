<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\quotstion_sub;
use App\Models\quotation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class quotstion_subcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function fetchdata(quotation $quotation, Request $request)
    {
        $user_id =  Auth::user()->id;

        $fetchdata = DB::table('quotstion_sub')
            ->select('*')
            ->join('quotation', 'quotstion_sub.id', '=', 'quotation.id')
            ->where('quotation.user_id', '=', $user_id)
            ->get();
        return view('subquotation')->with('fetchdata', $fetchdata);
    }



    // public function fetchdatabyid(quotation $quotation, Request $request)
    // {

    //     $ddl_subquotation = $request->post('ddl_subquotation');
    //     $user_id =  Auth::user()->id;


    //     $fetchdatabyid = DB::table('quotstion_sub')
    //         ->select('*')
    //         ->where('quotstion_from', '=', $ddl_subquotation)
    //         ->where('id', '=', $user_id)
    //         ->get();

    //     $html = '';
    //     foreach ($fetchdatabyid as  $list) {
    //         // $html .= '<option value="' . $list->projectname . '">' . $list->projectname . '</option>';
    //         $html .= $list->quotstion_sub ;
    //     }
    //     echo $html;
    // }
    // $ddl_companyname = $request->post('ddl_companyname');

    // $project_name = DB::table('projectmaster')
    //     ->select('*')
    //     ->where('company_name', '=', $ddl_companyname)
    //     ->get();
    // $html = '<option value="">Select Project</option>';
    // foreach ($project_name as  $list) {
    //     $html .= '<option value="' . $list->projectname . '">' . $list->projectname . '</option>';
    // }
    // echo $html;
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    // public function fetchdataid(Request $request)
    // {
    //     $ddl_subquotation = $request->post('ddl_subquotation');
    //     $user_id =  Auth::user()->id;
    //     $fetchdatabyid = DB::table('quotstion_sub')
    //             ->select('*')
    //             ->where('quotstion_from', '=', $ddl_subquotation)
    //             ->where('id', '=', $user_id)
    //             ->get();
    //             return response()->json([
    //                 'fetchdatabyid'=>$fetchdatabyid
    //             ]);
    
    // }





    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
       
        if ($file = $request->file('attach')) {
                    foreach ($file as  $file) {
                        $image_name = md5(rand(1000, 100000));
                        $ext = strtolower($file->getClientOriginalExtension());
                        $image_full_name = $image_name . '.' . $ext;
                        $upload_path = 'public/uploads/';
                        $image_url = $upload_path . $image_full_name;
                        $file->move($upload_path, $image_full_name);
                        $image[] = $image_url;
                 
                    }

                    $update= DB::table('quotstion_sub')
                ->where('sub_id',$request->input('sub_id'))
                ->update([
                    'quotstion_from'=>$request->input('quotstion_from'),
                    'price'=>$request->input('price'),
                    // 'attach'=>implode('|', $image),
                    'TandC'=>$request->input('TandC'),

                ]);

              
                    
                }
           
                return redirect('quotation');

        
              

        //  return $sub_id=$request->input('sub_id');

        //    $data= quotstion_sub::find($sub_id);

        //     $data->quotstion_from=$request->input('quotstion_from');
       
        //     $data->price=$request->input('price');

        //     if ($file = $request->file('attach')) {
        //         foreach ($file as  $file) {
        //             $image_name = md5(rand(1000, 100000));
        //             $ext = strtolower($file->getClientOriginalExtension());
        //             $image_full_name = $image_name . '.' . $ext;
        //             $upload_path = 'public/uploads/';
        //             $image_url = $upload_path . $image_full_name;
        //             $file->move($upload_path, $image_full_name);
        //             $image[] = $image_url;
        //         }
        //     }
        //     $data-> attach = implode('|', $image);
        //     $data-> TandC = $request->input('TandC');
        //     $data->save();
            
        //     return redirect('quotation');



        
           

              
               
       
            
    
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$sub_id)
    {
    //    $sub_id=quotstion_sub::find($sub_id);

       
        $newdata=  DB::table('quotstion_sub')
        ->select('*')
        ->where('sub_id','=',$sub_id)
        ->get();

    //    dd($newdata);
        return view('subquotation',['newdata'=>$newdata]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
