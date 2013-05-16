<?php

function makeDir($path) {
	$fp = fopen($path . "index.html", "w");
	fputs($fp, "<html>\n<head><title>" . $path . "</title></head>\n<body>\n");
	fputs($fp, "<ul>\n");
	$dirs = scandir($path);
	foreach($dirs as $dir) {
		if($dir[0] == "." || $dir == "index.html") {
			continue;
		}
		if(is_dir($path . $dir)) {
			fputs($fp, "<li><a href=\"" . $dir . "/\">" . $dir . "</a></li>\n");
			makeDir($path . $dir . "/");
			continue;
		}
		fputs($fp, "<li><a href=\"https://raw.github.com/taktod/mvn-repo/master/" . $path . $dir . "\">" . $dir . "</a></li>\n");
	}
	fputs($fp, "</ul>\n</body>\n</html>");
	fclose($fp);
#	var_dump($dirs);
}
makeDir("./");

