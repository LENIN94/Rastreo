<?php 
if (! defined('BASEPATH')) exit('No direct script access allowed');
require('fpdf.php');
class pdfrpt extends FPDF
{
  // Extend FPDF using this class
  // More at fpdf.org -> Tutorials
  function __construct($orientation='P', $unit='mm', $size='Letter')
  {
    // Call parent constructor
    parent::__construct($orientation,$unit,$size);
  }

  public function Header(){


        $this->Image('images/logo.jpg',10,8,'','','','http://ashe.com.mx/');
        $this->SetFont('Arial','B',14);
        $this->Text(80,14,utf8_decode('Grupo ASHE S.A. DE C.V.'),5,'C', 0);
        $this->SetFont('Arial','',10);
    
        /*$this->Text(35,20,utf8_decode('Reparación, Mantenimiento, Cotización de equipos de cómputo. Venta y Asesoría de CONTPAQi'),5,'C', 0);
        $this->Text(60,24,utf8_decode(' ESET NOD 32,Instalación de CCTV, Telefonía IP y Análoga.'),5,'C', 0);
        $this->Ln(5);
        $this->Text(95,30,'OFICINA',5,'C', 0);
        $this->Text(80,34,'AV. ALFONSO REYES #400',5,'C', 0);
        $this->Text(65,38,'COL. REGINA - C.P.64290 MONTERREY, N.L.',5,'C', 0);
        $this->Text(60,42,'TELS. 8214-0460, 1477-7923, 1052-4579, 8331-2080',5,'C', 0);*/

        $this->Ln(30);
        //Colores de los bordes, fondo y texto
        $this->SetDrawColor(0,80,180);
        $this->SetFillColor(230,230,0);
        $this->SetTextColor(220,50,50);
        //Ancho del borde (1 mm)
        $this->SetLineWidth(1);
    }
    // El pie del pdf
    public function Footer(){
   $this->SetY(-20);
        $this->SetFont('Arial','B',8);
     //   $this->Cell(140,-5,'TECNOCOM www.tecnocom.com.mx',0,0,'P');
      //  $this->Cell(100,-5,'Email: servicio@tecnocom.com.mx',0,0,'P');
    }

    var $widths;
    var $aligns;

    function SetWidths($w)
    {
        $this->widths=$w;
    }

    function SetAligns($a)
    {
        $this->aligns=$a;
    }

//Tabla coloreada
    function FancyTable($header2)
    {
        //Colores, ancho de línea y fuente en negrita
        //$this->SetFillColor(255,0,0);
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(255);
//	$this->SetDrawColor(128,0,0);
        $this->SetDrawColor(224,235,255);
        $this->SetLineWidth(.2);
        $this->SetFont('','');
        //Cabecera
        $w=array(12, 40, 30, 60, 40,30,30);
        for($i=0;$i<count($header2);$i++)
            $this->Cell($w[$i],7,$header2[$i],1,0,'C',1);
        $this->Ln();
        //Restauración de colores y fuentes
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetDrawColor(224,235,255);
        $this->SetLineWidth(.2);
        $this->SetFont('');
        //Datos

        $fill=false;
    }

    function Row($data)
    {
        $nb=0;
        for($i=0;$i<count($data);$i++)
            $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
        $h=4*$nb;
        $this->CheckPageBreak($h);
        for($i=0;$i<count($data);$i++)
        {
            $w=$this->widths[$i];
            $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
            $x=$this->GetX();
            $y=$this->GetY();
            $this->Rect($x,$y,$w,$h);
            $this->MultiCell($w,4,$data[$i],0,$a);
            $this->SetXY($x+$w,$y);
        }
        $this->Ln($h);
    }

    function CheckPageBreak($h)
    {
        if($this->GetY()+$h>$this->PageBreakTrigger)
            $this->AddPage($this->CurOrientation);
        //$this->Header('Clave', 'Nombre', 'R.F.C.', 'Dirección', 'Teléfonos', 'Responsable', 'Email');
    }

    function NbLines($w,$txt)
    {
        $cw=&$this->CurrentFont['cw'];
        if($w==0)
            $w=$this->w-$this->rMargin-$this->x;
        $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
        $s=str_replace("\r",'',$txt);
        $nb=strlen($s);
        if($nb>0 and $s[$nb-1]=="\n")
            $nb--;
        $sep=-1;
        $i=0;
        $j=0;
        $l=0;
        $nl=1;
        while($i<$nb)
        {
            $c=$s[$i];
            if($c=="\n")
            {
                $i++;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
                continue;
            }
            if($c==' ')
                $sep=$i;
            $l+=$cw[$c];

            if($l>$wmax)
            {
                if($sep==-1)
                {
                    if($i==$j)
                        $i++;
                }
                else
                    $i=$sep+1;
                $sep=-1;
                $j=$i;
                $l=0;
                $nl++;
            }
            else
                $i++;
        }
        return $nl;
    }

    function tittle()
    {
        global $title;

        //Arial bold 15
        $this->SetFont('Arial','B',15);
        //Calculamos ancho y posición del título.
        $w=$this->GetStringWidth($title)+6;
        $this->SetX((210-$w)/2);
        //Colores de los bordes, fondo y texto
        $this->SetDrawColor(0,80,180);
        $this->SetFillColor(230,230,0);
        $this->SetTextColor(220,50,50);
        //Ancho del borde (1 mm)
        $this->SetLineWidth(1);
        //Título
        $this->Cell($w,9,$title,1,1,'C',true);
        //Salto de línea
        $this->Ln(10);
    }
}
