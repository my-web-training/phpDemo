<?php
    namespace phpdemo;
    class TypeDemo
    {
        /**
        * 架构函数
        * @access public
        * @param 
        */
        public function __construct()
        {
            
        }

        /**
        * 
        * @access public
        * @return string
        */
        public static function sum(int ...$ints)
        {
            return array_sum($ints);
        }
        
        /**
        * 
        * @access public
        * @return string
        */
        public static function showMSG(string $msg = '')
        {
            //printf("My name is %2\$s %1\$s","55nav", "com");
            printf("show message: %1\$s", $msg);
        }

        /**
        * 
        * @access public
        * @return string
        */
        public static function helloWorld()
        {
            //strlen() 函数返回字符串的长度，以字符计
            //strpos() 函数用于检索字符串内指定的字符或文本。0 start
            echo strpos("Hello world!","world");
            return "Hello World! length:".strlen("Hello world!");;
        }
        
        /**
        * 
        * @access public
        */
        public static function showType()
        {
            $x = 5985;
            var_dump($x);
            echo "<br>"; 
            $x = -345; // 负数
            var_dump($x);
            echo "<br>"; 
            $x = 0x8C; // 十六进制数
            var_dump($x);
            echo "<br>";
            $x = 047; // 八进制数
            var_dump($x);
            echo "<br>";
            $x = 10.365;
            var_dump($x);
            echo "<br>"; 
            $x = 2.4e3;
            var_dump($x);
            echo "<br>"; 
            $x = 8E-5;
            var_dump($x);
            echo "<br>"; 
            $x=true;
            var_dump($x);
            echo "<br>"; 
            $y=false;
            var_dump($y);
            echo "<br>"; 
            $cars=array("Volvo","BMW","SAAB");
            var_dump($cars);
            echo "<br>"; 
            $demo = new TypeDemo();
            var_dump($demo);
            echo "<br>"; 
            $x=null;
            var_dump($x);
            echo "<br>"; 
            var_dump($x == null);
            echo "<br>"; 
        }

        public static function math(){
            $x=10; 
            $y=6;
            echo ($x + $y); // 输出 16
            echo "<br>"; 
            echo ($x - $y); // 输出 4
            echo "<br>"; 
            echo ($x * $y); // 输出 60
            echo "<br>"; 
            echo ($x / $y); // 输出 1.6666666666667
            echo "<br>"; 
            echo ($x % $y); // 输出 4
            echo "<br>"; 

            $x=10; 
            echo ++$x; // 输出 11
            echo "<br>"; 
            $y=10; 
            echo $y++; // 输出 10
            echo "<br>"; 
            $z=5;
            echo --$z; // 输出 4
            echo "<br>"; 
            $i=5;
            echo $i--; // 输出 5
            echo "<br>"; 
        }

        public static function stringFun(){
            //.	串接	.=	串接赋值
            $a = "Hello";
            $b = $a . " world!";
            echo $b; // 输出 Hello world!
            echo "<br>"; 
            $x="Hello";
            $x .= " world!";
            echo $x; // 输出 Hello world!
            echo "<br>"; 
        }

        public static function completFun(){
            $x=100; 
            $y="100";

            var_dump($x == $y);
            echo "<br>";
            var_dump($x === $y);
            echo "<br>";
            var_dump($x != $y);
            echo "<br>";
            var_dump($x !== $y);
            echo "<br>";
            $a=50;
            $b=90;
            var_dump($a > $b);
            echo "<br>";
            var_dump($a < $b);
            echo "<br>";
        }

        public static function arrayFun(){
            $x = array("a" => "red", "b" => "green"); 
            $y = array("c" => "blue", "d" => "yellow"); 
            $z = $x + $y; // $x 与 $y 的联合
            var_dump($z);
            var_dump($x == $y);
            var_dump($x === $y);
            var_dump($x != $y);
            var_dump($x <> $y);
            var_dump($x !== $y);    
        }

        public static function conditionFun(){
            date_default_timezone_set("Asia/Shanghai");
            $t=date("H");

            if ($t<"12") {
                echo "Have a good morning!";
            }elseif ($t>"18") {
                echo "Have a good night!";
            }else{
                echo "Have a good day!";
            }
            echo "<br>";
            echo "当前时间是 " . date("Y/m/d H:i:sa");
            echo "<br>";
            $d=mktime(20, 45, 55, 4, 15, 2017);
            echo "创建日期是 " . date("Y/m/d h:i:sa", $d);
            echo "<br>";
            $d=strtotime("10:38pm April 15 2017");
            echo "创建日期是 " . date("Y/m/d h:i:sa", $d);
            echo "<br>";
        }
        public static function switchFun(int $x){
            switch ($x)
            {
                case 1:
                    echo "Number 1";
                break;
                case 2:
                    echo "Number 2";
                break;
                case 3:
                    echo "Number 3";
                break;
                default:
                    echo "No number between 1 and 3";
            }
            echo "<br>";
        }
        public static function whileFun(){
            $x=1; 

            while($x<=3) {
                echo "while这个数字是：$x <br>";
                $x++;
            }

            $x=1; 
            do {
                echo "do-while这个数字是：$x <br>";
                $x++;
            } while ($x<=3);
        }
        public static function forforeachFun(){
            for ($x=0; $x<=3; $x++) {
                echo "for数字是：$x <br>";
            }

            $colors = array("red","green","blue","yellow"); 
            foreach ($colors as $value) {
                echo "$value <br>";
            }
        }

        public static function arrayApFun(){
            $cars=array("Volvo","BMW","SAAB");
            $arrlength=count($cars);
            //升序排序
            sort($cars);
            //降序排序 
            //rsort($cars);

            for($x=0;$x<$arrlength;$x++) {
                echo $cars[$x];
                echo "<br>";
            }

            $age=array("Bill"=>"35","Steve"=>"37","Peter"=>"43");
            //根据值对数组进行升序排序
            //asort($age);
            //根据值对数组进行降序排序
            //arsort($age);
            //根据键对数组进行升序排序
            //ksort($age);
            //根据键对数组进行降序排序 
            //ksrort($age);

            echo "Peter is " . $age['Peter'] . " years old.<br>";
            foreach($age as $x=>$x_value) {
                echo "Key=" . $x . ", Value=" . $x_value;
                echo "<br>";
            }

            $arr_a = array("a", "b", "c", 1);
            if(in_array("a", $arr_a)){
                echo '字符 a 在 $arr_a 数组中存在';
            } else {
                echo '字符 a 在 $arr_a 数组中不存在';
            }
            echo "<br>";
            if(array_key_exists("PeterP", $age)){
                echo '字符 PeterP 在 $age 数组中存在';
            } else {
                echo '字符 PeterP 在 $age 数组中不存在';
            }
            echo "<br>";
            if(isset($age["Peter"])){
                echo '字符 Peter 在 $age 数组中存在';
            } else {
                echo '字符 Peter 在 $age 数组中不存在';
            }
            $cars = array
            (
                array("Volvo",33,20),
                array("BMW",17,15),
                array("Saab",5,2),
                array("Land Rover",15,11)
            );
            
            for ($row = 0; $row <  4; $row++) {
                echo "<p><b>行数 $row</b></p>";
                echo "<ul>";
                for ($col = 0; $col <  3; $col++) {
                    echo "<li>".$cars[$row][$col]."</li>";
                }
                echo "</ul>";
            }
        }

        public static function fileFun(){
            echo readfile("webdictionary.txt");
            echo "<br>";

            $myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
            // fread() 第一个参数包含待读取文件的文件名，第二个参数规定待读取的最大字节数。
            // echo fread($myfile,filesize("webdictionary.txt"));

            // feof() 函数检查是否已到达 "end-of-file" (EOF)。
            // fgets() 函数用于从文件读取单行。
            // fgetc() 函数用于从文件中读取单个字符。
            while(!feof($myfile)) {
                echo fgets($myfile) . "<br>";
            }
            fclose($myfile);
            echo "<br>";

            //覆盖
            $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
            $txt = "Bill Gates\n";
            fwrite($myfile, $txt);
            $txt = "Steve Jobs\n";
            fwrite($myfile, $txt);
            fclose($myfile);
        }
    }
    
?>