<%
' ǩ��(֧���ӿ�)
Function sign(SourceMsg, PKey)
	Dim TempPKey
	TempPKey	=	MD5(PKey, "GBK")
	TempPKey	=	SourceMsg & TempPKey
	TempPKey	=	MD5(TempPKey, "GBK")
	sign		=	TempPKey
End Function

%>
