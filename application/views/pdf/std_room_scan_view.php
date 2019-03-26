<?php
//----------------เรียกใช้คลาส PDF_HTML_Table ในไฟล์ html_table---------
/*$pdf=new JPDF();*/
//$pdf->AddFont('angsana','B','angsanab.php');
//$pdf->AddFont('angsana','','angsana.php');

$this->pdf->AddFont('angsana','B');
$this->pdf->AddFont('angsana','');


//$pdf->Open();
$this->pdf->SetMargins(6,1.5,5); // SetMargins(float left, float top [, float right])
$this->pdf->rm="งานศูนย์ข้อมูล [".date("Y-m-d H:i:s")."]";
//$this->pdf->tp=$tp;
$this->pdf->AliasNbPages('rm');
$this->pdf->AddPage('p', 'A4');
//$this->pdf->AddPage();

//--------------------------------------------------------------
		//$dNow1 = displayDate(date("d/m/Y"));
		$dNow1 = date("d/m/Y");
	//$bSelect=$_REQUEST['branchId'];
	//echo "==>".$bSelect;
	//$navi = "?na=canPer1";
		//$queryGroup = select_where("*","tblgroup_id","major_id='$bSelect' "); 
		//echo $queryGroup;
		//$num_group = mysql_num_rows($queryGroup);

		$num_group = count($data_group);
		//echo $num_group;
		//exit();
		$pNo = 0;
		for($x=0; $x<$num_group; $x++){
			//$rsGroup=mysql_fetch_array($queryGroup);
			$rsGroup = $data_group[$x];
			$group_id = $rsGroup['group_id'];
			$group_name = $rsGroup['group_name'];
			$branch_id = $rsGroup['branch_id']; 
			$branch_name = $rsGroup['branch_name']; 
			$major_id = $rsGroup['major_id']; 
			$major_name = $rsGroup['major_name']; 
			$level_id = $rsGroup['level_id']; 
			$level_name = $rsGroup['level_name']; 
			$course_id = $rsGroup['course_id']; 

					
			if($course_id > 1){
					$course_name = "[".$rsGroup['course']."]"; 
			}else{
					$course_name = '';
			}
			$teacher_fname = $rsGroup['teacher_fname'];
			$teacher_lname = $rsGroup['teacher_lname'];
				   
					$pNo++; //นับจำนวนหน้าไว้เป็นเงื่อนไขการขึ้นหน้าใหม่
					
					//bass
					$count_data_std = count($data_std);
					//$count_data_std = 50;
					if($count_data_std <=30){
						$set_contentH = 7.7;
					}else{
						$set_contentH = 4.62;
					}
					 //--------ตั้งค่าความกว้าง/ความสูง------------------
					 $headH=5;
					 //$contentH=5.8;//ความสูงของช่อง รายชื่อ
					 $contentH=$set_contentH;
					 $contentH1=33;
					 $Line2H=62;
					 $this->pdf->SetFont('angsana','',13.5);
				
					// พิมพ์ข้อความลงเอกสาร  มีกรอบด้วย
					$this->pdf->SetDrawColor(128, 128, 128); 
					$this->pdf->SetFillColor(230, 230, 230); 
					$this->pdf->Rect(5, 38, 198.5, 7 , "DF");  //สี่เหลี่ยมตรงหัวข้อตาราง
					/**/
					$this->pdf->SetXY(5,5);
					
					//$this->pdf->Cell(10,$contentH1,iconv("UTF-8","TIS-620",""),1,0,'C');
					//$this->pdf->Cell(25,$contentH1,iconv("UTF-8","TIS-620",""),1,0,'C');
					//$this->pdf->Cell(83,$contentH1,iconv("UTF-8","TIS-620",""),1,0,'L');

					//$this->pdf->Cell(10,0,iconv("UTF-8","TIS-620",""),0,1,'L');
					//$this->pdf->Cell(10,5.5,iconv("UTF-8","TIS-620","รหัส___________________หน่วยกิต____________"),0,1,'L');
					//$this->pdf->Cell(10,5.5,iconv("UTF-8","TIS-620","ชื่อวิชา_____________________________________"),0,1,'L');
					//$this->pdf->Cell(20,5.5,iconv("UTF-8","TIS-620","ปีการศึกษา_____/2561"),0,1,'L');
					//$this->pdf->Cell(20,5.5,iconv("UTF-8","TIS-620","ระดับ ". $level_name." สาขา".$branch_name." กลุ่ม ".$group_name." ".$course_name),0,1,'L');
					//$this->pdf->Cell(20,5.5,iconv("UTF-8","TIS-620","ชื่อครูผู้สอน ________________________________"),0,1,'L');
					//$this->pdf->Cell(20,5.5,iconv("UTF-8","TIS-620","ครูที่ปรึกษา    ".$teacher_fname." ".$teacher_lname),0,0,'L');
					$this->pdf->SetXY(88,5);
					$this->pdf->SetFont('angsana','B',16);
					//$this->pdf->Cell(115.5,10,iconv("UTF-8","TIS-620",""),1,1,''); // กรอบสี่เหลี่ยมมุมบนขวามือ
					$this->pdf->SetXY(5,5);
					$this->pdf->Cell(200,7,iconv("UTF-8","TIS-620","วิทยาลัยเทคนิคลพบุรี"),0,1,'C');

					$this->pdf->SetFont('angsana','',16);
					$this->pdf->Cell(200,7,iconv("UTF-8","TIS-620","แบบบันทึกการเข้าร่วมกิจกรรมจัดทำฐานข้อมูลสแกนลายนิ้วมือ"),0,1,'C');
					$this->pdf->Cell(200,7,iconv("UTF-8","TIS-620","ระดับ ". $level_name." สาขา".$branch_name." กลุ่ม ".$group_name." ".$course_name),0,1,'C');
					$this->pdf->SetXY(50,25);
					$this->pdf->Cell(115,7,iconv("UTF-8","TIS-620",""),'B',0,'C');//เส้นแนวนอน
					//$this->pdf->Cell(200,7,iconv("UTF-8","TIS-620","******************************************************************************"),0,1,'C');
					$this->pdf->SetXY(88,38);
					$this->pdf->Cell(40,238,iconv("UTF-8","TIS-620",""),1,0,'C');
					$this->pdf->SetXY(128,38);
					$this->pdf->Cell(40,238,iconv("UTF-8","TIS-620",""),1,0,'C');
					$this->pdf->SetXY(168,38);
					$this->pdf->Cell(35.5,238,iconv("UTF-8","TIS-620",""),1,0,'C');
					
					$this->pdf->SetXY(5,38);
					$this->pdf->SetFont('angsana','',13.5);
					$this->pdf->Cell(8,7,iconv("UTF-8","TIS-620","ลำดับ"),1,0,'C');
					$this->pdf->Cell(20,7,iconv("UTF-8","TIS-620","รหัสประจำตัว"),1,0,'C');
					$this->pdf->Cell(55,7,iconv("UTF-8","TIS-620","ชื่อ - นามสกุล"),1,0,'C');
					$this->pdf->Cell(40,7,iconv("UTF-8","TIS-620","สแกนลายนิ้วมือ"),1,0,'C');
					$this->pdf->Cell(40,7,iconv("UTF-8","TIS-620","ทำบัตรประจำตัว นศ."),1,0,'C');
					$this->pdf->Cell(35.5,7,iconv("UTF-8","TIS-620","หมายเหตุ"),1,0,'C');
					//$this->pdf->Cell(108,7,iconv("UTF-8","TIS-620",""),'LB',0,'C');//เส้นแนวนอน
					//$this->pdf->SetXY(3,90);
					//$this->pdf->Cell(7.5,7,iconv("UTF-8","TIS-620","คาบ"),1,0,'C');
					
					//$this->pdf->SetXY(215,108);
					//$this->pdf->Image("total-hour.jpg",197,16,5.5,21.5);//รายเซ็น boss ,ระยะรูปห่างจากขอบบัตร,ระยะรูปห่างจากขอบบน,ความกว้างของรูป,ความสูงของรูป
					//$this->pdf->Cell(55,5,iconv("UTF-8","TIS-620","สาขาอันดับ 2"),1,1,'C');
					
					$this->pdf->SetXY(50,40);
					$this->pdf->Cell(30,$contentH1,iconv("UTF-8","TIS-620",""),0,0,'C');
					$this->pdf->Cell(25,$contentH1,iconv("UTF-8","TIS-620",""),0,1,'C');	
					/*
					//$this->pdf->Cell(20,14,iconv("UTF-8","TIS-620","J"),1,0,'C');
					$this->pdf->Ln();
					//---------วันที่รับสมัคร--------------------------------------------------------
					$this->pdf->SetXY(102,57);
					$this->pdf->Cell(16,10,iconv("UTF-8","TIS-620","ชาย"),1,0,'C');
					$this->pdf->Cell(15,10,iconv("UTF-8","TIS-620","หญิง"),1,1,'C');
					*/	
					//------------- สิ้นสุดหัวตาราง-----------------------------------------------
					
					 //----------- หาสาขาของปวช.-------------------------------
	
					$n=0; $yCon = 45;
					//$condition=" group_id='$group_id' order  by student_id ";
					// $queryCan = select_where("*", "tblstudent_idcard", $condition ); 

					
					if($count_data_std<=30){
						$std_count=30;
					}else{
						$std_count = 50;
					}

					$Page_Start = 0;
					 for ($i=0; $i<$std_count; $i++){
					 //while($rsCan = mysql_fetch_array($queryCan)){
						 	//$rsCan = mysql_fetch_array($queryCan);
					 		if(! isset($data_std[$i])){
					 			$data_std[$i]['room_std_code']= '';
								$data_std[$i]['prefix_id_th']= '';
								 $data_std[$i]['stu_fname_th']= '';
								 $data_std[$i]['stu_lname_th']= '';
					 		}
					 		$rsCan= $data_std[$i];

							$Page_Start++;
							//$student_id = $rsCan['student_id'];
							
						
							$student_id = $rsCan['room_std_code'];
							$prefix_id_th = $rsCan['prefix_id_th'];
							$stu_fname_th = $rsCan['stu_fname_th'];
							$stu_lname_th = $rsCan['stu_lname_th'];
						

							$this->pdf->SetXY(5,$yCon);
							$this->pdf->SetFont('angsana','',15);		// ขนาด font รายชื่อ			
							$this->pdf->Cell( 8, $contentH , utf8_to_tis620(''.$Page_Start), 'LB' , 0 , 'C'); //ที่
							$this->pdf->Cell( 20  , $contentH , utf8_to_tis620($student_id), 'LB', 0, 'C'); //รหัสประจำตัวสอบ
							$this->pdf->Cell( 30 , $contentH , utf8_to_tis620($prefix_id_th .$stu_fname_th), 'LB' , 0 , 'L'); //ชื่อ-นามสกุล
							$this->pdf->Cell( 25 , $contentH , utf8_to_tis620($stu_lname_th), 'RB' , 0 , 'L'); //ชื่อ-นามสกุล
							$this->pdf->SetFont('angsana','',13);	
							$branch1Show1 = '';
							$this->pdf->Cell( 115  , $contentH , utf8_to_tis620(''.$branch1Show1), 'LB' , 0 , 'L'); //เส้นแนวนอน ขั้นระหว่างรายชื่อ
							//$this->pdf->Cell( 55  , $contentH , utf8_to_tis620(''.$branch2Show), 1 , 1 , 'L'); //สาขา2

							$yCon+=$contentH;

						
					 } //end while $rsCan
					 
		
			
					 if($x<($num_group-1)){
							 $Page_Start=0;
							 $this->pdf->Open();
								$this->pdf->AliasNbPages();
								$this->pdf->SetMargins(10,1,5);
								$this->pdf->AddPage();
					 }
		} //end while
			////////////////////////// ขึ้นหน้าใหม่ ///////////////////////////////
$this->pdf->SetTitle($file_name,true);					
$this->pdf->Output('I',$file_name,true);
function utf8_to_tis620($string) {
   $str = $string;
   $res = "";
   for ($i = 0; $i < strlen($str); $i++) {
      if (ord($str[$i]) == 224) {
        $unicode = ord($str[$i+2]) & 0x3F;
        $unicode |= (ord($str[$i+1]) & 0x3F) << 6;
        $unicode |= (ord($str[$i]) & 0x0F) << 12;
        $res .= chr($unicode-0x0E00+0xA0);
        $i += 2;
      } else {
        $res .= $str[$i];
      }
   }
   return $res;
}
?>
        