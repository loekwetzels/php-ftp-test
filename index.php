<pre><?php

$configs = [
	[
		'FTP_HOST' => "",
		'FTP_USERNAME' => "",
		'FTP_PASSWORD' => "",
		'FTP_PATH' => "",
	],
	[
		'FTP_HOST' => "",
		'FTP_USERNAME' => "",
		'FTP_PASSWORD' => "",
		'FTP_PATH' => "",
	],
];

foreach($configs as $config)
{

echo "\n\n -------------------------------------------------- \n\n";

// Make FTP connection
echo "\n" . date('Y-m-d H:i:s.u')." start make FTP connection to ".$config['FTP_HOST'];
$ftp = ftp_ssl_connect($config['FTP_HOST']);
echo "\n" . date('Y-m-d H:i:s.u')." FTP: " . print_r($ftp,true);
echo "\n" . date('Y-m-d H:i:s.u')." end FTP connection";

// Login
echo "\n" . date('Y-m-d H:i:s.u')." start login";
$result = ftp_login($ftp, $config['FTP_USERNAME'], $config['FTP_PASSWORD']);
echo "\n" . date('Y-m-d H:i:s.u')." ". print_r($result,true);
echo "\n" . date('Y-m-d H:i:s.u')." end login ";

// Turns passive mode on
echo "\n" . date('Y-m-d H:i:s.u')." start set pasv=true";
$result = ftp_pasv($ftp, true);
echo "\n" . date('Y-m-d H:i:s.u')." ". print_r($result,true);
echo "\n" . date('Y-m-d H:i:s.u')." end set pasv=true";

// upload file
$dest = $config['FTP_PATH'] . 'testfile-'.date('YmdHis').'.txt';
echo "\n" . date('Y-m-d H:i:s.u')." start upload: ". $dest;
$result = ftp_put($ftp, $dest, 'testfile.txt', FTP_BINARY, FTP_AUTORESUME);
echo "\n" . date('Y-m-d H:i:s.u')." ". print_r($result,true);
echo "\n" . date('Y-m-d H:i:s.u')." end upload";

echo "\n" . date('Y-m-d H:i:s.u')." start ftp close";
$result = ftp_close($ftp);
echo "\n" . date('Y-m-d H:i:s.u')." ". print_r($result,true);
echo "\n" . date('Y-m-d H:i:s.u')." end ftp close";

var_dump($result);

}
?></pre>