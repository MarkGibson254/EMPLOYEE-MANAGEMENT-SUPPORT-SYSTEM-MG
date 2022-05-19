<?php
$id = (isset($_GET['id']) ? $_GET['id'] : '');
ob_start();
require('FPDF/fpdf.php');
require_once ('dbh.php');
$id = (isset($_GET['id']) ? $_GET['id'] : '');
class PDF extends FPDF
{


// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
if(isset($_POST['report'])){
    class MG extends FPDF
    {
        function Header()
        {
            $this->image('logo.jpg',10,6,30);
            $this->SetFont('Arial','B',15);
            $this->Cell(80);
            $this->Cell(80,10,'LEAVE REPORT',1,0,'C');            
            $this->Ln(20);
        }
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial','I',8);
            $this->Cell(80,10,'Prepared By: Mark Gibson ',0,0,'C');
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
            
        }
    }
    $pdf = new MG('P','mm','A3');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',10);
    $pdf->SetTextColor(85, 53, 20);
    $pdf->SetFillColor(182, 145, 107);
    $pdf->Cell(40,10,'Leave Report',0,1,'C');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(10,10,'ID',1,0,'C');
    $pdf->Cell(40,10,'Name',1,0,'C');
    $pdf->Cell(40,10,'Start Date',1,0,'C');
    $pdf->Cell(40,10,'End Date',1,0,'C');
    $pdf->Cell(10,10,'T.Days',1,0,'C');
    $pdf->Cell(60,10,'Reason',1,0,'C');
    $pdf->Cell(30,10,'Status',1,0,'C');
    $pdf->Cell(50,10,'M.Comments',1,0,'C');
    $pdf->Ln();
    
    $sql = "SELECT employee.id, employee.firstName, employee.lastName, leave_process.start, leave_process.end, leave_process.reason, leave_process.status,leave_process.Areason, leave_process.token FROM employee, leave_process WHERE employee.id = $id order by leave_process.token";
    $result = mysqli_query($conn, $sql);
    foreach($result as $row){
        $pdf->Ln();
        $pdf->Cell(10,10,$row['id'],1,0,'C');
        $pdf->Cell(40,10,$row['firstName'].' '.$row['lastName'],1,0,'C');
        $pdf->Cell(40,10,$row['start'],1,0,'C');
        $pdf->Cell(40,10,$row['end'],1,0,'C');
        $pdf->Cell(10,10,$interval->days,1,0,'C');
        $pdf->Cell(60,10,$row['reason'],1,0,'C');
        $pdf->Cell(30,10,$row['status'],1,0,'C');
        $pdf->Cell(50,10,$row['Areason'],1,0,'C');
        $pdf->Ln();

    }
    $pdf->Ln(20);
    $pdf->Cell(0,10,'Abbreviations ',0,0,'L');
    $pdf->Ln();
    $pdf->Cell(0,10,'ID: EMployee ID',0,0,'l');
    $pdf->Ln();
    $pdf->Cell(0,10,'Name: Employee Name',0,0,'l');
    $pdf->Ln();
    $pdf->Cell(0,10,'Start Date: Start Date of Leave',0,0,'l');
    $pdf->Ln();
    $pdf->Cell(0,10,'End Date: End Date of Leave',0,0,'l');
    $pdf->Ln();
    $pdf->Cell(0,10,'T.Days: Total Days of Leave',0,0,'l');
    $pdf->Ln();
    $pdf->Cell(0,10,'Reason: Reason for Leave',0,0,'l');
    $pdf->Ln();
    $pdf->Cell(0,10,'Status: Status of Leave',0,0,'l');
    $pdf->Ln();
    $pdf->Cell(0,10,'M.Comments: Manager Comments',0,0,'l');
    $pdf->Ln();
    ob_end_clean(); // Clean any content of the output buffer
    $pdf->Output();
}
?>