<?php

class mainController extends Controller
{

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionGetStats()
	{
		$user = $_GET['login'];
				$url = '';
				$ch = curl_init();
				    curl_setopt($ch, CURLOPT_HEADER, 0);
				    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);
				    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT,10);
						curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				    curl_setopt($ch, CURLOPT_URL, $url );
						curl_setopt($ch, CURLOPT_POST, 1);
						curl_setopt($ch, CURLOPT_POSTFIELDS,"user=".$user);
				    $return = curl_exec($ch);
				    curl_close($ch);
		echo $return;
	}
}
