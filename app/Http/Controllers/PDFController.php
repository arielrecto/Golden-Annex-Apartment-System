<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{


    public function __construct(public PDF $pdf)
    {
    }

    public function billPDF(string $id)
    {
        $bill  = Bill::find($id);

        $data = [
            'title' => 'Bill',
            'date' => date('d/m/Y'),
            'bill' => $bill,
        ];


        $this->pdf->loadView('pdf.bill', $data);

        return $this->pdf->download('bill.pdf');
    }

    public function billsPDF()
    {
        $bills = Bill::with(['room'])->get();

        $data = [
            'title' => 'Bills',
            'date' => date('d/m/Y'),
            'bills' => $bills,
        ];

        $this->pdf->loadView('pdf.billsList', $data);

        return $this->pdf->download('bills.pdf');
    }
}
