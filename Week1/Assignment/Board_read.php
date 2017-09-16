<?php
	//문서 제목
	echo("<FONT SIZE='6'>게시판 읽기</FONT><P>");

	//파일명 지정	
	$filename = "Data.txt";

	//파일을 연다.(에러가 발생한 경우, 에러메시지를 출력하고 종료)
	$fp = fopen($filename, "r");
	if(!$fp){
		echo("file open error");	
		exit;
	}
	
	//저장된 데이터를 변수에 할당한다.
	$string = fread($fp, filesize($filename));
	fclose($fp);

	//파일에 저장된 데이터를 표 내부에 출력한다.
	echo("
		<TABLE BORDER=1>
			<TR>
				<TD>".$string."</TD>
			</TD>
		</TABLE>
		<P>
	");

	//메인화면으로 돌아가는 링크
	echo("<A HREF='Board_main.php'>되돌아 가기<A>");
?>
