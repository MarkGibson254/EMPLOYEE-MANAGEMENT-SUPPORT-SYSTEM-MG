<?php
ob_start();
require('FPDF/fpdf.php');
require_once ('dbh.php');
if(isset($_POST['report'])){
    class MG extends FPDF
    {
        function Header()
        {
            require 'C:/xampp/htdocs/@project/dbh.php';
            $id = $_POST['id'];
            $sql = "SELECT * FROM employee WHERE id = $id";
            $result = mysqli_query($conn, $sql);
            if($result){
                while($res = mysqli_fetch_assoc($result)){
                    $firstname = $res['firstName'];
                    $lastname = $res['lastName'];
                    $pic = $res['pic'];
                    
                    
                    
            
            $this->SetFont('Arial','B',15);
            $this->Cell(80);
            $this->Cell(140,10,'EMPLOYEE MANAGEMENT SUPPORT SYSTEM',1,0,'C');
            $this->image('logo.jpg',140,20,30,30);
            $this->Ln(70);
            $this->image('C:\xampp\htdocs\@project\ADMIN/images/'.$pic,10,60,30,30);
            $this->Cell(80);
            $this->Cell(90,10,'LEAVE REPORT',1,0,'C'); 
            $this->Ln(20);
            $this->Cell(150,10,'Name: '.$firstname.' '.$lastname,1,0,'C');
            $this->Cell(130,10,'ID: '.$id,1,0,'C');       
            $this->Ln(20);
                }
            }   
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
    //set line height. This is the height of each lines, not rows.
    $pdf->SetLineWidth(0.5);
    $pdf->SetFillColor(182, 145, 107);
    $pdf->Cell(40,10,'My Leaves',0,1,'C');
    $pdf->SetFont('Arial','B',10);
    $pdf->Cell(40,10,'Start Date',1,0,'C');
    $pdf->Cell(40,10,'End Date',1,0,'C');
    $pdf->Cell(30,10,'T.Days',1,0,'C');
    $pdf->Cell(60,10,'Reason',1,0,'C');
    $pdf->Cell(30,10,'Status',1,0,'C');
    $pdf->Cell(50,10,'M.Comments',1,0,'C');
    $pdf->Ln();
    $id = $_POST['id'];
    $sql = "Select employee.id, employee.firstName, employee.lastName, leave_process.start, leave_process.end, leave_process.reason, leave_process.status,leave_process.Areason From employee, leave_process Where employee.id = $id and leave_process.id = $id order by leave_process.token";
    $result = mysqli_query($conn, $sql);
    foreach($result as $row){
        $date1 = new DateTime($row['start']);
			$date2 = new DateTime($row['end']);
			$interval = $date1->diff($date2);
			$interval = $date1->diff($date2);
				
        
        $pdf->Cell(40,10,$row['start'],1,0,'C');
        $pdf->Cell(40,10,$row['end'],1,0,'C');
        $pdf->Cell(30,10,$interval->days,1,0,'C');
        $pdf->Cell(60,10,$row['reason'],1,0,'C');
        $pdf->Cell(30,10,$row['status'],1,0,'C');
        $pdf->MultiCell(50,10,$row['Areason'],1,0,'C');
        $pdf->Ln();

        }
    
    
    $pdf->Ln(20);
    $pdf->Cell(0,10,'Abbreviations ',0,0,'L');
    $pdf->Ln();
    $pdf->Cell(0,10,'Start Date: Start Date of Leave',0,0,'l');
    $pdf->Ln();
    $pdf->Cell(0,10,'End Date: End Date of Leave',0,0,'l');
    $pdf->Ln();
    $pdf->Cell(0,10,'T.Days: Total Days of Leave',0,0,'l');
    $pdf->Ln();
    $pdf->Cell(0,10,'Reason: Reason for Leave',0,0,'l');
    $pdf->Ln();
    $pdf->Cell(0,10,'Status: Status of the Leave',0,0,'l');
    $pdf->Ln();
    $pdf->Cell(0,10,'M.Comments: Manager Comments',0,0,'l');
    $pdf->Ln();
    ob_end_clean(); // Clean any content of the output buffer
    $pdf->Output();
}
    









?>