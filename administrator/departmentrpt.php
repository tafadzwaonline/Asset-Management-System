<?php
//include config
require('../func/config.php');

require('../fpdf/fpdf.php');


class PDF extends FPDF {

  function Header() {}
  function Footer() {
    // Go to 1.5 cm from bottom
        $this->SetY(-15);
        // Select Arial italic 8
        $this->SetFont('Arial','I',8);
        // Print centered page number
       // $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
  }
}

//$orderID = ;
$DateAdded = $_GET['date'];

$originalDate = $DateAdded;
$newDate = date("d-m-Y", strtotime($originalDate));
//insert these results to an array
$tt = 0;
$k = 1;


//********************************IMPORTANT*********************************
//$pdf = new FPDF();
//$pdf->AddPage(); //output in potrait format
//OR with settings : FPDF('orientation','unit','size');
//Orientation -- P or Portrait & L or Landscape
//Unit --pt: point, mm: millimeter, cm: centimeter, in: inch
//Size -- A3, A4, A5, Letter, Legal
$pdf = new PDF('L','mm','A4'); //with page settings
$pdf->AddPage();//output's this page in landscape

//********************************IMPORTANT*********************************


//***********Image Stuff*******************

//$pdf->Image('path/to/image',padding-->,paddingTop,zoomInOut);
$pdf->Image('../assets/images/county/wadi.png',125,25,60);

//******END OF IMAGE ISHT*********************

//********************INVENTORY TITLE*************************************

    // The cell width and height. If you omit the width then the cell stretches to the right margin. If you omit the height then it defaults to zero.
    // The string of text to print. Defaults to ''.
    // Whether to draw a border around the cell. This can be either a number (0=no border, 1=border), or a string containing 1 or more of the following: 'L' (left), 'T' (top), 'R' (right), and 'B' (bottom). Default: 0.
    // Where to place the current position after drawing the cell. Values can be 0 (to the right), 1 (to the start of the next line), or 2 (below). Default: 0.
    // The text alignment. Possible values are 'L' (left align), 'C' (centre), or 'R' (right align). Default: 'L'.
    // Whether the cell background should be filled with colour. true = filled, false = transparent. Default: false.
    // A URL to link to. If specified, turns the text cell into a link.

 $pdf->SetFont('Arial','B',24);
 $pdf->Cell(0,85,"Departments Report",0,0, "C");
 //******************END TITLE************************************************

//********************TITLE TWO***********************************************
 $pdf->Ln();
 $pdf->SetFont('Arial','B',16);
 $pdf->Cell(0,-65,"Department Report For An Office Carried Out On $newDate ",0,0, "C");
//*********************END TITLE TWO******************************************

//********************CREATE TABLE HERE***************************************
// Headers and widths
 $pdf->SetFillColor(220,220,220);
 // $pdf->SetFillColor(220,220,220); ---Gainsboro, awesome grey -drker
 //(245,245,245)------Whitesmoke -light--for borers
 $pdf->SetTextColor(0,0,0);
 $pdf->SetFont('Arial','B',11);
 $pdf->Ln();

 $pdf->SetY(70);

 $x = $pdf->GetX();
 $y = $pdf->GetY();
 $i= 0 ;

 $header = array("DepartmentId","DepartmentName","ParentOffice");
 $w = array(38,35,35,30,32,35,35,38);

 $pdf->SetX(10);
  for($i = 0; $i < count($header); $i++) {
    $pdf->Cell($w[$i], 6, $header[$i], 1, 0, 'C');
  }
 $pdf->Ln();
//****************TABLE HEADER SET HERE**********************************************

//******************TABLE BODY******************************************************
//fetch db values
 $stmt = $db->prepare('SELECT DepartmentId, DepartmentName, ParentOffice FROM officedepartments WHERE DateAdded = :DateAdded');
 $stmt->execute(array('DateAdded' => $DateAdded));
 while($row=$stmt->fetch(PDO::FETCH_ASSOC))
 {
   $DepartmentId = $row['DepartmentId'];
   $DepartmentName = $row['DepartmentName'];
   $ParentOffice= $row['ParentOffice'];
  
   $data[] = array($DepartmentId,$DepartmentName,$ParentOffice);

   $k++;
 }
 ///for each loop
 foreach($data as $row){
  $pdf->SetFillColor(245,248,209);
  $pdf->SetFont('Arial','',9);

  $yH = 7;

  $pdf->SetX(10);
  $pdf->Cell($w[0], $yH, $row[0], 'LRB', 0, 'L');
  $pdf->Cell($w[1], $yH, $row[1], 'LRB', 0, 'c');
  $pdf->Cell($w[2], $yH, $row[2], 'LRB', 0, 'C');
 
  

  $pdf->Ln();
}

//*************************END TABLE**************************************************

$pdf->AliasNbPages();

//********************************IMPORTANT*********************************
$pdf->Output();//display this pdf

//PDF output settings
//I: to the browser.
//D: force a file download
//F: save to a local file
//S: return the document as a string. name is ignored.
//$pdf->Output('sara.pdf', 'D'); //force download file

?>
