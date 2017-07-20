
<?php
/**
 * 功能说明
 * <ul>
 * <li>创建文件描述：退款后台处理页面</li>
 * </ul>
 * 
 * @author <ul>
 *         <li>创建者：广州银联网络支付有限公司（技术管理部）</li>
 *         </ul>
 * @version <ul>
 *          <li>创建版本：v1.0.0 日期：2015-02-05</li>
 *          </ul>
 */
?>

<?php
	//设置编码，解决乱码问题
 	header("Content-type: text/html; charset=utf-8");
 	
 	//获取字符串中的值
	function getValue($Resp, $Key)
	{
		$RespArr = split("&", $Resp);
		foreach ($RespArr as $k => $v)
		{
			$_v = split("=", $v);
			if ($_v[0] == $Key)
			{
				return $_v[1];
			}
		}
	}
 	

	$TranType = $_POST["TranType"];
	$JavaCharset = $_POST["JavaCharset"];  //编码
	$Version = $_POST["Version"];          //版本号
	$MerId = $_POST["MerId"];              //商户ID
	$OrderNo = $_POST["OrderNo"];          //商户订单号
	$ShoppingDate = $_POST["ShoppingDate"];//订单交易（支付）日期
	$PayAmount = $_POST["PayAmount"];      //交易（支付）金额
	$RefundAmount = $_POST["RefundAmount"];//退款金额
	$Reserved = $_POST["Reserved"];        //保留域
	
	//商户密钥
	$PKey = "12hi60ohgmp16nbev0gr8au69bodzguz";
	
	//签名数据说明：将签名中的<key, value>对（不包含合作密钥）根据key值作升序排列。
	//其中key应包含报文格式中除"签名方法"和"签名信息"外的所有取值。若<key, value>对中含有&、@等特殊字符或者中文字符时，要保持原样计算摘要值。
	$SignMap["TranType"] = $TranType;
	$SignMap["JavaCharset"] = $JavaCharset;
	$SignMap["Version"] = $Version;
	$SignMap["MerId"] = $MerId;
	$SignMap["OrderNo"] = $OrderNo;
	$SignMap["ShoppingDate"] = $ShoppingDate;
	$SignMap["PayAmount"] = $PayAmount;
	$SignMap["RefundAmount"] = $RefundAmount;
	$SignMap["Reserved"] = $Reserved;
	ksort($SignMap);
	
	foreach ($SignMap as $k => $v)
	{
		$SourceText = $SourceText . $k . "=" . $v . "&";
	}
	
	
	//对数据进行加密签名
	$EncodePKey = md5($PKey);
	$SignMsg = md5($SourceText . $EncodePKey);
	$Param = $SourceText . "SignMsg=" . $SignMsg;
	
	
	//退款接口URL
	$Url = "http://test.gnetpg.com:8089/GneteMerchantAPI/Trans.action";
	
	$ch = curl_init ();
	curl_setopt ( $ch, CURLOPT_URL, $Url );
	curl_setopt ( $ch, CURLOPT_POST, 1 );
	curl_setopt ( $ch, CURLOPT_HEADER, 0 );
	curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt ( $ch, CURLOPT_POSTFIELDS, $Param );
	$Resp = curl_exec ( $ch );
	curl_close ( $ch );

	
	//处理退款结果，响应数据样例：Code=0000&Message=退款成功
	if($Resp == "")
	{
		echo ("【退款返回的结果为空!】");
		exit;
	}
	
	$Code = getValue($Resp, "Code");
	$Code = trim($Code);
	$Message = getValue($Resp, "Message");
	$Message = trim($Message);
	$RespSignMsg = getValue($Resp, "SignMsg");
	
	$RespSourceText = "Code=" . $Code . "&Message=" . $Message . "&" . $EncodePKey;
	$RespSourceText = mb_convert_encoding($RespSourceText, "UTF-8");
	$_SignMsg = md5($RespSourceText);
	if ($RespSignMsg == $_SignMsg)
	{
		echo ("验证签名失败");
		return;
	}
	
	if("0000" == Code)
	{
		echo("【退款成功！响应信息】" . $Message);
	}
	else
	{
		echo("【退款失败！错误信息】" . $Message);
	}
?>
