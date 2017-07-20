<%@LANGUAGE="VBSCRIPT" CODEPAGE="936"%>
<% 
'/**
' * 功能说明
' * <ul>
' * <li>	创建文件描述：测试环境,V36退款接口调试页面入口</li>
' * <li>	主要功能：录入退款数据,提交表单到逻辑处理页面RefundProcess.asp</li>
' * <li></li>
' * </ul>
' * 
' * @author <ul>
' *         <li>创建者：广州银联网络支付有限公司（技术管理部）</li>
' *         </ul>
' * @version <ul>
' *          <li>创建版本：v1.0.0 日期：2015-02-05</li>
' *          </ul>
' */
%>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
	<title>广州银联网络-退款程序示例V3.6</title>
	<link rel="stylesheet" type="text/css" href="css/Gnetpg.css" />
</head>
<body>
<form method="post" name="OrderForm" action="RefundProcess.asp">
	<div class = "BoxBody">
		
	
		<div class = "PayHead" >
			<div class = "HeadTitle">网上支付程序示例V3.6 - 退款</div>
		</div>
		
		<div class="PayForm" >	
			<div class="FormItem">  
				<div class="FormLabel">交易类型：</div>
				<div class="FormInput"><input type="text" name="TranType" value="31" ></div>
				<div class="FormRemark">*非空，固定，31：退款</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">编码：</div>
				<div class="FormInput"><input type="text" name="JavaCharset" value="GBK" ></div>
				<div class="FormRemark">*非空，UTF-8或GBK</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">版本号：</div>
				<div class="FormInput"><input type="text" name="Version" value="V36" ></div>
				<div class="FormRemark">*非空，版本号（固定）：V36</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">商户ID：</div>
				<div class="FormInput"><input type="text" name="MerId" value="198" ></div>
				<div class="FormRemark">*非空</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">商户订单号：</div>
				<div class="FormInput"><input type="text" name="OrderNo" value="20160923150120" ></div>
				<div class="FormRemark"></div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">订单交易（支付）日期：</div>
				<div class="FormInput"><input type="text" name="ShoppingDate" value="20160923" ></div>
				<div class="FormRemark">格式：YYYYMMDD</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">交易（支付）金额：</div>
				<div class="FormInput"><input type="text" name="PayAmount" value="1.01" ></div>
				<div class="FormRemark"></div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">退款金额：</div>
				<div class="FormInput"><input type="text" name="RefundAmount" value="0.02" ></div>
				<div class="FormRemark"></div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">保留域：</div>
				<div class="FormInput"><input type="text" name="Reserved" value="test-refund" ></div>
				<div class="FormRemark"></div>
			</div>
			
			<div class="FormItem"> 
				<div class="FormButton"><input type="submit" value=" 提交订单 " > </div>
			</div>
		</div>
		</div>
		<div class="c"></div>
		<div class="PayFoot"> 
			版权所有@广州银联网络支付有限公司(中国银联体系公司) 客服热线：4008-333-222
		</div>
		
		
</form>	
</body>
</html>