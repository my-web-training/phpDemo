<?php
function query(){
     $url_api = "http://ouchuang.xjoyt.com:8099/OuYaZhiFu/quickpayquery.action";
            $singkey = "6D6A6EG57DE7AAEE34DBBA19DG2EAA22";

            $param = array(
                "merchno" => "A20000000000185",
                "org_id" => "10000083",
                "querySn" => "171706281293000002",            
            );
            $tstr = "merchno=A20000000000185&org_id=10000083&querySn=171706281293000002";
            // foreach($param as $key=>$value)
            // {
            //     $tstr = $tstr . "$key=$value&";
            // }   
            $sign = strtoupper(md5($tstr . "key=$singkey"));        
            echo $sign . '<br>';
            $url = $url_api."?".$tstr . "ordDt=20170628"."&sign=$sign";
            echo $url . '<br>';
            // @header("Location:$url");
    }
    query();
?>