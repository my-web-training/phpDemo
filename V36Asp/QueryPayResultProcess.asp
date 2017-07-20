<%@LANGUAGE="VBSCRIPT" CODEPAGE="936"%>
<!--#include file="com/md5.asp"-->
<!--#include file="com/http.asp"-->
<% 
'/**
' * 功能说明
' * <ul>
' * <li>创建文件描述：测试环境,V36查询交易结果（实时对账）调试处理页面</li>
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
<%	
	TranType 			= Request("TranType")          '//交易类型
	JavaCharset 		= Request("JavaCharset")  		'//编码
	Version 			= Request("Version")		    '//版本号
	UserId 				= Request("UserId")            '//用户ID
	Pwd 				= Request("Pwd")               '//用户密码
	MerId 				= Request("MerId")             '//商户ID
	PayStatus 			= Request("PayStatus")      	'//支付状态
	ShoppingTime 		= Request("ShoppingTime")		'//交易时间，如果上送ShoppingTime那么BeginTime与EndTime将作废
	BeginTime 			= Request("BeginTime")      	'//交易开始时间
	EndTime 			= Request("EndTime")           '//交易结束时间
	OrderNo 			= Request("OrderNo")           '//商户订单号
	
	
	'//对密码进行Md5加密
	Pwd = MD5(Pwd, "GBK")
	
	'//组装请求参数
	SourceText = "TranType=" & TranType & "&JavaCharset="  & JavaCharset & "&Version="  & Version & "&UserId="  & UserId & "&Pwd=" & Pwd & "&MerId=" & MerId & "&PayStatus=" & PayStatus & "&ShoppingTime=" & ShoppingTime & "&BeginTime=" & BeginTime & "&EndTime=" & EndTime & "&OrderNo=" & OrderNo
	
	'response.write SourceText & "<br><br>"
	
	'//交易结果查询接口地址
	Url = "http://test.gnetpg.com:8089/GneteMerchantAPI/Trans.action"
	Resp = doHttpPost(Url, SourceText, "GBK") 
	
	if(Resp = "") then
		response.write("<div class='InfoPage'><div class='InfoContext'>返回的交易结果为空！</div></div>")
		response.end
	else
		response.write Resp
	end if
	

	'//1、对账响应结果数据是指构造成对账结果的数据，每条记录用行分隔，每列用\n分隔
    '//2、订单的格式：订单日期\n支付金额\n商户订单号\n商户终端号\n系统参考号\n响应码\n清算日期\n保留域1\n保留域2\n
    '//注意用&替换\n空格符,不然\n传入到后台会自动转换为空格
%>
