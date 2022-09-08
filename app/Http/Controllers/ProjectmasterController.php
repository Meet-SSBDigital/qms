<?php

namespace App\Http\Controllers;

use App\Models\projectmaster;
use App\Models\companymaster;
// use Illuminate\Contracts\Session\Session;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

// use Illuminate\Support\Facades\Redirect;

class ProjectmasterController extends Controller
{


    // protected $searchprojectdatabyid;
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //







        // $ddl_companyName =$_GET['ddl_companyName'];
        // $ddl_companyName = $request->input('ddl_companyName');
        // $getdataforDDl3=  DB::table('projectmaster')
        // ->select('*')
        // ->where('company_name','=',$ddl_companyName)
        // ->get();

        $getdataforDDl = companymaster::all();
        $ddl_companyName = $request->input('ddl_companyName');
        $projectmasterdata = DB::table('projectmaster')
            ->select('*')
            ->where('company_name', '=', $ddl_companyName)
            ->get();

        return view(
            'searchproject',
            ['getdataforDDl' => $getdataforDDl],
            ['projectmasterdata' => $projectmasterdata]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function optionsdata(Request $request)
    {

        $ddl_companyname = $request->post('ddl_companyname');

        $project_name = DB::table('projectmaster')
            ->select('*')
            ->where('company_name', '=', $ddl_companyname)
            ->get();
        $html = '<option value="">Select Project</option>';
        foreach ($project_name as  $list) {
            $html .= '<option value="' . $list->projectname . '">' . $list->projectname . '</option>';
        }
        echo $html;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, projectmaster $projectmaster)
    {
        //
        $data = $request->except(['_token']);
        // DB::enableQueryLog();

        foreach ($data as $key => $value) {
            $projectmaster->$key = $value;
        }
        $result = $projectmaster->save();
        // dd(DB::getQueryLog());

        // return redirect('addproject');
        if ($result > 0) {
            return redirect('addproject')->with('success', 'Project Add Successfull');   ;
        } else {
            return redirect('addproject')->withErrors(['msg' => 'Try Again Letter']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\projectmaster  $projectmaster
     * @return \Illuminate\Http\Response
     */
    public function show(projectmaster $projectmaster)
    {
        //
        $getdata = DB::table('companymaster')->get();

        return view('addproject', ['getdata' => $getdata]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\projectmaster  $projectmaster
     * @return \Illuminate\Http\Response
     */
    public function edit(projectmaster $projectmaster, Request $request)
    {
        if (isset($_POST['search_project'])) {
       
            $ddl_companyname = $request->post('ddl_companyName');
            $ddl_projectname = $request->post('ddl_projectname');
            $searchprojectdatabyid =    DB::table("projectmaster")
            ->where("company_name", "=", $ddl_companyname)
            ->where("projectname", "=", $ddl_projectname)
            ->get();
         
            Session::put('task_url',request()->fullUrl());
            // echo Session::get('task_url');

        //
            return view('projecttable',compact('searchprojectdatabyid'));
        }
        
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\projectmaster  $projectmaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, projectmaster $projectmaster,$project_id)
    {
        //
        // dd($_REQUEST);
        $data = $request->except(['_token','edit_product']);
    
           projectmaster::where("project_id",$project_id)->update($data);
        
        // echo Session::get('task_url');
        if (session('task_url')) {
                return redirect(session('task_url'));
            }
        // return redirect()->route('getprojectdatabyid');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\projectmaster  $projectmaster
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // $postdatabyid=projectmaster::where("project_id",$project_id)->first();
        // $request->user()->statuses()->findOrFail($project_id)->delete();
        // DB::table('projectmaster')->
        //     where("project_id", "=", $project_id)->delete();
        //     Session::put('task_url',request()->fullUrl());
        // if (session('task_url')) {
        //     return redirect(session('task_url'));
        // }
        // $post =projectmaster::where('project_id',$id)->first();
        // dd($post);
        // $post->delete();

        $subscribe = projectmaster::find($id);
        $subscribe->delete();
        // Session::put('task_url',request()->fullUrl());
        // if (session('task_url')) {
        //     return redirect(session('task_url'));
        // }
            return Redirect('addproject')->with('delete', 'Project Remove Successfull');
    }

    
    public function databyid(projectmaster $projectmaster,$project_id)
    {
        // $postdatabyid= projectmaster::find($project_id);
        $postdatabyid=projectmaster::where("project_id",$project_id)->first();

    //  $postdatabyid = DB::table("projectmaster")
    //         ->where("project_id", "=", $project_id)
    //         ->get();
            return view('editproject',compact('postdatabyid'));
    }
}
