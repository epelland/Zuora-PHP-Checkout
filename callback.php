<script>
function callback() {
<?
//################################################# CHANGE THIS INFORMATION ACCORDINGLY #####################################
$apiSecurityKey = "123456qHP7-gPHjliwXXXXXXW78FsSH5Q6Gg1JAAAAAA"; //get your API security key from the Z-Checkout listing page

//get query string
$queryString = 'id=' . $_REQUEST['id'] . '&tenantId=' . $_REQUEST['tenantId'] . '&timestamp=' . $_REQUEST['timestamp'] . '&token=' . $_REQUEST['token'];
//concatenate API security key with query string
$queryStringToHash = $queryString . $apiSecurityKey;
//get UTF8 bytes
$queryStringToHash = utf8_encode($queryStringToHash);
//create MD5 hash
$hashedQueryString = md5($queryStringToHash);
//encode to Base64 URL safe
$hashedQueryStringBase64ed = strtr(base64_encode($hashedQueryString), '+/', '-_');

//signature clear?
$signatureClear = $_REQUEST['responseSignature'] != NULL && $_REQUEST['responseSignature'] == $hashedQueryStringBase64ed;

//get current time in utc milliseconds
list($usec, $sec) = explode(" ", microtime());
$timestamp = (float)$sec - 2;

//timestamp clear??
$timestampDifference = (float)($timestamp . '000') - (float)($_REQUEST['timestamp']);
$timestampClear = $timestampDifference <= 300*1000; //less than 300 secs ago?

//both clear?
$securityClear = $signatureClear && $timestampClear;

if ($securityClear == true) {
		if ($_REQUEST['success'] != NULL && $_REQUEST['success'] == 'true') {?>
			parent.hostedpagecallback_success('<?=$_REQUEST['subscription_id']?>','<?=$_REQUEST['first_name']?>');
	<?	}
		else {?>
			parent.hostedpagecallback_failure('<?=$_REQUEST['errorCode']?>',
					'<?=$_REQUEST['errorMessage']?>'
					);
	<?	}
}
?>
}
</script>

<body onload="callback();"/>
<div align="center">
<br/><br/><br/>
Please wait while this page loads...
</div>
