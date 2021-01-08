<?php
class clscon
{
    private $link;
    public function db_connect()
    {
        $host="localhost";
        $uname="root";
        $upass="";
        $this->link=mysqli_connect($host,$uname,$upass,"dbmobshp") or die('database connection error:' .mysqli_error($this->link));
        return $this->link;   //agr koi mistake hogi to aage run hi nhi hoga
    }
    public function db_close()
    {
        mysqli_close($this->link);
    }
}
?>

