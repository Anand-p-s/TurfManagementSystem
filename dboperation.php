<?php
class dboperation{
    public $con,$res;

    function __construct(){
        $this->con=mysqli_connect("localhost","id21974586_onlineturf","Anand8086#","id21974586_db_turf");
        if (!$this->con) {
            die("Connection Failed: ".mysqli_connect_error());

        }
    }
    public function query($sql)
    {
        $this->res=mysqli_query($this->con,$sql);
        return $this->res;
    }
}
?>