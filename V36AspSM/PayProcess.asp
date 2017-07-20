<%@LANGUAGE="VBSCRIPT" CODEPAGE="936"%>
<!--#include file="com/md5.asp"-->
<!--#include file="com/sign.asp"-->

<% 
'/**
' * 功能说明
' * <ul>
' * <li>创建文件描述：V36支付加密及验签处理页面</li>
' * <li>1、获取表单提交的商户数据</li>
' * <li>2、组装订单原始数据进行数据签名，签名数据组成：MerId值+OrderNo值+OrderAmount值+CurrCode值+OrderType值+CallBackUrl值+BankCode值+LangType值+BuzType值& Reserved01值+Reserved02值</li>
' * <li>3、使用MD5对数据进行加密签名：EncodePKey = MD5(PKey);EncodeMsg = MD5(Msg + EncodePKey)</li>
' * <li>4、注意：1：此接口只支持https请求，2：每次请求上送的OrderNo必须唯一，3：	签名数据采用32位MD5加密算法</li>
' * </ul>
' * 
' * @author <ul>
' *         <li>创建者：广州银联网络支付有限公司（技术管理部）</li>
' *         </ul>
' * @version <ul>
' *          <li>创建版本：v1.0.0 日期：2015-01-28</li>
' *          </ul>
' */



PKey		= "12hi60ohgmp16nbev0gr8au69bodzguz"
MerId       = Request("MerId")
OrderNo		= Request("OrderNo")
OrderAmount	= Request("OrderAmount")
CurrCode	= Request("CurrCode")
OrderType	= Request("OrderType")
CallBackUrl	= Request("CallBackUrl")
BankCode	= Request("BankCode")
LangType	= Request("LangType")
BuzType		= Request("BuzType")
Reserved01 	= Request("Reserved01")
Reserved02 	= Request("Reserved02")

SourceText 	= MerId & OrderNo & OrderAmount & CurrCode & OrderType & CallBackUrl & BankCode & LangType & BuzType & Reserved01 & Reserved02


'使用发送方证书对订单原始数据进行签名
SignMsg = sign(SourceText, PKey)
FormUrl = "http://test.gnetpg.com:8089/GneteMerchantAPI/api/PayV36"



%>


<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=GBK" />
	<script language='javascript' type="text/javascript">
		window.onload = function()
		{
			document.all.SendOrderForm.submit();
		}
	</script>
</head>
<body>
	<form method='post' name='SendOrderForm' action='<%=FormUrl%>'>
		<input type='hidden' name='MerId' value='<%=MerId %>'/>
		<input type='hidden' name='OrderNo' value='<%=OrderNo %>'/>
		<input type='hidden' name='OrderAmount' value='<%=OrderAmount %>'/>
		<input type='hidden' name='CurrCode' value='<%=CurrCode %>'/>
		<input type='hidden' name='CallBackUrl' value='<%=CallBackUrl %>'/>
		<input type='hidden' name='OrderType' value='<%=OrderType %>'/>
		<input type='hidden' name='BankCode' value='<%=BankCode %>'/>
		<input type='hidden' name='BuzType' value='<%=BuzType %>'/>
		<input type='hidden' name='LangType' value='<%=LangType %>'/>
		<input type='hidden' name='Reserved01' value='<%=Reserved01 %>'/>
		<input type='hidden' name='Reserved02' value='<%=Reserved02 %>'/>
		<input type='hidden' name='SignMsg' value='<%=SignMsg %>'/>
	</form>
</body>
</html>
