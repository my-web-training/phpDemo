<?php
function notify(){
            $singkey = "6D6A6EG57DE7AAEE34DBBA19DG2EAA22";
            $postsign = "6462A6BA7CF5B23FC6025C85E4E06785";

            // $param = array(
            //     "org_id" => "10000083",
            //     "merchno" => "A20000000000185",
            //     "out_trade_no" => "171706281293000002",  
            //     "trade_type" => "WX_JPAY", 
            //     "trade_state" => "SUCCESS",
            //     "total_amt" => "3.00",
            // );
            $tstr = "org_id=10000083&merchno=A20000000000185&out_trade_no=171706281293000002&trade_type=WX_JPAY&trade_state=SUCCESS&total_amt=3.00&key=6D6A6EG57DE7AAEE34DBBA19DG2EAA22";
            // foreach($param as $key=>$value)
            // {
            //     $tstr = $tstr . "$key=$value&";
            // }   
            $sign = strtoupper(md5($tstr));   
            // $sign = strtoupper(md5($tstr . "key=$singkey"));        
            echo $sign . '<br>';
            echo $postsign . '<br>';
    }
    notify();
?>