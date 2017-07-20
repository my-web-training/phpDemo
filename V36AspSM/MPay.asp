<%@LANGUAGE="VBSCRIPT" CODEPAGE="936"%>
<%
'/**
' * 功能说明
' * <ul>
' * <li>创建文件描述：V36支付订单模拟提交(移动支付)</li>
' * </ul>
' * 
' * @author <ul>
' *         <li>创建者：广州银联网络支付有限公司（技术管理部）</li>
' *         </ul>
' * @version <ul>
' *          <li>创建版本：v1.0.0 日期：2015-01-28</li>
' *          </ul>
' */
'函数名称：GetOrderNo(订单日期)
'主要功能：根据订单日期生成订单号
'-----------------------------------------------------------------------------------------
Function GetOrderNo(dDate)
    GetOrderNo = RIGHT("0000"+Trim(Year(dDate)),4)+RIGHT("00"+Trim(Month(dDate)),2)+RIGHT("00"+Trim(Day(dDate)),2)+RIGHT("00" + Trim(Hour(dDate)),2)+RIGHT("00"+Trim(Minute(dDate)),2)+RIGHT("00"+Trim(Second(dDate)),2)
End Function

%>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
	<title>广州银联网络-网上支付程序示例V3.6</title>
	<link rel="stylesheet" type="text/css" href="css/Gnetpg.css" />
</head>
<body>
<form method="post" name="OrderForm" action="PayProcess.asp">
	<div class = "BoxBody">
		<div class = "PayHead" >
			<div class = "HeadTitle">网上支付程序示例V3.6 - 移动支付</div>
		</div>
		
		<div class="PayForm" >	
			<div class="FormItem">  
				<div class="FormLabel">商户ID：</div>
				<div class="FormInput"><input type="text" name="MerId" value="198" ></div>
				<div class="FormRemark">*非空</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">订单号：</div>
				<div class="FormInput"><input type="text" name="OrderNo" value="<%=GetOrderNo(Now)%>" ></div>
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
				<div class="FormInput"><textarea name="CallBackUrl" style="width:320px; height:100px;">http://218.168.127.159:8888/V36DemoForAsp/ReceiveResult.asp</textarea></div>
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
					<input type="text" name="LangType" value="GBK" >
				</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">业务类型：</div>
				<div class="FormInput">
					<select name="BuzType">
						<option value="22">移动支付</option>
					</select>
				</div>
				<div class="FormRemark"></div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">保留域1：</div>
				<div class="FormInput"><input type="text" name="Reserved01" value="DeviceInfo=MOBILE|Body=苹果7(128G)" ></div>
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
