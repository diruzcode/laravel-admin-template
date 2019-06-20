<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

class PdfController extends Controller
{


    public function index()
    {
      return view('dashboard.pdfs.index');
    }


    public function export_document_generate(Request $request)
    {
      $pdf = PDF::loadHTML($request->get('content_textarea'));
      return $pdf->download('export.pdf');

    }


    public function export_document_url(Request $request)
    {
      $pdf = PDF::loadFile($request->get('url'));
      return $pdf->download('url.pdf');

    }


    public function export_by_view()
    {
      $pdf = PDF::loadView('pdf.invoice', []);
      return $pdf->download('view.pdf');

    }


}
