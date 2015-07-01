<?php
/**
* @author Oros <oros@ecirtam.net>
* @license  CC0 1.0 Universal
* @version 20140928
* @source https://github.com/Oros42/Playlist-generator
*/
$musics=array();
if(isset($_GET['s'])){
	define("SHUFFLE", $_GET['s']=='1');
}
ini_set('user_agent', 'Mozilla/5.0 (Playlist generator; https://github.com/Oros42/Playlist-generator)');
if(!is_file("config.php")){
	@file_put_contents('config.php', '<?php
	// authorized file types (4 char)
	$TYPES = array(".mp3", ".ogg", ".wav", ".mp4", ".avi", "mkv", "flac", "wma");

	// URI of musics\' folders
	// can be a local path or a URL
	// URL works only with default apache\'s index
	$URIs = array(
		"."
		//,"./musics"
		//,"./path1/path2/musics"
		//,"http://example.com/music/"
        	//,"http://example.com/somewhere/zic/"
        	//,"http://123.123.123.123/"
        	//,"http://127.0.0.1/"
	);

	// scan subfolder level recursive
	//  0 : no recursive
	// int > 0 : level of recursive
	$MAX_RECURSIVE=2;

	// shuffle. true or false
	if(!defined("SHUFFLE")) {
		define("SHUFFLE", false);
	}

	// cache min life time in seconds
	$cache_min_life=300;
?>') or die("Can't create config.php file. Please check permissions.");
}
include "config.php";
if(!defined('SERVER_URL')){
	if(isset($_SERVER["SERVER_NAME"])){
		$https = (!empty($_SERVER['HTTPS']) && (strtolower($_SERVER['HTTPS'])=='on')) || $_SERVER["SERVER_PORT"]=='443';
		define('SERVER_URL', 'http'.($https?'s':'').'://'.$_SERVER["SERVER_NAME"]
							.($_SERVER["SERVER_PORT"]=='80' || ($https && $_SERVER["SERVER_PORT"]=='443')?'':':'.$_SERVER["SERVER_PORT"])
							."/".substr($_SERVER["SCRIPT_NAME"], 1, strripos($_SERVER["SCRIPT_NAME"], "/", 1)));
	}else{
		define('SERVER_URL','');
	}
}
function scan_local($URI, $TYPES, $level=0){
	$musics=array();
	if(is_dir($URI)){
		$filenames = scandir($URI);
		unset($filenames[0]); // .
		unset($filenames[1]); // ..
		if(!empty($filenames)){
			if(substr($URI,0,2)=='./'){
				$uri=substr($URI,2);
			}else{
				$uri=$URI;				
			}
			foreach($filenames as $filename){
				if(is_dir($URI.'/'.$filename)){
					if($level>0) {
						$musics=array_merge($musics, scan_local($URI.'/'.$filename, $TYPES, $level-1));
					}
				}elseif(is_file($URI.'/'.$filename) && in_array(strtolower(substr($filename, -4)), $TYPES)){
					$musics[] = array(SERVER_URL.$uri, $filename);
				}
			}
		}
	}
	return $musics;
}

function scan_url($URI, $TYPES, $level=0){
	$musics=array();
	$page=file_get_contents($URI);
	if(!empty($page)){
		if(strpos($page, "<title>Index of")!==false){
			$regexp = "href=\"([^\" >]*?)\"";
			if(preg_match_all("/$regexp/siU", $page, $matches)) {
				if(substr($URI,-1)=='/'){
					$uri=substr($URI,0,-1);
				}else{
					$uri=$URI;				
				}
				foreach ($matches[2] as $key => $value) {
					if($matches[1][$key]=="DIR" && $level>0) {
						if(substr($matches[2][$key], 0, 1)!="/"){
							$musics=array_merge($musics, scan_url($URI.$matches[2][$key], $TYPES, $level-1));
						}
					}elseif($matches[1][$key]=="SND") {
						$musics[] = array($uri, $matches[2][$key]);
					}
				}
			}
		}
	}
	return $musics;
}

if(!empty($URIs)) {
	if (!file_exists("playlist.m3u") || filemtime("playlist.m3u") < time()-$cache_min_life) {
		if(!file_exists(".lock_generator")){
			$n=rand(10000, 100000);
			// add lock to prevent parallel access
			@file_put_contents(".lock_generator", $n) or die("Can't create .lock_generator file. Please check permissions.");
			if(file_get_contents(".lock_generator")==$n){
				foreach ($URIs as $URI) {
					if(substr($URI, 0, 4)=="http"){
						// URL
						$musics=array_merge($musics, scan_url($URI, $TYPES, $MAX_RECURSIVE));
					}else{
						// local path
						$musics=array_merge($musics, scan_local($URI, $TYPES, $MAX_RECURSIVE));
					}
				}
				$playlist="#EXTM3U\n";
				if(!empty($musics)){
					if(SHUFFLE){
						shuffle($musics);
					}
					foreach ($musics as $music) {
						$playlist.="#EXTINF:-1,".urldecode($music[1])." ( ".$music[0]."/".$music[1]." )\n";
						$playlist.=str_replace(array("%2F", "%3A"),array("/", ":"),rawurlencode($music[0]."/".$music[1]))."\n";
					}
				}
				@file_put_contents("playlist.m3u", $playlist) or die("Can't create playlist.m3u file. Please check permissions.");
			}
			unlink(".lock_generator");
		}
	}
}

if(is_file("playlist.m3u")){
	header('Content-Type: audio/x-mpegurl; charset=utf-8');
	header('Content-Disposition: attachment; filename="playlist.m3u"');
	echo file_get_contents("playlist.m3u");
}
?>
