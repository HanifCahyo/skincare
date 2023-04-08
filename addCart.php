<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "GET") {	
	$brg=$_GET['brg'];
	$hrg=$_GET['hrg'];
	$jml=$_GET['jml'];
	$img=$_GET['img'];

	if (!empty($_SESSION['cart']['arrCart'])){
		$max=sizeof($_SESSION['cart']['arrCart']);
		$find=false;
		for ($i=0;$i<$max;$i++){
			$cari=array_search($brg, $_SESSION['cart']['arrCart'][$i]);
			if ($cari) {
				$_SESSION['cart']['arrCart'][$i]['jml']+=1;
				$find=true;
				break;
			}			
		}			
	}
	if (!$find){
		$item = array('nmBrg'=>$brg, 'jml'=>$jml, 'hrg'=>$hrg, 'img'=>$img);
		array_push($_SESSION["cart"]["arrCart"],$item);										
	}
}
header("location:cart.php");	
?>