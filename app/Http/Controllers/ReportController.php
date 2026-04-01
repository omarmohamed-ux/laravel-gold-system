<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GoldTransaction;
use Barryvdh\DomPDF\Facade\Pdf;
use ArPHP\I18N\Arabic;


class ReportController extends Controller
{
   public function index(){
        $transactions = GoldTransaction::all();
        return view('reports.index', compact('transactions'));
   }
    public function viewPdf(){
        $transactions = GoldTransaction::all();
        $datatime = now()->format('Y-m-d_H-i-s');
        $pdf = Pdf::loadView('pdf.report', compact('transactions'));
        $pdf->setpaper('A4', 'landscape');
        return $pdf->stream();
    }
    public function generatePdf()
    {
        $transactions = GoldTransaction::all();
        $datatime = now()->format('Y-m-d_H-i-s');
        $pdf = Pdf::loadView('pdf.report', compact('transactions'));
        $pdf->setpaper('A4', 'landscape');
        return $pdf->download('gold_report.pdf');
    }
}