<?php

namespace App\Http\ServiceExport;
use App\Models\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;

class CustomerExport implements FromCollection
{
    public function collection()
    {
        return Customer::all();
    }
}