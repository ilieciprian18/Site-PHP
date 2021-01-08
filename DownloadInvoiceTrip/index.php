<?php

session_start();
require_once("config.php");
$username=$_SESSION['username'];
$location=$_SESSION['location'];
$day=$_SESSION['day'];
$month=$_SESSION['month'];
$sql = "SELECT * FROM reservation_excursie WHERE username_customer = '".$username."' AND location='".$location."' AND date_day='".$day."' AND date_month='".$month."' ";
$result = mysqli_query($conn,$sql);

$sqll = "SELECT * FROM users WHERE username = '".$username."'";
$resultt = mysqli_query($conn,$sqll);
$rot = mysqli_fetch_assoc($resultt);


$sqlll = "SELECT * FROM reservation_excursie WHERE username_customer = '".$username."' AND location='".$location."' AND date_day='".$day."' AND date_month='".$month."' ";
$resulttt=mysqli_query($conn,$sqlll);

$name =$rot['lname'] . ' ' . $rot['fname'];
$email=$rot['email'];
$total= 0;

require ('fpdf.php');
//require('html_table.php');
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14.5);
//prima e margine stanga;a doua margine sus;a treia dimensiune
//image
$pdf->Image('logo.png',145,35,0);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(0,10,'H  O  T  E  L     R  E  S  E  R  V  A  T  I  O  N',0,2,'C',true);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Times','B',15);
$pdf->Cell(0,20,"name:$name",0,0);
$pdf->Ln(15);
$pdf->Cell(0,0,"email:$email",0,0);
$pdf->Ln(6);
$pdf->Cell(0,0,"Reservation Realised on travelix site",0,0);
$pdf->Ln(6);
$pdf->Cell(0,0,"Travelix assistence:0724456744",0,2);
$pdf->Ln(20);
$pdf->SetFont('Times','B',20);
$pdf->Cell(0,0,"Payment Status:",0,1);
$pdf->Cell(0,15,"Not Paid/Awaiting Payment",0,0);
$pdf->SetFont('Times','',18);
$pdf->Cell(-58.5,0,"Invoice #",0,2,'R');
{
while ($roww = mysqli_fetch_assoc($resulttt))
                    {
                    $id = $id . $roww['id'];
                    $total = $total + $roww["total"];
                    }
$pdf->Cell(0,0,"#$id",0,2,'R');
}
$pdf->Cell(-35,15,"Reservation Status",0,2,'R');
$pdf->Cell(0,-15,"Confirmed",0,2,'R');
$pdf->Cell(-50,33,"Amount Due",0,2,'R');
$pdf->Cell(0,-33,"$$total",0,1,'R');
//liniile verticale
$pdf->Line(200.5,88,200.5,60);
$pdf->Line(115,88,115,60);
//linii orizontale
$pdf->Line(200.5,88,115,88);
$pdf->Line(200.5,60,115,60);
//linie mij tabel verticale
$pdf->Line(167,88,167,60);
//linie mij tabele orizontale
$pdf->Line(200.5,71,115,71);
$pdf->Line(200.5,79,115,79);


//---------------------------------
//html table
$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(232,232,232);
//rgb(208,208,208)
$pdf->Ln(40);
//empty cells pentru design
$pdf->Cell(36,5,'','TLR',0,'L',true);   // empty cell with left,top, and right borders
$pdf->Cell(25,5,'','TLR',0,'L',true);
$pdf->Cell(32,5,'','TLR',0,'L',true);
$pdf->Cell(38,5,'','TLR',0,'L',true);
$pdf->Cell(35,5,'','TLR',0,'L',true);
$pdf->Cell(24,5,'','TLR',1,'L',true);

//-----------
$pdf->Cell(36,5,'Reservation Date','LR',0,'L',true);   
$pdf->Cell(25,5,'  Location','LR',0,'L',true);
$pdf->Cell(32,5,'Transport (y/n)','LR',0,'L',true);
$pdf->Cell(38,5,'Price (per person)','LR',0,'L',true);
$pdf->Cell(35,5,' Number of days','LR',0,'L',true);
$pdf->Cell(24,5,'     Price','LR',1,'L',true);  
//inca un rand de empty cells de design
$pdf->Cell(36,5,'','LRB',0,'L',true);   // empty cell with left,top, and right borders
$pdf->Cell(25,5,'','LRB',0,'L',true);
$pdf->Cell(32,5,'','LRB',0,'L',true);
$pdf->Cell(38,5,'','LRB',0,'L',true);
$pdf->Cell(35,5,'','LRB',0,'L',true);
$pdf->Cell(24,5,'','LRB',1,'L',true);
//-------
//aici vine while insert data din php
while ($row = mysqli_fetch_assoc($result))
{
$pretunitate = $row['total'] / $row['persons'];
$date=$row['date_day'] . '.' . $row['date_month'];
$hotel_name=$row['location'];
$number_days = $row['persons'];
$room= $row['room'];
$afis=$row['total'];
$pdf->Cell(36,5,"$date",'L',0,'C',false);   // empty cell with left,top, and right borders
$pdf->Cell(25,5,"$hotel_name",'',0,'C',false);
$pdf->Cell(32,5,"Yes",'',0,'C',false);
$pdf->Cell(38,5,"$$pretunitate",'',0,'C',false);
$pdf->Cell(35,5,"$number_days",'',0,'C',false);
$pdf->Cell(24,5,"$$afis",'R',1,'C',false);
}
//aici e partea cu totalu
//-----------------
$pdf->Cell(36,5,'','LB',0,'L',false);   // empty cell with left,top, and right borders
$pdf->Cell(39,5,'','B',0,'L',false);
$pdf->Cell(18,5,'','B',0,'L',false);
$pdf->Cell(25,5,'','LTB',0,'L',false);
$pdf->Cell(48,5,'                     Total','BT',0,'L',false);
$pdf->Cell(24,5,"$$total",'RBT',1,'C',false);
//aici se termina
//---
$pdf->SetFont('Arial','',10);
$pdf->Ln(8);
$pdf->Cell(200,5,"T  E  R  M  S",'',1,'C',false);
$pdf->Ln(2);
$pdf->SetFont('Arial','',8);
$pdf->Cell(200,5,"This is only a reservation, the payment should be made at a Travelix Location or online.Travelix reserves their right to choose their clients.",'',1,'C',false);

$pdf->Cell(200,3,"For any wrong data please contact Travelix Staff by sending an ticket",'',1,'C',false);
//For any wrong data please contact Travelix Staff by sedning an ticket
/*$html='<table border="1">
<tr>
<td width="200" height="30">cell 1</td><td width="200" height="30" bgcolor="#D0D0FF">cell 2</td>
</tr>
<tr>
<td width="200" height="30">cell 3</td><td width="200" height="30">cell 4</td>
</tr>
</table>';
*/
//$pdf->WriteHTML($html);
//$pdf->WriteHTML('You can<br><p align="center">center a line</p>and add a horizontal rule:<br><hr>');

$pdf->output('TripReservation.pdf','D');
//$pdf->output();
echo "da";





?>