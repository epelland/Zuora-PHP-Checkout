# Zuora-PHP-Checkout

This repository will be a hybrid of the Zuora Checkout PHP sample:
https://knowledgecenter.zuora.com/CA_Commerce/T_Hosted_Commerce_Pages/D_Subscribe_Pages/B_Implementing_Subscribe_Pages_on_Your_Website/F_Sample_Code_for_Checkout_Pages

and the Zuora Payment Pages PHP sample: https://knowledgecenter.zuora.com/CA_Commerce/T_Hosted_Commerce_Pages/C_Hosted_Payment_Pages/B_Implementing_Hosted_Payment_Pages_on_Your_Website/F_Hosted_Payment_Pages_Sample_Code

The Checkout Sample will be used as the base, and I will copy in the required URI generation/authentication from the Payment Page sample on top of that.


#Configure
1. Edit callback.php line #5 to display your apiSecurityKey<br>
<code>
$apiSecurityKey = "123456qHP7-gPHjliwXXXXXXW78FsSH5Q6Gg1JAAAAAA"; //get your API security key from the Z-Checkout listing page
</code>
2. Edit subscription.php lines #10 - #12 to display your pageId, tenantId, and apiSecurityKey.<br>
<code>$pageId = "123456963233450c013247c04e712345";</code><br>
<code>$tenantId = "11111";</code><br>
<code>$apiSecurityKey = "XXxxxFqHP1234HjliXXXxxxUW78FsSH5Q6XXXxxxvc0="; //get your API security key from the HPM listing page</code>
