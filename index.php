<pre>
    __                                  _ __  __    _             __                        
   / /_  ____  __  __________ _      __(_) /_/ /_  (_)___  ____ _/ /_  ____  __  __________ 
  / __ \/ __ \/ / / / ___/ _ \ | /| / / / __/ __ \/ / __ \/ __ `/ __ \/ __ \/ / / / ___/ _ \
 / / / / /_/ / /_/ (__  )  __/ |/ |/ / / /_/ / / / / / / / /_/ / / / / /_/ / /_/ (__  )  __/
/_/ /_/\____/\__,_/____/\___/|__/|__/_/\__/_/ /_/_/_/ /_/\__,_/_/ /_/\____/\__,_/____/\___/
<?
	function make_dir_tree($directory){	
		echo "<ul class=''>";
		$dirs = glob($directory);
		foreach($dirs as $dir){
			if ($dir === end($dirs)){
				$sep = "+";
			} else {
				$sep = "|";
			}
			if(is_dir($dir)){
				$end_char = "/";
				$class = "dir";
			} else {
				$end_char = "";
				$class = "file";
			}	
			echo "<a href='$dir'><li class='".$class."'>".$sep." -- ".str_replace(trim($directory, "*"),"", $dir).$end_char."</a>";
			make_dir_tree($dir."/*");	
		}
		echo "</ul>";
		
	}
?>
	

<?
	make_dir_tree("../*");		
?>
</pre>

<style>
	ul{
		list-style: none;
		/*background:rgba(0,0,0,.1);*/
		color:black;
		margin:0;
		padding:0 0 0 2em ;
	}
	li{
		max-height:1.2em;
		overflow:hidden;
		transition:all 1s; 
		
	}
	li:hover{
		max-height:1000em;
		transition:all .1s; 
	}
	.file{
		font-weight:normal;
	}
	.dir{
		font-weight:bold;
	}
	.sub-level{
		max-height:0px;
		overflow:hidden;
	}
	.sub-level:hover{
		max-height:100px;
	}
	a{
		color:inherit;
		text-decoration:none;
	}
</style>