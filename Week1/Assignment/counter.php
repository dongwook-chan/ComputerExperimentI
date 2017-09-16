<?php
	//파일명 지정
	$filename = "counter.txt";

	//기존의 카운트가 저장되어 있는 파일 열기(오류 시, 오류문 출력 후 종료)
	$fp = fopen($filename, "r");
	if(!$fp){
		echo("file open error");
		exit;	
	}

	//기존의 카운트를 변수에 할당
	$count = fread($fp, filesize($filename));
	fclose($fp);

	//ip값이 없으면 카운트를 증가시키고, 증가된 카운트를 파일에 저장
	if(!$_COOKIE["ip"])
	{
		$count = $count + 1;
		$fp = fopen($filename, "w");
		fwrite($fp, "$count", strlen($count));
		fclose($fp);
		setcookie("ip", $_SERVER["REMOTE_ADDR"]);
	}

	//카운트를 문자열로 변환
	$str = (string)$count;

	//카운트의 각 자리수를 상응하는 이미지로 출력
	for($i = 0; $i < strlen($str); $i++)
	{
		$ch=substr($str, $i, 1);
		echo("<img src='".$ch.".JPG'>");	//유사한 코드를 반복 입력하는 대신, 패턴을 찾아 .을 이용해 코드를 concat
	}
?>
