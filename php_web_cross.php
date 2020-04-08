<?php
// 跨域实例

// 方法一：使用jsonp
/*

Ajax 请求

$("#search").click({
function(){
    $.ajax({
type:'GET',
url:"http://127.0.0.1/raid/jquery_learning/ajax_learning/php/index.php?number="+$("#keyword").val(),
dataType:''jsonp,
jsonp:'callback',
success:function(data){
        if(data.success){
            $("#searchResult").html(data.msg);
        }else{
            $("#searchResult").html("出现错误"+data.msg);
        }
    },
error:function(jqXHR){
        alert("发生错误"+jqXHR.status);
    }
})
}
});
*/

// 服务端接收 callback，并添加到返回值中
function search() {
    $jsonp = $_GET["callback"];
    if(!isset($_GET["number"]) || empty($_GET["number"])) {
        echo '{"success":false,"msg":"参数错误"}';
        return ;
    }
    global $staff;
    $number = $_GET["number"];
    $result = $jsonp.'({"success":false,"msg":"没有找到员工"})';

    foreach ($staff as $key => $value) {
        if($value["number"] == $number) {
            $result = $jsonp.'({"success":true,"msg":"找到员工'.$value["name"].'"})';
            break;
        }
    }
    echo $result;
}

// 方法二：只对H5生效
header("Access-Control-Allow-Origin:*"); //*号表示所有域名都可以访问
header("Access-Control-Allow-Method:POST,GET");

// 或者如下处理
// 因为跨域请求api，实际上会请求两次，第一次为 OPTIONS 请求，需要对其返回http_status=200，第二次为正常的 POST or GET 请求，需要设置Allow允许范围等
if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');
}
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    echo json_encode(["code"=>99999]);die;
}