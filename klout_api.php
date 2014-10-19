<?php

class klout_api
{
	public $apikey='uchcyu5yveb5a4j5unpycbbu';

	public function getKloutID($twitter_handle)
	{
		//$apikey='uchcyu5yveb5a4j5unpycbbu';
		$id_url = 'http://api.klout.com/v2/identity.json/twitter?screenName='. $twitter_handle.'&key='.$this->apikey;
		$json = file_get_contents($id_url);
		$id = json_decode($json, TRUE);
		$kloutid = $id['id'];
		return $kloutid;
	}

	public function getTopics($kloutID)
	{
		//$apikey='uchcyu5yveb5a4j5unpycbbu';
		$topics_url = 'http://api.klout.com/v2/user.json/'. $kloutID .'/topics?key='.$this->apikey;
		$json = file_get_contents($topics_url);
		$topics = json_decode($json, TRUE);
		return $topics;
	}

	public function printTopics($topics)
	{
		//echo "Inside";
		$len=count($topics);
		//echo $len;
		echo "<br>";
		for($i=0;$i<$len;$i++)
		{
			echo "<strong>".$topics[$i]['displayName']."</strong>";
			if($topics[$i]['imageUrl']!='http://kcdn3.klout.com/static/images/icons/generic-topic.png')
				echo "<br><img src='".$topics[$i]['imageUrl']."' id='pic'><br>";
			else
				echo "<br><img src='img/ico.png' width='200' height='200' id='pic'><br>";
		}
	}
}


?>