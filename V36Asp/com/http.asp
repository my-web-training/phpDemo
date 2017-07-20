<%
'////////////////////////////////////////
'//获取POST返回的结果
'//////////////////////////////////////////
Function bytesToBSTR(body,Cset) 
	dim objstream
	set objstream = Server.CreateObject("adodb.stream")
	objstream.Type = 1
	objstream.Mode =3
	objstream.Open
	objstream.Write body
	objstream.Position = 0
	objstream.Type = 2
	objstream.Charset = Cset
	BytesToBstr = objstream.ReadText 
	objstream.Close
	set objstream = nothing
End Function



'////////////////////////////////////////
'// 模拟HTTP-POST
'//////////////////////////////////////////
Function doHttpPost(HttpUrl, data, postCharset)
	If (len(HttpUrl) <= 0) then
		exit function
	End If
	

	
	Dim Http, ResStr
	Set Http=server.createobject("Msxml2.ServerXMLHTTP.4.0") '先创建一个serverxmlhttp对像.并指明他是3.0版本的..可以省去
	Http.setTimeouts 180000,180000,180000,180000 
	Http.Open "POST", HttpUrl, False
	
	
	Http.setRequestHeader "Charsert", postCharset
	Http.setRequestHeader "Content-Type", "application/x-www-form-urlencoded"
	Http.setRequestHeader "Content-Length",Len(data)
	Http.Send(data)
	

		
	If Http.Readystate=4 AND Http.status=200 Then
		doHttpPost=bytesToBSTR(Http.responseBody, postCharset)
	Else
		doHttpPost=""
	End If
	Set Http = Nothing
End Function

'////////////////////////////////////////
'// 从待取值的字符串中取出符合域名的域值 AA=123&BB=456&...
'//////////////////////////////////////////
Function getValue(TobeGetStr,FieldName)
	Dim tmpArray, tmpFieldStr, tmpFieldName, tmpFieldValue, i, fieldList
	getValue = ""
	If TobeGetStr="" or FieldName="" Then
		Exit Function
	End If
	tmpArray = Split(TobeGetStr,"&")
	For i = 0 To UBound(tmpArray)
		tmpFieldStr	= tmpArray(i)
		if (not(tmpFieldStr="" or len(tmpFieldStr)<=0)) then
			fieldList = Split(tmpFieldStr, "=")
			tmpFieldName  	= fieldList(0)
			tmpFieldValue = ""
			If (UBound(fieldList) > 1) Then
				For k = 1 To UBound(fieldList)
					tmpFieldValue = tmpFieldValue & fieldList(k) & "="
				Next
				tmpFieldValue = Left(tmpFieldValue, len(tmpFieldValue)-1)
			Else
				If (UBound(fieldList) = 1) Then
					tmpFieldValue = fieldList(1)
				Else
					tmpFieldValue = ""
				End If
			End If 
			If UCase(FieldName) = UCase(tmpFieldName) Then
				getValue = tmpFieldValue
				Exit Function
			End If
		end if
	Next
End Function

%>