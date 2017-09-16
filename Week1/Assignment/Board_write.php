<?php
	//문서 제목
	echo("<FONT SIZE='6'>게시판 쓰기</FONT><P>");

	//사용자로부터 데이터를 입력받기 위한 폼
	echo("
		<FORM NAME='글쓰기' ACTION='$PHP_SELF' METHOD='post'>
		<textarea rows=7 cols=50 name=string></textarea>
		<br><br>
		<input type='submit' value='등록하기'>
		<input type='reset' value='다시기입'>		
		</FORM>
		<P>
	");

	//메인화면으로 돌아가는 링크
	echo("<A HREF='Board_main.php'>되돌아 가기</A>");

	//파일을 연다.(에러 발생시 에러 문구를 출력하고 종료)
	$fp = fopen("Data.txt", "w");
	if(!$fp){
		echo("file open error");
		exit;
	}

	//사용자가 데이터를 입력한 경우, 파일에 저장하고 메인화면으로 돌아가기
	if($_POST['string']){
		fwrite($fp, $_POST['string'], strlen($_POST['string']));
		fclose($fp);
		echo("<meta http-equiv='Refresh' content='0; URL=Board_main.php'>");
	}
?>
