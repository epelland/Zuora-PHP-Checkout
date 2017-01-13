<?
$subscription_id = $_REQUEST['subscription_id'];
$first_name = $_REQUEST['first_name'];
if ($subscription_id != NULL && $first_name != NULL) {
	echo "<html><head><title>Successful Subscribe </title></head><body><b>DEMO</b><br/>Thank you <b>" . $first_name ."</b>, you have successfully created a subscription! Your subscription ID is<b>" . $subscription_id . "</b></body></html>";
    return;
}

//################################################# CHANGE THESE INFORMATION ACCORDINGLY #####################################
//PASTE YOUR Z-CHECKOUT URL HERE:
$iframeUrl = "https://apisandbox.zuora.com/apps/PublicHostedPage.do?method=requestPage&id=4028e6963233450c013247c04e123456&tenantId=10000";
		
if ($_REQUEST['errorCode'] != NULL && $_REQUEST['errorCode'] != "") {
	$iframeUrl = $iframeUrl . "&retainValues=true";
}
?>
 
<script>
function hostedpagecallback_success(ref_id, first_name) {
	document.ZCheckoutForm.subscription_id.value = ref_id;
	document.ZCheckoutForm.first_name.value = first_name;
	document.ZCheckoutForm.submit();
}
function hostedpagecallback_failure(errorCode, errorMessage) {
	var locn = "subscription.php?retainValues=true";
	locn += "&errorCode=" + errorCode;
	locn += "&errorMessage=" + errorMessage;
	window.location.href = locn;
}
function showErrorMessagesIfNeeded() {
	<?if ($_REQUEST['retainValues'] != NULL && $_REQUEST['retainValues']=='true') {?>
		document.getElementById('ValidationSummaryRow').style.display = '';
		
		var errorString = "<b>The following errors were occured:</b><br/><ul>";
		
		var errorCode = "<?=$_REQUEST['errorCode']?>";
		var errorMessage = "<?=$_REQUEST['errorMessage']?>";
		
		if (errorMessage != null && errorMessage != '') errorString += "<li>" + errorMessage + "</li>";
		errorString += "</ul>";
		
		document.getElementById('ValidationSummarySpan').innerHTML = errorString;
	<?}?>
}
</script>
<body onLoad="showErrorMessagesIfNeeded()"/>


<form id="ZCheckoutForm" name="ZCheckoutForm" action="subscription.php" method="get">
	<input type="hidden" name="subscription_id"/>
	<input type="hidden" name="first_name"/>
	
	<table width="100%" cellpadding="0" cellspacing="0" border="0">
		<tr><td>
			<a href="subscription.php">Refresh page</a> | 
			<a href="<?=$iframeUrl?>" target="_blank">Open Z-Checkout page in new window</a>
		</td></tr>
		<tr id="ValidationSummaryRow" style="display: none;"><td>
				<div>
					<div id="ValidationSummarySpan" class="ValidationSummary"></div>
				</div> 
		</td></tr>
		<tr><td>
				<iframe frameborder="1" src="<?=$iframeUrl?>"
				 id="ZCheckoutiFrame" width="630px" height="820"></iframe> 
		</td></tr>
	</table>

</form>
