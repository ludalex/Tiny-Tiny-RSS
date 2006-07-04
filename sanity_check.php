<?
	define('EXPECTED_CONFIG_VERSION', 2);

	if (!file_exists("config.php")) {
		print "<b>Fatal Error</b>: You forgot to copy 
		<b>config.php-dist</b> to <b>config.php</b> and edit it.";
		exit;
	}

	require_once "config.php";

	if (CONFIG_VERSION != EXPECTED_CONFIG_VERSION) {
			print "<b>Fatal Error</b>: Your configuration file has
			wrong version. Please copy new options from <b>config.php-dist</b> and
			update CONFIG_VERSION directive.";
		exit;	
	}

	if (RSS_BACKEND_TYPE == "magpie" && !file_exists("magpierss/rss_fetch.inc")) {
		print "<b>Fatal Error</b>: You forgot to place 
		<a href=\"http://magpierss.sourceforge.net\">MagpieRSS</a>
		distribution in <b>magpierss/</b>
		subdirectory of TT-RSS tree.";
		exit;
	}

	if (RSS_BACKEND_TYPE == "simplepie" && !file_exists("simplepie/simplepie.inc")) {
		print "<b>Fatal Error</b>: You forgot to place 
		<a href=\"http://simplepie.org\">SimplePie</a>
		distribution in <b>simplepie/</b>
		subdirectory of TT-RSS tree.";
		exit;
	}

	if (RSS_BACKEND_TYPE != "simplepie" && RSS_BACKEND_TYPE != "magpie") {
		print "<b>Fatal Error</b>: Invalid RSS_BACKEND_TYPE";
		exit;
	}

	if (CONFIG_VERSION != EXPECTED_CONFIG_VERSION) {
		return "config: your config file version is incorrect. See config.php-dist.";
	}

	if (file_exists("xml-export.php") || file_exists("xml-import.php")) {
		print "<b>Fatal Error</b>: XML Import/Export tools (<b>xml-export.php</b>
		and <b>xml-import.php</b>) could be used maliciously. Please remove them 
		from your TT-RSS instance.";
		exit;
	}
?>
