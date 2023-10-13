<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class PdfController extends Controller
{

    public function generatePdf()
    {
        $pdf = PDF::loadView('serviceOrder.blade.php');
        return $pdf->stream('document.pdf');
    }

}
