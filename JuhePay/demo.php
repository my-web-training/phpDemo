<?php
    function pay()
    {

        $url_api = "http://ouchuang.xjoyt.com:8099/OuYaZhiFu/oytWXcommon.action";
        $singkey = "6D6A6EG57DE7AAEE34DBBA19DG2EAA22";

        $param = array(
            "merchno" => "A20000000000185",
            "org_id" => "10000083",
            "out_trade_no" => "171706281281000010",
            "ordDt" => "20170628",
            "total_fee" => sprintf("%d", 10000),
            "body" => "test",
            "serverUrl" => 'https://wdev.hmibex.com/user/rechargedone',
            "notify_url" => 'https://wdev.hmibex.com/payment/juhepaypostback/171706281281000010',
            "nonce_str" => "0f83384f0cbe4346b056ffcfef70480b"
        );
        $tstr = "";
        foreach($param as $key=>$value)
        {
            $tstr = $tstr . "$key=$value&";
        }
        $sign = strtoupper(md5($tstr . "key=$singkey"));        
        echo $sign . '<br>';
        $url = $url_api."?". $tstr ."&sign=$sign";
        echo $url . '<br>';
        @header("Location:$url");
        //if($order = M('juejin_payorder')->add($data)){
        //$pay = new ZhongyunController($data['ordersn'], $price);
        //$res = $pay->index();
        //}
    }

function query(){
     $url_api = "http://ouchuang.xjoyt.com:8099/OuYaZhiFu/quickpayquery.action";
        $key = "6D6A6EG57DE7AAEE34DBBA19DG2EAA22";

        $param = array(
            "merchno" => "A20000000000185",
            "org_id" => "10000083",
            "querySn" => "171706281281000010",            
        );
        $tstr = "";
        foreach($param as $key=>$value)
        {
            $tstr = $tstr . "$key=$value&";
        }   
        echo $tstr . '<br>';
        $sign = strtoupper(md5($tstr . "key=$key"));        
        echo $sign . '<br>';
        $url = $url_api."?".$tstr . "&ordDt=20170628"."&Sign=$sign";
        echo $url . '<br>';
        @header("Location:$url");
}
    query();
?>