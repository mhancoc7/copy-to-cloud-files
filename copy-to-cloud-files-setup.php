<?php

// define url -- will check for test link and remove extra characters if installing from test link
    $server = $_SERVER['SERVER_NAME'];

    if (strpos($server,'websitetestlink') !== false) {
        $split = explode(".php",$server,2);
        $url = $split[0];
        $url = str_replace("www.", "", $url);
    } else {
        $url = $_SERVER['SERVER_NAME'];
        $url = str_replace("www.", "", $url);
    }


if (isset($_POST["Submit"])) {

$string = '<?php

// Cloud Files API -- Required!!
$username = "'. $_POST["username"]. '";
$key = "'. $_POST["key"]. '";

// URL
$url = "'. $_POST["url"]. '";

?>';

$fp = fopen("copy-to-cloud-files-config.php", "w");

fwrite($fp, $string);

fclose($fp);

header("Location: copy-to-cloud-files-send.php"); 
exit;

}
?>

<form action="" method="post" name="go" id="go">

<em>Enter your Rackspace&reg; username/API Key</em><br /><br />
<p>
API Username:<br />
<input name="username" type="text" id="username" required> 
</p>
<br />
<p>
API Key:<br />
<input name="key" type="password" id="key" required> 
</p>


<p>
<input name="url" type="hidden" id="url" value="<?php echo $url ?>" required>
</p>

<p>

<button type="submit" name="Submit" value="Go" >Go</button>
</p>

</form>