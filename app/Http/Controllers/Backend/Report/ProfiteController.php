<?php

namespace App\Http\Controllers\Backend\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

class ProfiteController extends Controller
{
    public function __invoke(Request $request)
    {
        $data['start_date'] = date('Y-m',strtotime($request->start_date));
		$data['end_date'] = date('Y-m',strtotime($request->end_date));
    	$data['sdate'] = date('Y-m-d',strtotime($request->start_date));
    	$data['edate'] = date('Y-m-d',strtotime($request->end_date));

        $pdf = PDF::loadView('backend.report.profit.profit_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
