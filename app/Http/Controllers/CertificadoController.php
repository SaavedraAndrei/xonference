<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Elibyy\TCPDF\Facades\TCPDF as PDF;
use Illuminate\Support\Facades\Session;

class CertificadoController extends Controller
{
    public function index()
    {
        return view('certificado');
    }

    public function download()
    {
        ob_end_clean();

        // $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        // PDF::SetImageScale(PDF_IMAGE_SCALE_RATIO)


        // set certificate file
        $certificate = 'file://' . base_path() . '/public/tcpdf.crt';

        // set additional information in the signature
        $info = array(
            'Name' => 'Certificado',
            'Location' => 'Huancayo',
            'Reason' => 'Certificado de participación',
            'ContactInfo' => 'https://ucontinental.edu.pe/',
        );

        // set document signature
        PDF::setSignature($certificate, $certificate, 'tcpdfdemo', '', 2, $info);

        PDF::SetFont('helvetica', '', 11);
        // PDF::SetTitle('Hello World');
        // PDF::AddPage();
        PDF::SetTitle('Firma Digital');
        PDF::AddPage('L', 'A4');
        PDF::SetMargins(10, PDF_MARGIN_TOP, 10);

        $nombre_usuario = Session::get('nombre_usuario');
        // print a line of text
        // $text = view('tcpdf');
        $html_content = view('certificado',  compact('nombre_usuario'));

        // add view content
        // PDF::writeHTML($text, true, 0, true, 0);
        PDF::writeHTML($html_content, true, 0, true, 0);

        // add image for signature
        PDF::Image('/public/img/conti.png', 180, 60, 15, 15, 'PNG');

        // define active area for signature appearance
        PDF::setSignatureAppearance(180, 60, 15, 15);

        // save pdf file
        // PDF::Output(public_path('hello_world.pdf'), 'F');
        PDF::Output('certificado.pdf');

        PDF::reset();

        // dd('pdf created');
    }
}
