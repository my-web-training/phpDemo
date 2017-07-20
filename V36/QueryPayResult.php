<?php
/**
 * 功能说明
 * <ul>
 * <li>	创建文件描述：V36查询交易结果（实时对账）调试页面入口</li>
 * <li>	主要功能：录入查询条件,提交表单到逻辑处理页面QueryPayResultProcess.jsp</li>
 * <li></li>
 * </ul>
 * 
 * @author <ul>
 *         <li>创建者：广州银联网络支付有限公司（技术管理部）</li>
 *         </ul>
 * @version <ul>
 *          <li>创建版本：v1.0.0 日期：2015-02-04</li>
 *          </ul>
 */
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>广州银联网络-查询交易结果程序示例V3.6</title>
	<link rel="stylesheet" type="text/css" href="css/Gnetpg.css" />
</head>
<body>
<form method="post" name="OrderForm" action="QueryPayResultProcess.php">
	<div class = "BoxBody">
	
		<div class = "PayHead" >
			<div class = "HeadTitle">网上支付程序示例V3.6 - 查询交易结果(GetPayResult)</div>
		</div>
		
		<div class="PayForm" >	
			<div class="FormItem">  
				<div class="FormLabel">交易类型：</div>
				<div class="FormInput"><input type="text" name="TranType" value="100" ></div>
				<div class="FormRemark">*非空，交易类型（固定），100：实时对账</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">编码：</div>
				<div class="FormInput"><input type="text" name="JavaCharset" value="UTF-8" ></div>
				<div class="FormRemark">*非空，UTF-8或UTF-8</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">版本号：</div>
				<div class="FormInput"><input type="text" name="Version" value="V60" ></div>
				<div class="FormRemark">*非空，版本号（固定）：V60</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">用户ID：</div>
				<div class="FormInput"><input type="text" name="UserId" value="198" ></div>
				<div class="FormRemark">*非空，银联业务人员分配</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">用户密码：</div>
				<div class="FormInput"><input type="text" name="Pwd" value="123!@#QAZ" ></div>
				<div class="FormRemark">*非空，银联业务人员分配</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">商户ID：</div>
				<div class="FormInput"><input type="text" name="MerId" value="198" ></div>
				<div class="FormRemark">*非空</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">支付状态：</div>
				<div class="FormInput"><input type="text" name="PayStatus" value="2" ></div>
				<div class="FormRemark">可空，默认2；0：失败订单；1：成功订单；2：全部订单</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">交易时间：</div>
				<div class="FormInput"><input type="text" name="ShoppingTime" value='<?php echo date('Y-m-d 00:00:00');?>' /></div>
				<div class="FormRemark">格式：YYYY-MM-DD HH:ii:ss，如果上送ShoppingTime那么BeginTime与EndTime将作废</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">交易开始时间：</div>
				<div class="FormInput"><input type="text" name="BeginTime" value="" ></div>
				<div class="FormRemark">格式：YYYY-MM-DD HH:ii:ss</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">交易结束时间：</div>
				<div class="FormInput"><input type="text" name="EndTime" value="" ></div>
				<div class="FormRemark">格式：YYYY-MM-DD HH:ii:ss</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">商户订单号：</div>
				<div class="FormInput"><input type="text" name="OrderNo" value="" ></div>
				<div class="FormRemark">指定单个订单号（可空，空时按批量查询）</div>
			</div>
			
			<div class="FormItem"> 
				<div class="FormButton"><input type="submit" value=" 提交订单 " > </div>
			</div>
		</div>
		</div>
		<div class="c"></div>
		<div class="PayFoot" > 
			版权所有@广州银联网络支付有限公司(中国银联体系公司) 客服热线：4008-333-222
			<br/> 
		</div>
</form>	
</body>
</html>