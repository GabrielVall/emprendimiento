<?php	
require_once('class.phpmailer.php');
require_once("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded	
	
class EMail{
	private $attachment1;
	private $pdf_name1;
	private $attachment2;
	private $pdf_name2;

	public function __construct(){
		$this->attachment1 = '';
		$this->pdf_name1 = '';		
		$this->attachment2 = '';
		$this->pdf_name2 = '';
	}

	public function enviar($to, $subject, $body, $cc, $bcc){
		
		$uid = md5(uniqid(time()));

		$emailOrigin = "emprendedurismo@utnc.edu.mx";						
		$headers = "From: Emprendedurismo UTNC <". $emailOrigin .">\n";
		$headers .= "Reply-To: $emailOrigin\n";
		$headers .= "MIME-version: 1.0\n";
		$headers .= "Content-type: multipart/mixed; ";
		$headers .= "boundary=\"" . $uid . "\"\r\n\r\n";
		
		$body_top = "--" . $uid . "\r\n";
		$body_top .= "Content-type: text/html; charset=utf-8\n";
		$body_top .= "Content-transfer-encoding: 7BIT\n";			
		$body_complete = $body_top.$body. "\r\n\r\n";

		if($this->attachment1 != ''){							
			$body_complete .= "--" . $uid . "\r\n";
			$body_complete .= "Content-Type: application/octet-stream; name=\"" . $this->pdf_name1.".pdf" . "\"\r\n";
			$body_complete .= "Content-Transfer-Encoding: base64\r\n";
			$body_complete .= "Content-Disposition: attachment; filename=\"" . $this->pdf_name1.".pdf" . "\"\r\n\r\n";
			$body_complete .= chunk_split(base64_encode(file_get_contents($this->attachment1))) . "\r\n\r\n";						
		}
		if($this->attachment2 != ''){							
			$body_complete .= "--" . $uid . "\r\n";
			$body_complete .= "Content-Type: application/octet-stream; name=\"" . $this->pdf_name2.".pdf" . "\"\r\n";
			$body_complete .= "Content-Transfer-Encoding: base64\r\n";
			$body_complete .= "Content-Disposition: attachment; filename=\"" . $this->pdf_name2.".pdf" . "\"\r\n\r\n";
			$body_complete .= chunk_split(base64_encode(file_get_contents($this->attachment2))) . "\r\n\r\n";						
		}
		$body_complete .= "--" . $uid . "--";

		if(mail($to,$subject,$body_complete,$headers)){
			return true;
		}
		else{
			return false;
		}		
	}
	
	public function setAttachment1($attachment1){
		$this->attachment1 = $attachment1;
	}
	public function getAttachment1(){
		return $this->attachment1;
	}

	public function setPDFName1($pdf_name1){
		$this->pdf_name1 = $pdf_name1;
	}
	public function getPDFName1(){
		return $this->pdf_name1;
	}

	public function setAttachment2($attachment2){
		$this->attachment2 = $attachment2;
	}
	public function getAttachment2(){
		return $this->attachment2;
	}

	public function setPDFName2($pdf_name2){
		$this->pdf_name2 = $pdf_name2;
	}
	public function getPDFName2(){
		return $this->pdf_name2;
	}
}
?>