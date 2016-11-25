<?php
class Mysql{
	public $mysql_server_name = 'localhost';
	public $mysql_username = 'root';
	public $mysql_password = '';
	public $mysql_database = 'cartoon';

	public function innsertData($url,$name,$type,$size){
		$conn=mysql_connect($this->mysql_server_name,$this->mysql_username,$this->mysql_password) or die("error connecting") ; //连接数据库
		mysql_query("set names 'utf8'"); //数据库输出编码 应该与你的数据库编码保持一致.南昌网站建设公司百恒网络PHP工程师建议用UTF-8 国际标准编码.
		mysql_select_db($this->mysql_database); //打开数据库
		$sql = "insert into pic (url,name,type,size) values ('$url','$name','$type','$size')";
		mysql_query($sql);
		mysql_close(); //关闭MySQL连接
	}

	public function upload($uploadFile){
		if ((($uploadFile["uploadImg"]["type"] == "image/gif")
		|| ($uploadFile["uploadImg"]["type"] == "image/jpeg")
		|| ($uploadFile["uploadImg"]["type"] == "image/pjpeg"))
		&& ($uploadFile["uploadImg"]["size"] < 5*1024*1024)){
		  	if ($uploadFile["uploadImg"]["error"] > 0){
		  		echo json_encode(['status'=>400,'msg'=>$uploadFile["uploadImg"]["error"]]);die;
		    }else{
			    if (file_exists("upload/" . $uploadFile["uploadImg"]["name"])){
			    	echo json_encode(['status'=>400,'msg'=>"文件".$uploadFile["uploadImg"]["name"]."已经存在"]);die;
			    }else{
			    	$filename=explode(".",$uploadFile['uploadImg']['name']);
		            $filename[0] = md5($filename[0] .'_'. date('Ymd') .'_'. time() .'_'. rand(1,10000)); //设置随机数长度
		            $name = implode(".",$filename);
				    if(move_uploaded_file($uploadFile["uploadImg"]["tmp_name"],"upload/" . $name)){
				    	// $this->innsertData("upload/" . $name,$name,$uploadFile["uploadImg"]["type"],$uploadFile["uploadImg"]["size"]);
				    	$imgInfo = ['url'=>"upload/" . $name];
				    	$data = ['status'=>200,'msg'=>'上传成功','data'=>$imgInfo];
				    	echo json_encode($data);die;
				    }
				    echo json_encode(['status'=>400,'msg'=>"Stored in: " . "upload/" . $uploadFile["uploadImg"]["name"]]);die;
		    	}
		    }
		}else{
			echo json_encode(['status'=>400,'msg'=>"Invalid file"]);die;
		}
	}
}

$mysql = new Mysql();
$mysql->upload($_FILES);
?>