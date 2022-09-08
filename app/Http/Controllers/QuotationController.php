<?php

namespace App\Http\Controllers;

use App\Models\quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\companymaster;
use App\Models\quotstion_sub;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

use App\Notifications\InvoicePaid;
Use Illuminate\Support\Facades\Notification;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company_name = companymaster::all();
        $user_id =  Auth::user()->id;
        $fetchdata = DB::table('quotstion_sub')
            ->select('*')
            ->join('quotation', 'quotstion_sub.id', '=', 'quotation.id')
            ->where('quotation.user_id', '=', $user_id)
            ->get();


        if (isset($_POST['btn_search2'])) {
            dd("Connect");
        }
        return view('quotation')->with('company_name', $company_name)->with('fetchdata', $fetchdata);
        // $project_name = companymaster::all();

    }

    // public function sendmsg()
    // {


    //     $basic  = new \Vonage\Client\Credentials\Basic("fc278fbb", "1DZ76PJcn8J29hmr");
    //     $client = new \Vonage\Client($basic);

    //     $response = $client->sms()->send(
    //         new \Vonage\SMS\Message\SMS("917265912198", 'BRAND_NAME', 'A text message sent using the Nexmo SMS API')
    //     );
        
    //     $message = $response->current();
        
    //     if ($message->getStatus() == 0) {
    //         echo "The message was sent successfully\n";
    //     } else {
    //         echo "The message failed with status: " . $message->getStatus() . "\n";
    //     }
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        if (isset($_POST['btn_quotation'])) {

            $subquotation = new quotation;
            $subquotation->quotstion_from = $request->input('quotstion_from');
            $subquotation->price = $request->input('price');
            $subquotation->file = $request->input('file');
            $subquotation->TandC = $request->input('TandC');

            $subquotation->save();
            return Redirect::back();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, quotation $quotation)
    {
        //$user = new User;

        // $user->username = Input::get('username');
        // $user->email = Input::get('email');
        // $user->password = Hash::make(Input::get('password'));
        // $user->save();

        if (isset($_POST['btn_quotation'])) {
            $user_id =  Auth::user()->id;
            $quotation = array(

                "company_name" => $request->input('ddl_companyname'),
                "project_name" => $request->input('ddl_Project'),
                "user_id" =>  $user_id,

            );


            $last_id = DB::table('quotation')->insertGetId($quotation);


            // // $subquotation->attach =$path;
            // return back();

            // $subquotation = new quotstion_sub;
            // $subquotation->id =   $last_id;
            // $subquotation->quotstion_from = $request->input('quotstion_from');
            // $subquotation->price = $request->input('price');
            // $subquotation->TandC = $request->input('TandC');
            // $file = Storage::putFile('avatars', $request->file('attach'));
            $image = array();
            $quotstion_from = $request->input('quotstion_from');
            $price = $request->input('price');
            $TandC = $request->input('TandC');

            // $FinalData = array($quotstion_from .'^'. $price .'^'. $TandC .'~');



            // "quotstion_from" = $_POST['quotstion_from'];
            //  "price"=  $_POST['price'];
            //  'TandC'=$_POST['TandC'];

            //   $data= $request->all();

            //   foreach ($data as $key => $Ddata) {

            //   }

            // $validatedData = $request->validate([
            //     'attach' => 'required|jpg,png,csv,txt,xlx,xls,pdf,docx|max:2048',

            //    ]);

            
                
            }
            if ($file = $request->file('attach')) {
                foreach ($file as  $file) {
                    $image_name = md5(rand(1000, 100000));
                    $ext = strtolower($file->getClientOriginalExtension());
                    $image_full_name = $image_name . '.' . $ext;
                    $upload_path = 'public/uploads/';
                    $image_url = $upload_path . $image_full_name;
                    $file->move($upload_path, $image_full_name);
                    $image[] = $image_url;
               
            foreach ($request->quotstion_from as $key => $value) {

                # code... 
                # for Empty Value
                #!empty($request->title[$key]) ? $request->title[$key] : '';
                $subquotation = new quotstion_sub;
               
                $subquotation->id =   $last_id;
                $subquotation->quotstion_from = $request->quotstion_from[$key];
                $subquotation->price = !empty($request->price[$key]) ? $request->price[$key] : '';
                $subquotation->attach = implode('|', $image);
                $subquotation->TandC =  !empty($request->TandC[$key]) ? $request->TandC[$key] : '';
                // dd($subquotation);
                $subquotation->save();
                // Notification::send($subquotation, new InvoicePaid);
            } }
            
     
            return Redirect::back();
            //   $qts=  quotstion_sub::insert(

            //     [

            //         'attach' => implode('|',$image),
            //         'id' =>$last_id,
            //         'quotstion_from' =>$quotstion_from,
            //         'price' => $price,
            //         'TandC' => $TandC
            //     ]);



        }
    }
    // public function download($fileName)
    // {       
    //         $file_path = storage_path($fileName)  ;
    //         return Response::download($file_path);
    // }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function edit(quotation $quotation)
    {

        return view('quotation');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, quotation $quotation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\quotation  $quotation
     * @return \Illuminate\Http\Response
     */
    public function destroy($sub_id)
    {

        //
        // $post =quotstion_sub::where('sub_id',$sub_id)->first();
        // $post->delete();

        // $user=quotstion_sub::find($sub_id);
        // $user->delete(); 
       
        $picture = quotstion_sub::where("sub_id", "=", $sub_id);
        $picture->delete();
        return Redirect::back();
        // // dd($picture);
        // // $res = quotstion_sub::where('sub_id', md5($sub_id))->delete();
       
        
    }


    public function fetchdata(quotation $quotation)
    {

        $user_id =  Auth::user()->id;

        $fetchdata = DB::table('quotstion_sub')
            ->select('*')
            ->join('quotation', 'quotstion_sub.id', '=', 'quotation.id')
            ->where('quotation.user_id', '=', $user_id)
            ->get();
        return view('quotation')->with('fetchdata', $fetchdata);
    }



    // public function fetchdatabyid(quotation $quotation, Request $request)
    // {

    //     $user_id =  Auth::user()->id;
    //     $ddl_subquotation = $request->input('ddl_subquotation');
    //     if (isset($_POST['btn_search'])) {

    //         $fetchdatabyid = DB::table('quotstion_sub')
    //             ->select('*')
    //             ->where('quotstion_from', '=', $ddl_subquotation)
    //             ->where('id', '=', $user_id)
    //             ->get();
    //         return view('subquotation')->with('fetchdatabyid', $fetchdatabyid);
    //     } 
    //     else {
    //         $fetchdata = DB::table('quotstion_sub')
    //             ->select('*')
    //             ->join('quotation', 'quotstion_sub.id', '=', 'quotation.id')
    //             ->where('quotation.user_id', '=', $user_id)
    //             ->get();
    //         return view('subquotation')->with('fetchdata', $fetchdata);
    //     }
    // }
}
// 
