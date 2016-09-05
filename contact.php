<?php
//php.iniの編集ができない場合の言語とエンコード指定
mb_language("japanese");
mb_internal_encoding("utf-8");
  
if(!empty($_POST['mail'])){
    $to=$_POST['mail'];
    $subject=$_POST['sub'];
    $message=$_POST['main'];
    $name=$_POST['name'];
    $tel=$_POST['tel'];
 
 
// 本文
$message_mail = "
		$name 様

		元気が出るデイサービスセンターです。
		この度はお問い合わせ頂きありがとうございました。

		お問い合わせ頂きました内容は以下のとおりです。
		-------------------------------------
		お名前：$name
		メールアドレス：$to
		内容：
		$message
		-------------------------------------

		担当者より、後ほどメールかお電話で連絡いたしますので、
		今しばらくお待ちいだきますよう、よろしくお願い致します。";


$headers = 'From: 元気が出るデイサービスセンター' . "\r\n" .
	'Reply-To: genkiup_care@gmail.com' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();

	mb_language('Japanese');
	mb_internal_encoding('UTF-8');

  $success=mb_send_mail($to,$subject,$message_mail,$headers);

}
?>
  
  
<?php 
if($success){
    echo('送信しました');
}else{
    echo('送信失敗！！');
}
?>