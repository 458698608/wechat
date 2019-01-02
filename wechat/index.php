<?php
 2 define("TOKEN", "weixin");
 3
 4 $wechatObj = new CallbackAPI;
 5 $wechatObj->valid();
 6
 7 class CallbackAPI {
 8
 9     /**
10      * 签名验证
11      * @return [type] [description]
12      */
13      public function valid() {
14         $echoStr = $_GET["echostr"];
15         $signature = $_GET["signature"];
16         $timestamp = $_GET["timestamp"];
17         $nonce = $_GET["nonce"];
18         $token = TOKEN;
19         //将token、timestamp、nonce按字典序排序
20         $tmpArr = array($token, $timestamp, $nonce);
21         sort($tmpArr);
22         $tmpStr = implode($tmpArr);
23         //对tmpStr进行sha1加密
24         $tmpStr = sha1($tmpStr);
25         if($tmpStr == $signature){
26             header('content-type:text');
27             echo $echoStr;
28             exit;
29         }
30     }
31 }
