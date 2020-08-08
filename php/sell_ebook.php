<?php

require_once("../common_files/database/database.php");
require_once("../php/user_info.php");
new main($db,$user_id,$board,$course,$city);

class main{
private $db;
private $user_id;
private $board;
private $course;
private $city;
private $title;
private $price;
private $language;
private $page;
private $description;
private $type;
private $thumb;
private $thumb_path;
private $pdf;
private $pdf_path;
	function __construct($db,$user_id,$board,$course,$city){
		$this->db = $db;
		$this->user_id = $user_id;
		$this->board = $board;
		$this->course = $course;
		$this->city = $city;
		$this->title = $_POST['title'];
		$this->price = $_POST['price'];
		$this->language = $_POST['language'];
		$this->page = $_POST['page'];
		$this->description = $_POST['description'];
		$this->type = 'ebook';
		$this->thumb = $_FILES['thumb'];
		$this->pdf = $_FILES['pdf'];
		$this->pdf_pre();
	}
	function pdf_pre()
	{
		$this->location = $this->pdf['tmp_name'];
		$this->path = "../ebook/".$this->title."_".$this->user_id.".pdf";
		$this->pdf_path = $this->title."_".$this->user_id.".pdf";
		if(file_exists($this->path))
		{
			echo "file already exits";
		}
		else
		{
			if(move_uploaded_file($this->location, $this->path))
			{
				$this->compress();
			}
			else
			{
				echo "unable to upload";
			}
		}
	}
	function compress(){

		$this->location = $this->thumb['tmp_name'];
		$this->ext = $this->thumb['type'];
		$this->ext = str_replace('image/', '', $this->ext);
		$this->complete_path = "../images/products/".$this->title."_".$this->user_id.".".$this->ext;
		$this->thumb_path = $this->title."_".$this->user_id.".".$this->ext;
		if(file_exists($this->complete_path))
		{
			echo "This file already exits so please upload another file or rename this";
		}

		else
		{
			if(move_uploaded_file($this->location, $this->complete_path))
			{
				if($this->ext == "jpeg")
				{
					
							$this->image_pixels = imagecreatefromjpeg($this->complete_path);
							$this->o_width = imagesx($this->image_pixels);
							$this->o_height = imagesy($this->image_pixels);
							$this->ratio = 250/$this->o_width;
							$this->height = round($this->o_height*$this->ratio,0);
							$this->canvas = imagecreatetruecolor(250, $this->height);
							imagecopyresampled($this->canvas,$this->image_pixels,0,0,0,0,250,$this->height,$this->o_width,$this->o_height);

							if(imagejpeg($this->canvas, $this->complete_path))
							{
								$this->store();
							}
							else
							{
								echo "somthing went wrong";
							}
							imagedestroy($this->image_pixels);
				}
				else if($this->ext == "png")
				{
							$this->image_pixels = imagecreatefrompng($this->complete_path);
							$this->o_width = imagesx($this->image_pixels);
							$this->o_height = imagesy($this->image_pixels);
							$this->ratio = 250/$this->o_width;
							$this->height = round($this->o_height*$this->ratio,0);
							$this->canvas = imagecreatetruecolor(250, $this->height);
							imagecopyresampled($this->canvas,$this->image_pixels,0,0,0,0,250,$this->height,$this->o_width,$this->o_height);

							if(imagepng($this->canvas, $this->complete_path))
							{
								$this->store();
							}
							else
							{
								echo "somthing went wrong";
							}
							imagedestroy($this->image_pixels);
				}
				else if($this->ext == "gif")
				{
					
							$this->image_pixels = imagecreatefromgif($this->complete_path);
							$this->o_width = imagesx($this->image_pixels);
							$this->o_height = imagesy($this->image_pixels);
							$this->ratio = 250/$this->o_width;
							$this->height = round($this->o_height*$this->ratio,0);
							$this->canvas = imagecreatetruecolor(250, $this->height);
							imagecopyresampled($this->canvas,$this->image_pixels,0,0,0,0,250,$this->height,$this->o_width,$this->o_height);

							if(imagegif($this->canvas, $this->complete_path))
							{
								$this->store();
							}
							else
							{
								echo "somthing went wrong";
							}
							imagedestroy($this->image_pixels);
				}
				else
				{
					echo "sorry we only accept jpeg jpg png gif";
				}
			}
			else
			{
				echo "unable to upload this file";
			}
		}

	}

	function store()
	{
		$this->thumb_path;

		$this->query = "INSERT INTO products(type,title,language,price,city,board,course,thumb,seller_id,pdf,page,description)VALUES('$this->type','$this->title','$this->language','$this->price','$this->city','$this->board','$this->course','$this->thumb_path','$this->user_id','$this->pdf_path','$this->page','$this->description')";
		$this->response = $this->db->query($this->query);
		if($this->response)
		{
			echo "success";
		}
		else
		{
			echo "faild";
		}
	}
}

?>