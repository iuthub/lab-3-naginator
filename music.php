<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
 "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Music Viewer</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<link href="http://www.cs.washington.edu/education/courses/cse190m/09sp/labs/3-music/viewer.css" type="text/css" rel="stylesheet" />
		<link href="viewer.css" type="text/css" rel="stylesheet" />
	</head>

	<body>

		<div id="header">

		<a href="music.php"><h1>190M Music Playlist Viewer</h1>
			<h2>Search Through Your Playlists and Music</h2></a>
		</div>
		<div id="listarea">
			<ul id="musiclist">		<?php
$files1=glob("webpage/songs/*.mp3");
$files2=glob("webpage/songs/*.txt");
			

				if(isset($_REQUEST["playlist"])){
		$tracks=file("webpage/songs/".$_REQUEST["playlist"]);
		foreach ($tracks as $value) {
	?>
	<li class="mp3item"><a href="webpage/songs/<?php echo $value ?>"><?php echo $value; ?></a>

		<?php if(file_exists('webpage/songs/$value')){
			$size=filesize('webpage/songs/$value');
	if ($size<=1023) 
     $units="B";
     else if($size>=1024 && $size<=1048575){
     	$units="Kb";
     	$size=round($size/1024,2);
     }
     else{
     	$units="Mb";
     	$size=round($size/(1024*1024),2);
     }
	 echo " (".$size.") ".$units;
	}?></li>
	<?php
		}
		
	}
		else{
foreach ($files1 as $file) {

	
	?>
<li class="mp3item"><a href="<?php echo $file ?>"><?= basename($file) ?></a>
	<?php $size=filesize($file);
	if ($size<=1023) 
     $units="B";
     else if($size>=1024 && $size<=1048575){
     	$units="Kb";
     	$size=round($size/1024,2);
     }
     else{
     	$units="Mb";
     	$size=round($size/(1024*1024),2);
     }
	 echo " (".$size.") ".$units;?>
</li>
	<?php 
	} 
}

?>
	<?php 
foreach($files2 as $file){
?><li class="playlistitem"><a href="music.php?playlist=<?php echo basename($file) ?>"><?= basename($file) ?></a>
		<?php $size=filesize($file);
	if ($size<=1023) 
     $units="B";
     else if($size>=1024 && $size<=1048575){
     	$units="Kb";
     	$size=round($size/1024,2);
     }
     else{
     	$units="Mb";
     	$size=round($size/(1024*1024),2);
     }
	 echo " (".$size.") ".$units;?>
	
</li>
<?php
}

	 ?>
<form action="music.php?shuffle=on"></form>

</ul>
		</div>

	</body>
</html>
              
