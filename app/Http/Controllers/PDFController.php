<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Barryvdh\DomPDF\PDF;
use Carbon\Carbon;
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

    public function billsPDF(Request $request)
    {

       $month = $request->month;

       $billName = $request->name;



        $bills = Bill::with(['room'])->get();


        if($month !== null){
            $bills = Bill::whereMonth('created_at', $month)->where('status', 'Paid')->orderBy('due_date', 'asc')->get();
        }


        if($billName !== null && $month !== null){
            $bills = Bill::where('name', $billName)->whereMonth('created_at', $month)->where('status', 'Paid')->orderBy('due_date', 'asc')->get();
        }

        $total = collect($bills)->pluck('amount')->sum();

        $data = [
            'title' => 'Bills',
            'date' => date('d/m/Y'),
            'bills' => $bills,
            'total' => $total,
            'month' => $month !== null ? Carbon::create()->month($month)->format('F') : null
        ];

        $this->pdf->loadView('pdf.billsList', $data)->setPaper('a4', 'landscape');

        return $this->pdf->download('bills.pdf');
    }
}
