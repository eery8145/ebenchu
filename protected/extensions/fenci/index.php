<?php

class tags{
	public function getTages($con){
		header("Content-Type:text/html; charset=utf-8");
		define('APP_ROOT', str_replace('\\', '/', dirname(dirname(__FILE__)).'/fenci'));
		
		if(!file_exists(APP_ROOT.'/scws/pscws4.class.php')) { return mb_convert_encoding('由于分词软件较大加QQ群283691798获取下载地址,下载后覆盖/extensions/fenci即可', 'utf-8','gb2312');};
		$new_tags=implode(',',$this->get_tags_arr($con));
		return  $new_tags;
	}

	public function get_tags_arr($con){
		require(APP_ROOT.'/pscws4.class.php');
		$pscws = new PSCWS4();
		$pscws->set_dict(APP_ROOT.'/scws/dict.utf8.xdb');
		$pscws->set_rule(APP_ROOT.'/scws/rules.utf8.ini');
		$pscws->set_ignore(true);
		$pscws->send_text($con);
		$words = $pscws->get_tops(5);
		$tags = array();
		foreach ($words as $val) {
			$tags[] = $val['word'];
		}
		$pscws->close();
		return $tags;
		
	}






}
/* function get_keywords_str($content){
	require(APP_ROOT.'/phpanalysis.class.php');
	PhpAnalysis::$loadInit = false;
	$pa = new PhpAnalysis('utf-8', 'utf-8', false);
	$pa->LoadDict();
	$pa->SetSource($content);
	$pa->StartAnalysis( false );
	$tags = $pa->GetFinallyResult();
	return $tags;
}

print(get_keywords_str($con)); */