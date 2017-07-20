<%@LANGUAGE="VBSCRIPT" CODEPAGE="936"%>
<!--#include file="com/md5.asp"-->
<!--#include file="com/http.asp"-->
<!--#include file="com/sign.asp"-->
<!--#include file="com/sort.asp"-->

<% 
'/**
' * 功能说明
' * <ul>
' * <li>创建文件描述：退款后台处理页面</li>
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
	SourcePKey = "12hi60ohgmp16nbev0gr8au69bodzguz"
	
	'构造请求参数数组
	Dim SignMap(9)
	SignMap(0) = "TranType"
	SignMap(1) = "JavaCharset"
	SignMap(2) = "Version"
	SignMap(3) = "MerId"
	SignMap(4) = "OrderNo"
	SignMap(5) = "ShoppingDate"
	SignMap(6) = "PayAmount"
	SignMap(7) = "RefundAmount"
	SignMap(8) = "Reserved"
	Params = sort(SignMap)
	Count = ubound(Params)
	For i = 1 To Count
		SourceText = SourceText & Params(i) & "=" & Request(Params(i)) & "&"
	Next
	
	EncodeSign = sign(SourceText, SourcePKey)
	Param = SourceText & "SignMsg=" & EncodeSign
	
	URL = "http://test.gnetpg.com:8089/GneteMerchantAPI/Trans.action"
	Resp = doHttpPost(Url, Param, "GBK")
	
	if(Resp = "") then
		response.write("<div class='InfoPage'><div class='InfoContext'>返回的交易结果为空！</div></div>")
		response.end
	end if
	
	
	Code = getValue(Resp, "Code")
	Message = getValue(Resp, "Message")
	RespSignMsg = getValue(Resp, "SignMsg")
	RespSourceText = "Code=" & Code & "&Message=" & Message & "&"
	SignMsg = sign(RespSourceText, SourcePKey)
	
	if (RespSignMsg <> SignMsg) then
		response.write("验证签名失败！")
		response.end
	end if
	
	if("0000" = Code) then
		response.write("【退款成功！响应信息】" + Message)
		response.end
	else
		response.write("【退款失败！响应信息】" + Message)
		response.end
	end if
%>
