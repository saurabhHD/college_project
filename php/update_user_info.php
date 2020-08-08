<?php
require_once("../common_files/database/database.php");
require_once("user_info.php");
class main{
	private $db;
	public $fullname;
	private $gender;
	private $city;
	private $address;
	private $dob;
	private $college;
	private $board;
	private $course;
	private $file;
	private $mobile;
	private $user_id;
	
	private $pic_path;
	function __construct($user_id,$db)
	{
		$this->db = $db;
		$this->user_id = $user_id;
		$this->fullname = trim($_POST['fullname']);
		$this->gender = trim($_POST['gender']);
		$this->city = trim($_POST['city']);
		$this->address = trim($_POST['address']);
		$this->dob = $_POST['dob'];
		$this->mobile = $_POST['mobile'];
		$this->college = trim($_POST['college']);
		$this->board = trim($_POST['board']);
		$this->course = trim($_POST['course']);
		$this->file = $_FILES['pic'];
		if($this->file['type'] !="")
		{
			$this->location = $this->file['tmp_name'];
			$this->ext = $this->file['type'];
			$this->ext = str_replace("image/", "", $this->ext);
			$this->path = "../images/profile/".$this->user_id.".".$this->ext;
			$this->pic_path = $this->user_id.".".$this->ext;
			if(move_uploaded_file($this->location, $this->path))
			{
				$this->store_data_img();
			}

			else
			{
				echo "something went wrong";
			}
			
		}
		else
		{
			$this->store_data();
		}
	}
	function store_data_img()
	{
		$this->query = $this->db->prepare("UPDATE users_info SET fullname=?,gender=?,city=?,address=?,dob=?,college=?,board=?,course=?,mobile=?,photo=? WHERE user_id=?");
		$this->query->bind_param('ssssssssssi',$this->fullname,$this->gender,$this->city,$this->address,$this->dob,$this->college,$this->board,$this->course,$this->mobile,$this->pic_path,$this->user_id);
		$this->query->execute();
		if($this->query->affected_rows !=0)
		{
			echo "success";
		}
		else
		{
			echo "faild";
		}
	}
	function store_data()
	{
		$this->query = $this->db->prepare("UPDATE users_info SET fullname=?,gender=?,city=?,address=?,dob=?,college=?,board=?,course=?,mobile=? WHERE user_id=?");
		$this->query->bind_param('sssssssssi',$this->fullname,$this->gender,$this->city,$this->address,$this->dob,$this->college,$this->board,$this->course,$this->mobile,$this->user_id);
		$this->query->execute();
		if($this->query->affected_rows !=0)
		{
			echo "success";
		}
		else
		{
			echo "faild";
		}
	}
}

new main($user_id,$db);
?>