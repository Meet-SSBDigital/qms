<?php

namespace App\Exports;

use App\Models\annualplan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeImport;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Events\BeforeSheet;
use Maatwebsite\Excel\Concerns\WithDrawings;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;


class Audit implements FromCollection , WithHeadings , WithEvents ,WithDrawings,WithCustomStartCell
{
    /**
    * @return \Illuminate\Support\Collection
    */
   
    public function collection()
    {
     
        return annualplan::all();
    }
    
    public function headings(): array
    {
        return [
            'No',
            'Monthyear',
            'Inspectionname',
            'Inspectioncode',
            'Levelofinspection',
            'Corridorname',
            'Underground',
            'Elevated',
            'Isactive',
            'Remarks',
            'Updated_at',
            'Created_at'

        ];
    }
    public function registerEvents(): array
    {
        return [
                    AfterSheet::class => function (AfterSheet $event)
                    {
                    $event->sheet->getStyle('A8:N8')->applyFromArray([
                        'font' => array(
                            'name'      =>  'Baskerville Old Face',
                            'size'      =>  12,
                            'bold'      =>  true
                        ),
                        'background-color' => [
                            'color'=> '#24fff4'
                        ],
                        'borders' => [
                            'outline' => [
                                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DASHDOTDOT,
                                'color' => ['argb' => '#34b1eb'],
                            ], 
                        ]
                    ]);
                    }
          
          
                        
        ];
    }

    public function drawings()
    {
        $drawing = new Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('This is my logo');
        $drawing->setPath(public_path('images/logo_v1.png'));
        $drawing->setHeight(70);
        $drawing->setCoordinates('B3');

        return $drawing;
    }
    public function startCell(): string
    {
        return 'A8';
    }
}
