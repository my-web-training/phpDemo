<%
' ¶ÔÊý×éÅÅÐò
Function sort(sPara)
	Dim nCount
	nCount = ubound(sPara)
	For i = nCount To 0 Step -1
		minmax = sPara( 0 )
    	minmaxSlot = 0
    	For j = 1 To i
            mark = (sPara( j ) > minmax)
        	If mark Then 
            	minmax = sPara( j )
            	minmaxSlot = j
        	End If
    	Next
		If minmaxSlot <> i Then 
			temp = sPara( minmaxSlot )
			sPara( minmaxSlot ) = sPara( i )
			sPara( i ) = temp
		End If
	Next
	sort = sPara
end function
%>
