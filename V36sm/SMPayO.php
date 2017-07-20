<?php
/**
 * 功能说明
 * <ul>
 * <li>创建文件描述：V36支付订单模拟提交-扫码支付（前台）</li>
 * </ul>
 * 
 * @author <ul>
 *         <li>创建者：广州银联网络支付有限公司（技术管理部）</li>
 *         </ul>
 * @version <ul>
 *          <li>创建版本：v1.0.0 日期：2015-01-28</li>
 *          </ul>
 */
?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>广州银联网络-网上支付程序示例V3.6</title>
	<link rel="stylesheet" type="text/css" href="css/Gnetpg.css" />
</head>
<body>
<form method="post" name="OrderForm" action="MPayProcess.php">
	<div class = "BoxBody">
		<div class = "PayHead" >
			<div class = "HeadTitle">网上支付程序示例V3.6 - 扫码支付（前台）</div>
		</div>
		
		<div class="PayForm" >	
			<div class="FormItem">  
				<div class="FormLabel">商户ID：</div>
				<div class="FormInput"><input type="text" name="MerId" value="198" ></div>
				<div class="FormRemark">*非空</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">订单号：</div>
				<div class="FormInput"><input type="text" name="OrderNo" value="<?php echo time(); ?>" ></div>
				<div class="FormRemark">*非空，每次上送必须唯一</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">支付金额：</div>
				<div class="FormInput"><input type="text" name="OrderAmount" value="1.01" ></div>
				<div class="FormRemark">*非空，格式：元.角分</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">货币代码：</div>
				<div class="FormInput"><input type="text" name="CurrCode" value="CNY" ></div>
				<div class="FormRemark">*非空，CNY ：人民币、HKD：港币、TWD：台币</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">订单类型：</div>
				<div class="FormInput">
					<select name="OrderType">
						<option value="B2C" >B2C订单</option>
						<option value="B2B" >B2B订单</option>
				</select>
				</div>
				<div class="FormRemark">系统默认B2C</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">支付结果接收URL：</div>
				<div class="FormInput"><textarea name="CallBackUrl" style="width:320px; height:100px;">http://localhost/V36DemoForPHP/ReceiveResult.php</textarea></div>
				<div class="FormRemark">*非空</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">支付渠道：</div>
				<div class="FormInput">
					<select name="BankCode">
						<option value="88978888" >扫码支付与移动支付</option>
					</select>
				</div>
				<div class="FormRemark"></div>
			</div>
			
			
			<div class="FormItem" id="LangType">  
				<div class="FormLabel">编码代码：</div>
				<div class="FormInput">
					<input type="text" name="LangType" value="UTF-8" >
				</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">业务类型：</div>
				<div class="FormInput">
					<select name="BuzType">
						<option value="21">扫码支付（前台）</option>
					</select>
				</div>
				<div class="FormRemark"></div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">保留域1：</div>
				<div class="FormInput"><input type="text" name="Reserved01" value="DeviceInfo=WEB|Body=苹果7(128G)" ></div>
				<div class="FormRemark"></div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">保留域2：</div>
				<div class="FormInput"><input type="text" name="Reserved02" value="" ></div>
				<div class="FormRemark"></div>
			</div>
			
			<div class="FormItem"> 
				<div class="FormButton"><input type="submit" value=" 提交订单 " > </div>
			</div>
		</div>
		</div>
		<div class="c"></div>
		<div class="PayFoot" > 
			版权所有@广州银联网络支付有限公司(中国银联体系公司) 客服热线：4008-333-222
		</div>
</form>	
</body>
</html>
