<?php

namespace App\Http\Controllers;

use App\Models\companymaster;
use finfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class CompanymasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, companymaster $companymaster)
    {
        //


        $ddl_companyname = $request->input('ddl_companyname');
        $ddl_status = $request->input('ddl_status');
        $companymasterdata = DB::table('companymaster')
            ->where('company_name', '=', $ddl_companyname)
            ->where('isactive', '=', $ddl_status)
            ->get();
        // if (($ddl_companyname =="All")  AND ( $ddl_status=="All") ) {
        //     $companymasterdata = companymaster::all();
        // }

        // if ( $ddl_companyname =="All" AND  $ddl_status=="0" ) {
        //       $companymasterdata = DB::table('companymaster')
        //     ->where('isactive', '=',0)
        //     ->get();
        // }
        // if (  ( $ddl_companyname == $request->input('ddl_companyname'))  AND ( $ddl_status=="1") ) {
        //     $companymasterdata = DB::table('companymaster')
        //     ->where('name', '=',$ddl_companyname)
        //     ->where('isactive', '=',1)
        //     ->get();
        // }

        // if (  ( $ddl_companyname == $request->input('ddl_companyname'))  AND ( $ddl_status=="0") ) {
        //     $companymasterdata = companymaster::where([
        //         'name' => $ddl_companyname,
        //         'isactive' => 0

        //     ])->get();
        // }

        if (($ddl_companyname == "All")  and ($ddl_status == "All")) {
            $companymasterdata = companymaster::all();
        } else if ((($ddl_companyname != "All"))  and (($ddl_status == "0") || ($ddl_status == "1"))) {
            $companymasterdata = DB::table('companymaster')
                ->where('company_name', '=', $ddl_companyname)
                ->where('isactive', '=', $ddl_status)
                ->get();
            // dd($ddl_companyname);
        } 
        // else if (($ddl_companyname != "All")  and ($ddl_status == "All")) {
        //     $companymasterdata = DB::table('companymaster')
        //         ->where('name', '=', $ddl_companyname)
        //         ->get();
        // } 
        else if ((($ddl_companyname == "All"))  and (($ddl_status == "0") || ($ddl_status == "1"))) {
            $companymasterdata = DB::table('companymaster')
                ->where('isactive', '=', $ddl_status)
                ->get();
            // dd($ddl_companyname);
        }
        // if (   (   $ddl_status = $request->input('ddl_status')=="0") ) {
        //     $companymasterdata = companymaster::where([

        //         'isactive' => 0

        //     ])->get();
        // }




        $getdataforDDl = companymaster::all();

        return view('searchcompany', ['companymasterdata' => $companymasterdata], ['getdataforDDl' => $getdataforDDl]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function store(Request $request, companymaster $companymaster)
    {
        //
        $data = $request->except(['_token']);
        // DB::enableQueryLog();

        foreach ($data as $key => $value) {
            $companymaster->$key = $value;
        }
        $companymaster->save();
        // dd(DB::getQueryLog());

        return redirect('company');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\companymaster  $companymaster
     * @return \Illuminate\Http\Response
     */
    public function show(companymaster $companymaster)
    {
        //

        //
        $getdataforDDl = DB::table('companymaster')->get();


        return view('company', ['getdataforDDl' => $getdataforDDl]);
    }
    // public function show2(companymaster $companymaster)
    // {
    //     //

    //     //

    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\companymaster  $companymaster
     * @return \Illuminate\Http\Response
     */
    public function edit($company_id)
    {
        //
        // $company_id =$_REQUEST['company_id'];
        $postdata = DB::table("companymaster")
            ->where("company_id", "=", $company_id)
            ->get();
        return view('updatecompany', ['postdata' => $postdata]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\companymaster  $companymaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $company_id)
    {
        //
        $companyname = $request->input('company_name');
        $email = $request->input('email');
        $city = $request->input('city');
        $mobile = $request->input('mobile');
        //   $request->except(['_token']);
        DB::table('companymaster')
            ->where('company_id', $company_id)
            ->update(['company_name' => $companyname, 'email' =>  $email, 'city' =>  $city, 'mobile' =>  $mobile]);
        return redirect('searchcompany');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\companymaster  $companymaster
     * @return \Illuminate\Http\Response
     */
    public function destroy($company_id, $isactive)
    {
        $companymasterdata = companymaster::all();
        $getdataforDDl = companymaster::all();

        if ($isactive == "1") {
            $affected = DB::table('companymaster')
                ->where('company_id', $company_id)
                ->update(['isactive' => 0]);
            return redirect('searchcompany');
        } else {
            $affected = DB::table('companymaster')
                ->where('company_id', $company_id)
                ->update(['isactive' => 1]);
            return redirect('searchcompany');
        }
    }
}
