<%@LANGUAGE="VBSCRIPT" CODEPAGE="936"%>
<%
'/**
' * ����˵��
' * <ul>
' * <li>�����ļ�������V36֧������ģ���ύ(�ƶ�֧��)</li>
' * </ul>
' * 
' * @author <ul>
' *         <li>�����ߣ�������������֧�����޹�˾������������</li>
' *         </ul>
' * @version <ul>
' *          <li>�����汾��v1.0.0 ���ڣ�2015-01-28</li>
' *          </ul>
' */
'�������ƣ�GetOrderNo(��������)
'��Ҫ���ܣ����ݶ����������ɶ�����
'-----------------------------------------------------------------------------------------
Function GetOrderNo(dDate)
    GetOrderNo = RIGHT("0000"+Trim(Year(dDate)),4)+RIGHT("00"+Trim(Month(dDate)),2)+RIGHT("00"+Trim(Day(dDate)),2)+RIGHT("00" + Trim(Hour(dDate)),2)+RIGHT("00"+Trim(Minute(dDate)),2)+RIGHT("00"+Trim(Second(dDate)),2)
End Function

%>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=GBK">
	<title>������������-����֧������ʾ��V3.6</title>
	<link rel="stylesheet" type="text/css" href="css/Gnetpg.css" />
</head>
<body>
<form method="post" name="OrderForm" action="PayProcess.asp">
	<div class = "BoxBody">
		<div class = "PayHead" >
			<div class = "HeadTitle">����֧������ʾ��V3.6 - �ƶ�֧��</div>
		</div>
		
		<div class="PayForm" >	
			<div class="FormItem">  
				<div class="FormLabel">�̻�ID��</div>
				<div class="FormInput"><input type="text" name="MerId" value="198" ></div>
				<div class="FormRemark">*�ǿ�</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">�����ţ�</div>
				<div class="FormInput"><input type="text" name="OrderNo" value="<%=GetOrderNo(Now)%>" ></div>
				<div class="FormRemark">*�ǿգ�ÿ�����ͱ���Ψһ</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">֧����</div>
				<div class="FormInput"><input type="text" name="OrderAmount" value="1.01" ></div>
				<div class="FormRemark">*�ǿգ���ʽ��Ԫ.�Ƿ�</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">���Ҵ��룺</div>
				<div class="FormInput"><input type="text" name="CurrCode" value="CNY" ></div>
				<div class="FormRemark">*�ǿգ�CNY ������ҡ�HKD���۱ҡ�TWD��̨��</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">�������ͣ�</div>
				<div class="FormInput">
					<select name="OrderType">
						<option value="B2C" >B2C����</option>
						<option value="B2B" >B2B����</option>
				</select>
				</div>
				<div class="FormRemark">ϵͳĬ��B2C</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">֧���������URL��</div>
				<div class="FormInput"><textarea name="CallBackUrl" style="width:320px; height:100px;">http://218.168.127.159:8888/V36DemoForAsp/ReceiveResult.asp</textarea></div>
				<div class="FormRemark">*�ǿ�</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">֧��������</div>
				<div class="FormInput">
					<select name="BankCode">
						<option value="88978888" >ɨ��֧�����ƶ�֧��</option>
					</select>
				</div>
				<div class="FormRemark"></div>
			</div>
			
			
			<div class="FormItem" id="LangType">  
				<div class="FormLabel">������룺</div>
				<div class="FormInput">
					<input type="text" name="LangType" value="GBK" >
				</div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">ҵ�����ͣ�</div>
				<div class="FormInput">
					<select name="BuzType">
						<option value="22">�ƶ�֧��</option>
					</select>
				</div>
				<div class="FormRemark"></div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">������1��</div>
				<div class="FormInput"><input type="text" name="Reserved01" value="DeviceInfo=MOBILE|Body=ƻ��7(128G)" ></div>
				<div class="FormRemark"></div>
			</div>
			
			<div class="FormItem">  
				<div class="FormLabel">������2��</div>
				<div class="FormInput"><input type="text" name="Reserved02" value="" ></div>
				<div class="FormRemark"></div>
			</div>
			
			<div class="FormItem"> 
				<div class="FormButton"><input type="submit" value=" �ύ���� " > </div>
			</div>
		</div>
		</div>
		<div class="c"></div>
		<div class="PayFoot" > 
			��Ȩ����@������������֧�����޹�˾(�й�������ϵ��˾) �ͷ����ߣ�4008-333-222
		</div>
</form>	
</body>
</html>
