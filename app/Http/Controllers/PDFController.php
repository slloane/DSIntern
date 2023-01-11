<?php
   
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
 
use PDF;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OffreStage;
use Illuminate\Support\Facades\Validator;
   
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
           // 'title' => auth()->id(),
            'date' => date('m/d/Y'),


        ];
           
        $pdf = PDF::loadView('testPDF', $data);
     
        return $pdf->download('attestation.pdf');
    }
}