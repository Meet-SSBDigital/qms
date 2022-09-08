<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\AnnualplanImport;
use App\Exports\Audit;
use App\Models\annualplan;
// use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
class AnnualplanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $macAddr = exec('getmac');
        dd($macAddr);
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
    private $excel;
    public function __construct(Excel $excel) {
        $this->excel = $excel;
    }
    public function show()
    {
        //

        
        // return Excel::store(new Audit, 'Auditplan.xlsx','s3');
        // return  $this->excel->store(new Audit, 'Auditplan.xlsx','public');
        return  $this->excel->download(new Audit, 'Auditplan.xlsx');
        // return  $this->excel->download(new Audit, 'Auditplan.pdf',Excel::DOMPDF);


        // return (new InvoicesExport)->download('invoices.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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








    public function import(Request $request) 
    {

        // dd('import');
        Excel::import(new AnnualplanImport, $request->file('exlfile'));
        // dd($data);
        return redirect('/excel')->with('success', 'All good!');
    }
}
