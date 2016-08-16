<?php

class mainController extends Controller
{

	public function actionIndex()
	{
		$statToShow = ['branches'=>'branches_url',
												'contribuitors' => 'contributors_url',
												'commits' => 'commits_url',
												'issues' => 'issues_url'];
		$statsObject = array();
		$repoStats = json_decode($this->actionGetRepoStats('https://api.github.com/repos/composer/composer'));

		foreach ($statToShow as $label => $statsURL) {
			if(isset($repoStats->$statsURL)){
				$urlSplit = explode('{',$repoStats->$statsURL);
				$statsObject[$label] = $this->actionGetRepoStats($urlSplit[0]);
			}
		}


		$this->render('index', array('statsObject' => $statsObject));
	}

	public function actionGetRepoStats($repoURL = 'composer/composer')
	{
		$curlHelper = new CurlWrapper();
		$curlHelper->setcURLOptionsArray(array(
			CURLOPT_URL => $repoURL,
			CURLOPT_USERAGENT => 'https://gist.github.com/mjp456789'
		));

		return $curlHelper->doGet();
	}
}
