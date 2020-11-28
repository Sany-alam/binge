<?php

namespace App\Exports;

use App\order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class OrderExport implements FromArray,WithHeadings,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     return order::all();
    // }

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'Order No',
            'Customer Name',
            'Customer Phone Number',
            'Ticket No',
            'Customer Address',
            'Customer Instruction',
            'Admin Instruction',
            'Source of Lead',
            'Order Generator',
            'Delivery Partner',
            'Order Generated Date and Time',
            'Delivery Completed Data and Time',
            'Delivery Status'

        ];
    }
    

}
