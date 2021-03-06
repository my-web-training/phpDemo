<?php
/**
 * 功能说明
 * <ul>
 * <li>创建文件描述：V36支付结果接收前端处理页面</li>
 * <li>1、此程序放在商户服务器端，用于接收gnetpg.com通过用户浏览器返回的支付结果</li>
 * <li> 2、对支付结果进行签名校验 </li>
 * <li> 3、返回支付结果给商户</li>
 * </ul>
 * 
 * @author <ul>
 *         <li>创建者：广州银联网络支付有限公司（技术管理部）</li>
 *         </ul>
 * @version <ul>
 *          <li>创建版本：v1.0.0 日期：2015-02-05</li>
 *          </ul>
 */
	header("Content-type: text/html; charset=utf-8");

	foreach ($_POST as $k => $v)
	{
		echo $k . "=" . $v . "&";
	}
	echo "<br><br>";

	$OrderNo 		= $_POST["OrderNo"];      	//商户支付流水号
	$PayNo 			= $_POST["PayNo"];          //银联支付单号
	$PayAmount 		= $_POST["PayAmount"];  	//支付金额
	$CurrCode 		= $_POST["CurrCode"];    	//支付币种
	$SystemSSN 		= $_POST["SystemSSN"];  	//银联系统参考号
	$RespCode 		= $_POST["RespCode"];    	//交易响应码
	$SettDate 		= $_POST["SettDate"];    	//清算日期，格式（MMDD）
	$Reserved01 	= $_POST["Reserved01"];		//保留域1
	$Reserved02 	= $_POST["Reserved02"];		//保留域2
	$SignMsg 		= trim($_POST["SignMsg"]);      	//签名数据，32位MD5加密
	
	//商户密钥
	$PKey = "12hi60ohgmp16nbev0gr8au69bodzguz";
	
	//检验数据是否正确
	if($SignMsg == "")
	{
		echo "广州银联返回的交易结果，签名数据不完整"; 
		exit;
	}
	//组装签名数据，OrderNo值+PayNo值+PayAmount值+CurrCode值+SystemSSN值+RespCode值+SettDate值+Reserved01值+Reserved02值
	$SourceText = $OrderNo . $PayNo  . $PayAmount  . $CurrCode  . $SystemSSN  . $RespCode  . $SettDate  . $Reserved01  . $Reserved02;
	
	//对返回的信息进行加密签名
	$EncodePKey = md5($PKey);
	$SourceText = $SourceText . $EncodePKey;
	$EncodeMsg = md5($SourceText);
	
	//校验签名是否一致
	if($SignMsg != $EncodeMsg)
	{
		echo "校验签名失败，请确认你使用的密钥是否正确"; 
		exit;
	}
	
	
	// 输出支付结果给顾客
	if("00" == $RespCode)
	{
		echo "支付成功!";
  	  	//【重点注意】收到成功交易结果后，请通过商户订单号再发起交易查询接口，确认交易已成功。
	}
	else
	{
		echo "支付失败!!响应码为：".RespCode;
	}
?>