<?php

namespace App\Http\Controllers;

use App\Models\ServiceOrder;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class PdfController extends Controller
{

    public function generatePdf(string $id)
    { 
        $order = ServiceOrder::find($id);
        $data['id'] = $order->id;
        $data['user'] = $order->user->name;
        $data['created_at'] = $order->created_at->format('d/m/Y');
        $data['customer'] = $order->customer->name;
        $data['phone'] = $order->customer->phone;
        $data['product'] = $order->product;
        $data['complaint'] = $order->complaint;
        $data['diagnosis'] = $order->diagnosis;
        $data['value'] = $order->value;

        $pdf = Pdf::loadView('document', $data);
        return $pdf->download('document.pdf');
    }

}
