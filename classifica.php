<?php

$token = // Token;
$website = 'https://api.telegram.org/bot'.$token;
$update = file_get_contents('php://input');
$update = json_decode($update, true);
$text = $update['message']['text'];
$id = $update['message']['from']['id'];
$username = $update['message']['from']['username'];

$group = // ID del Supergruppo;
$admin = // ID tuo o dell'admin;

$fn = // File Database;
$fp = fopen($fn, 'r+');
$users = json_decode(file_get_contents($fn), true);

if($users[$id]['registered'] != true){
	if(!isset($id)){
    	fclose($fp);
    	exit();
    }
	$users[$id] = array('msgs' => 0, 'username' => $username, 'registered' => true);
    $users = json_encode($users);
    file_put_contents($fn, $users);
    $users = json_decode($users, true);
}

switch($text){
	case '/list':
        $lista = bubbleSort(getMessages($users));
        $printl = printList($lista);
        sendMessage($group, $printl);
        break;
	default:
    	if(!isset($id)){
        	fclose($fp);
    		exit();
    	}
    	$users[$id]['msgs']++;
        file_put_contents($fn, json_encode($users));
}

fclose($fp);

function sendMessage($id, $text){
	$url = $GLOBALS[website]."/sendMessage?chat_id=$id&parse_mode=HTML&text=".urlencode($text);
    file_get_contents($url);
}

function getMessages($users){
	$lista = array();
    $i = 0;
    foreach($users as $user){
		$lista[$i] = $user;
		$i++;
	}
    return $lista;
}

function bubbleSort($vettore){
	$i;
    $j;
    for($i = count($vettore) - 1; $i >= 0; $i--){
    	for($j = 0; $j < $i; $j++){
        	if($vettore[$j]['msgs'] > $vettore[$j + 1]['msgs']){
            	$tmp = $vettore[$j];
                $vettore[$j] = $vettore[$j + 1];
                $vettore[$j + 1] = $tmp;
            }
        }
    }
    return $vettore;
}

function printList($lista){
	$i;
    $result = "";
    for($i = count($lista) - 1; $i >= 0; $i--){
    	$uname = $lista[$i]['username'];
        $msgs = $lista[$i]['msgs'];
        $pos = count($lista) - $i;
        if($pos == 1){
        	$result = $result."$pos - $uname: $msgs messaggi";
        }else{
        	$result = $result."
$pos - $uname: $msgs messaggi";
        }
    }
    return $result;
}

?>