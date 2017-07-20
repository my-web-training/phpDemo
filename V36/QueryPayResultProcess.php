<?php
/**
 * 功能说明
 * <ul>
 * <li>创建文件描述：测试环境,V36查询交易结果（实时对账）调试处理页面</li>
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

	$TranType 			= $_REQUEST["TranType"];          //交易类型
	$JavaCharset 		= $_REQUEST["JavaCharset"];  		//编码
	$Version 			= $_REQUEST["Version"];		    //版本号
	$UserId 			= $_REQUEST["UserId"];            //用户ID
	$Pwd 				= $_REQUEST["Pwd"];               //用户密码
	$MerId 				= $_REQUEST["MerId"];             //商户ID
	$PayStatus 			= $_REQUEST["PayStatus"];      	//支付状态
	$ShoppingTime 		= $_REQUEST["ShoppingTime"];		//交易时间，如果上送ShoppingTime那么BeginTime与EndTime将作废
	$BeginTime 			= $_REQUEST["BeginTime"];      	//交易开始时间
	$EndTime 			= $_REQUEST["EndTime"];           //交易结束时间
	$OrderNo 			= $_REQUEST["OrderNo"];           //商户订单号
	$Pwd = md5($Pwd);//对密码进行Md5加密
	
	//组装请求参数
	$data['TranType'] = $TranType;
	$data['JavaCharset'] = $JavaCharset;
	$data['Version'] = $Version;
	$data['UserId'] = $UserId;
	$data['Pwd'] = $Pwd;
	$data['MerId'] = $MerId;
	$data['PayStatus'] = $PayStatus;
	$data['ShoppingTime'] = $ShoppingTime;
	$data['BeginTime'] = $BeginTime;
	$data['EndTime'] = $EndTime;
	$data['OrderNo'] = $OrderNo;
	
	
	//交易结果查询接口地址
	//商户网站域名
	$Url = "http://test.gnetpg.com:8089/GneteMerchantAPI/Trans.action";
	
	
	$ch = curl_init ();
	curl_setopt ( $ch, CURLOPT_URL, $Url );
	curl_setopt ( $ch, CURLOPT_POST, 1 );
	curl_setopt ( $ch, CURLOPT_HEADER, 0 );
	curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data );
	$Resp = curl_exec ( $ch );
	curl_close ( $ch );
	echo $Resp;
	
	if($Resp == "")
	{
		echo "返回的交易结果为空！";
		exit;
	}
	//1、对账响应结果数据是指构造成对账结果的数据，每条记录用行分隔，每列用\n分隔
    //2、订单的格式：订单日期\n支付金额\n商户订单号\n商户终端号\n系统参考号\n响应码\n清算日期\n保留域1\n保留域2\n
    //注意用&替换\n空格符,不然\n传入到后台会自动转换为空格
?>
