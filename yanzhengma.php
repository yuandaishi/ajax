<?php
header('Content-type:text/json; charset="utf-8"');


/*
API:
	getPics.php

		参数
		cpage : 获取数据的页数
*/
//$cpage = isset($_GET['number']) ? $_GET['number'] : 1;
//通过con判断是点击验证还是更新验证码
$con=isset($_GET['con']) ? $_GET['con'] : null;
$number=isset($_GET['number']) ? $_GET['number'] : null;
if($con==2){//点击刷新
	$a=rand(0, 9999);
	$arr=array('number'=>$a,'isOr'=>'0');
	//echo "验证码输入正确";
	session_start();  //开启session
	$_SESSION['views']=$a;
	echo json_encode($arr);
}else{//点击验证
	session_start();
	$b=$_SESSION['views'];
	if($number==$b){
		$arr=array('isOr'=>'1');
		//echo "验证码输入正确";
		echo json_encode($arr);
	}else{
		$arr=array('isOr'=>'0');
		//echo "验证码输入错误";
		echo json_encode($arr);
	}
}
//if($number==$b){
//	$arr=array('number'=>$a,'isOr'=>'1');
//	//echo "验证码输入正确";
//	echo json_encode($arr);
//}else{
//	$arr=array('number'=>$a,'isOr'=>'0');
//	//echo "验证码输入错误";
//	echo json_encode($arr);
//}	


//$url = 'http://www.wookmark.com/api/json/popular?page=' . $cpage;

//$content = file_get_contents($url);
//$content = iconv('gbk', 'utf-8', $content);

// echo $content;
//echo $content;
?>