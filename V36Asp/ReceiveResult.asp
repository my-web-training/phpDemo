<%@LANGUAGE="VBSCRIPT" CODEPAGE="936"%>
<!--#include file="com/md5.asp"-->
<!--#include file="com/sign.asp"-->

<% 
'/**
' * 功能说明
' * <ul>
' * <li>创建文件描述：V36支付结果接收前端处理页面</li>
' * <li>1、此程序放在商户服务器端，用于接收gnetpg.com通过用户浏览器返回的支付结果</li>
' * <li> 2、对支付结果进行签名校验 </li>
' * <li> 3、返回支付结果给商户</li>
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
	response.write request.form & "<br><br>"
	OrderNo 		= Request("OrderNo")
	PayNo 			= Request("PayNo")
	PayAmount 		= Request("PayAmount") 
	CurrCode 		= Request("CurrCode")
	SystemSSN 		= Request("SystemSSN") 
	RespCode 		= Request("RespCode")
	SettDate 		= Request("SettDate")
	Reserved01 		= Request("Reserved01")
	Reserved02 		= Request("Reserved02")
	SignMsg 		= Request("SignMsg")
		
	'//商户密钥
	PKey = "12hi60ohgmp16nbev0gr8au69bodzguz"

	if  SignMsg="" then
		response.write ("广州银联返回的交易结果，签名数据不完整")
		response.end
	end if

	
	'组装签名数据，OrderNo值+PayNo值+PayAmount值+CurrCode值+SystemSSN值+RespCode值+SettDate值+Reserved01值+Reserved02值
	SourceText = OrderNo & PayNo  & PayAmount  & CurrCode  & SystemSSN  & RespCode  & SettDate  & Reserved01  & Reserved02
	
	'对返回的信息进行加密签名
	EncodeMsg = sign(SourceText, PKey)
	
	'//校验签名是否一致
	if(SignMsg <> EncodeMsg) then
		response.write("校验签名失败，请确认你使用的密钥是否正确！")
		response.end
	end if
	
	
	'// 输出支付结果给顾客
	if("00" = RespCode) then
		response.write("支付成功!系统参考号为：" & SystemSSN)
  	  	'//【重点注意】收到成功交易结果后，请通过商户订单号再发起交易查询接口，确认交易已成功。
	else
		response.write("支付失败!响应码为：" & RespCode)
	end if
%>