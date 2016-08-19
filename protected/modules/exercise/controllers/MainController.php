<?php

class mainController extends Controller
{

	public function actionIndex()
	{
		$statToShow = array('branches'=>array(
								'name' => 'branches_url', 
								'templateFunction' => 'getBranchStructure',
								'label' => 'Branches'),
							'contribuitors' => array(
								'name' => 'contributors_url', 
								'templateFunction' => 'getContributorsStructure',
								'label' => 'Top 10 Contributors'),
							'commits' => array(
								'name' => 'commits_url', 
								'templateFunction' => 'getCommitStructure',
								'label' => 'Last Commits')
							);
		$statsObject = array();
		$repoStats = json_decode($this->actionGetRepoStats('https://api.github.com/repos/composer/composer'));
		foreach ($statToShow as $label => $statsURL) {
			if(isset($repoStats->$statsURL['name'])){
				$urlSplit = explode('{',$repoStats->$statsURL['name']);
				$statsObject[$label] = StatsStructureHelper::$statsURL['templateFunction']($this->actionGetRepoStats($urlSplit[0]));
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
