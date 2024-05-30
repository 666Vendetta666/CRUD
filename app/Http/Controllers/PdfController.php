<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Order;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;

class PdfController extends Controller
{
    public function generatePdf()
    {
        $clients = Client::all();
        $orders = Order::all();

        $pdf = new Dompdf();
        $pdf->loadHtml(view('pdf.report', compact('clients', 'orders'))->render());
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();
        
        return $pdf->stream('report.pdf');
    }
}

