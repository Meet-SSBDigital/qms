<?php

namespace App\Imports;

use App\Models\annualplan;
use Maatwebsite\Excel\Concerns\ToModel;

class AnnualplanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new annualplan([
        
          'monthyear'=>$row[0],
          'inspectionname'=> $row[1],
          'inspectioncode'=> $row[2],
          'levelofinspection'=> $row[3],
          'corridorname'=> $row[4],
          'underground'=> $row[5],
          'elevated'=> $row[6],
          'isactive'=> $row[7],
          'remarks'=> $row[8],
        ]);
    }
}
