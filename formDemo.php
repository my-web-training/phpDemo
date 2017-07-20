<?php
session_start();
// store session data
if(isset($_SESSION['views']))
    $_SESSION['views']=$_SESSION['views']+1;

else
    $_SESSION['views']=1;
echo "Views=". $_SESSION['views'];
unset($_SESSION['views']);
session_destroy();
?>
<html>
<body>
<a href="index.php">测试 $GET</a>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
Name: <input type="text" name="fname">
<input type="submit">
</form>

<?php 
    echo $_SERVER["REQUEST_METHOD"]; 
    echo '<br>';
    if (array_key_exists('fname', $_REQUEST)) {
        $name = $_REQUEST['fname'];
        echo $name;
        echo ' _REQUEST<br>';
    }
    if (array_key_exists('fname', $_POST)) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST['fname'];
            echo $name;
            echo ' _POST<br>';
        }
    }
    if (array_key_exists('fname', $_GET)) {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $name = $_GET['fname'];
            echo $name;
            echo ' _GET<br>';
        }
    }
?>

</form>
</body>
</html>