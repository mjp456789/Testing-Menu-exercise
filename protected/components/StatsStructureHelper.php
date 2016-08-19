<?php

class StatsStructureHelper{
	
	static public function getBranchStructure($dataObject){
		$formatedStructure = array();
		$tempBranch = json_decode($dataObject);
		foreach($tempBranch as $branch){
			$descriptionTemplate = '<div>';
				$descriptionTemplate .= '<div><b>Branch :</b> '.$branch->name.'<div>';
				$descriptionTemplate .= '</div>';
			$formatedStructure[] = array(
				'name' => $branch->name,
				'description' => $descriptionTemplate
			);
		}

		return $formatedStructure;
	}

	static public function getCommitStructure($dataObject){
		$formatedStructure = array();
		$tempCommit = json_decode($dataObject);
		foreach($tempCommit as $commit){
				$descriptionTemplate = '<div>';
				$descriptionTemplate .= '<div><b>Commit :</b> '.$commit->sha.'<div>';
				$descriptionTemplate .= '<div><b>Author :</b> '.$commit->commit->author->name.'<div>';
				//$descriptionTemplate .= '<div><b>Message :</b> '.$commit->commit->message.'<div>';
				$descriptionTemplate .= '</div>';
			$formatedStructure[] = array(
				'name' => $commit->sha,
				'description' => $descriptionTemplate
			);
		}

		return $formatedStructure;
	}

	static public function getContributorsStructure($dataObject){
		$formatedStructure = array();
		$tempContributor = json_decode($dataObject);
		$counter = 0;
		foreach($tempContributor as $contributor){
			if($counter>8){
				break;
			}
				$descriptionTemplate = '<div>';
				$descriptionTemplate .= '<div><b>Name :</b> '.$contributor->login.'<div>';
				$descriptionTemplate .= '<div><b>Type :</b> '.$contributor->type.'<div>';
				$descriptionTemplate .= '<div><b>Contributions :</b> '.$contributor->contributions.'<div>';
				$descriptionTemplate .= '</div>';
				$formatedStructure[] = array(
					'name' => $contributor->login,
					'description' => $descriptionTemplate
				);
				$counter++;
			
		}

		return $formatedStructure;
	}
}
?>