<?php 
if (! defined('BASEPATH')) exit('No direct script access allowed');
require('fpdf.php');
class Pdf extends FPDF
{
  // Extend FPDF using this class
  // More at fpdf.org -> Tutorials
  function __construct($orientation='L', $unit='mm', $size='a6')
  {
    // Call parent constructor
    parent::__construct($orientation,$unit,$size);
  }

   public function Header(){
        $this->Image('images/logo.jpg',5,2,'','','','http://ashe.com.mx/');
        $this->SetFont('Helvetica','',16);
        //$this->Text(35,10,utf8_decode('Ticket de Servicio'),2,'C', 0);
        $this->Text(95,20,'',2,'C', 0);
        $this->Ln(5);

    }
    // El pie del pdf
    public function Footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        $this->Cell(50,5,'www.tecnocom.mx',0,0,'L');
        $this->Cell(55,5,'Email: info@tecnocom.mx',0,0,'L');

    }
}
