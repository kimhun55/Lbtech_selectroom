<?php
//---------------เรียกไฟล์ของระบบ pdf------------------------------------
include ('adodb/adodb.inc.php');
define('FPDF_FONTPATH','fpdf/font/');
require ('fpdf/jpdf.inc.php');
require('fpdf/html_table.php');
//-----------------เรียกไฟล์ของระบบงานเรา-----------------------------------
include("connect/connect.php");
include("connect/sqlQuery.php");
//----------------เรียกใช้คลาส PDF_HTML_Table ในไฟล์ html_table---------
$pdf=new JPDF();
$pdf->AddFont('angsana','B','angsanab.php');
$pdf->AddFont('angsana','','angsana.php');


$pdf->Open();
$pdf->SetMargins(6,1,5); // SetMargins(float left, float top [, float right])
$pdf->rm="หมายเหตุ สำหรับใช้ชั่วคราว - 10 มิถุนายน 2558";
//$pdf->tp=$tp;
$pdf->AliasNbPages('rm');
$pdf->AddPage('p', 'A4');

//--------------------------------------------------------------
	$dNow1 = displayDate(date("d/m/Y"));
	$bSelect=$_REQUEST['branchId'];
	//echo "==>".$bSelect;
	$navi = "?na=canPer1";
		$queryGroup = select_where("*","tblgroup_id","major_id='$bSelect' "); 
		//echo $queryGroup;
		$num_group = mysql_num_rows($queryGroup);
		//echo $num_group;
		//exit();
		for($x=0; $x<$num_group; $x++){
			$rsGroup=mysql_fetch_array($queryGroup);
			$group_id = $rsGroup['group_id'];
			$group_name = $rsGroup['group_name'];
			$branch_id = $rsGroup['branch_id']; 
			$branch_name = $rsGroup['branch_name']; 
			$major_id = $rsGroup['major_id']; 
			$major_name = $rsGroup['major_name']; 
			$level_id = $rsGroup['level_id']; 
			$level_name = $rsGroup['level_name']; 
			$course_id = $rsGroup['course_id']; 
			$course_name = $rsGroup['course_name']; 
			$teacher_fname = $rsGroup['teacher_fname'];
			$teacher_lname = $rsGroup['teacher_lname'];
				   
					$pNo++; //นับจำนวนหน้าไว้เป็นเงื่อนไขการขึ้นหน้าใหม่
					
/*
					// พิมพ์ข้อความลงเอกสาร-------------หัวตารางของแต่ละหน้า-----------------------------------
					$pdf->SetFont('angsana','B',18);
					$pdf->Cell( 0  , 5 , utf8_to_tis620( 'วิทยาลัยเทคนิคลพบุรี' ) , 0 , 1 , 'C' );
					$pdf->SetFont('angsana','',16);
					$pdf->Cell( 0  ,7 , utf8_to_tis620( 'บัญชีรายชื่อผู้มีสิทธิ์สอบประเมินความรู้และความถนัดทางวิชาชีพ') , 0 , 1 , 'C' );
					$pdf->Cell( 0  ,7 , utf8_to_tis620( 'สถานที่สอบ '.$roomSchool.'   อาคาร'.$BuildingName.' ชั้นที่ '. $roomClass  ) , 0 , 1 , 'C' );
					$pdf->Cell( 0  ,7 , utf8_to_tis620( 'สาขาที่เลือกเพื่อเข้าศึกษาต่อ ประจำปีการศึกษา 2557 ระดับ ปวช. ประเภทวิชา '. $typeOfCourse.'    ห้องประเมินฯที่ '.$roomId ) , 0 , 1 , 'C' );
				*/	
					 //--------ตั้งค่าความกว้าง/ความสูง------------------
					 $headH=5;
					 $contentH=7.7;//ความสูงของช่อง รายชื่อ
					  $contentH1=33;
					 $Line2H=62;
					 $pdf->SetFont('angsana','',13.5);
				
					// พิมพ์ข้อความลงเอกสาร  มีกรอบด้วย
					$pdf->SetDrawColor(128, 128, 128); 
					$pdf->SetFillColor(230, 230, 230); 
					$pdf->Rect(5, 38, 198.5, 7 , "DF");  //สี่เหลี่ยมตรงหัวข้อตาราง
					/**/
					$pdf->SetXY(5,5);
					
					//$pdf->Cell(10,$contentH1,iconv("UTF-8","TIS-620",""),1,0,'C');
					//$pdf->Cell(25,$contentH1,iconv("UTF-8","TIS-620",""),1,0,'C');
					$pdf->Cell(83,$contentH1,iconv("UTF-8","TIS-620",""),1,0,'L');

					$pdf->Cell(10,0,iconv("UTF-8","TIS-620",""),0,1,'L');
					$pdf->Cell(10,5.5,iconv("UTF-8","TIS-620","รหัส___________________หน่วยกิต____________"),0,1,'L');
					$pdf->Cell(10,5.5,iconv("UTF-8","TIS-620","ชื่อวิชา_____________________________________"),0,1,'L');
					$pdf->Cell(20,5.5,iconv("UTF-8","TIS-620","ปีการศึกษา_____/2558"),0,1,'L');
					$pdf->Cell(20,5.5,iconv("UTF-8","TIS-620","ระดับ ". $level_name."  สาขางาน ".$branch_name." กลุ่ม ".$group_name),0,1,'L');
					$pdf->Cell(20,5.5,iconv("UTF-8","TIS-620","ชื่อครูผู้สอน ________________________________"),0,1,'L');
					$pdf->Cell(20,5.5,iconv("UTF-8","TIS-620","ครูที่ปรึกษา    ".$teacher_fname." ".$teacher_lname),0,0,'L');
					$pdf->SetXY(88,5);
					$pdf->SetFont('angsana','B',13);
					$pdf->Cell(115.5,10,iconv("UTF-8","TIS-620",""),1,1,''); // กรอบสี่เหลี่ยมมุมบนขวามือ
					$pdf->SetXY(7,5);
					$pdf->Cell(285,5.5,iconv("UTF-8","TIS-620","วิทยาลัยเทคนิคลพบุรี"),0,1,'C');
					$pdf->SetFont('angsana','',11);
					$pdf->Cell(287,4.5,iconv("UTF-8","TIS-620","หลักฐานการบันทึกเวลาเรียน"),0,1,'C');
					//จำนวนสัปห์ดา
					$contentHday=6;
					$pdf->SetXY(88,15);
					for($i=0; $i<18; $i++){
						$pdf->Cell($contentHday,5,iconv("UTF-8","TIS-620","".($i+1)),1,0,'C');
					}
					
					$pdf->Cell(7.4,261,iconv("UTF-8","TIS-620",""),1,0,'C');//ความยาวรวมช่องขาดเรียน
					//$pdf->Cell(7.4,27,iconv("UTF-8","TIS-620","รวมเวลาเรียน"),0,0,'C');
					

					//ช่องเชคขาด
					$contentWck=3;
					$contentHck=256;//22
					$pdf->SetXY(88,20);
					for($i=0; $i<36; $i++){
						$pdf->Cell($contentWck,$contentHck,iconv("UTF-8","TIS-620",""),1,0,'C');
					}
					$pdf->Ln();
					
					$pdf->SetXY(5,38);
					$pdf->SetFont('angsana','',13.5);
					$pdf->Cell(8,7,iconv("UTF-8","TIS-620","ลำดับ"),1,0,'C');
					$pdf->Cell(20,7,iconv("UTF-8","TIS-620","รหัสประจำตัว"),1,0,'C');
					$pdf->Cell(55,7,iconv("UTF-8","TIS-620","ชื่อ - นามสกุล"),1,0,'C');
					$pdf->Cell(108,7,iconv("UTF-8","TIS-620",""),'LB',0,'C');//เส้นแนวนอน
					//$pdf->SetXY(3,90);
					$pdf->Cell(7.5,7,iconv("UTF-8","TIS-620","คาบ"),1,0,'C');
					
					//$pdf->SetXY(215,108);
					$pdf->Image("total-hour.jpg",197,16,5.5,21.5);//รายเซ็น boss ,ระยะรูปห่างจากขอบบัตร,ระยะรูปห่างจากขอบบน,ความกว้างของรูป,ความสูงของรูป
					//$pdf->Cell(55,5,iconv("UTF-8","TIS-620","สาขาอันดับ 2"),1,1,'C');
					
					$pdf->SetXY(50,40);
					$pdf->Cell(30,$contentH1,iconv("UTF-8","TIS-620",""),0,0,'C');
					$pdf->Cell(25,$contentH1,iconv("UTF-8","TIS-620",""),0,1,'C');	
					/*
					//$pdf->Cell(20,14,iconv("UTF-8","TIS-620","J"),1,0,'C');
					$pdf->Ln();
					//---------วันที่รับสมัคร--------------------------------------------------------
					$pdf->SetXY(102,57);
					$pdf->Cell(16,10,iconv("UTF-8","TIS-620","ชาย"),1,0,'C');
					$pdf->Cell(15,10,iconv("UTF-8","TIS-620","หญิง"),1,1,'C');
					*/	
					//------------- สิ้นสุดหัวตาราง-----------------------------------------------
					
					 //----------- หาสาขาของปวช.-------------------------------
	
					$n=0; $yCon = 45;
					$condition=" group_id='$group_id' order  by student_id ";
					 $queryCan = select_where("*", "tblstudent_idcard", $condition ); 
					 for ($i=0; $i<30; $i++){
					 //while($rsCan = mysql_fetch_array($queryCan)){
						 	$rsCan = mysql_fetch_array($queryCan);
							$Page_Start++;
							$student_id = $rsCan['student_id'];
							$prefix_id_th = $rsCan['prefix_id_th'];
							$stu_fname_th = $rsCan['stu_fname_th'];
							$stu_lname_th = $rsCan['stu_lname_th'];

							$pdf->SetXY(5,$yCon);
							$pdf->SetFont('angsana','',15);		// ขนาด font รายชื่อ			
							$pdf->Cell( 8, $contentH , utf8_to_tis620(''.$Page_Start), 'LB' , 0 , 'C'); //ที่
							$pdf->Cell( 20  , $contentH , utf8_to_tis620($student_id), 'LB', 0, 'C'); //รหัสประจำตัวสอบ
							$pdf->Cell( 30 , $contentH , utf8_to_tis620($prefix_id_th .$stu_fname_th), 'LB' , 0 , 'L'); //ชื่อ-นามสกุล
							$pdf->Cell( 25 , $contentH , utf8_to_tis620($stu_lname_th), 'RB' , 0 , 'L'); //ชื่อ-นามสกุล
							$pdf->SetFont('angsana','',13);	
							$pdf->Cell( 115  , $contentH , utf8_to_tis620(''.$branch1Show1), 'LB' , 0 , 'L'); //เส้นแนวนอน ขั้นระหว่างรายชื่อ
							//$pdf->Cell( 55  , $contentH , utf8_to_tis620(''.$branch2Show), 1 , 1 , 'L'); //สาขา2
							$yCon+=$contentH;
					 } //end while $rsCan
					 if($x<($num_group-1)){
							 $Page_Start=0;
							 $pdf->Open();
								$pdf->AliasNbPages();
								$pdf->SetMargins(10,1,5);
								$pdf->AddPage();
					 }
		} //end while
			////////////////////////// ขึ้นหน้าใหม่ ///////////////////////////////
					
$pdf->Output("test1.pdf", I);
?>
        