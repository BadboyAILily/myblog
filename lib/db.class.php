<?php
class db {
    public $host;
    public $user;
    public $passwd;
    public $dbname;
    public $dblink;
    
    //构造函数 用来传入连接数据库的各种参数
    function __construct($host,$user,$passwd,$dbname) {
        $this->host = $host;
        $this->user = $user;
        $this->passwd = $passwd;
        $this->dbname = $dbname;
        $this->connect();
        $this->query("set names UTF8");
    }
    //连接数据库 并创建一个类属性 
    function  connect() {
        $mysqli = new mysqli($this->host, $this->user, $this->passwd, $this->dbname);
        if ($mysqli->connect_errno <> 0){
            echo '数据库连接失败,错误信息:'.$mysqli->connect_error;
            exit;
        }
        $this->dblink = $mysqli;
    }
    
    //执行一次sql查询
    function query($sql,$resultmode = MYSQLI_STORE_RESULT){
        return $this->dblink->query($sql,$resultmode);
    }
    function close() {
        return $this->dblink->close();
    }
    function get($sql){
        $res = $this->query($sql);
        $row = $res->fetch_array();
        return $row;
    }
    function gets($sql){
        $res = $this->query($sql);
        $rows = array();
        while($row = $res->fetch_array()){
            $rows[] = $row;
        }
        return $rows;
    }
    
}
