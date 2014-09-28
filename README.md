Playlist-generator
==================

Generate m3u playlist with list of local paths and URLs


Setup
=====

1- Put playlist_generator.php in you musics folder.  
2- Call it via your browser or via termial with php commande.  
3- playlist_generator.php will create config.php.  
4- Open config.php. You can add paths and URLs in $URIs variable.  
  
Example of config.php :
```
<?php
	// authorized file types (4 char)
	$TYPES = array(".mp3", ".ogg", ".wav", ".mp4", ".avi", "mkv");

	// URI of musics' folders
	// can be a local path or a URL
	// URL works only with default apache's index
	$URIs = array(
		"./musics1",
		"./musics2",
		"http://example.com/music/",
		"http://example.com/somewhere/zic/"
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
?>
```
  
  
Example of use
==============


```
$ tree
.
├── config.php
├── LICENSE
├── musics
│   ├── LukHash (SH music) - The far end of the world
│   │   ├── 01 - ETERNAL LIFE (lukhash.com).mp3
│   │   ├── 02 - MAKE IT AWAY (lukhash.com).mp3
│   │   ├── 03 - HEARTBEAT (lukhash.com).mp3
│   │   ├── 04 - VERONICA (lukhash.com).mp3
│   │   ├── 05 - UP YOURS (lukhash.com).mp3
│   │   ├── 06 - 140908 (lukhash.com).mp3
│   │   ├── 07 - SICK OF YOU (lukhash.com).mp3
│   │   ├── 08 - RECUERDOS DE LA ALHAMBRA (lukhash.com).mp3
│   │   ├── 09 - SUPERSTAR (lukhash.com).mp3
│   │   ├── 10 - AN ADDICT'S STORY (lukhash.com).mp3
│   │   ├── 11 - GIRLS ALOUD feat.LUKHASH - SEXY! NO NO NO! (lukhash.com).mp3
│   │   ├── 12 - FAILURE (lukhash.com).mp3
│   │   ├── 13 - TRUE BLUE (lukhash.com).mp3
│   │   ├── 14 - DEAD END (lukhash.com).mp3
│   │   ├── [cover] LukHash (SH music) - The far end of the world.jpg
│   │   ├── License.txt
│   │   └── Readme - www.jamendo.com .txt
│   └── SH MUSIC (lukhash) - Psyche
│       ├── 01 - VENGEANCE.mp3
│       ├── 02 - DUB.mp3
│       ├── 03 - LET ME GO.mp3
│       ├── 04 - ORGANGRINDER.mp3
│       ├── 05 - SCAR.mp3
│       ├── 06 - HINDUKUSH.mp3
│       ├── 07 - LEVEL FOUR.mp3
│       ├── 08 - DARK SKY.mp3
│       ├── 09 - CAVE.mp3
│       ├── 10 - AREN'T YOU CLEVER.mp3
│       ├── 11 - ESSENCE OF LIFE.mp3
│       ├── 12 - DIVERGE.mp3
│       ├── 13 - SUN WILL DIE.mp3
│       ├── [cover] SH MUSIC (lukhash) - Psyche.jpg
│       ├── License.txt
│       └── Readme - www.jamendo.com .txt
├── playlist_generator.php
└── README.md
$ cat config.php 
<?php
	// authorized file types (4 char)
	$TYPES = array(".mp3", ".ogg", ".wav", ".mp4", ".avi", "mkv");

	// URI of musics' folders
	// can be a local path or a URL
	// URL works only with default apache's index
	$URIs = array(
		"./musics"
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
?>
```

Case with commandes line:  
```
$ php playlist_generator.php
#EXTM3U
#EXTINF:-1,01 - ETERNAL LIFE (lukhash.com).mp3 ( musics/LukHash (SH music) - The far end of the world/01 - ETERNAL LIFE (lukhash.com).mp3 )
musics/LukHash (SH music) - The far end of the world/01 - ETERNAL LIFE (lukhash.com).mp3
#EXTINF:-1,02 - MAKE IT AWAY (lukhash.com).mp3 ( musics/LukHash (SH music) - The far end of the world/02 - MAKE IT AWAY (lukhash.com).mp3 )
musics/LukHash (SH music) - The far end of the world/02 - MAKE IT AWAY (lukhash.com).mp3
#EXTINF:-1,03 - HEARTBEAT (lukhash.com).mp3 ( musics/LukHash (SH music) - The far end of the world/03 - HEARTBEAT (lukhash.com).mp3 )
musics/LukHash (SH music) - The far end of the world/03 - HEARTBEAT (lukhash.com).mp3
#EXTINF:-1,04 - VERONICA (lukhash.com).mp3 ( musics/LukHash (SH music) - The far end of the world/04 - VERONICA (lukhash.com).mp3 )
musics/LukHash (SH music) - The far end of the world/04 - VERONICA (lukhash.com).mp3
#EXTINF:-1,05 - UP YOURS (lukhash.com).mp3 ( musics/LukHash (SH music) - The far end of the world/05 - UP YOURS (lukhash.com).mp3 )
musics/LukHash (SH music) - The far end of the world/05 - UP YOURS (lukhash.com).mp3
#EXTINF:-1,06 - 140908 (lukhash.com).mp3 ( musics/LukHash (SH music) - The far end of the world/06 - 140908 (lukhash.com).mp3 )
musics/LukHash (SH music) - The far end of the world/06 - 140908 (lukhash.com).mp3
#EXTINF:-1,07 - SICK OF YOU (lukhash.com).mp3 ( musics/LukHash (SH music) - The far end of the world/07 - SICK OF YOU (lukhash.com).mp3 )
musics/LukHash (SH music) - The far end of the world/07 - SICK OF YOU (lukhash.com).mp3
#EXTINF:-1,08 - RECUERDOS DE LA ALHAMBRA (lukhash.com).mp3 ( musics/LukHash (SH music) - The far end of the world/08 - RECUERDOS DE LA ALHAMBRA (lukhash.com).mp3 )
musics/LukHash (SH music) - The far end of the world/08 - RECUERDOS DE LA ALHAMBRA (lukhash.com).mp3
#EXTINF:-1,09 - SUPERSTAR (lukhash.com).mp3 ( musics/LukHash (SH music) - The far end of the world/09 - SUPERSTAR (lukhash.com).mp3 )
musics/LukHash (SH music) - The far end of the world/09 - SUPERSTAR (lukhash.com).mp3
#EXTINF:-1,10 - AN ADDICT'S STORY (lukhash.com).mp3 ( musics/LukHash (SH music) - The far end of the world/10 - AN ADDICT'S STORY (lukhash.com).mp3 )
musics/LukHash (SH music) - The far end of the world/10 - AN ADDICT'S STORY (lukhash.com).mp3
#EXTINF:-1,11 - GIRLS ALOUD feat.LUKHASH - SEXY! NO NO NO! (lukhash.com).mp3 ( musics/LukHash (SH music) - The far end of the world/11 - GIRLS ALOUD feat.LUKHASH - SEXY! NO NO NO! (lukhash.com).mp3 )
musics/LukHash (SH music) - The far end of the world/11 - GIRLS ALOUD feat.LUKHASH - SEXY! NO NO NO! (lukhash.com).mp3
#EXTINF:-1,12 - FAILURE (lukhash.com).mp3 ( musics/LukHash (SH music) - The far end of the world/12 - FAILURE (lukhash.com).mp3 )
musics/LukHash (SH music) - The far end of the world/12 - FAILURE (lukhash.com).mp3
#EXTINF:-1,13 - TRUE BLUE (lukhash.com).mp3 ( musics/LukHash (SH music) - The far end of the world/13 - TRUE BLUE (lukhash.com).mp3 )
musics/LukHash (SH music) - The far end of the world/13 - TRUE BLUE (lukhash.com).mp3
#EXTINF:-1,14 - DEAD END (lukhash.com).mp3 ( musics/LukHash (SH music) - The far end of the world/14 - DEAD END (lukhash.com).mp3 )
musics/LukHash (SH music) - The far end of the world/14 - DEAD END (lukhash.com).mp3
#EXTINF:-1,01 - VENGEANCE.mp3 ( musics/SH MUSIC (lukhash) - Psyche/01 - VENGEANCE.mp3 )
musics/SH MUSIC (lukhash) - Psyche/01 - VENGEANCE.mp3
#EXTINF:-1,02 - DUB.mp3 ( musics/SH MUSIC (lukhash) - Psyche/02 - DUB.mp3 )
musics/SH MUSIC (lukhash) - Psyche/02 - DUB.mp3
#EXTINF:-1,03 - LET ME GO.mp3 ( musics/SH MUSIC (lukhash) - Psyche/03 - LET ME GO.mp3 )
musics/SH MUSIC (lukhash) - Psyche/03 - LET ME GO.mp3
#EXTINF:-1,04 - ORGANGRINDER.mp3 ( musics/SH MUSIC (lukhash) - Psyche/04 - ORGANGRINDER.mp3 )
musics/SH MUSIC (lukhash) - Psyche/04 - ORGANGRINDER.mp3
#EXTINF:-1,05 - SCAR.mp3 ( musics/SH MUSIC (lukhash) - Psyche/05 - SCAR.mp3 )
musics/SH MUSIC (lukhash) - Psyche/05 - SCAR.mp3
#EXTINF:-1,06 - HINDUKUSH.mp3 ( musics/SH MUSIC (lukhash) - Psyche/06 - HINDUKUSH.mp3 )
musics/SH MUSIC (lukhash) - Psyche/06 - HINDUKUSH.mp3
#EXTINF:-1,07 - LEVEL FOUR.mp3 ( musics/SH MUSIC (lukhash) - Psyche/07 - LEVEL FOUR.mp3 )
musics/SH MUSIC (lukhash) - Psyche/07 - LEVEL FOUR.mp3
#EXTINF:-1,08 - DARK SKY.mp3 ( musics/SH MUSIC (lukhash) - Psyche/08 - DARK SKY.mp3 )
musics/SH MUSIC (lukhash) - Psyche/08 - DARK SKY.mp3
#EXTINF:-1,09 - CAVE.mp3 ( musics/SH MUSIC (lukhash) - Psyche/09 - CAVE.mp3 )
musics/SH MUSIC (lukhash) - Psyche/09 - CAVE.mp3
#EXTINF:-1,10 - AREN'T YOU CLEVER.mp3 ( musics/SH MUSIC (lukhash) - Psyche/10 - AREN'T YOU CLEVER.mp3 )
musics/SH MUSIC (lukhash) - Psyche/10 - AREN'T YOU CLEVER.mp3
#EXTINF:-1,11 - ESSENCE OF LIFE.mp3 ( musics/SH MUSIC (lukhash) - Psyche/11 - ESSENCE OF LIFE.mp3 )
musics/SH MUSIC (lukhash) - Psyche/11 - ESSENCE OF LIFE.mp3
#EXTINF:-1,12 - DIVERGE.mp3 ( musics/SH MUSIC (lukhash) - Psyche/12 - DIVERGE.mp3 )
musics/SH MUSIC (lukhash) - Psyche/12 - DIVERGE.mp3
#EXTINF:-1,13 - SUN WILL DIE.mp3 ( musics/SH MUSIC (lukhash) - Psyche/13 - SUN WILL DIE.mp3 )
musics/SH MUSIC (lukhash) - Psyche/13 - SUN WILL DIE.mp3
$ vlc playlist.m3u

```

Case with browser:  
```
php -S 127.0.0.1:8080
```
Go on http://127.0.0.1:8080/playlist_generator.php and open playlist.m3u with vlc.  
```
$ cat playlist.m3u
#EXTM3U
#EXTINF:-1,01 - ETERNAL LIFE (lukhash.com).mp3 ( http://127.0.0.1:8080/musics/LukHash (SH music) - The far end of the world/01 - ETERNAL LIFE (lukhash.com).mp3 )
http://127.0.0.1:8080/musics/LukHash (SH music) - The far end of the world/01 - ETERNAL LIFE (lukhash.com).mp3
#EXTINF:-1,02 - MAKE IT AWAY (lukhash.com).mp3 ( http://127.0.0.1:8080/musics/LukHash (SH music) - The far end of the world/02 - MAKE IT AWAY (lukhash.com).mp3 )
http://127.0.0.1:8080/musics/LukHash (SH music) - The far end of the world/02 - MAKE IT AWAY (lukhash.com).mp3
#EXTINF:-1,03 - HEARTBEAT (lukhash.com).mp3 ( http://127.0.0.1:8080/musics/LukHash (SH music) - The far end of the world/03 - HEARTBEAT (lukhash.com).mp3 )
http://127.0.0.1:8080/musics/LukHash (SH music) - The far end of the world/03 - HEARTBEAT (lukhash.com).mp3
#EXTINF:-1,04 - VERONICA (lukhash.com).mp3 ( http://127.0.0.1:8080/musics/LukHash (SH music) - The far end of the world/04 - VERONICA (lukhash.com).mp3 )
http://127.0.0.1:8080/musics/LukHash (SH music) - The far end of the world/04 - VERONICA (lukhash.com).mp3
#EXTINF:-1,05 - UP YOURS (lukhash.com).mp3 ( http://127.0.0.1:8080/musics/LukHash (SH music) - The far end of the world/05 - UP YOURS (lukhash.com).mp3 )
http://127.0.0.1:8080/musics/LukHash (SH music) - The far end of the world/05 - UP YOURS (lukhash.com).mp3
#EXTINF:-1,06 - 140908 (lukhash.com).mp3 ( http://127.0.0.1:8080/musics/LukHash (SH music) - The far end of the world/06 - 140908 (lukhash.com).mp3 )
http://127.0.0.1:8080/musics/LukHash (SH music) - The far end of the world/06 - 140908 (lukhash.com).mp3
#EXTINF:-1,07 - SICK OF YOU (lukhash.com).mp3 ( http://127.0.0.1:8080/musics/LukHash (SH music) - The far end of the world/07 - SICK OF YOU (lukhash.com).mp3 )
http://127.0.0.1:8080/musics/LukHash (SH music) - The far end of the world/07 - SICK OF YOU (lukhash.com).mp3
#EXTINF:-1,08 - RECUERDOS DE LA ALHAMBRA (lukhash.com).mp3 ( http://127.0.0.1:8080/musics/LukHash (SH music) - The far end of the world/08 - RECUERDOS DE LA ALHAMBRA (lukhash.com).mp3 )
http://127.0.0.1:8080/musics/LukHash (SH music) - The far end of the world/08 - RECUERDOS DE LA ALHAMBRA (lukhash.com).mp3
#EXTINF:-1,09 - SUPERSTAR (lukhash.com).mp3 ( http://127.0.0.1:8080/musics/LukHash (SH music) - The far end of the world/09 - SUPERSTAR (lukhash.com).mp3 )
http://127.0.0.1:8080/musics/LukHash (SH music) - The far end of the world/09 - SUPERSTAR (lukhash.com).mp3
#EXTINF:-1,10 - AN ADDICT'S STORY (lukhash.com).mp3 ( http://127.0.0.1:8080/musics/LukHash (SH music) - The far end of the world/10 - AN ADDICT'S STORY (lukhash.com).mp3 )
http://127.0.0.1:8080/musics/LukHash (SH music) - The far end of the world/10 - AN ADDICT'S STORY (lukhash.com).mp3
#EXTINF:-1,11 - GIRLS ALOUD feat.LUKHASH - SEXY! NO NO NO! (lukhash.com).mp3 ( http://127.0.0.1:8080/musics/LukHash (SH music) - The far end of the world/11 - GIRLS ALOUD feat.LUKHASH - SEXY! NO NO NO! (lukhash.com).mp3 )
http://127.0.0.1:8080/musics/LukHash (SH music) - The far end of the world/11 - GIRLS ALOUD feat.LUKHASH - SEXY! NO NO NO! (lukhash.com).mp3
#EXTINF:-1,12 - FAILURE (lukhash.com).mp3 ( http://127.0.0.1:8080/musics/LukHash (SH music) - The far end of the world/12 - FAILURE (lukhash.com).mp3 )
http://127.0.0.1:8080/musics/LukHash (SH music) - The far end of the world/12 - FAILURE (lukhash.com).mp3
#EXTINF:-1,13 - TRUE BLUE (lukhash.com).mp3 ( http://127.0.0.1:8080/musics/LukHash (SH music) - The far end of the world/13 - TRUE BLUE (lukhash.com).mp3 )
http://127.0.0.1:8080/musics/LukHash (SH music) - The far end of the world/13 - TRUE BLUE (lukhash.com).mp3
#EXTINF:-1,14 - DEAD END (lukhash.com).mp3 ( http://127.0.0.1:8080/musics/LukHash (SH music) - The far end of the world/14 - DEAD END (lukhash.com).mp3 )
http://127.0.0.1:8080/musics/LukHash (SH music) - The far end of the world/14 - DEAD END (lukhash.com).mp3
#EXTINF:-1,01 - VENGEANCE.mp3 ( http://127.0.0.1:8080/musics/SH MUSIC (lukhash) - Psyche/01 - VENGEANCE.mp3 )
http://127.0.0.1:8080/musics/SH MUSIC (lukhash) - Psyche/01 - VENGEANCE.mp3
#EXTINF:-1,02 - DUB.mp3 ( http://127.0.0.1:8080/musics/SH MUSIC (lukhash) - Psyche/02 - DUB.mp3 )
http://127.0.0.1:8080/musics/SH MUSIC (lukhash) - Psyche/02 - DUB.mp3
#EXTINF:-1,03 - LET ME GO.mp3 ( http://127.0.0.1:8080/musics/SH MUSIC (lukhash) - Psyche/03 - LET ME GO.mp3 )
http://127.0.0.1:8080/musics/SH MUSIC (lukhash) - Psyche/03 - LET ME GO.mp3
#EXTINF:-1,04 - ORGANGRINDER.mp3 ( http://127.0.0.1:8080/musics/SH MUSIC (lukhash) - Psyche/04 - ORGANGRINDER.mp3 )
http://127.0.0.1:8080/musics/SH MUSIC (lukhash) - Psyche/04 - ORGANGRINDER.mp3
#EXTINF:-1,05 - SCAR.mp3 ( http://127.0.0.1:8080/musics/SH MUSIC (lukhash) - Psyche/05 - SCAR.mp3 )
http://127.0.0.1:8080/musics/SH MUSIC (lukhash) - Psyche/05 - SCAR.mp3
#EXTINF:-1,06 - HINDUKUSH.mp3 ( http://127.0.0.1:8080/musics/SH MUSIC (lukhash) - Psyche/06 - HINDUKUSH.mp3 )
http://127.0.0.1:8080/musics/SH MUSIC (lukhash) - Psyche/06 - HINDUKUSH.mp3
#EXTINF:-1,07 - LEVEL FOUR.mp3 ( http://127.0.0.1:8080/musics/SH MUSIC (lukhash) - Psyche/07 - LEVEL FOUR.mp3 )
http://127.0.0.1:8080/musics/SH MUSIC (lukhash) - Psyche/07 - LEVEL FOUR.mp3
#EXTINF:-1,08 - DARK SKY.mp3 ( http://127.0.0.1:8080/musics/SH MUSIC (lukhash) - Psyche/08 - DARK SKY.mp3 )
http://127.0.0.1:8080/musics/SH MUSIC (lukhash) - Psyche/08 - DARK SKY.mp3
#EXTINF:-1,09 - CAVE.mp3 ( http://127.0.0.1:8080/musics/SH MUSIC (lukhash) - Psyche/09 - CAVE.mp3 )
http://127.0.0.1:8080/musics/SH MUSIC (lukhash) - Psyche/09 - CAVE.mp3
#EXTINF:-1,10 - AREN'T YOU CLEVER.mp3 ( http://127.0.0.1:8080/musics/SH MUSIC (lukhash) - Psyche/10 - AREN'T YOU CLEVER.mp3 )
http://127.0.0.1:8080/musics/SH MUSIC (lukhash) - Psyche/10 - AREN'T YOU CLEVER.mp3
#EXTINF:-1,11 - ESSENCE OF LIFE.mp3 ( http://127.0.0.1:8080/musics/SH MUSIC (lukhash) - Psyche/11 - ESSENCE OF LIFE.mp3 )
http://127.0.0.1:8080/musics/SH MUSIC (lukhash) - Psyche/11 - ESSENCE OF LIFE.mp3
#EXTINF:-1,12 - DIVERGE.mp3 ( http://127.0.0.1:8080/musics/SH MUSIC (lukhash) - Psyche/12 - DIVERGE.mp3 )
http://127.0.0.1:8080/musics/SH MUSIC (lukhash) - Psyche/12 - DIVERGE.mp3
#EXTINF:-1,13 - SUN WILL DIE.mp3 ( http://127.0.0.1:8080/musics/SH MUSIC (lukhash) - Psyche/13 - SUN WILL DIE.mp3 )
http://127.0.0.1:8080/musics/SH MUSIC (lukhash) - Psyche/13 - SUN WILL DIE.mp3
```


  
Tip
===

You can find web pages with musics files by using http://www.keewa.net/ or by searching on google :  
```
intext:*.mp3 intitle:"index of" -inurl:"index" -inurl:"html" -inurl:"php" -inurl:"asp" "name" "last modified" "size"
```
And set for example in config.php :
```
	$URIs = array(
		"http://example.com/music/",
		"http://example.com/somewhere/zic/",
		"http://123.123.123.123/",
		"http://127.0.0.1/"
	);
```
