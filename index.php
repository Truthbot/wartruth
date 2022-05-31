<?php
define("API_KEY","5513222680:AAEFUW7K4v5jTXHCzSQMWB6n6SA6ZpauS30");// توکن ربات
include "telegram.php";
include "lvp.php";
unlink("error_log");
$back = 'بازگشت🏠';
function gift_loot($chat_id){
$cup = get_user($chat_id,"cup");
if($cup >= 20000){
return 120000;
}elseif($cup >= 19000){
return 110000;
}elseif($cup >= 16000){
return 100000;
}elseif($cup >= 14000){
return 80000;
}elseif($cup >= 12000){
return 70000;
}elseif($cup >= 10000){
return 65000;
}elseif($cup >= 5000){
return 50000;
}elseif($cup >= 2500){
return 25000;
}elseif($cup >= 1000){
return 10000;
}elseif($cup >= 500){
return 5000;
}elseif($cup >= 100){
return 2500;
}elseif($cup >= 50){
return 1000;
}elseif($cup >= 20){
return 500;
}elseif($cup >= 10){
return 100;
}elseif($cup >= 0){
return 50;
}
}
function get_clan($name,$mode){
if(!is_dir("clans/$name/config")){
mkdir("clans/$name/config");
}
return file_get_contents("clans/$name/config/$mode");
}
function chenge_clan($name,$mode,$new){
if(!is_dir("clans/$name/config")){
mkdir("clans/$name/config");
}
file_put_contents("clans/$name/config/$mode",$new);
}
function remove_clan($chat_id,$name){
$joinclan = $name;
chenge_user($chat_id,"joinclan",null);
rmdir("users/$chat_id/clan");
rmdir("clans/$joinclan/users/$chat_id");
file_put_contents("users/$chat_id/clan/name.txt",null);
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
از اتحاد اخراج شدید💀
",
'parse_mode'=>'MARKDOWN',
]);
$adminclans = file_get_contents("clans/$joinclan/admin.txt");
httpt('sendmessage',[ 
    'chat_id'=>$adminclans, 
    'text'=>" 
کاربر [$chat_id](tg://user?id=$chat_id) از اتحاد اخراج شد💀
در صورت نیاز میتوانید افراد دیگر را با ارسال ایدی حذف و یا یا برروی دکمه $back کلیک کنید!
",
'parse_mode'=>'MARKDOWN',
]);
}

function left_clan($chat_id){
$joinclan = get_user($chat_id,"joinclan");
chenge_user($chat_id,"joinclan",null);
rmdir("users/$chat_id/clan");
rmdir("clans/$joinclan/users/$chat_id");
file_put_contents("users/$chat_id/clan/name.txt",null);
$adminclans = file_get_contents("clans/$joinclan/admin.txt");
httpt('sendmessage',[ 
    'chat_id'=>$adminclans, 
    'text'=>" 
کاربر [$chat_id](tg://user?id=$chat_id) اتحاد را ترک کرد💀
",
'parse_mode'=>'MARKDOWN',
]);
}
function join_clan($chat_id,$name){

}
function equel_cup($cup1,$cup2){
$last = $cup1 - $cup2;
$last2 = $cup2 - $cup1;
if($cup1 == $cup2){
return true;
}elseif($last <= 20){
return true;
}elseif($last2 <= 20){
return true;
}else{
return false;
}
}
$cupall = get_user($fadmin,'cup');
if($cupall <= 0){
file_put_contents("users/$fadmin/cup",0);
}
function update_level($fadmin){
$time = time();
$tixp = file_get_contents("users/$fadmin/tixp");
$time2 = $time - $tixp;
$day = $time2 / 86400;
if($day > 1){
$xp = file_get_contents("users/$fadmin/xp");
$xp += 1;
file_put_contents("users/$fadmin/xp",$xp);
file_put_contents("users/$fadmin/tixp",$time);
}
}

function conver_gold($fadmin,$type,$pack){
$gold = round(get_user($fadmin,'gold'));
$getlootme = round(get_user($fadmin,$type));
if($pack == 1){
$getlootme += 5000;
if($gold > 10){
chenge_user($fadmin,$type,$getlootme);
$gold -= 10;
chenge_user($fadmin,'gold',$gold);
return true;
}else{
return false;
}


}
if($pack == 2){
$getlootme += 30000;
if($gold > 50){
chenge_user($fadmin,$type,$getlootme);
$gold -= 50;
chenge_user($fadmin,'gold',$gold);

return true;

}else{
return false;
}

}
if($pack == 3){
$getlootme += 70000;
if($gold > 100){
chenge_user($fadmin,$type,$getlootme);
$gold -= 100;
chenge_user($fadmin,'gold',$gold);

return true;

}else{
return false;
}

}
if($pack == 4){
$getlootme += 150000;
if($gold > 200){
chenge_user($fadmin,$type,$getlootme);
$gold -= 200;
chenge_user($fadmin,'gold',$gold);

return true;

}else{
return false;
}

}

}

function Get_Loot($ctroop,$cloot){
if($ctroop >= 10000000){
$percent = $cloot / 100;
$percent *= 80;
return $percent;
}elseif($ctroop >= 70000000){
$percent = $cloot / 100;
$percent *= 75;
return $percent;

}elseif($ctroop >= 50000000){
$percent = $cloot / 100;
$percent *= 60;
return $percent;

}elseif($ctroop >= 30000000){
$percent = $cloot / 100;
$percent *= 59;
return $percent;

}elseif($ctroop >= 10000000){
$percent = $cloot / 100;
$percent *= 57;
return $percent;

}elseif($ctroop >= 9000000){
$percent = $cloot / 100;
$percent *= 55;
return $percent;

}elseif($ctroop >= 7000000){
$percent = $cloot / 100;
$percent *= 50;
return $percent;

}elseif($ctroop >= 5000000){
$percent = $cloot / 100;
$percent *= 47;
return $percent;

}elseif($ctroop >= 3000000){
$percent = $cloot / 100;
$percent *= 45;
return $percent;

}elseif($ctroop >= 1000000){
$percent = $cloot / 100;
$percent *= 40;
return $percent;

}elseif($ctroop >= 500000){
$percent = $cloot / 100;
$percent *= 48;
return $percent;

}elseif($ctroop >= 100000){
$percent = $cloot / 100;
$percent *= 46;
return $percent;

}elseif($ctroop >= 50000){
$percent = $cloot / 100;
$percent *= 44;
return $percent;

}elseif($ctroop >= 10000){
$percent = $cloot / 100;
$percent *= 43;
return $percent;

}elseif($ctroop >= 5000){
$percent = $cloot / 100;
$percent *= 40;
return $percent;

}elseif($ctroop >= 1000){
$percent = $cloot / 100;
$percent *= 30;
return $percent;

}elseif($ctroop >= 500){
$percent = $cloot / 100;
$percent *= 20;
return $percent;

}elseif($ctroop >= 200){
$percent = $cloot / 100;
$percent *= 10;
return $percent;

}elseif($ctroop >= 50){
$percent = $cloot / 100;
$percent *= 5;
return $percent;

}elseif($ctroop >= 10){
$percent = $cloot / 100;
$percent *= 1;
return $percent;

}elseif($ctroop >= 0){
$percent = $cloot / 100;
$percent *= 0.5;
return $percent;

}
}
function get_user($fadmin,$name){
if(!file_exists("users/$fadmin/$name")){
file_put_contents("users/$fadmin/$name",null);
}
return file_get_contents("users/$fadmin/$name");
}
function chenge_user($fadmin,$name,$new){
file_put_contents("users/$fadmin/$name",$new);
}
function run($fadmin,$mode){
file_put_contents("users/$fadmin/run",$mode);
}
function checkuser($fadmin){
if(is_dir("users/$fadmin")){
return true;
}else{
return false;
}
}
function signup($fadmin){
mkdir("users/$fadmin");
$time = time();
file_put_contents("enemy/$fadmin/id",$fadmin);
file_put_contents("users/$fadmin/id",$fadmin);
file_put_contents("users/$fadmin/gold",100);
file_put_contents("users/$fadmin/wood",2500);
file_put_contents("users/$fadmin/food",2500);
file_put_contents("users/$fadmin/troop",200);
file_put_contents("users/$fadmin/xp",1);
file_put_contents("users/$fadmin/castel",1);
file_put_contents("users/$fadmin/name",$fadmin);
file_put_contents("users/$fadmin/timejoin",$time);
file_put_contents("users/$fadmin/shop",0);
file_put_contents("users/$fadmin/ban",0);
file_put_contents("users/$fadmin/lfarm",1);
file_put_contents("users/$fadmin/farm",0);
file_put_contents("users/$fadmin/cup",0);
file_put_contents("users/$fadmin/transh",0);
file_put_contents("users/$fadmin/run",0);
file_put_contents("users/$fadmin/tale",0);
file_put_contents("users/$fadmin/dead",0);
file_put_contents("users/$fadmin/tixp",0);
}


function ttooppclans($mode,$number){
 $saveusers = array();
  $usersscan = scandir("clans");
  unset($usersscan[0]);
  unset($usersscan[1]);
  foreach($usersscan as $savetojs){
$savedis = file_get_contents("clans/$savetojs/$mode");
$saveusers[$savetojs] = $savedis;
  }
  $rating = $saveusers;
    arsort($rating,SORT_NUMERIC); 
    $rate = array(); 
    foreach($rating as $key=>$value){ 
      $rate[] = $key; 
    } 
    return $rate[$number]; 
}



function ttoopp($mode,$number){
 $saveusers = array();
  $usersscan = scandir("users");
  unset($usersscan[0]);
  unset($usersscan[1]);
  foreach($usersscan as $savetojs){
$savedis = file_get_contents("users/$savetojs/$mode");
$saveusers[$savetojs] = $savedis;
  }
  $rating = $saveusers;
    arsort($rating,SORT_NUMERIC); 
    $rate = array(); 
    foreach($rating as $key=>$value){ 
      $rate[] = $key; 
    } 
    return $rate[$number]; 
}
function ttoopp2($mode,$number){

$save = array();
$scan1 = scandir("users");
unset($scan1[0]);
unset($scan1[1]);
foreach($scan1 as $users){
$save[] = array(file_get_contents("users/$users/$mode"),$users);
}
rsort($save);
return $save[$number][0];
}



function getrank($fadmin,$mode){ 
    
  $saveusers = array();
  $usersscan = scandir("users");
  unset($usersscan[0]);
  unset($usersscan[1]);
  foreach($usersscan as $savetojs){
$savedis = file_get_contents("users/$savetojs/$mode");
$saveusers[$savetojs] = $savedis;
  }
  $rating = $saveusers;
  if(isset($rating[$fadmin])){ 
    arsort($rating,SORT_NUMERIC); 
    $rate = array(); 
    foreach($rating as $key=>$value){ 
      $rate[] = $key; 
    } 
    $flipped = array_flip($rate); 
    return $flipped[$fadmin]+1; 
  }else{ 
    return false; 
  } 
}
function getpowerrank($rank,$mode){
  $saveusers = array();
  $usersscan = scandir("users");
  foreach($usersscan as $savetojs){
$savedis = file_get_contents("users/$savetojs/$mode");
$saveusers[$savetojs] = $savedis;
  }
  $rating = $saveusers;
  print_r($rating);
}
if(!is_dir('users')){
mkdir("users");
}
if(!is_dir('.run')){
mkdir(".run");
}



function getrankclan($fadmin,$mode){ 
    
  $saveusers = array();
  $usersscan = scandir("clans/$fadmin/users");
  unset($usersscan[0]);
  unset($usersscan[1]);
  foreach($usersscan as $savetojs){
$savedis = file_get_contents("clans/$fadmin/users/$savetojs/$mode");
$saveusers[$fadmin] += $savedis;
  }
  $rating = $saveusers;
    arsort($rating,SORT_NUMERIC); 
    $rate = array(); 
    foreach($rating as $key=>$value){ 
      $rate[] = $key; 
 
    $flipped = array_flip($rate); 
    return $flipped[$fadmin]+1; 
}

}

$gold = round(get_user($chat_id,'gold'));
$wood = round(get_user($chat_id,'wood'));
$food = round(get_user($chat_id,'food'));
$troop = round(get_user($chat_id,'troop'));
$xp = get_user($chat_id,'xp');
$name = get_user($chat_id,'name');
$shop = get_user($chat_id,'shop');
$timejoin = get_user($chat_id,'timejoin');
$lfarm = get_user($chat_id,'lfarm');
$farm = get_user($chat_id,'farm');
$run = get_user($chat_id,'run');
$transh = get_user($chat_id,'transh');
$ban = get_user($chat_id,'ban');
$cup = get_user($chat_id,'cup');
$tale = round(get_user($chat_id,'tale'));
$ptroop = file_get_contents(".config/pricetroop.php");
$ptale = file_get_contents(".config/pricetale.php");
$dead = round(get_user($chat_id,'dead'));

function update_farm($fadmin){
$day = get_user($fadmin,'xp');
$lfarm = get_user($fadmin,'lfarm');
if($day >= 50){
chenge_user($fadmin,'lfarm',10);
}else
if($day >= 35){
chenge_user($fadmin,'lfarm',9);
}else
if($day >= 25){
chenge_user($fadmin,'lfarm',8);
}else
if($day >= 20){
chenge_user($fadmin,'lfarm',7);
}else
if($day >= 15){
chenge_user($fadmin,'lfarm',6);
}else
if($day >= 10){
chenge_user($fadmin,'lfarm',5);
}else
if($day >= 7){
chenge_user($fadmin,'lfarm',4);
}else
if($day >= 5){
chenge_user($fadmin,'lfarm',3);
}else
if($day >= 2){
chenge_user($fadmin,'lfarm',2);
}
}
flush();
update_farm($fadmin);
update_level($fadmin);
if($text1 == "/start" || $text1 == $back){
run($fadmin,"no");
if(checkuser($fadmin) != true){
signup($fadmin);
httpt('sendMessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
سلام به ربات جنگ هیولاها خوش امدید😉 
", 
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
            'keyboard'=>[
                [
                ['text'=>"بهترین ها🏆"],['text'=>'فروشگاه💵']
                ],
                [
                ['text'=>"سرباز🃏"],['text'=>"منابع🏡"]
                ],
                [
                ['text'=>"حمله🏛"],['text'=>"جنگ رویایی👹"]
                ],
                [
                ['text'=>"دهکده من🏡"],['text'=>'کلن🛡']
                ],
                [
                ['text'=>'انتقام☠']
                ]
              ],
])
]);
}else{
httpt('sendMessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
سلام قربان👑", 
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
            'keyboard'=>[
                     [
                ['text'=>"بهترین ها🏆"],['text'=>'فروشگاه💵']
                ],
                [
                ['text'=>"سرباز🃏"],['text'=>"منابع🏡"]
                ],
                [
                ['text'=>"حمله🏛"],['text'=>"جنگ رویایی👹"]
                ],
                [
                ['text'=>"دهکده من🏡"],['text'=>'کلن🛡']
                ],
                [
                ['text'=>'انتقام☠']
                ]
              ],
])
]);
}

}

if($text1 == "بهترین ها🏆"){
$xpttoopp = ttoopp('xp',0);
$xpttoopp2 = ttoopp('xp',1);
$xpttoopp3 = ttoopp('xp',2);

$ratexp = getrank($fadmin,'xp');

$goldttoopp = ttoopp('gold',0);
$goldttoopp2 = ttoopp('gold',1);
$goldttoopp3 = ttoopp('gold',2);

$rategold = getrank($fadmin,'gold');

$troopttoopp = ttoopp('troop',0);
$troopttoopp2 = ttoopp('troop',1);
$troopttoopp3 = ttoopp('troop',2);

$ratetroop = getrank($fadmin,'troop');

$cupttoopp = ttoopp('cup',0);
$cupttoopp2 = ttoopp('cup',1);
$cupttoopp3 = ttoopp('cup',2);

$ratecup = getrank($fadmin,'cup');

$topclan = ttooppclans("cup",0);
$topclan2 = ttooppclans("cup",1);
$topclan3 = ttooppclans("cup",2);


httpt('sendMessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 

➖➖➖➖➖➖
ثروتمند ترین کینگدام🌕 
رتبه 1 : [$goldttoopp](tg://user?id=$goldttoopp)
رتبه 2 : [$goldttoopp2](tg://user?id=$goldttoopp2)
رتبه 3 : [$goldttoopp3](tg://user?id=$goldttoopp3)

رتبه شما : $rategold
➖➖➖➖➖➖
فرمانده ی کینگدام🎃 
رتبه 1 : [$troopttoopp](tg://user?id=$troopttoopp)
رتبه 2 : [$troopttoopp2](tg://user?id=$troopttoopp2)
رتبه 3 : [$troopttoopp3](tg://user?id=$troopttoopp3)

رتبه شما : $ratetroop
➖➖➖➖➖➖
بالاترین کاپ🏆
رتبه 1 : [$cupttoopp](tg://user?id=$cupttoopp)
رتبه 2 : [$cupttoopp2](tg://user?id=$cupttoopp2)
رتبه 3 : [$cupttoopp3](tg://user?id=$cupttoopp3)

رتبه شما : $ratecup
➖➖➖➖➖➖

", 

'parse_mode'=>'MARKDOWN',
]);

}
    $pack00= 20 * $ptroop;
    $pack0 = 1000 * $ptroop;
    
if($text1 =="سرباز🃏"){
    	httpt('sendMessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
ایجاد 50 سرباز💂
قیمت💵 : 500 گندم
گندم ها🌾 : $food
سرباز ها💂‍♀ : $troop
",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
['text' => "ایجاد",'callback_data'=>"pack"]
                    ]
                ]
            ])
]);
}
if($text1 == 'pack'){
    file_put_contents(".run/".$chat_id."mi.txt",$message_id2); 
    if($food >= $pack0){
    $troop += 50;
    $food -= 500;
    $mi = file_get_contents(".run/".$chat_id."mi.txt"); 
    chenge_user($chat_id,'food',$food);
    chenge_user($chat_id,'troop',$troop);
     httpt('editMessagetext',[ 
    'chat_id'=>$chat_id, 
    'message_id'=>$mi, 
    'text'=>" 
ایجاد 50 سرباز💂
قیمت💵 : 500 گندم
گندم ها🌾 : $food
سرباز ها💂‍♀ : $troop
",
            'reply_markup' => json_encode([
                  'inline_keyboard' => [
                    [
['text' => "ایجاد",'callback_data'=>"pack"
]
                    ]
                ]
            ])
]);
    }else{
        $mi = file_get_contents(".run/".$chat_id."mi.txt"); 
      httpt('editMessagetext',[ 
    'chat_id'=>$chat_id, 
    'message_id'=>$mi, 
    'text'=>" 
منابع کافی نیست ?
",
            ]);
    }
}
if($text1 == "منابع🏡"){
$startfarm = get_user($chat_id,'farm');
if($startfarm == 0){
	    $farm = 2;
	    $lfarm = 2;
$speedfarm = farm($lfarm,'speed');
$diskfarm = farm($lfarm,'max');

httpt('sendMessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
سطح مزرعه 🏡 : $lfarm
سرعت تولید⚡️ : $speedfarm ثانیه
فضا 🌕 : $diskfarm

گندم  🌱 : $food
چوب 🌲: $wood

",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
['text' => "💠شروع تولید💠",'callback_data'=>"startfarm"]
                    ]
                ]
            ])
]);

}else{

$time = time();
$timefarm = get_user($chat_id,'farm');
$infarn = $time - $timefarm;
$speedfarm = farm($lfarm,'speed');
$diskfarm = farm($lfarm,'max');
$in_farm = $infarn * $speedfarm;
if($timefarm == 0){
$infarm = 0;
}else
if($in_farm > $diskfarm){
$infarm = $diskfarm;
}else{
$infarm = $in_farm;
}

httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
گندم  🌱 : $food
چوب 🌲: $wood

تولید فعلی گندم و چوب : $infarm 🌱
",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
['text'=>"بروزرسانی♐️",'callback_data'=>"updatefarm"]
                    ],
                    [
['text'=>"برداشت🏜︄",'callback_data'=>"getfarm"]
                    ]
                ]
            ])
]);



}
}
if($text1 == "startfarm"){
$time = time();
chenge_user($chat_id,'farm',$time);
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
   'message_id'=>$mi, 
    'text'=>" 
مزرعه درحال تولید میباشد 🌱
",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
['text'=>"بروزرسانی♐️",'callback_data'=>"updatefarm"]
                    ]
                ]
            ])
]);
}
if($text1 == "updatefarm"){
file_put_contents(".run/".$chat_id."mif.txt",$message_id2); 
$mi = file_get_contents(".run/".$chat_id."mif.txt");
$time = time();
$timefarm = get_user($chat_id,'farm');
$infarn = $time - $timefarm;
$speedfarm = farm($lfarm,'speed');
$diskfarm = farm($lfarm,'max');
$in_farm = $infarn * $speedfarm;
if($timefarm == 0){
$infarm = 0;
}else
if($in_farm > $diskfarm){
$infarm = $diskfarm;
}else{
$infarm = $in_farm;
}

httpt('editmessagetext',[ 
    'chat_id'=>$chat_id, 
   'message_id'=>$mi, 
    'text'=>" 
گندم  🌱 : $food
چوب 🌲: $wood

تولید فعلی گندم و چوب : $infarm 🌱
",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
['text'=>"بروزرسانی♐️",'callback_data'=>"updatefarm"]
                    ],
                    [
['text'=>"برداشت🏜︄",'callback_data'=>"getfarm"]
                    ]
                ]
            ])
]);
}
if($text1 == "getfarm"){
file_put_contents(".run/".$chat_id."mif.txt",$message_id2); 
$mi = file_get_contents(".run/".$chat_id."mif.txt");
$time = time();
$timefarm = get_user($chat_id,'farm');
$infarn = $time - $timefarm;
$speedfarm = farm($lfarm,'speed');
$diskfarm = farm($lfarm,'max');
$in_farm = $infarn * $speedfarm;
if($timefarm == 0){
$infarm = 0;
}else
if($in_farm > $diskfarm){
$infarm = $diskfarm;
}else{
$infarm = $in_farm;
}
chenge_user($chat_id,'farm',0);
$food += $infarm;
$wood += $infarm;
chenge_user($chat_id,'wood',$wood);
chenge_user($chat_id,'food',$food);
httpt('editmessagetext',[ 
    'chat_id'=>$chat_id, 
   'message_id'=>$mi, 
    'text'=>" 
مقدار $infarm چوب و گندم دریافت شد 🌱
",
]);
}if($text1 == "حمله🏛"){
$scandir = scandir("users/$chat_id/enemy");
    unset($scandir[0]);  unset($scandir[1]);
    $count = count($scandir) + 1;
    $rand = rand(2,$count);
    $enemy = $scandir[$rand];
    $troopenemy = round(get_user($enemy,'troop'));
    file_put_contents("users/$chat_id/enemy.txt",$enemy);

$joinclanen = get_user($enemy,"joinclan");
  $enfood = get_user($enemy,'food');
  $enwood = get_user($enemy,'wood');
  $GLfood = round(Get_Loot($troop,$enfood));
  $GLwood = round(Get_Loot($troop,$enwood));
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
دشمن : [$enemy](شانسی🎲)
تعداد سرباز ها : $troopenemy
حداکثر گندم جمع اوری🌱 : $GLfood
حداکثر چوب جمع اوری🌲 : $GLwood
نام اتحاد💎 : $joinclanen
",
'parse_mode'=>'MARKDOWN',
 'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
['text'=>"حمله️",'callback_data'=>"attack"]
                    ],
                    ]

                    ])
]);
}
$enemymy = file_get_contents("users/$chat_id/enemy.txt");
if($text1 == "attack" and $enemymy != 'no'){
rmdir("users/$chat_id/revenge/$enemymy");
$troopanemy = get_user($enemymy,'troop');
$taleanemy = get_user($enemymy,'tale');
file_put_contents("users/$chat_id/enemy.txt",'no');
if($taleanemy >= $troop){
$taleanemy -= $troop;
chenge_user($enemymy,'troop',$taleanemy);
chenge_user($chat_id,'troop',0);
$cup -= 5;
chenge_user($chat_id,'cup',$cup);
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
دشمن تله زیادی داشت ما باختیم😥
-5 کاپ👑
",
'parse_mode'=>'MARKDOWN',
]);
$encup = get_user($enemymy,'cup');
$encup += 5;
chenge_user($enemymy,'cup',$encup);
httpt('sendmessage',[ 
    'chat_id'=>$enemymy, 
    'text'=>" 
کاربر $chat_id به ما حمله کرد💀
 اما نتوانست به دهکده نفوذ کند و تله ها تمام سربازان دشمن را کشت!💀
تله های باقیمانده  $taleanemy
تلفات تله ها $troop
+5 کاپ👑
",
'parse_mode'=>'MARKDOWN',
]);
}else{
$troop -= $taleanemy;


chenge_user($chat_id,'troop',$troop);
chenge_user($enemymy,'tale',0);

$cup += 5;
chenge_user($chat_id,'cup',$cup);

httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
از تله ها گذر کردیم😎
تعداد باقیمانده سرباز ها  $troop
تلفات  $taleanemy
+5 کاپ👑
",
'parse_mode'=>'MARKDOWN',
]);
$encup = get_user($enemymy,'cup');
$encup -= 5;
chenge_user($enemymy,'cup',$encup);
httpt('sendmessage',[ 
    'chat_id'=>$enemymy, 
    'text'=>" 
کاربر $chat_id به ما حمله کرد💀
 انها توانستند از تله ها گذر کرده و تمام تله هارو خنسی کنند!💀
-5 کاپ👑
",
'parse_mode'=>'MARKDOWN',
]);
}



if($troopanemy >= $troop){
$troopanemy -= $troop;
chenge_user($enemymy,'troop',$troopanemy);
chenge_user($chat_id,'troop',0);

$dead += $troopanemy;
chenge_user($chat_id,"dead",$dead);


$endead = get_user($enemymy,'dead');
$endead += $troop;
chenge_user($enemymy,"dead",$endead);

$cup -= 5;
chenge_user($chat_id,'cup',$cup);

httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
دشمن سرباز زیادی داشت ما باختیم😥
-5 کاپ👑
",
'parse_mode'=>'MARKDOWN',
]);
$encup = get_user($enemymy,'cup');
$encup += 5;
chenge_user($enemymy,'cup',$encup);
httpt('sendmessage',[ 
    'chat_id'=>$enemymy, 
    'text'=>" 
دشمن نتوانست به دهکده نفوذ کند و سرباز ها تمام سربازان دشمن را کشتن!💀
سرباز های باقیمانده  $troopanemy
تلفات $troop
+ 5 کاپ👑
",
'parse_mode'=>'MARKDOWN',
]);
}else{
$troop -= $troopanemy;


$dead += $troopanemy;
chenge_user($chat_id,"dead",$dead);


$endead = get_user($enemymy,'dead');
$endead += $troop;
chenge_user($enemymy,"dead",$endead);


chenge_user($chat_id,'troop',$troop);
chenge_user($enemymy,'troop',0);

$encup = get_user($enemymy,'cup');

$enfood = get_user($enemymy,'food');
$enwood = get_user($enemymy,'wood');

$GLfood = round(Get_Loot($troop,$enfood));
$GLwood = round(Get_Loot($troop,$enwood));

$forenemeywood = $enwood - $GLwood;
chenge_user($enemymy,'wood',$forenemeywood);
$forenemeyfood = $enfood - $GLfood;
chenge_user($enemymy,'food',$forenemeyfood);

$forwinnerwood = $wood + $GLwood;
chenge_user($chat_id,'wood',$forwinnerwood);
$forwinnerfood = $food + $GLfood;
chenge_user($chat_id,'food',$forwinnerfood);

$encup -= 10;
chenge_user($enemymy,'cup',$encup);
$cup += 10;
chenge_user($chat_id,'cup',$cup);
rmdir("users/$chat_id/enemy/$enemymy");
$giftfood = gift_loot($chat_id);

$wood += $giftfood;
chenge_user($chat_id,'wood',$wood);
$food += $giftfood;
chenge_user($chat_id,'food',$food);

httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
از سرباز ها گذر کردیم😎
تعداد باقیمانده سرباز ها : $troop
تلفات😥 : $troopanemy
منابع جمع اوری شده😎 :
گندم 🌾 : $GLfood
چوب 🌲 : $GLwood
جاییزه لوت🎋 : $giftfood
چوب و گندم👑
+10 کاپ👑
",
'parse_mode'=>'MARKDOWN',
]);
$joinclanenemy = get_user($enemymy,"joinclan");
$scanclanen = scandir("clans/$joinclanenemy/users");
unset($scanglobal[0]); unset($scanglobal[1]);
foreach($scanclanen as $sendforall){

if(!is_dir("users/$sendforall/revenge")){
mkdir("users/$sendforall/revenge");
}
mkdir("users/$sendforall/revenge/$chat_id");
}
$scanglobalclanen = scandir("clans/$joinclanenemy/global");
foreach($scanglobalclanen as $sendforall){
httpt('sendmessage',[ 
    'chat_id'=>$sendforall, 
    'text'=>"
به کاربر [$enemymy](tg://user?id=$enemymy) توسط [$chat_id](tg://user?id=$chat_id) حمله شد👹
وقت انتقام گیریه💀
",
'parse_mode'=>'MARKDOWN',
]);
}
httpt('sendmessage',[ 
    'chat_id'=>$enemymy, 
    'text'=>" 
دشمن توانست به دهکده نفوذ کند و سرباز های ما همه کشته شدن😥💀
منابع از دست رفته 💀 :
گندم 🌾 : $GLfood
چوب 🌲 : $GLwood
-10 کاپ👑
",

'parse_mode'=>'MARKDOWN',
]);
}


}
if($text1 == "فروشگاه💵"){
httpt('sendMessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
به فروشگاه خوش امدید😉 
", 
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
            'keyboard'=>[
                [
                ['text'=>"ایجاد تله💣"],['text'=>'تبدیل الماس💎']
                ],
                [
                ['text'=>'الماس رایگان💎'],['text'=>$back],['text'=>'خرید الماس🛒']
                ]
              ],
])
]);
}
if($text1 =="خرید الماس 🛒"){
    	httpt('sendMessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
برای خرید الماس می تونید به کانال ما مراجعه کنید 👇
https://t.me/MonsterWars
",

]);
}
if($text1 =="ایجاد تله💣"){
    	httpt('sendMessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
ایجاد 10 تله💣
 قیمت💵: 1000 چوب
چوب ها🌲 : $wood
تله ها💣 : $tale
",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
['text' => "ایجاد",'callback_data'=>"ct"]
                                        ]

                ]
            ])
]);
}
if($text1 == 'ct'){
    file_put_contents(".run/".$chat_id."mit.txt",$message_id2); 
    if($wood >= $ptale){
    $tale += 10;
    $wood -= 1000;
    $mit = file_get_contents(".run/".$chat_id."mit.txt"); 
    chenge_user($chat_id,'wood',$wood);
    chenge_user($chat_id,'tale',$tale);
     httpt('editMessagetext',[ 
    'chat_id'=>$chat_id, 
    'message_id'=>$mit, 
    'text'=>" 
ایجاد 10 تله💣
قیمت💵: 1000 چوب
چوب ها🌲 : $wood
تله ها💣 : $tale
",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
['text' => "ایجاد",'callback_data'=>"ct"]
                    ]
                ]
            ])
]);
    }else{
        $mit = file_get_contents(".run/".$chat_id."mit.txt"); 
      httpt('editMessagetext',[ 
    'chat_id'=>$chat_id, 
    'message_id'=>$mit, 
    'text'=>" 
منابع کافی نیست 😭
",
            ]);
    }
}
if($text1 == "تبدیل الماس💎"){

httpt('sendMessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
تعداد الماس های شما : $gold 💎
", 
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
            'keyboard'=>[
                [
                ['text'=>"تبدیل به گندم🌾"],['text'=>'تبدیل به چوب🌲']
                ],
                [
                ['text'=>$back]
                ]
              ],
])
]);
}
if($text1 == "تبدیل به گندم🌾"){
file_put_contents("users/$fadmin/convert.txt","food");
httpt('sendMessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
پک 1 
10 الماس برای 5000 گندم

پک 2
50 الماس برای 30000 گندم

پک 3
100 الماس برای 70000 گندم

پک 4
200 الماس برای 140000 گندم
", 
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
            'keyboard'=>[
                [
                ['text'=>"پک 1"],['text'=>'پک 2']
                ],
                [
                ['text'=>"پک 3"],['text'=>'پک 4']
                ],
                [
                ['text'=>$back]
                ]
              ],
])
]);
}
if($text1 == "تبدیل به چوب🌲"){
file_put_contents("users/$fadmin/convert.txt","wood");
httpt('sendMessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
پک 1 
10 الماس برای 5000 چوب

پک 2
50 الماس برای 30000 چوب

پک 3
100 الماس برای 70000 چوب

پک 4
200 الماس برای 140000 چوب
", 
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
            'keyboard'=>[
                [
                ['text'=>"پک 1"],['text'=>'پک 2']
                ],
                [
                ['text'=>"پک 3"],['text'=>'پک 4']
                ],
                [
                ['text'=>$back]
                ]
              ],
])
]);
}

$converttype = file_get_contents("users/$fadmin/convert.txt");
if($converttype == 'food'){
if($text1 == "پک 1"){
$cg = conver_gold($chat_id,'food',1);
if($cg == true){
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
خرید موفقیت امیز بود👼
",
'parse_mode'=>'MARKDOWN',
]);
}else{
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
الماس ها کافی نیست👼
",
'parse_mode'=>'MARKDOWN',
]);
}
}
if($text1 == "پک 2"){
$cg = conver_gold($chat_id,'food',2);
if($cg == true){
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
خرید موفقیت امیز بود👼
",
'parse_mode'=>'MARKDOWN',
]);
}else{
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
الماس ها کافی نیست👼
",
'parse_mode'=>'MARKDOWN',
]);
}
}
if($text1 == "پک 3"){
$cg = conver_gold($chat_id,'food',3);
if($cg == true){
httpt('sendmessage',[ 

    'chat_id'=>$chat_id, 
    'text'=>" 
خرید موفقیت امیز بود👼
",
'parse_mode'=>'MARKDOWN',
]);

}else{
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
الماس ها کافی نیست👼
",

'parse_mode'=>'MARKDOWN',
]);
}
}
if($text1 == "پک 4"){
$cg = conver_gold($chat_id,'food',4);
if($cg == true){
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
خرید موفقیت امیز بود👼
",
'parse_mode'=>'MARKDOWN',
]);
}else{
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
الماس ها کافی نیست👼
",
'parse_mode'=>'MARKDOWN',
]);
}
}
}
if($converttype == 'wood'){

if($text1 == "پک 1"){
$cg = conver_gold($chat_id,'wood',1);
if($cg == true){
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
خرید موفقیت امیز بود👼
",
'parse_mode'=>'MARKDOWN',
]);
}else{
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
الماس ها کافی نیست👼
",
'parse_mode'=>'MARKDOWN',
]);
}
}
if($text1 == "پک 2"){
$cg = conver_gold($chat_id,'wood',2);
if($cg == true){
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
خرید موفقیت امیز بود👼
",
'parse_mode'=>'MARKDOWN',
]);
}else{
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
الماس ها کافی نیست👼
",
'parse_mode'=>'MARKDOWN',
]);
}
}
if($text1 == "پک 3"){
$cg = conver_gold($chat_id,'wood',3);
if($cg == true){
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
خرید موفقیت امیز بود👼
",
'parse_mode'=>'MARKDOWN',
]);
}else{
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
الماس ها کافی نیست👼
",
'parse_mode'=>'MARKDOWN',
]);
}
}
if($text1 == "پک 4"){
$cg = conver_gold($chat_id,'wood',4);
if($cg == true){
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
خرید موفقیت امیز بود👼
",
'parse_mode'=>'MARKDOWN',
]);
}else{
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
الماس ها کافی نیست👼
",
'parse_mode'=>'MARKDOWN',
]);
}
}
}
if($text1 == "جنگ رویایی👹"){
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
درحال رفع مشکل...
",
'parse_mode'=>'MARKDOWN',
]);
}
if($text1 == "الماس رایگان💎"){
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
شما میتوانید با اشتراک گذاری لینک زیر و کلیک افراد برروی لینک برنده ی 50 الماس شوید💎👼
https://telegram.me/TheMonsterWarsbot?start=$chat_id
",
'parse_mode'=>'MARKDOWN',
]);
}
if(isset($idzormajmoe) and is_dir("users/$idzormajmoe")){
if(!is_dir("users/$fadmin")){
$gold = get_user($idzormajmoe,'gold');
$gold += 50;
chenge_user($idzormajmoe,'gold',$gold);
httpt('sendmessage',[ 
    'chat_id'=>$idzormajmoe, 
    'text'=>" 
یک نفر با لینک شما عضو شد 👼
",
'parse_mode'=>'MARKDOWN',
]);
mkdir("users/$fadmin");
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
خوش امدید! لطفا مجددا /start را ارسال کنید 👼
",
'parse_mode'=>'MARKDOWN',
]);
}
}
if(in_array($fadmin,$admin)){
if($text1 == "/panel"){
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
شما ادمین شناخته شدید👼
",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
            'keyboard'=>[
                [
                ['text'=>"تعداد اعضا👤"],['text'=>'ارسال هدیه🎅']
                ],
                [
                ['text'=>"ارسال به همه👥"],['text'=>$back]
                ]
              ],
])
]);
}
if($text1 == "تعداد اعضا👤"){
$count = count(scandir("users")) - 3;
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
تعداد بازیکنان👤 : $count
",
]);
}
if($text1 == "ارسال به همه👥"){
run($fadmin,"sendtoall");
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
متن مورد نظر را برای ارسال به همه وارد کنید📡
در صورت لغو برروی $back کلیک کنید!😌✋
",
]);
}
if($run == "sendtoall" and $text1 != $back){
$users = scandir("users");
run($fadmin,"no");
foreach($users as $yses){
httpt('sendmessage',[ 
    'chat_id'=>$yses, 
    'text'=>" 
$text1
",
]);
}
}

if($text1 == "ارسال هدیه🎅"){
run($fadmin,"sendgift");
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
چه تعداد گندم و چوب به همه هدیه میدهید📡
در صورت لغو برروی $back کلیک کنید!😌✋
",
]);
}
if($run == "sendgift" and $text1 != $back){
$users = scandir("users");
run($fadmin,"no");
foreach($users as $yses){

$addfood = get_user($yses,'food');
$addfood += $text1;
chenge_user($yses,'food',$addfood);


$addwood = get_user($yses,'wood');
$addwood += $text1;
chenge_user($yses,'wood',$addwood);

httpt('sendmessage',[ 
    'chat_id'=>$yses, 
    'text'=>" 
برای ما پک هدیه ارسال شده که حاوی $text1 چوب و گندم است🌾
",
]);
}
}
}
if($text1 == "دهکده من🏡"){
$dead = round(get_user($chat_id,'dead'));
$joinclan = get_user($chat_id,"joinclan");
    httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
گندم ها🌾 : $food
چوب ها🌲 : $wood
الماس ها💎 : $gold
سرباز ها💂‍♀ : $troop
شناسه شما🆔 : $chat_id
تعداد قتل های شما💀: $dead
سطح شما👴 : $xp
کاپ🏆 : $cup
نام اتحاد👑 : $joinclan
",
]);
}

if($text1 == "entertroop"){
run($chat_id,"entertroop");
$pricealltroop = round($food / $ptroop);
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 

    'text'=>" 
تعداد مورد نظر را ارسال کنید💀
حداکثر سرباز ها : $pricealltroop
",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
            'keyboard'=>[
                [
                ['text'=>$back]
                ]
              ],
])
]);
}
if($run == "entertroop"){
    $textacg = preg_replace('/[^0-9]/','',$text1);
    $packprice = $textacg * $ptroop;
    if($food >= $packprice and $text1 != $back){
$troop += $textacg;
    $food -= $packprice;
    chenge_user($chat_id,'food',$food);
    chenge_user($chat_id,'troop',$troop);
    $pricealltroop = round($food / $ptroop) - 1;
if($pricealltroop > 0){
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
سرباز های مورد نظر ایجاد شد💀
باقیمانده ایجاد💀 : $pricealltroop
",
'parse_mode'=>'MARKDOWN',
]);
}else{
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
سرباز های مورد نظر ایجاد شد💀
",
'parse_mode'=>'MARKDOWN',
]);
}
}elseif($text1 != $back){
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
منابع کافی نیست💀
",
'parse_mode'=>'MARKDOWN',
]);
}
}



if($text1 == "customtale"){
run($chat_id,"customtale");
$pricealltale = round($wood / $ptale);
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
تعداد مورد نظر را ارسال کنید💀
حداکثر تله ها : $pricealltale
",
'parse_mode'=>'Markdown', 
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
            'keyboard'=>[
                [
                ['text'=>$back]
                ]
              ],
])
]);
}
if($run == "customtale"){
    $textacg = preg_replace('/[^0-9]/','',$text1);
    $packprice = $textacg * $ptale;
    if($wood >= $packprice and $text1 != $back){
    $tale += $textacg;
    $wood -= $packprice;
    chenge_user($chat_id,'wood',$wood);
    chenge_user($chat_id,'tale',$tale);
    $pricealltroop = round($wood / $ptale);

if($pricealltroop > 0){
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
تله های مورد نظر ایجاد شد💀
باقیمانده ایجاد💀 : $pricealltroop
",
'parse_mode'=>'MARKDOWN',
]);
}else{
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
تله های مورد نظر ایجاد شد💀
",
'parse_mode'=>'MARKDOWN',
]);
}
}elseif($text1 != $back){
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
منابع کافی نیست💀
",
'parse_mode'=>'MARKDOWN',
]);
}
}
$joinclan = get_user($fadmin,"joinclan");
if($text1 == "کلن🛡"){
if($joinclan == null){
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
یک اتحاد بسازید و یا وارد یک اتحاد بشید👹
",
'parse_mode'=>'MARKDOWN',
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
            'keyboard'=>[
                 [
                 ['text'=>'ایجاد اتحاد🎭'], ['text'=>'ورود به اتحاد👾']
                ],
                [
                ['text'=>$back]
                ]
              ],
])
]);
}
}

if($joinclan == null){

if($text1 == "ایجاد اتحاد🎭"){
run($chat_id,"create_clan1");

httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
نام اتحاد را وارد کنید💎
هزینه 250 الماس 💎
",
'parse_mode'=>'MARKDOWN',
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
            'keyboard'=>[
                [
                ['text'=>$back]
                ]
              ],
])
]);
}
if($run == "create_clan1" and $text1 != $back){
if($gold >= 250){
if(!is_dir("clans/$text1")){
$gold -= 250;
chenge_user($chat_id,'gold',$gold);
chenge_user($chat_id,"joinclan",$text1);
mkdir("users/$chat_id/clan");
file_put_contents("users/$chat_id/clan/name.txt",$text1);
mkdir("clans/$text1");
mkdir("clans/$text1/users");
file_put_contents("clans/$text1/admin.txt",$fadmin);
run($chat_id,"no");
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
اتحاد با موفقیت ایجاد شد!
",
'parse_mode'=>'MARKDOWN',
]);
}else{
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
این نام از قبل استفاده شده است
",
'parse_mode'=>'MARKDOWN',
]);
}
}else{
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
منابع کافی نیست!
",
'parse_mode'=>'MARKDOWN',
]);
}
}
if($text1 == "ورود به اتحاد👾"){
run($chat_id,"join_clan");
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
نام اتحاد را وارد کنید💎
",
'parse_mode'=>'MARKDOWN',
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
            'keyboard'=>[
                [
                ['text'=>$back]
                ]
              ],
])
]);
}
if($run == "join_clan" and $text1 != $back){
if(is_dir("clans/$text1")){
$mintroop = get_clan($joinclan,'mintroop');
if($troop >= $mintroop){
run($chat_id,"no");
chenge_user($chat_id,"joinclan",$text1);
mkdir("users/$chat_id/clan");
mkdir("clans/$text1/users");
mkdir("clans/$text1/users/$fadmin");
file_put_contents("users/$chat_id/clan/name.txt",$text1);
$adminclans = file_get_contents("clans/$text1/admin.txt");
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
با موفقیت وارد شدید💎
",
'parse_mode'=>'MARKDOWN',
]);
httpt('sendmessage',[ 
    'chat_id'=>$adminclans, 
    'text'=>" 
کاربر [$fadmin](tg://user?id=$fadmin) عضو اتحاد شد💎
",
'parse_mode'=>'MARKDOWN',
]);
}else{
httpt('sendmessage',[ 
    'chat_id'=>$adminclans, 
    'text'=>" 
سرباز های شما برای وارد به اتحاد کافی نیست💀
حداقل سرباز : $mintroop
",
'parse_mode'=>'MARKDOWN',
]);
}
}else{
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
این اتحاد وجود ندارد
",
'parse_mode'=>'MARKDOWN',
]);
}
}
}

if($joinclan != null){
if($text1 == "کلن🛡"){
$info = get_clan($joinclan,'bio');
$adminclans = file_get_contents("clans/$joinclan/admin.txt");
if($chat_id != $adminclans){
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
نام اتحاد : $joinclan
$info
",
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
            'keyboard'=>[
               [
               ['text'=>"چت اتحاد☁"]
               ],
               [
                ['text'=>"لیست اعضا👹"],['text'=>'قدرت اتحاد⚔']
                ],
                [
                ['text'=>"خروج از اتحاد🎪️"],['text'=>$back]
                ]
              ],
])
]);
}else{
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
نام اتحاد : $joinclan
$info
",
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
            'keyboard'=>[
               [
               ['text'=>"چت اتحاد☁"]
               ],
               [
                ['text'=>"لیست اعضا👹"],['text'=>'قدرت اتحاد⚔']
                ],
                [
                ['text'=>'اخراج🤡'],['text'=>'تنظیمات⚙']
                ],
                [
                ['text'=>"خروج از اتحاد🎪️"],['text'=>$back]
                ]
              ],
])
]);
}
}
if($text1 == "خروج از اتحاد🎪"){
left_clan($chat_id);
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>"
با موفقیت خارج شدید💀
",
'parse_mode'=>'MARKDOWN',
]);
}
if($text1 == "قدرت اتحاد⚔"){
$scanglobal = scandir("clans/$joinclan/users");
unset($scanglobal[0]); unset($scanglobal[1]);
$powertroop = 0;
$powercup = 0;
foreach($scanglobal as $sendforall){
$counttroop = round(get_user($sendforall,'troop'));
$powertroop += $counttroop;
$countcup = round(get_user($sendforall,'cup'));
$powercup += $countcup;
}
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>"
قدرت سرباز💂 : $powertroop
قدرت کاپ🏆 : $powercup
",
'parse_mode'=>'MARKDOWN',
]);
}
if($text1 == "لیست اعضا👹"){
$scanglobal = scandir("clans/$joinclan/users");
unset($scanglobal[0]); unset($scanglobal[1]);
foreach($scanglobal as $sendforall){
$counttroop = round(get_user($sendforall,'troop'));
$countcup = round(get_user($sendforall,'cup'));
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>"
نام کاربر 💂 : [$sendforall](tg://user?id=$sendforall)
تعداد سرباز ها :👹 $counttroop
تعداد کاپ ها👑 : $countcup
",
'parse_mode'=>'MARKDOWN',
]);
}
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>"
لیست اعضا ارسال شد💂
",
'parse_mode'=>'MARKDOWN',
]);
}



$adminclans = file_get_contents("clans/$joinclan/admin.txt");
if($chat_id == $adminclans){
if($text1 == "اخراج🤡"){
run($chat_id,"remove_userclan");
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>"
چت ایدی فرد مورد نظر را وارد کنید🏆
",
'parse_mode'=>'MARKDOWN',
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
            'keyboard'=>[
                [
                ['text'=>$back]
                ]
              ],
])
]);
}
if($text1 == "تنظیمات⚙"){
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>"
خوش امدید!👹
",
'parse_mode'=>'MARKDOWN',
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
            'keyboard'=>[
                [
                ['text'=>'متن ورود به کلن']
                ],
                [
                ['text'=>'حداقل سرباز برای ورود به اتحاد']
                ],
                [
                ['text'=>$back]
                ]
              ],
])
]);
}
if($text1 == "متن ورود به کلن"){
run($fadmin,"textjoinclan");
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>"
متن مورد نظر را وارد کنید!👹
",
]);
}
if($run == "textjoinclan" and $text1 != $back){
chenge_clan($joinclan,'bio',$text1);
run($fadmin,"no");
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>"
تنظیم شد👹!
",
]);
}
if($text1 == "حداقل سرباز برای ورود به اتحاد"){
run($fadmin,"mintroopforjoin");
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>"
تعداد مورد نظر را وارد کنید!👹
مثال : 1000
بعد از وارد کردن 1000 افرادی که تعداد سرباز کمتر 1000 دارند نمیتوانند عضو اتحاد شوند
",
]);
}
if($run == "mintroopforjoin" and $text1 != $back and is_numeric($text1)){
chenge_clan($joinclan,'mintroop',$text1);
run($fadmin,"no");
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>"
تنظیم شد👹!
",
]);
}
if($run == "remove_userclan" and $text1 != $back){
if(is_dir("clans/$joinclan/users/$text1")){
remove_clan($text1,$joinclan);
}else{
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>"
این کاربر وجود ندارد😑
",
'parse_mode'=>'MARKDOWN',
]);
}
}
}
}
if($text1 == "انتقام☠"){
if($joinclan != null){
run($fadmin,"dead_enemy");
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>"
ایدی مورد نظر را برای جنگ وارد کنید💀
",
'parse_mode'=>'MARKDOWN',
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
            'keyboard'=>[
                [
                ['text'=>$back]
                ]
              ],
])
]);
}else{
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>"
شما در هیچ اتحادی عضو نیستید💀
",
'parse_mode'=>'MARKDOWN',
]);
}
}
if($run == "dead_enemy" and $text1 != $back and $text1 != $chat_id){
if(is_dir("users/$text1")){
if(!is_dir("users/$chat_id/revenge/$text1")){
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>"
این فرد مرتکب جرمی در اتحاد شما نشده است💀
",
'parse_mode'=>'MARKDOWN',
]);
}else{
run($fadmin,"no");
    $enemy = $text1;
    $troopenemy = round(get_user($enemy,'troop'));
    file_put_contents("users/$chat_id/enemy.txt",$enemy);
$joinclanen = get_user($enemy,"joinclan");
  $enfood = get_user($enemy,'food');
  $enwood = get_user($enemy,'wood');
  $GLfood = round(Get_Loot($troop,$enfood));
  $GLwood = round(Get_Loot($troop,$enwood));

httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
دشمن : [$enemy](tg://user?id=$enemy)
تعداد سرباز ها : $troopenemy
حداکثر گندم جمع اوری🌱 : $GLfood
حداکثر چوب جمع اوری🌲 : $GLwood
نام اتحاد💎 : $joinclanen
",
'parse_mode'=>'MARKDOWN',
 'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
['text'=>"حمله️",'callback_data'=>"attack"]
                    ],
                    ]
                    ])
]);
}
}else{
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>"
این کاربر وجود ندارد😥
",
'parse_mode'=>'MARKDOWN',
]);
}
}
if($text1 == 'چت اتحاد☁'){
if(!is_dir("clans/$joinclan/global")){
mkdir("clans/$joinclan/global");
}
mkdir("clans/$joinclan/global/$fadmin");
run($chat_id,"chat_clan");
httpt('sendmessage',[ 
    'chat_id'=>$chat_id, 
    'text'=>" 
با موفقیت وارد چت اتحاد شدید👹
",
'parse_mode'=>'MARKDOWN',
'reply_markup'=>json_encode([ 
'resize_keyboard'=>true,
            'keyboard'=>[
                [
                ['text'=>$back]
                ]
              ],
])
]);
}
if($run == "chat_clan" and $text1 != $back and $text1 != null){
$scanglobalclan = scandir("clans/$joinclan/global");
foreach($scanglobalclan as $sendforall){
httpt('sendmessage',[ 
    'chat_id'=>$sendforall, 
    'text'=>"
[$fadmin](tg://user?id=$fadmin) :
$text1
",
'parse_mode'=>'MARKDOWN',
]);
}
}
if($run == "chat_clan" and $text1 == $back){
rmdir("clans/$joinclan/global/$fadmin");
httpt('sendmessage',[ 
    'chat_id'=>$fadmin, 
    'text'=>"
شما با موفقیت خارج شدید🏆
",
'parse_mode'=>'MARKDOWN',
]);
}
   $su = scandir('users');
   foreach($su as $users){
       $joinclanusers = get_user($users,"joinclan");
  $cup2 = get_user($users,'cup');
      if($cup2 < 0){
 chenge_user($users,"cup",0);
     
      }
     $joinclanus = get_user($users,"joinclan");
     $joinclan = get_user($chat_id,"joinclan");
       if(equel_cup($cup,$cup2) and $users != $fadmin and is_numeric($users) and $joinclanus != $joinclan){
       mkdir("users/$fadmin/enemy/$users");
       mkdir("users/$users/enemy/$fadmin");
       }
$scen = scandir("users/$users/enemy");
foreach($scen as $userenemy){
if(!is_numeric($userenemy)){
rmdir("users/$users/enemy/$userenemy");
}
}
   }
   
  

?>