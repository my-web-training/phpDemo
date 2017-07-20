<?php
	ini_set('date.timezone','Asia/Shanghai');
	header("Content-type: text/html; charset=utf-8");
	$orderId = $_POST['orderid'];
	if(!$orderId){
		echo '请求出错,找不到订单';
		exit;
	}
	$bool = true;
	include('../../index.php');
			
	$root = str_replace('pay/weixin/wk_pay_sanfang.php','',strtolower($_SERVER['SCRIPT_NAME']));
	$themedir = DOMAIN.$root.'theme/'.$MyConfig['Template']['template_dir'].'/';
			
	
	//当前页面提交时获取参数
		if($_POST['paytype'] == 1) {
			
			global $MyDB;
			$my = new My(FALSE);
			$db = $my ->getDB();
			$sql = "select * from `{$MyDB['dbprefix']}pay` where id='5' limit 1";
			$payset = $db->fetch_first($sql);
			
			$merchno = trim($payset['partnerid']);
			$org_id = trim($payset['account']);
			$key = trim($payset['return']);
			$tel = $_POST['tel'];
			//$amount = $_POST['amount'];
			$amount = $_POST['amount'];
			$idNo = $_POST['idNo'];
			$idTyp = '00';
			$CapCrdNm = iconv('gbk', 'UTF-8', $_POST['CapCrdNm']);
			$CrdNo = $_POST['CrdNo'];
			$urlStr = "http://ouchuang.xjoyt.com:8099/OuYaZhiFu/QuickPayMessageAction.action";
			
				/**
			 * @param $url
			 * @param string $method
			 * @param string $data
			 * @return mixed
			 */
			function curlPost($url, $data = '', $method = 'post')
			{
				$ch     = curl_init();
				$header = 'Accept-Charset: utf-8';
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, strtoupper($method));
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
				curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($ch, CURLOPT_AUTOREFERER, 1);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

				$temp = curl_exec($ch);
				return $temp;
			}
			function getIP() { 
				if (getenv('HTTP_CLIENT_IP')) { 
					$ip = getenv('HTTP_CLIENT_IP'); 
				} elseif (getenv('HTTP_X_FORWARDED_FOR')) { 
					$ip = getenv('HTTP_X_FORWARDED_FOR'); 
				} elseif (getenv('HTTP_X_FORWARDED')) { 
					$ip = getenv('HTTP_X_FORWARDED'); 
				} elseif (getenv('HTTP_FORWARDED_FOR')) { 
					$ip = getenv('HTTP_FORWARDED_FOR'); 
				} elseif (getenv('HTTP_FORWARDED')) { 
					$ip = getenv('HTTP_FORWARDED'); 
				} else { 
					$ip = $_SERVER['REMOTE_ADDR']; 
				} 
				return $ip; 
			} 
			
			$out_trade_no = time();
			$origMap['merchno'] = $merchno;
			$origMap['org_id'] = $org_id;
			$origMap['reqSn'] = str_replace('HT','',date("YmdHis", time()));
			$origMap['PhoneNo'] = $tel;
			$origMap['amount'] = $amount;
			$origMap['notify_url'] = 'http://' . $_SERVER['HTTP_HOST'] . '/oc3/notify.php';
			$origMap['return_url'] = 'http://' . $_SERVER['HTTP_HOST'] . '/oc3/return.php';
			$origMap['CrdNo'] = $CrdNo;
			$origMap['CapCrdNm'] = $CapCrdNm;
			$origMap['idTyp'] = $idTyp;
			$origMap['idNo'] = $idNo;
			$origMap['nonce_str'] = 'sajnjxksajd';
			
			$str = "merchno=" . $origMap['merchno'] . "&org_id=" . $origMap['org_id'] . "&reqSn=" . $origMap['reqSn'] . "&PhoneNo=" . $origMap['PhoneNo'] . "&amount=" . 
							$origMap['amount'] . "&CrdNo=" . $origMap['CrdNo'] . "&CapCrdNm=" . $origMap['CapCrdNm'] . "&idTyp=" . $origMap['idTyp'] . "&idNo=" . $origMap['idNo'] . 
							  "&nonce_str=" . $origMap['nonce_str'] . "&key=" . $key;
			$origMap['sign'] = strtoupper(md5($str));
			
			$result = curlPost($urlStr, $origMap);
			
			$payparams = json_decode($result, true);
			
			if($payparams['RET_CODE'] == "0000") {
				$url = "/pay/weixin/wk_pay_sanfang1.php?orderid=" . str_replace('HT','',$orderId) . "&total_fee=" . $amount . "&sign=" . $origMap['sign'] . "&nonce_str=" . $origMap['nonce_str'];
				header('Location:' . $url);exit;
			} else {
				echo $payparams['RET_CODE'] . ':' . $payparams['ERR_MSG'];exit;
			}
		}
	
;echo '<!-- ';echo $payurl;;echo ' -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>填写银行卡信息</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <!--[if IE 6]>
      <script type="text/javascript" src="http://skin.1yyg.com/js/iepng.js"></script> 
      <script type="text/javascript">
      EvPNG.fix(\'.search a.seaIcon i,.m-menu-all h3 em,.nav-cart-btn i.f-cart-icon,a.u-cart s,.u-mui-tab a.u-menus s,.u-mui-tab li.f-cart a.u-menus i,.u-mui-tab li.f-both-top a.u-menus,.u-mui-tab li.f-both-bottom a.u-menus,.i-ctrl a s,.g-list li cite,.f-list-sorts li.m-value s,.nav-main li.f-nav-thanks span,.u-float-list a i,.cartEmpty i,.transparent-png\');
      </script>
  <![endif]-->
    <link rel="stylesheet" type="text/css" href="';echo $themedir;;echo 'css/WeixinPay.css">
   <link rel="stylesheet" type="text/css" href="';echo $themedir;;echo '/css/base.css">
   <style>
	.area_bd {
		line-height: 37px;
		text-align: left;
		width: 300px;
		margin: 0 auto;
		font-size: 16px;
	}
	.area_bd input {
		border: 1px solid #ccc;
		height: 35px;
		line-height: 35px;
		text-indent: 10px;
		width: 100%;
	}
   </style>
<body class="">
    <div class="wx_header">
        <div class="wx_logo">
		<h1 style="color:#666;font-size:24px;">无卡支付  <font style="font-size:14px;">- 填写银行卡信息</font><h1>
		</div>
    </div>
    <div class="weixin">
        <div class="weixin2">
            <b class="wx_box_corner left pngFix"></b><b class="wx_box_corner right pngFix"></b>
            <div class="wx_box pngFix">
                <div class="wx_box_area">
                    <div class="pay_box qr_default">
                        <div class="area_bd">
							<form name="alipayment"  action="/pay/weixin/wk_pay_sanfang.php" method="post">
								
								手　机　号：<input type="text" value="" name="tel" placeholder="请填写手机号" /><br/>
								银行卡号码：<input type="text" value="" name="CrdNo" placeholder="请填写银行卡号码" /><br/>
								银行账户名：<input type="text" value="" name="CapCrdNm" placeholder="请填写银行账户名" /><br/>
								身份证号码：<input type="text" value="" name="idNo" placeholder="请填写身份证号码" /><br/>								
								
								<input type="hidden" value="';echo $_POST['total_fee'];;echo '"  name="amount" />
								<input type="hidden" value="';echo $_POST['orderid'];;echo '"  name="orderid" />
								<input type="hidden" name="paytype" value="1" />
								<button type="submit" name="submit" class="wkpay" style="padding: 9px 25px;
    background: #FFF;
    border: 1px solid #fc6;
    font-size: 16px;
    margin: 18px auto;
    color: #FFF;
    display: block;
    background: #fc6;" title="第一步">保存信息并验证手机号</button>
							</form>
                        </div>
                    </div>
                </div>
                <div class="wx_hd">
                </div>
                <div class="wx_money"><span>￥</span>';echo $_POST['total_fee'];;echo '</div>
                <!--支付订单号-->
                <div class="wx_pay">
                    <p><span class="wx_left">支付订单号</span><span class="wx_right">';echo $orderId;;echo '</span></p>
                </div>
            </div>
        </div>
    </div>
 </body></html>';
?>
