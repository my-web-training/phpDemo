<?php
/**
 * 功能说明
 * <ul>
 * <li>创建文件描述：V36支付加密及验签处理页面</li>
 * <li>1、获取表单提交的商户数据</li>
 * <li>2、组装订单原始数据进行数据签名，签名数据组成：MerId值+OrderNo值+OrderAmount值+CurrCode值+OrderType值+CallBackUrl值+BankCode值+LangType值+BuzType值.Reserved01值+Reserved02值</li>
 * <li>3、使用MD5对数据进行加密签名：EncodePKey = MD5(PKey);EncodeMsg = MD5(Msg + EncodePKey)</li>
 * <li>4、注意：1：此接口只支持https请求，2：每次请求上送的OrderNo必须唯一，3：	签名数据采用32位MD5加密算法</li>
 * </ul>
 * 
 * @author <ul>
 *         <li>创建者：广州银联网络支付有限公司（技术管理部）</li>
 *         </ul>
 * @version <ul>
 *          <li>创建版本：v1.0.0 日期：2015-01-28</li>
 *          </ul>
 */



$PKey			= "12hi60ohgmp16nbev0gr8au69bodzguz";
$MerId       	= $_POST["MerId"];          //商户ID
$OrderNo		= $_POST["OrderNo"];		//商户订单号
$OrderAmount	= $_POST["OrderAmount"];	//订单金额，格式：元.角分
$CurrCode		= $_POST["CurrCode"];		//货币代码，值为：CNY
$OrderType		= $_POST["OrderType"];		//订单类型，默认：B2C
$CallBackUrl	= $_POST["CallBackUrl"];	//支付结果接收URL
$BankCode		= $_POST["BankCode"];		//银行代码
$LangType		= $_POST["LangType"];		//语言类型
$BuzType		= $_POST["BuzType"];		//业务类型
$Reserved01 	= $_POST["Reserved01"];	    //保留域1
$Reserved02 	= $_POST["Reserved02"];	    //保留域2
//组合成订单原始数据
$SourceText 	= $MerId . $OrderNo . $OrderAmount . $CurrCode . $OrderType . $CallBackUrl . $BankCode . $LangType . $BuzType . $Reserved01 . $Reserved02;
$PKey     		= md5($PKey);
$SignMsg      = md5($SourceText.$PKey);

$FormUrl = "http://test.gnetpg.com:8089/GneteMerchantAPI/api/PayV36";
?>

<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script language='javascript' type="text/javascript">
		window.onload = function()
		{
			document.all.SendOrderForm.submit();
		}
	</script>
</head>
<body>
	<form method='post' name='SendOrderForm' action='<?php echo $FormUrl; ?>'>
		<input type='hidden' name='MerId' value='<?php echo $MerId; ?>'/>
		<input type='hidden' name='OrderNo' value='<?php echo $OrderNo; ?>'/>
		<input type='hidden' name='OrderAmount' value='<?php echo $OrderAmount; ?>'/>
		<input type='hidden' name='CurrCode' value='<?php echo $CurrCode; ?>'/>
		<input type='hidden' name='CallBackUrl' value='<?php echo $CallBackUrl; ?>'/>
		<input type='hidden' name='OrderType' value='<?php echo $OrderType; ?>'/>
		<input type='hidden' name='BankCode' value='<?php echo $BankCode; ?>'/>
		<input type='hidden' name='BuzType' value='<?php echo $BuzType; ?>'/>
		<input type='hidden' name='LangType' value='<?php echo $LangType; ?>'/>
		<input type='hidden' name='Reserved01' value='<?php echo $Reserved01; ?>'/>
		<input type='hidden' name='Reserved02' value='<?php echo $Reserved02; ?>'/>
		<input type='hidden' name='SignMsg' value='<?php echo $SignMsg; ?>'/>
	</form>
</body>
</html>