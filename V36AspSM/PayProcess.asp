<%@LANGUAGE="VBSCRIPT" CODEPAGE="936"%>
<!--#include file="com/md5.asp"-->
<!--#include file="com/sign.asp"-->

<% 
'/**
' * ����˵��
' * <ul>
' * <li>�����ļ�������V36֧�����ܼ���ǩ����ҳ��</li>
' * <li>1����ȡ���ύ���̻�����</li>
' * <li>2����װ����ԭʼ���ݽ�������ǩ����ǩ��������ɣ�MerIdֵ+OrderNoֵ+OrderAmountֵ+CurrCodeֵ+OrderTypeֵ+CallBackUrlֵ+BankCodeֵ+LangTypeֵ+BuzTypeֵ& Reserved01ֵ+Reserved02ֵ</li>
' * <li>3��ʹ��MD5�����ݽ��м���ǩ����EncodePKey = MD5(PKey);EncodeMsg = MD5(Msg + EncodePKey)</li>
' * <li>4��ע�⣺1���˽ӿ�ֻ֧��https����2��ÿ���������͵�OrderNo����Ψһ��3��	ǩ�����ݲ���32λMD5�����㷨</li>
' * </ul>
' * 
' * @author <ul>
' *         <li>�����ߣ�������������֧�����޹�˾������������</li>
' *         </ul>
' * @version <ul>
' *          <li>�����汾��v1.0.0 ���ڣ�2015-01-28</li>
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


'ʹ�÷��ͷ�֤��Զ���ԭʼ���ݽ���ǩ��
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
