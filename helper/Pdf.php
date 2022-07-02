<?php


class Pdf
{
    private $pdf;
    private $qr;

    public function __construct($qr)
    {
        $this->qr=$qr;
        $this->pdf=new FPDF();
    }
    public function armarPdf($pasajero,$partida,$llegada,$clase,$precio,$fecha,$contenidoQr){

        $this->pdf->AddPage();
        $this->pdf->SetTitle('Comprobante de compra');
        $this->pdf->SetFont('Arial', 'B', 16);
        $this->pdf->Cell(80,10,'Comprobante de compra',1,0,'C');
        $this->pdf->Cell(90,10,'NRO:324252',1,1,'C');
        $this->pdf->line("1000","30","0","30");
        $this->pdf->Cell(25, 40, 'Gaucho Rocket',0,1);
        $this->pdf->line("1000","50","0","50");
        $this->pdf->Cell(10, 10, 'VUELO',0,1);
        $this->pdf->Cell(10, 10, 'Pasajero: '.$pasajero,0,1);
        $this->pdf->Cell(10, 10, 'Partida: '.$partida,0,1);
        $this->pdf->Cell(10, 10, 'Llegada: '.$llegada,0,1);
        $this->pdf->Cell(10, 10, 'Clase: '.$clase,0,1);
        $this->pdf->Cell(10, 10, 'Precio: '.$precio,0,1);
        $this->pdf->Cell(10, 10, 'Fecha: '.$fecha,0,1);
        $this->pdf->line("1000","140","0","140");
        //$this->pdf->Cell(80, 50, $this->qr->crearQr($contenidoQr),0,1);


        $this->pdf->Output("","comprobanteVuelo");
    }


}

