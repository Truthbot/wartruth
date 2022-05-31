<?php
$admin = array(' ',' ');//آیدی عددی خود را وارد کنید
function Daie($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
 
function download($file,$urll){
  $url  = $urll;
  $path = $file;
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $data = curl_exec($ch);
  curl_close($ch);
  file_put_contents($path, $data);
}
function ph($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
function api($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}
 
function ufile($f){
$content = (int)  file_get_contents($f);
if($content > 1) file_put_contents($f,($content+1));
}
$content = file_get_contents("php://input");
$u = json_decode($content, true);
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$es = $message->sticker->emoji;
$first_name = $message->chat->first_name;
$LASTNAME = $message->chat->last_name;
$USERNAME = $message->chat->username;
$chat_id = isset($update->callback_query->message->chat->id)?$update->callback_query->message->chat->id:$update->message->chat->id;
$fadmin = $message->from->id;
$text1 = isset($message->text)?$message->text:$update->callback_query->data;
$url_bot='https://telegram.me/ID';
$user_bot='ID';
$inname = $update->inline_query->from->first_name;
$intext = $update->inline_query->query;
$textmessage = isset($update->message->text)?$update->message->text:'';
$idzormajmoe = str_replace("/start ","",$textmessage);
$message_id2 = isset($update->callback_query->message->message_id)?$update->callback_query->message->message_id:null;
$tc = $update->message->chat->type;
 