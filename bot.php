<?php
$start = microtime(true);
/*
copyright @ medantechno.com
2017

*/
require 'vendor/autoload.php';
require_once('./line_class.php');
require_once('./unirest-php-master/src/Unirest.php');

$channelAccessToken = 'lPinXhltz3jGNZfA19qWIxvV2E70Pdc5d/UWYHm01PCApD6siIl8Z9AtssDpmkzvXcUTFw5zN3nJQDdUTDsrpAVG9IkgSfC1PtzhdNvu9NUSqLlCftI3kieQRGdwmVH+anViiTjFnCkhY8KxTCX30gdB04t89/1O/w1cDnyilFU='; 
$channelSecret = '241de8e9ee96cfde016ca29b1d6cf986';

$apisc = 'authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6ImE5MGNlZDJlLTdjNDctNDY1Zi1iMTk0LTYxODgxYmIzZWFjZiIsImlhdCI6MTYwNTgwMTUzMCwic3ViIjoiZGV2ZWxvcGVyLzQ5NzIyODY1LWEwMGMtYjU2ZC04NjhhLWZhYjUzZGMyNjgwNSIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjgyLjE2NS44Ny4yMTQiXSwidHlwZSI6ImNsaWVudCJ9XX0.llImVEome-EFtagVNMfNLb09CuSo7eBRZS3sT8xs2IfxdmY-42BUcod4lMC5oA_0YYuz4qisvoqHM9O4Oq5mOQ';

$clientLine = new LINEBotTiny($channelAccessToken, $channelSecret);

function acortar_url($url) {
    $usuario = "ildenet";
    $apikey = "R_c6724e970cf4413b86cc197ba4b65cde";
    $temp = "http://api.bit.ly/v3/shorten?login=".$usuario."&apiKey=".$apikey."&uri=".$url."&format=txt";
    return file_get_contents($temp);
}



/*
Nombre: IldeNet
userId: U175b9911af99bb27e221061a38b69f02
GroupId: Cb59358b192f2c445f5abe2d7b2fe470d



*/

$hora = date('Y/m/d H:i:s', (strtotime ("+0 Hours"))); //añadir  1 hora en invierno 

$canal = "Ce336e1da58cad257238674200bdf96bd";
//$GroupIdHispanistad = "Ce336e1da58cad257238674200bdf96bd";
//$GroupIdHispanistades = "Ccc1d2fad91dfaf9856fcf0f1ae9a26ac";
//$GroupIdFamiliaHispanistad = "Cbd5fc092eb0327b3a5fa3d4ba0f04cd0";
//$GroupIdhelmantic = "C995df39b986029a61042dbabb52b0945";
$GroupIdiberos = "Cc784a9b75bd47e23bb32979c4ed47dc0";
$userIdcreador = "U175b9911af99bb27e221061a38b69f02";
$kokeid 	= "U21175f55fe87833db5e927ad5971457a";
$koke2id	= "U5eb0a0085b75e2b9367d9f791deb920f";
$grupotestid = "Cd7b45c055211906a9cea81c29402852a";
// $GroupidMancowar = "C4a63e2730625f27079e163c89552e5e5";
// grupos gdt
$grupogdtweb = "Cea5c10207443bd31c5655b44d822a8ca"; //web
$grupogdtorga = "C134fca2131aed9690bdd4f6c7b5ede9e"; //orga
$grupogdtgrupos = "Cc567c0233294ad8cc9ca8880de99393b";
$grupogdtdrive = "C05d9e2ea8eb0eaf3912279522939fb1f";
$grupogdtredes = "Ce60f2bcf549ee8e09a57fdb7ca738d7a";
$grupogdtmando = "C5c79cfc2b7454e9134b7f3293a90d7c7";
$grupogdtyoutube = "C96ce2b2cab8bc730bc8fdc679a735d07";
$grupogdtimagen = "C2e6d984b83f22d7e0d48911ba413d2a5";
$gruposaqueadores = "C69720c85d186db313bf20a7135b1f2d7";

$sitio	 	= $clientLine->parseEvents()[0]['source']['type'];
$tipo	 	= $clientLine->parseEvents()[0]['message']['type']; //tipo de mensaje
$perfil 	= $clientLine->profil($userId);

$userId 	= $clientLine->parseEvents()[0]['source']['userId'];
$replyToken = $clientLine->parseEvents()[0]['replyToken'];
$timestamp	= $clientLine->parseEvents()[0]['timestamp'];
$groupId 	= $clientLine->parseEvents()[0]['source']['groupId'];
$roomId 	= $clientLine->parseEvents()[0]['source']['roomId'];
$event		= $clientLine->parseEvents()[0];



$message 	= $clientLine->parseEvents()[0]['message'];
$messageid 	= $clientLine->parseEvents()[0]['message']['id'];
$type 		= $clientLine->parseEvents()[0]['type'];

$profil 	= $clientLine->profil($userId);
$pesan_datang = explode(" ", $message['text']);

$pesan_datang = $message['text'];
/* Función que elimina los acantos y letras ñ*/
function quitar_acentos($cadena){
    $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ<>$;:';
    $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby     ';
    $cadena = utf8_decode($cadena);
    $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
    return utf8_encode($cadena);
}
$msg = quitar_acentos($pesan_datang); //quitamos acentos y simbolos
$msg = strtolower($msg);
$msg = trim($msg);

/* Funcion quitar caracteres raros a nombre */

$input='/[^(\x20-\x7F)]*/';//el rango de caracteres que no queremos
$nombre = preg_replace($input,'', $profil->displayName);
// $nombre = $profil->displayName;  // en caso de necesitar todos los símbolos

// comprobamos que grupo es:

if ($groupId == 'Ce336e1da58cad257238674200bdf96bd'){$grupo = 'Hispanistad';}
else if ($groupId == 'Cbd5fc092eb0327b3a5fa3d4ba0f04cd0'){$grupo = 'Familia Hispanistad';}
else if ($groupId == 'Ccc1d2fad91dfaf9856fcf0f1ae9a26ac'){$grupo = 'Hispanistades';}
else if ($groupId == 'C995df39b986029a61042dbabb52b0945'){$grupo = 'Helmetic';}
else if ($groupId == $GroupIdiberos){$grupo = 'Iberos';}
else if ($groupId == $grupogdtweb) {$grupo = "GrupoGDT web";}
else if ($groupId == $grupogdtorga) {$grupo = "GrupoGDT Organizacion";}
else if ($groupId == $grupogdtgrupos) {$grupo = "GrupoGDT Grupos";}
else if ($groupId == $grupogdtdrive) {$grupo = "GrupoGDT Drive";}
else if ($groupId == $grupogdtredes) {$grupo = "GrupoGDT Redes";}
else if ($groupId == $grupogdtmando) {$grupo = "GrupoGDT Mando";}
else if ($groupId == $grupogdtyoutube) {$grupo = "GrupoGDT Youtube";}
else if ($groupId == $grupogdtimagen) {$grupo = "GrupoGDT Imagen";}
else if ($groupId == $gruposaqueadores) {$grupo = "Grupo LosSaqueadores";}
else if ($groupId == 'C4a63e2730625f27079e163c89552e5e5') {$grupo = "MANCOSPAMER@S";}
else if ($groupId == 'C91a2f3a2c679d3f2c0486583c774039f') {$grupo = "risas y amistad";}
else if ($groupId == 'C929663c0d9693a5742d95e8ec4419dda') {$grupo =  "losMARIHUANERO'S family";}
else if ($groupId == 'C582dfab05073c5e54aeb59bad316fde3') {$grupo = "VALENCIANSWAR";}
//else if ($groupId == $) {$grupo = "";}
else {$grupo = $groupId;}

// Programa

if($type == 'memberJoined' ) // Si alguien entra
{	

$welcome_array = array(' 🎊🎉🎊🎉 Los que van a pelear te saludan 🙋', ' Pasa y sientate, que has llegado al sitio adecuado', ' Tenemos un pedazo de fiesta montada del copon, espero que traigas cervezas!.', ' Pero si contigo hice yo la comunion!! que pasa fenomeno?', ' que alegria verte por aqui, pasa pasa', ' es muy buena gente... si vas a la cocina trae cervezas para todos! ', 'Cambiad de tema 	que se puede liar.  ');
$welcome_rnd = array_rand($welcome_array, 2);
	$balas = array(	
                            'replyToken' => $replyToken,							
							'messages' => array(
								array(
										'type' => 'text',									
										'text' => 'Bienvenid@'.$welcome_array[$welcome_rnd[0]]	
									
									)
							)
						);
						
}
/*
if($type == 'memberLeft') // Si alguien sale
{	

$bye_array = array('Adios! recuerdo que saludaba todos los días', ' Ha dejado su olor a colonia', ' Tanta gloria lleve como paz deja', 'adios.. y si no nos vemos mas que no sea por mi culpa', ' Adios! Que te peten el ojal', 'Dame un toke cuando llegues', 'por la sombra...  ');
$bye_rnd = array_rand($bye_array, 2);
	$balas = array(	
                            'replyToken' => $replyToken,							
							'messages' => array(
								array(
										'type' => 'text',									
										'text' => $bye_array[$bye_rnd[0]]	
									
									)
							)
						);
						
}
*/

if($message['type']=='text') // Si alguien escribe
{
	if($msg =='version' || $msg == '/version')
	{
		
		
		$balas = array(
							'UserID' => $profil->userId,
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'version 1.92(actualización th14) by IldeNet'
									)
							)
						);
				
	}
	else if($msg =='info')
	{
	$time_elapsed= microtime(true) - $start; 
	$ping = number_format($time_elapsed, 3, ',', '');
		
		
		$balas = array(	
							'UserID' => $profil->userId,
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => "Nombre: ".$nombre."\nUser_Id: ".$userId."\nGroupId: ".$groupId."\nRoomId: ".$roomId."\nRespondo en: ".$ping." seg"
									)
							)
						);

				
	}
	elseif(strpos($pesan_datang,'/infochat') !== false && $userId == 'U175b9911af99bb27e221061a38b69f02')
	{
	$idgrupo = str_replace("/infochat ","", $pesan_datang);
	$token = 'Authorization: Bearer lPinXhltz3jGNZfA19qWIxvV2E70Pdc5d/UWYHm01PCApD6siIl8Z9AtssDpmkzvXcUTFw5zN3nJQDdUTDsrpAVG9IkgSfC1PtzhdNvu9NUSqLlCftI3kieQRGdwmVH+anViiTjFnCkhY8KxTCX30gdB04t89/1O/w1cDnyilFU=';
	$ch = curl_init();
    $headerArray = array ('Accept: application/json', $token);
        curl_setopt($ch, CURLOPT_URL, "https://api.line.me/v2/bot/group/".$idgrupo."/summary");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headerArray);
        $result = curl_exec($ch);
        if(!curl_errno($ch) && !empty($result)) {
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if($httpCode !== 200) echo json_encode($error);
        } else echo json_encode($error);
		$data = json_decode($result, true);
		curl_close($ch);
		if ($data['groupName'] == null) {
		$balas = array(	'UserID' => $profil->userId,'replyToken' => $replyToken,'messages' => array(array('type' => 'text',					
		'text' => "Hay un fallo en el ID del grupo")));		
		}else{
		$balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 					
					array(
						'type' => 'image',                   
						'originalContentUrl' => $data['pictureUrl'],
						'previewImageUrl' => $data['pictureUrl']				
				),					
				array(
						'type' => 'text',                   
						'text' => "Nombre Grupo: ".$data['groupName']
				)
			) 
		);
		}
	}
	// SI ME NOMBRAN, BOT DE TELEGRAM ME AVISA
	elseif(strpos($msg,'ilde') !== false)
	{
	
	$page = file_get_contents("https://api.telegram.org/bot385985238:AAGmaeQ_JLhj6QDJ4Y9B7GGpTlEYDyC8qiw/sendmessage?chat_id=7566957&parse_mode=html&text=<b>Nombrado por ".$roomId."/".$grupo."/".$nombre.": </b>".$pesan_datang); 

	echo $page;

	}
// botones e imagenes
	else if($msg =='test')
	{
		$balas = array(
			'replyToken' => $replyToken,
			'messages' => array(
				array(
					'type' => 'template',
					'altText' => 'Informacion de botones',
					'template' => array(
						'type' => 'confirm',
						'text' => 'Ini contoh button',
						'actions' => array(
							array(
								'type' => 'message',
								'label' => 'Yes',
								'text' => 'yes',
							),
							array(
								'type' => 'message',
								'label' => 'test',
								'text' => 'test',
							)
						)
					)
				)
			)
		);
	}
//// BOTONES
	else if($msg =='informacion' || $msg =='/informacion' )
	{		$balas = array(
							'UserID' => $profil->userId,
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => "Puede usar los comandos:\n/Heroes\n/Tropas\n/Defensas\n/Edificios\n/Pocimas\n/Otros"
									)));				
	}
	else if($msg =='/heroes')
	{		$balas = array(
							'UserID' => $profil->userId,
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => "Puede usar los comandos:\n/Rey\n/Reina\n/Centinela\n/Luchadora\n/Lassi\n/Owl\n/Yak\n/Unicornio"
									)));				
	}
	else if($msg =='/tropas')
	{		$balas = array(
							'UserID' => $profil->userId,
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => "Puede usar los comandos:\n/Barbaro\n/Arquera\n/Gigante\n/Duende\n/Globo\n/Mago\n/Sanadora\n/Dragon\n/Electrico\n/Pekka\n/Bebe\n/Minero\n/Esbirro\n/Montapuerco\n/Valquiria\n/Golem\n/Bruja\n/Sabueso\n/Lanzarrocas\n/Rompemuros\n/Golemhielo"
									)));				
	}
	else if($msg =='/defensas')
	{		$balas = array(
							'UserID' => $profil->userId,
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => "Puede usar los comandos:\n/Aguila\n/Antiaereo\n/Ballesta\n/Cañon\n/Tornado\n/Torrearquera\n/Torremagos\n/Torrebombardera\n/Inferno\n/Gigatesla\n/Mortero\n/Soplador\n/Tesla"
									)));				
	}
	else if($msg =='/edificios')
	{		$balas = array(
							'UserID' => $profil->userId,
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => "Puede usar los comandos:\n/Elixir\n/Oro\n/Oscuro\n/Caldero\n/CalderoO\n/Campamento\n/Castillo\n/Cuartel\n/CuartelO\n/Muro\n/Laboratorio\n/Taller"
									)));				
	}
	else if($msg =='/pocimas')
	{		$balas = array(
							'UserID' => $profil->userId,
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => "Puede usar los comandos:\n/Aceleracion\n/Clonacion\n/Curacion\n/Furia\n/Hielo\n/Murcielagos\n/Rayo\n/Salto\n/Veneno"
									)));				
	}
	else if($msg =='/otros')
	{		$balas = array(
							'UserID' => $profil->userId,
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => "Puede usar los comandos:\n/Destrozamuros\n/Dirigible\n/Arrojapiedras\n/Liga\n/Tienda\n/Mercader\n/Constructor\n/Mascotas"
									)));				
	}
	
	
//// IMAGENES 

	else if($msg == '/aceleracion'){$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/aceleracion.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/aguila'){$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/aguila.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/elixir')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/almacen_elixir.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/oro')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/almacen_oro.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/oscuro')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/almacen_oscuro.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/antiaereo' )    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/antiaerea.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/arquera')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/arquera.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/arrojapiedras')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/arrojapiedras.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/ayuntamiento')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/ayuntamiento.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/ballesta')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/ballesta.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/barbaro')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/barbaro.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/bebe')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/bebe_dragon.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/bomba')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/bomba.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/bomba aerea')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/bomba_aerea.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/bruja')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/bruja.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/cañon')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/canon.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/caldero')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/caldero.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/calderoo')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/caldero_oscuro.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/campamento')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/campamento.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/castillo')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/castillo.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/clonacion')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/clonacion.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/cuartel')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/cuartel.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/cuartelo')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/cuartel_oscuro.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/curacion')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/cura.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/destrozamuros')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/destrozamuros.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/dirigible')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/dirigible.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/dragon')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/dragon.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/electrico')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/dragon_electrico.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/duende')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/duende.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/esbirro')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/esbirro.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/esqueletos')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/esqueletos.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/explosivo')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/explosivos.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/mina oro')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/extractor_oro.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/extractor oscuro')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/extractor_oscuro.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/furia')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/furia.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/gigante')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/gigante.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/globo')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/globo.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/golem')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/golem.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/golemhielo')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/golem_hielo.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/centinela')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/centinela.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/hielo')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/hielo.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/laboratorio')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/laboratorio.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/lanzarrocas')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/lanzarrocas.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/liga')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/cwl.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/mago')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/mago.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/mina rastreo')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/mina_rastreo.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/minero')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/minero.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/montapuerco')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/montapuerco.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/mortero')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/mortero.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/trampa muelle')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/muelle.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/mercader')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/descuentos.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/murcielagos')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/murcielagos.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/muro')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/muro.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/pekka')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/pekka.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/rayo')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/rayo.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/recolector elixir')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/recolector_elixir.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/reina')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/Reina_Arquera.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/rey')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/Rey_Barbaro.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));	
	}
	else if($msg == '/rompemuros')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/rompemuro.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/sabueso')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/sabueso.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/salto')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/salto.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/sanadora')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/sanadora.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/soplador')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/soplador.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/taller')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/taller.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/terremoto')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/terremoto.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/tesla')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/tesla.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/gigatesla')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/th12.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/tienda')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/tienda.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/tornado')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/tornado.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/torrearqueras') {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/torre_arquera.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/torrebombardera')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/torre_bombardera.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/inferno')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/torre_inferno.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/torremagos')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/torre_magos.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/trampa esqueletos')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/trampa_esqueletos.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/valquiria')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/valkiria.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/veneno')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/veneno.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/mascotas')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/caseta.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/constructor')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/choza.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/lassi')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/lassi.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/owl')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/owl.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/yak')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/yak.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}
	else if($msg == '/unicornio')    {$urlimage ='https://www.saladepeligro.es/ildenet/line_API/images/datos/unicornio.png'; $balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'image','originalContentUrl' => $urlimage,'previewImageUrl' => $urlimage	)));
	}

/*	
	// SOLICITA AUTORIZACION
	else if($groupId == 'C547ae698f362c5f9e3060e4abadbd1ac') {
		
		$msgpush = $nombre." con id: ".$userId."\nMe invita al grupo: ".$groupId."\n".$roomId."\nMe voy?\n/salir ".$groupId.$roomId;
		
		$balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                        'type' => 'template', 
                          'altText' => 'Solicita Autorización a ildenet', 
                          'template' =>  
                          array ( 
                            'type' => 'buttons', 
                            'thumbnailImageUrl' => 'https://www.saladepeligro.es/ildenet/line_API/images/bb8.jpg', 
                            'imageAspectRatio' => 'rectangle', 
                            'imageSize' => 'cover', 
                            'imageBackgroundColor' => '#FFFFFF', 
                            'title' => 'No tengo autorización para estar aquí.', 
                            'text' => 'Por favor, solicítela a mi creador. Gracias.', 
                            'actions' =>  
                            array ( 
                              0 =>  
                              array ( 
                                'type' => 'uri', 
                                'label' => 'Solicitar', 
                                'uri' => 'https://line.me/ti/p/~ildenet', 
                              ), 
                            ), 
                          ),
                        ) 
            ) 
        );						
		$push = array(
							'to' => $userIdcreador,									
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $msgpush
									)
							)
						);

		$clientLine->pushMessage($push);
		$clientLine->replyMessage($balas);
		$clientLine->leaveRoom($groupId.$roomId);
		$clientLine->leaveGroup($groupId.$roomId);
				
	}
*/	
	// COMANDOS PARA KOKE
	elseif(strpos($pesan_datang,'/grupoweb') !== false && $userId == 'U5eb0a0085b75e2b9367d9f791deb920f')
	{
$msgpush = str_replace("/grupoweb ","", $pesan_datang);
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Mensaje enviado'
									)
							)
						);
						
		$push = array(
							'to' => $grupogdtweb,									
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $msgpush
									)
							)
						);

$clientLine->pushMessage($push);
}
elseif(strpos($pesan_datang,'/grupoorga') !== false && $userId == 'U5eb0a0085b75e2b9367d9f791deb920f')
	{
$msgpush = str_replace("/grupoorga ","", $pesan_datang);
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Mensaje enviado'
									)
							)
						);
						
		$push = array(
							'to' => $grupogdtorga,									
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $msgpush
									)
							)
						);

$clientLine->pushMessage($push);
}
elseif(strpos($pesan_datang,'/grupogrupos') !== false && $userId == 'U5eb0a0085b75e2b9367d9f791deb920f')
	{
$msgpush = str_replace("/grupogrupos ","", $pesan_datang);
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Mensaje enviado'
									)
							)
						);
						
		$push = array(
							'to' => $grupogdtgrupos,									
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $msgpush
									)
							)
						);

$clientLine->pushMessage($push);
}
elseif(strpos($pesan_datang,'/grupodrive') !== false && $userId == 'U5eb0a0085b75e2b9367d9f791deb920f')
	{
$msgpush = str_replace("/grupodrive ","", $pesan_datang);
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Mensaje enviado'
									)
							)
						);
						
		$push = array(
							'to' => $grupogdtdrive,									
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $msgpush
									)
							)
						);

$clientLine->pushMessage($push);
}
elseif(strpos($pesan_datang,'/gruporedes') !== false && $userId == 'U5eb0a0085b75e2b9367d9f791deb920f')
	{
$msgpush = str_replace("/gruporedes ","", $pesan_datang);
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Mensaje enviado'
									)
							)
						);
						
		$push = array(
							'to' => $grupogdtredes,									
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $msgpush
									)
							)
						);

$clientLine->pushMessage($push);
}
elseif(strpos($pesan_datang,'/grupomando') !== false && $userId == 'U5eb0a0085b75e2b9367d9f791deb920f')
	{
$msgpush = str_replace("/grupomando ","", $pesan_datang);
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Mensaje enviado'
									)
							)
						);
						
		$push = array(
							'to' => $grupogdtmando,									
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $msgpush
									)
							)
						);

$clientLine->pushMessage($push);
}
elseif(strpos($pesan_datang,'/grupoyoutube') !== false && $userId == 'U5eb0a0085b75e2b9367d9f791deb920f')
	{
$msgpush = str_replace("/grupoyoutube ","", $pesan_datang);
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Mensaje enviado'
									)
							)
						);
						
		$push = array(
							'to' => $grupogdtyoutube,									
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $msgpush
									)
							)
						);

$clientLine->pushMessage($push);
}
elseif(strpos($pesan_datang,'/grupoimagen') !== false && $userId == 'U5eb0a0085b75e2b9367d9f791deb920f')
	{
$msgpush = str_replace("/grupoimagen ","", $pesan_datang);
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Mensaje enviado'
									)
							)
						);
						
		$push = array(
							'to' => $grupogdtimagen,									
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $msgpush
									)
							)
						);

$clientLine->pushMessage($push);
}
elseif(strpos($pesan_datang,'/todosgrupos') !== false && $userId == 'U5eb0a0085b75e2b9367d9f791deb920f')
	{
$msgpush = str_replace("/todosgrupos ","", $pesan_datang);
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Mensajes enviados'
									)
							)
						);
						
		$push = array(
							'to' => $grupogdtweb,									
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $msgpush
									)
							)
						);

		$clientLine->pushMessage($push);
		$push = array(
							'to' => $grupogdtorga,									
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $msgpush
									)
							)
						);

		$clientLine->pushMessage($push);
		$push = array(
							'to' => $grupogdtgrupos,									
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $msgpush
									)
							)
						);

		$clientLine->pushMessage($push);
		$push = array(
							'to' => $grupogdtdrive,									
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $msgpush
									)
							)
						);
		$clientLine->pushMessage($push);
		$push = array(
							'to' => $grupogdtredes,									
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $msgpush
									)
							)
						);

		$clientLine->pushMessage($push);
		$push = array(
							'to' => $grupogdtmando,									
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $msgpush
									)
							)
						);

		$clientLine->pushMessage($push);
		$push = array(
							'to' => $grupogdtyoutube,									
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $msgpush
									)
							)
						);

		$clientLine->pushMessage($push);
		$push = array(
							'to' => $grupogdtimagen,									
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $msgpush
									)
							)
						);

		$clientLine->pushMessage($push);
}

	else if(strpos($msg,'⚜koke⚜iberos') !== false) {
		
	if ($groupId == $grupogdtweb) {$grupo1 = "Te nombró en Grupo de Web ";}
	if ($groupId == $grupogdtorga) {$grupo1 = "Te nombró en Grupo de Organización ";}
	if ($groupId == $grupogdtgrupos) {$grupo1 = "Te nombró en Grupo de Grupos ";}
	if ($groupId == $grupogdtdrive) {$grupo1 = "Te nombró en Grupo del Drive ";}
	if ($groupId == $grupogdtredes) {$grupo1 = "Te nombró en Grupo de Redes ";}
	if ($groupId == $grupogdtmando) {$grupo1 = "Te nombró en Grupo de Mando ";}
	if ($groupId == $grupogdtyoutube) {$grupo1 = "Te nombró en Grupo de Youtube ";}
	if ($groupId == $grupogdtimagen) {$grupo1 = "Te nombró en Grupo de Imagen ";}
	else {$grupo = "Te nombró ";}
	 
		$msgpush = $profil->displayName." nombró a koke en ".$grupo1."\nY dijo: ".$pesan_datang;
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => "AUTO RESPUESTA:\nKoke es una persona muy ocupada! Estas seguro no hay nadie que te pueda ayudar? O es algo muy importante y quieres que lo moleste?"
									)
							)
						);						
		$push = array(
							'to' => $grupogdtmando,									
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $msgpush
									)
							)
						);

		$clientLine->pushMessage($push);
				
	}

	// COMANDO TWITTER
	else if($msg =='/twitter')
	{

// TWITTER
include "twitteroauth/twitteroauth.php";

$consumer_key = "ezwePFtR6u8lPb73mwDpxSnnZ";
$consumer_secret = "CeBdh5bsrp0b8WNM8MlMxmtQXTZi9QcibVliLCSx3KHNmSPkvW";
$access_token = "240274459-rpMyufsBujrsKN6oGhqvEB5MPlNvqbjIeubfLIqS";
$access_token_secret = "fWZ94qPrbNSqUofi6nVYwOvNeZKlcx9mA0eMoBuKDIXdb";

$twitter = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);

//Ejecucion de comando 
	$tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q=clash of clans&result_type=recent&count=10&lang=es');
	foreach ($tweets->statuses as $key => $tweet) { 
	$nombre = $tweet->user->screen_name;
	$texto = $tweet->text;
	
	$text .= "--| @$nombre |--> $texto \n";
    
	}
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => "Escaneados los 10 últimos tweets con palabras Clash of Clans: \n".$text
									)
							)
						);
				
	}
	
	elseif(strpos($msg,'/di') !== false) 
	{
	$decir = str_replace("/di ","", $msg);
	$decir2 = str_replace(" ","%20", $decir);
    $uri = "https://translate.google.com/translate_tts?ie=UTF-8&tl=es-ID&client=tw-ob&q=".$decir2; 

        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
				array (
				'type' => 'audio',
				'originalContentUrl' => $uri,
				'duration' => 60000,
				)
            )
        );
}
	else if(strpos($msg,'estoy perdido bot') !== false)
    {
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'audio',			
										'originalContentUrl' => 'https://www.saladepeligro.es/ildenet/line_API/sounds/siri.mp3',
										'duration' => 10000
									)
							)
						);
	}
	else if(strpos($msg,'bicho') !== false) 
    {
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'audio',			
										'originalContentUrl' => 'https://www.saladepeligro.es/ildenet/line_API/sounds/bicho.mp3',
										'duration' => 5000,
									)
							)
						);
	}
	else if(strpos($msg,'por fin') !== false) 
    {
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'audio',			
										'originalContentUrl' => 'https://www.saladepeligro.es/ildenet/line_API/sounds/aleluya.mp3',
										'duration' => 5000,
									)
							)
						);
	}
	else if(strpos($msg,'putos chinos') !== false) 
    {
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'audio',			
										'originalContentUrl' => 'https://www.saladepeligro.es/ildenet/line_API/sounds/chinos.mp3',
										'duration' => 5000,
									)
							)
						);
	}
	else if(strpos($msg,'ya esta aqui') !== false) 
    {
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'audio',			
										'originalContentUrl' => 'https://www.saladepeligro.es/ildenet/line_API/sounds/ya_esta_aqui.mp3',
										'duration' => 5000,
									)
							)
						);
	}
	else if(strpos($msg,'tengo gases') !== false) 
    {
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'audio',			
										'originalContentUrl' => 'https://www.saladepeligro.es/ildenet/line_API/sounds/concurso.mp3',
										'duration' => 5000,
									)
							)
						);
	}
	else if(strpos($msg,'joder!') !== false) 
    {
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'audio',			
										'originalContentUrl' => 'https://www.saladepeligro.es/ildenet/line_API/sounds/oh_no.mp3',
										'duration' => 5000,
									)
							)
						);
	}
	else if($msg == '/top')
    {
	$ch = curl_init();
        $headerArray = array (
            'Accept: application/json', $apisc
    );
        curl_setopt($ch, CURLOPT_URL, "https://api.clashofclans.com/v1/locations/32000218/rankings/clans");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headerArray);
        $result = curl_exec($ch);
        if(!curl_errno($ch) && !empty($result)) {
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if($httpCode !== 200) echo json_encode($error);
        } else echo json_encode($error);
		$data = json_decode($result, true);
		curl_close($ch);	
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 	"TOP 10 ESPAÑA:\n"
										.$data['items'][0]['rank']." -- ".$data['items'][0]['name']." -- ".$data['items'][0]['clanPoints']."🏆\n"
										.$data['items'][1]['rank']." -- ".$data['items'][1]['name']." -- ".$data['items'][1]['clanPoints']."🏆\n"
										.$data['items'][2]['rank']." -- ".$data['items'][2]['name']." -- ".$data['items'][2]['clanPoints']."🏆\n"
										.$data['items'][3]['rank']." -- ".$data['items'][3]['name']." -- ".$data['items'][3]['clanPoints']."🏆\n"
										.$data['items'][4]['rank']." -- ".$data['items'][4]['name']." -- ".$data['items'][4]['clanPoints']."🏆\n"
										.$data['items'][5]['rank']." -- ".$data['items'][5]['name']." -- ".$data['items'][5]['clanPoints']."🏆\n"
										.$data['items'][6]['rank']." -- ".$data['items'][6]['name']." -- ".$data['items'][6]['clanPoints']."🏆\n"
										.$data['items'][7]['rank']." -- ".$data['items'][7]['name']." -- ".$data['items'][7]['clanPoints']."🏆\n"
										.$data['items'][8]['rank']." -- ".$data['items'][8]['name']." -- ".$data['items'][8]['clanPoints']."🏆\n"
										.$data['items'][9]['rank']." -- ".$data['items'][9]['name']." -- ".$data['items'][9]['clanPoints']."🏆\n"	
										)
							)
						);
		}
		
	elseif(strpos($msg,'/meme') !== false)
	{
	$meme = str_replace("/meme ","", $msg);
	$meme2 = str_replace(" ","%20", $meme);

	//$urlmeme = "https://ildenet.000webhostapp.com/cocbot/meme?bottom_text=".$meme2;
	$urlmeme = "https://www.saladepeligro.es/ildenet/telegram_API/memes?bottom_text=".$meme2;
// acortando url
	$get_sub = array();
			$aa =   array(
						'type' => 'image',									
						'originalContentUrl' => $urlmeme,
						'previewImageUrl' => $urlmeme	
						
					);
		array_push($get_sub,$aa);				
		$balas = array(
					'replyToken' 	=> $replyToken,														
					'messages' 		=> $get_sub
				 );			
	}
	else if($msg == 'bot')
    {
		$bot2_array = array("Dime", "Diga", "a llamado al bot", "si?", "Que","🙋","👋","☝️","👆","🖕","👇","✌️","🖖","🤘","👌","👍","👊","👏","👀","👁","El bot al que llama, se encuentra apagado o fuera de cobertura","Tu tienes saldo para llamar al bot?","Ese soy yo","Me llamo","Que te duele?","que quieres?","dame tu telefono y te llamo yo.");
		$bot2_rnd = array_rand($bot2_array, 2);
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 	$bot2_array[$bot2_rnd[0]]	
										)
							)
						);	
	}

	else if(strpos($msg,'bot ') !== false || strpos($msg,' bot') !== false) //frases para mencion al bot
    {	
		$file = "frase.txt"; 
		$fp = fopen($file,"r"); 
		$frase = fgets($fp, 26); 
		fclose($fp);
		++$frase; 
		$fp = fopen($file,"w+"); 
		fwrite($fp, $frase, 26); 
		fclose($fp);
		if($frase == "118")    
			{
				$frase = "0";
				$fp = fopen($file,"w+"); 
				fwrite($fp, $frase, 26); 
				fclose($fp);
				// exit ();    
			}
		if(strpos($msg,'bota') !== false) { }
		else if($userId == $userIdcreador){}
		else if(strpos($msg,'bote') !== false) { }
		else if(strpos($msg,'boti') !== false) { }
		else if(strpos($msg,'boto') !== false) { }
		else if(strpos($msg,'botu') !== false) { }	
		else
		{
		$bot_array = array(
		"Digamelon?",
		"Aver hestudiao.",
		"me has pillado mirando pornohub, perdon, que necesitas?", 
		"voy a echar un meo y de paso me la veo",
		"Se trasca la magedia",
		"Dios mío, dame paciencia, pero damela, ¡YA!",
		"Pin pan toma Lacasitos",
		"eres mas sorprendente que Stivi Wonder corriendo los San Fermines",
		"No sé, Rick...",
		"La culpa es de ZP",
		"Espero que todo haya quedado en un susto.",
		"paga la coca 1er aviso", 
		"estas mas desiquilibrado que Jesus Gil en bicicleta",
		"Que tramas moreno?",
		"Killo, si pesa te has cagado seguro",
		"eres mas antiguo que el DNI de la abuela de Dios",
		"No es navidad pero todavía te llevas un buen mantecao", 
		"ah si?", 
		"por desgracia esto es cada vez mas habitual en nuestras carreteras", 
		"No es lo mismo tubérculo que ver tus orejas",		
		"eres mas pesao que Falete en un buffet libre",
		"A que te dejo como la radio un pintaor?", 
		"pa ke quieres saber eso jajajaja saludos",
		"Me da igual lo que me digas, tengo un hijo mucho mas cabrón que tu", 
		"quizas, no estoy 100% seguro.", 
		"Si hay césped hay partido",
		"La droga te Buelbve bvrrutto", 
		"Pero qué me estás container!?",
		"Ten cuidado con lo que pides, no sea que te digan que si",
		"Estas mas nervioso que Frodo en una joyeria?",
		"claro que si, guapi!", 
		"vamos a calmarnos",
		"Hay un mundo mejor, pero es carísimo",
		"Cuerpoescombro", 
		"Mi parte favorita de asistir a un maratón es ver la reacción de los corredores cuando cogen mi vaso de vodka",
		"Saludos a la Guardia Civil.",
		"Pues ya avestruz, que tonteria",
		"Estoy mas tenso que cagando sin pestillo", 
		"Pero si te digo que soy El Cigala, la cosa cambia.",
		"Adiós, Mario Bros.",
		"Un abrazo desde Ronda, Málaga.",
		"La razón la tiene el que esta en el lado correcto del cañón",
		"Si no trabajas en SEUR, a donde llevas ese paquete?", 
		"Te daría hostias de dos en dos hasta que fueran impares", 
		"eres mu cansino", 
		"No tengo ni puta idea. Espero haberte ayudado.", 
		"Eso está más feo que mandar a la abuela a por droga", 
		"estaba jiñando, dime", 
		"Este grupo parece el coño de la Bernarda!!!", 
		"antes todo esto era campo", 
		"Estoy mas caliente que la freidora del mcdonal",
		"aún te queda mucho por aprender, joven padawan", 
		"Hoy no, mañaaaana.",
		"tu si que eres guapa",
		"nos vemos en mc donalds",
		"Das menos miedo que un gitano sin primos",
		"es el vecino el que elige el alcalde y es el alcalde el que quiere que sean los vecinos el alcalde",
		"Tienes más peligro que el tobogán de Estepona",
		"Deeeee lujo",
		"y Jesucristo dijo, sed hermanos, pero nunca dijo primos.",
		"Me acabas de poner más tenso que doraemon en un arco de seguridad",
		"Estas más perdido que Falete en un Natur House",
		"Tengo más hambre que el tamagotchi de un sordo",
		"Estás mas tensa que Belén Esteban en Pasapalabra.",
		"A todos nos gusta y trabajar no es",
		"Estoy más tenso que Doraemon en aduanas",
		"Me pones las venas del nabo como el pescuezo de un cantaó",
		"Si comes durum cagas blandum",
		"Hace más calor que en la comunión de charmander",
		"Estoy mas nervioso que Don Quijote en un campo eólico!",
		"Si no sabes montar en moto, por qué tienes ese Bultaco?",
		"Que nivel, Maribel",
		"gastas menos que un ciego en novelas",
		"aqui andamios",
		"Con esa nariz puedes fumar mientras te duchas",
		"Te lo dije",
		"macho, cómprate un amigo, ENVIA AMIGO AL 555",
		"no me calientes mas la cabeza, pasa de mi.",
		"me has pillado mirando pornohub, perdon, que necesitas?", 
		"eres mas sorprendente que Stivi Wonder corriendo los San Fermines",
		"tu tienes menos sexapil que el sobaco de Torrente ",
		"no te puedes imaginar la de gente como tú sin medicina",
		"tengo un pedazo de asunto entre las piernas...",
		"te has peido?", 
		"eres mas inutil que un supositorio de fresa",
		"eres mas antiguo que el DNI de la abuela de Dios",
		"comó te atreves a hablarme con esa cara que me traes?", 
		"ah si?", 
		"compro vocal y resuelvo",		
		"eres mas pesao que Falete en un buffet libre",
		"yo que sé, no soy 100tifiko!", 
		"pa ke quieres saber eso jajajaja saludos",
		"cartucho que no te escucho", 
		"quizas, no estoy 100% seguro.", 
		"el arroyo tan seco y tu tan humeda",
		"El maricon no es mi hijo, el maricon es su novio", 
		"baia baia, eres 100tifico?",
		"yo que sé, no soy 1000itar",
		"claro que si, guapi!", 
		"vamos a calmarnos",
		"kieres que te raje o k?",
		"no entiendo cuando hablas", 
		"tengo cara de que me importe?",
		"Iyo, tu kere que te de un sopapo?",
		"al pino, pino y pa tu culo mi pepino",
		"yo flipo contigo", 
		"K ISE?",
		"relaja la raja",
		"te rompo las piernas, payaso!",
		"Oh dios, te quieres callar ya?", 
		"comó te atreves a hablarme con esa cara que me traes?", 
		"eres mu cansino", 
		"te voy a mandar a la mafia rusa a tu casa y se lo cuentas a ellos", 
		"buscamos algun doctor en el canal?", 
		"estaba jiñando, dime", 
		"eres mas pesao que un collar de sandias", 
		"conozco a profesionales que puede tratar tu problema", 
		"En la cabeza no, que estoy estudiando");  
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 	$bot_array[$frase]	
										)
							)
						);
		}
  	}
	
	else if($pesan_datang == "/tiempo") {$balas = array('replyToken' => $replyToken,'messages' => array(array('type' => 'text',	'text' => "Necesita especificar una ciudad: /tiempo Madrid")));}
	elseif(strpos($pesan_datang,'/tiempo') !== false)
	{
	$tiempo = str_replace("/tiempo ","", $pesan_datang);
	$keyw ='4ca900e41c35661c12dd0099b946273f';
	$weather = "http://api.openweathermap.org/data/2.5/weather?q=".$tiempo."&lang=es&units=metric&APPID=".$keyw; 
	$weatherp= "http://api.openweathermap.org/data/2.5/forecast?q=".$tiempo."&lang=es&units=metric&APPID=".$keyw;
	$contents = file_get_contents($weather); 
	$contentsp = file_get_contents($weatherp); 
	$clima=json_decode($contents); 
	$climap=json_decode($contentsp); 
	$weatherd=$clima->weather[0]->description;
	$weatherp=$climap->list[5]->weather[0]->description;
	$weather1d=$climap->list[6]->weather[0]->icon;
	$weather2d=$climap->list[18]->weather[0]->icon;
	$iconw=$clima->weather[0]->icon;
	$temp=$clima->main->temp."ºC 🌡"; 
	$humedad=$clima->main->humidity."% 💧";
	$viento=$clima->wind->speed."m/s 💨";
	if ($weatherd == false) {$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => "Ciudad no encontrada"
									)
							)
						); }
	else{
// iconos
	$iconow = array("01d","02d","03d","04d","09d","10d","11d","13d","50d","01n","02n","03n","04n","09n","10n","11n","13n","50n");
	$icont = array("☀️","🌤","🌥","☁️","🌧","🌦",'🌩',"🌨","🌫","☀️","☁️","☁️","☁️","☔️","💦","⛈","❄️","💨");
	$icon = str_replace($iconow, $icont, $iconw);
	$icon1d = str_replace($iconow, $icont, $weather1d);
	$icon2d = str_replace($iconow, $icont, $weather2d);
	$today = date("j F Y, H:i"); 
	$cityname = $clima->name; 
	$pronostico = "Mañana tendremos ".$weatherp."".$icon1d. "\nTemperatura nominal de ".$climap->list[5]->main->temp."ºC 🌡 \n Y una humedad del ".$climap->list[5]->main->humidity."% 💧";
	$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => "Ciudad: ".$cityname."\nTiempo: ".$weatherd." ".$icon."\nTemp Actual: ".$temp."\nHumedad: ".$humedad."\nViento: ".$viento."\n".$pronostico
									)
							)
						);

}}
	else if(strpos($msg,'buenos dias') !== false)
	{
		$bdias_array = array("Buenos dias", "Buen dia", "Que tal estas?", "Buenos dias Matias... digo...", "A quien madruga, Dios le ayuda", "Hoy es el día más bonito de mi vida, pero el de mañana seguro será mucho mejor", "Buenos dias, parece que va a llover", "Mira que dia hace para comérselo entero!",  "good morning!", "Buenos dias, que mas pillao que voy camino al curro.","Su tabaco, Gracias", "A la paz de dios, hermano", "Saludos desde mi trono, dame un segundo que ya sale un Obama!", "Ha repostado Diesel E plus 10", "Bienaventurado quien te puede saludar", "Mira qué buena porra traigo para desayunar", "Buenos Días y Mucho Ánimo que ya casi es viernes", "Bueno días!! Hoy he pospuesto la alarma 10 minutos y ahora voy justo...", "Buenos dias, otro día que no nos ha tocado la lotería", "Vamos equipo! A ganarnos nuestro cuenco de arroz de hoy!!", "Vamos a levantar este pais. BUENOS DIAS!!!", "Otro ddia mas que voy con la hora pegada al culo", "Venga, vamos a desayunar que invito yo", "Hace mas calor que alicatando una pirádime", "Hace mas frio que vigilando una obra en Burgos", "Hay mas gente aqui que en el comedor de Harry Poter", "Uff voy tan ciego que Stevie Wonder a mi lao tenía la vista cansá", "Vamos que me levantao mas fuerte que el televisor de un asilo", "Buenos dias, hoy estoy mas contento que el bidé de Elsa Pataky", "Buenos dias, tengo menos ganas de trabajar que el fotógrafo de la biblia", "Menuda cara que llevo hoy, que parezco un bulldog masticando una avispa", "Buenos dias, recuerda que no debes tener apuro, que aqui abajo tengo turron del duro");
		$bdias_rnd = array_rand($bdias_array, 2);		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $bdias_array[$bdias_rnd[0]]." ".$nombre." !!😘"
									)
							)
						);
				
	}
	else if(strpos($msg,'buenas noches') !== false)
	{
		$bnoches_array = array("Que tengas dulces sueños", "Sueña con los angelitos", "No te vayas sin tomar tu biberon", "Buenas noches", "Vete a dormir, no a ver porno", "Reza un par de padresnuestro y un ave maria");
		$bnoches_rnd = array_rand($bnoches_array, 2);		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $bnoches_array[$bnoches_rnd[0]]." ".$nombre." !!😘"
										
									)
							)
						);
				
	}
	else if($msg=='/ayuda' || $msg =='ayuda')
	{   
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $nombre." Disponemos de los comandos:\n  
										/jugador #tag -> mostrará tus estadísticas Ej: /jugador #GYRVR89R\n 
										/clan #tag -> mostrará las estadísticas de un clanEj: /clan #9L99C8\n 
										/historial #tag -> Muestra los 10 ultimos clanes de un jugador /historial #GYRVR89R\n 
										/guerra #tag de clan-> mostrará las estadísticas de guerra actual, Ej /guerra 8VVJCY9R\n
										/top ->	Muestra el top 10 de clanes en españa\n
										/informacion - Muestra lista de comandos para comsultar datos del juego, Ej: Barbaro\n
										/tiempo ciudad -> proporciona el tiempo y pronóstico Ej: /tiempo Madrid\n
										/meme -> escribe /meme y el texto que desees, Julio Iglesias te contestará Ej: /meme Hola\n
										/di -> Manda audio con el texto procedente Ej: /di hola mundo\n
										/youtube -> muestra un carrusel de videos de youtube\n
										/twitter -> muestra los 10 ultimos tweets de clash of clans.\n
										/creador -> muestra informacion y contacto del creador.\n
										Comentarios de bot añadidos, cuidado, no tiene un buen día." 
									)
							)
						);
				
	}
	/*
	//RIMAS
	else if(substr($msg,-5) == "cinco" || substr($msg,-6) == "cinco?")
    {$balas = array('UserID' => $profil->userId,'replyToken' => $replyToken,'messages' => array(	array('type' => 'text','text' => 'Por el cucu te la hinco! 😆😆😆')));}
	
	else if(substr($msg,-6) == "hambre" || substr($msg,-7) == "hambre?")
    {$balas = array('UserID' => $profil->userId,'replyToken' => $replyToken,'messages' => array(	array('type' => 'text','text' => 'Pos aquí hay fiambre! 😆😆😆')));}
	
	else if(substr($msg,-6) == "cuatro" || substr($msg,-7) == "cuatro?")
    {$balas = array('UserID' => $profil->userId,'replyToken' => $replyToken,'messages' => array(	array('type' => 'text','text' => 'Pa tu cucu mi aparato! 😆😆😆')));}
	
	else if(substr($msg,-6) == "fiesta" || substr($msg,-7) == "fiesta?")
    {$balas = array('UserID' => $profil->userId,'replyToken' => $replyToken,'messages' => array(	array('type' => 'text','text' => 'La que va a montar esta! 😆😆😆')));}
	
	else if(substr($msg,-3) == "ado" || substr($msg,-4) == "ado?")
    {$balas = array('UserID' => $profil->userId,'replyToken' => $replyToken,'messages' => array(	array('type' => 'text','text' => 'El que tengo aquí colgao!😆😆😆')));}
	
	else if(substr($msg,-3) == "ote" || substr($msg,-4) == "ote?")
    {$balas = array('UserID' => $profil->userId,'replyToken' => $replyToken,'messages' => array(	array('type' => 'text','text' => 'Pa tu cucu mi picatoste!😆😆😆')));}
	
	else if(substr($msg,-3) == "ujo" || substr($msg,-4) == "ujo?")
    {$balas = array('UserID' => $profil->userId,'replyToken' => $replyToken,'messages' => array(	array('type' => 'text','text' => 'Por el cucu te la estrujo! 😆😆😆')));}
	
	else if(substr($msg,-3) == "adro" || substr($msg,-4) == "adro?")
    {$balas = array('UserID' => $profil->userId,'replyToken' => $replyToken,'messages' => array(	array('type' => 'text','text' => 'Con mi máquina te taladro! 😆😆😆')));}
	
	else if(substr($msg,-3) == "ano" || substr($msg,-4) == "ano?")
    {$balas = array('UserID' => $profil->userId,'replyToken' => $replyToken,'messages' => array(	array('type' => 'text','text' => 'Me la agarras con la mano! 😆😆😆')));}
	
	else if(substr($msg,-3) == "ima" || substr($msg,-4) == "ima?")
    {$balas = array('UserID' => $profil->userId,'replyToken' => $replyToken,'messages' => array(	array('type' => 'text','text' => 'El conio tu prima! 😆😆😆')));}
	
	else if(substr($msg,-3) == "ece" || substr($msg,-4) == "ece?")
    {$balas = array('UserID' => $profil->userId,'replyToken' => $replyToken,'messages' => array(	array('type' => 'text','text' => 'Agarramela a ver si me crece! 😆😆😆')));}
	
	else if(substr($msg,-3) == "eta" || substr($msg,-4) == "eta?")
    {$balas = array('UserID' => $profil->userId,'replyToken' => $replyToken,'messages' => array(	array('type' => 'text','text' => 'Pos tira de esta! 😆😆😆')));}
	*/
/*	else if($pesan_datang=='/borrar lista')
	{
	include "../config/conexion.php";
	$SQL = "DELETE FROM `asigna` WHERE 1";
	mysqli_query($dbiConex,$SQL);
	include "cerrar_conexion.php";
	$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => "La lista ha sido borrada, \nrecuerda crear una nueva lista con el comando /crear lista"
									)
							)
						);
	}
	else if($pesan_datang=='/crear lista')
	{
	$ch = curl_init();
    $headerArray = array (
            'Accept: application/json',
            'authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjA2OWUxMWJjLTI4ZDQtNDU0Ny1iY2JjLTZlMzY5NzFjNDc1YSIsImlhdCI6MTUyMDcwOTAzOSwic3ViIjoiZGV2ZWxvcGVyLzQ5NzIyODY1LWEwMGMtYjU2ZC04NjhhLWZhYjUzZGMyNjgwNSIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjE1My45Mi4wLjIyIl0sInR5cGUiOiJjbGllbnQifV19.mDrTYLHO7uHXCbHSayTo_uxXXbQ-wQGog7WBgMx-R7gnvDQt1FgSbnTeBFKud-3AioNFlCgWe1RGaxLlvd46Pw'
    );
    curl_setopt($ch, CURLOPT_URL, "https://api.clashofclans.com/v1js/%232R0VLRQU/currentwar");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headerArray);
    $result = curl_exec($ch);
    if(!curl_errno($ch) && !empty($result)) {
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $data = json_decode($result, true);
	curl_close($ch);
	 $i = 1;
	while($i <= $data['teamSize']):
	include "../config/conexion.php";
	$SQL="SELECT * FROM `asigna` WHERE `aldea`=".$i;  
	$resultado = mysqli_query($dbiConex,$SQL);
	include "cerrar_conexion.php";
	if (mysqli_num_rows($resultado) == 0) {
		include "../config/conexion.php";
		$SQL="INSERT INTO `asigna` (`aldea`) VALUES  ('$i');"; // escribe dato en sql
		$result = mysqli_query($dbiConex,$SQL);
		include "cerrar_conexion.php";
		$i += 1;
	}else{ $i += 1;}
	endwhile;
	}
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'La lista '.$data['teamSize'].' vs '.$data['teamSize'].' ha sido creada'
									)
							)
						);
				
	}
	else if($msg=='/reparar lista')
	{
	include "../config/conexion.php";
	$SQL = "DELETE FROM `asigna` WHERE 1";
	mysqli_query($dbiConex,$SQL);
	include "cerrar_conexion.php";
	$ch = curl_init();
    $headerArray = array (
            'Accept: application/json',
            'authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiIsImtpZCI6IjI4YTMxOGY3LTAwMDAtYTFlYi03ZmExLTJjNzQzM2M2Y2NhNSJ9.eyJpc3MiOiJzdXBlcmNlbGwiLCJhdWQiOiJzdXBlcmNlbGw6Z2FtZWFwaSIsImp0aSI6IjA2OWUxMWJjLTI4ZDQtNDU0Ny1iY2JjLTZlMzY5NzFjNDc1YSIsImlhdCI6MTUyMDcwOTAzOSwic3ViIjoiZGV2ZWxvcGVyLzQ5NzIyODY1LWEwMGMtYjU2ZC04NjhhLWZhYjUzZGMyNjgwNSIsInNjb3BlcyI6WyJjbGFzaCJdLCJsaW1pdHMiOlt7InRpZXIiOiJkZXZlbG9wZXIvc2lsdmVyIiwidHlwZSI6InRocm90dGxpbmcifSx7ImNpZHJzIjpbIjE1My45Mi4wLjIyIl0sInR5cGUiOiJjbGllbnQifV19.mDrTYLHO7uHXCbHSayTo_uxXXbQ-wQGog7WBgMx-R7gnvDQt1FgSbnTeBFKud-3AioNFlCgWe1RGaxLlvd46Pw'
    );
    curl_setopt($ch, CURLOPT_URL, "https://api.clashofclans.com/v1/clans/%232R0VLRQU/currentwar");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headerArray);
    $result = curl_exec($ch);
    if(!curl_errno($ch) && !empty($result)) {
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $data = json_decode($result, true);
	curl_close($ch);
	 $i = 1;
	while($i <= $data['teamSize']):
	include "../config/conexion.php";
	$SQL="SELECT * FROM `asigna` WHERE `aldea`=".$i;  
	$resultado = mysqli_query($dbiConex,$SQL);
	include "cerrar_conexion.php";
	if (mysqli_num_rows($resultado) == 0) {
		include "../config/conexion.php";
		$SQL="INSERT INTO `asigna` (`aldea`) VALUES  ('$i');"; // escribe dato en sql
		$result = mysqli_query($dbiConex,$SQL);
		include "cerrar_conexion.php";
		$i++;
	}else{ $i++;}
	endwhile;
	}
	$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'La lista '.$data['teamSize'].' vs '.$data['teamSize'].' ha sido reparada'
									)
							)
						);
	}
*/
	elseif(strpos($pesan_datang,'/guerra') !== false)
	{
	$peticion = str_replace("/guerra ","", $pesan_datang);
	$datos = explode(" ", $peticion);
	$datos2 = str_replace("#","", $datos);
	$tag = $datos2[0];
//	$tag = "22yp9qggu";
//	else if($msg=='/guerra' && $groupId == 'Cb59358b192f2c445f5abe2d7b2fe470d')
	$ch = curl_init();
    $headerArray = array (
            'Accept: application/json', $apisc
    );
    curl_setopt($ch, CURLOPT_URL, "https://api.clashofclans.com/v1/clans/%23".$tag."/currentwar");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headerArray);
    $result = curl_exec($ch);
    if(!curl_errno($ch) && !empty($result)) {
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	if($httpCode !== 200) $balas = array('replyToken' => $replyToken,	'messages' => array( array(	'type' => 'text','text' => $nombre.', clan no encontrado o no hay permiso para visualizar datos')));

	else {
    $data = json_decode($result, true);
	curl_close($ch);
		
	if ($data['state'] == "preparation") { 	$tiempo = $data['startTime']; $estado = "En preparación"; }
	if ($data['state'] == "inWar") { $tiempo = $data['endTime']; $estado = "En guerra"; }
	if ($data['state'] == "warEnded") {$fechainicio = new DateTime;	$fechainicio->modify('-2 hour'); $estado = "Final de guerra"; goto finguerra;}
	$del = array("T", ".000Z");
	$starttime = str_replace($del,"", $tiempo);
	$fechainicio   = new DateTime($starttime); 
	finguerra:
	$fechaactual = new DateTime;
	$fechaactual->modify('-2 hour');
	$diferencia = $fechaactual->diff($fechainicio);
	$numataques = $data['teamSize'] * 2;
	$ataques = $data['clan']['attacks'].'/'.$numataques.'- Ataques - '.$data['opponent']['attacks'].'/'.$numataques;
	$destruccion = round($data['clan']['destructionPercentage'], 2).'% Destrucción '.round($data['opponent']['destructionPercentage'], 2)."%\n    ";
	if ($data['state'] == "preparation") { 	$text = ''; $destruccion = ''; $ataques = ''; goto preparacion; }
	
	preparacion:
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => "Estado: ".$estado."\nNúmero Aldeas: ".$data['teamSize']."👥\n".$data['clan']['name'].' vs '.$data['opponent']['name']."\n      ⭐"
										.$data['clan']['stars'].' - '.$data['opponent']['stars']."⭐\n"
										.$destruccion
										.$ataques."\n ⌛ Queda: ".$diferencia->format(' %H:%I.%s seg').$text
										)
							)
						);
	include "cerrar_conexion.php";
				
	}}}
	
	//informacion de jugador
	
	elseif(strpos($pesan_datang,'/jugador') !== false)
	{
	
// Funcion colocar texto sobre imagen 
$fontname = 'test/font/font.ttf';
$i=30;
$quality = 90;
function create_image($useri){
		global $fontname;	
		global $quality;
		$file = "test/covers/".md5($useri[0]['name'].$useri[1]['name'].$useri[2]['name']).".jpg";	
			$im = imagecreatefromjpeg("test/pass.jpg");
			$color['grey'] = imagecolorallocate($im, 54, 56, 60);
			$color['green'] = imagecolorallocate($im, 55, 189, 102);
			$color['black'] = imagecolorallocate($im, 0, 0, 0);
			$color['gold'] = imagecolorallocate($im, 255, 165, 0);
			$y = imagesy($im) - $height - 365;
		foreach ($useri as $value){
			$x = center_text($value['name'], $value['font-size']);	
			imagettftext($im, $value['font-size'], 0, $x, $y+$i, $color[$value['color']], $fontname,$value['name']);
			$i = $i+32;	
		}
			imagejpeg($im, $file, $quality);
		return $file;	
}
function center_text($string, $font_size){
			global $fontname;
			$image_width = 800;
			$dimensions = imagettfbbox($font_size, 0, $fontname, $string);
			return ceil(($image_width - $dimensions[4]) / 2);				
} 
 
//Ejecucion de comando 
	
	$peticion = str_replace("/jugador ","", $pesan_datang);
	$datos = explode(" ", $peticion);
	$tag = $datos[0];
	if($tag[0] === '#') $tag = urlencode($tag);
	$ch = curl_init();
        $headerArray = array (
            'Accept: application/json', $apisc
        );
        curl_setopt($ch, CURLOPT_URL, "https://api.clashofclans.com/v1/players/".$tag);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headerArray);
        $result = curl_exec($ch);
        if(!curl_errno($ch) && !empty($result)) {
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            if($httpCode !== 200) $balas = array('replyToken' => $replyToken,	'messages' => array( array(	'type' => 'text','text' => $nombre.', no he encontrado el jugador')));
			else {
			$data = json_decode($result, true);
			$urlclan = "https://link.clashofclans.com/?action=OpenClanProfile&tag=".$data ['clan']['tag'];
			if($tagplayerurl == false) { $urluser = "https://link.clashofclans.com/?action=OpenPlayerProfile&tag=".urldecode($tag); }
			$useri = array(	
		array(
			'name'=> 'Nombre: '.$data["name"], 
			'font-size'=>'27',
			'color'=>'black'),
		array(
			'name'=> 'Nivel TH: '.$data["townHallLevel"],
			'font-size'=>'14',
			'color'=>'black'),
		array(
			'name'=> 'Nivel: '.$data["expLevel"],
			'font-size'=>'14',
			'color'=>'black'),
		array(
			'name'=> 'Exp Guerras: '.$data ['warStars'],
			'font-size'=>'14',
			'color'=>'black'),
		array(
			'name'=> 'Trofeos: '.$data["trophies"],
			'font-size'=>'14',
			'color'=>'black'),
		array(
			'name'=> '',
			'font-size'=>'14',
			'color'=>'black'),
		array(
			'name'=> 'Clan: '.$data ['clan']['name'],
			'font-size'=>'22',
			'color'=>'black'),
		array(
			'name'=> 'Nivel clan: '.$data ['clan']['clanLevel'],
			'font-size'=>'14',
			'color'=>'black'),
		array(
			'name'=> 'Donaciones: '.$data ['donations']." / ".$data ['donationsReceived'],
			'font-size'=>'14',
			'color'=>'black'
			)
			
	);
	$filename = create_image($useri);
			$get_sub = array();
			$aa =   array(
						'type' => 'image',									
						'originalContentUrl' => 'https://www.saladepeligro.es/ildenet/line_API/'.$filename,
						'previewImageUrl' => 'https://www.saladepeligro.es/ildenet/line_API/'.$filename							
					);
			$urljugador = "https://link.clashofclans.com/?action=OpenPlayerProfile&tag=".$tag;
			$urlfinal = acortar_url($urljugador);
			$ab =   array(
						'type' => 'text',                   
						'text' => "🔍Nombre: ".$data['name'] ."\n🏘 Clan: ".$data ['clan']['name']." 📊Nivel: ".$data ['clan']['clanLevel']."\n🎓 Rol: ".$data['role']."\n🔰 Exp: ".$data['expLevel']."\n👥 Tropas: 📤 ". $data ['donations']." 📥 ".$data ['donationsReceived']."\n🏠 Ayuntamiento: ".$data['townHallLevel']."\n☁️ Liga: ".$data['league']['name']."\n🏆 Trofeos: ".$data['trophies']."\n🏆 Record: ".$data['bestTrophies']."\n⭐️ Estrellas guerra: ".$data['warStars']."\n⚔️ Ataques ganados: ".$data['attackWins']."\n🎉 Defensas ganadas: ".$data['defenseWins']."\n\n👑 Rey: ".$data['heroes'][0]['level']."\n👸 Reina: ".$data['heroes'][1]['level']."\n👳 Guardian: ".$data['heroes'][2]['level']."\n\n🏠 Aldea nocturna: ".$data['builderHallLevel']."\n🏆 Trofeos: ".$data['versusTrophies']."\n🏆 Record: ".$data['bestVersusTrophies']."\n⚔️ Ataques ganados: ".$data['versusBattleWins']."\n‍👨‍🔧 Máquina Bélica: ".$data['heroes'][3]['level']."\n".$urlfinal						
					);
		array_push($get_sub,$aa,$ab);		
		$balas = array(
					'replyToken' 	=> $replyToken,														
					'messages' 		=> $get_sub
				 );	
		
	}}}
	elseif(strpos($pesan_datang,'/clan') !== false)
	{
	$peticion = str_replace("/clan ","", $pesan_datang);
	$datos = explode(" ", $peticion);
	$datos2 = str_replace("#","", $datos);
	$tag = $datos2[0];
//	else if($msg=='/guerra' && $groupId == 'Cb59358b192f2c445f5abe2d7b2fe470d')
	$ch = curl_init();
    $headerArray = array (
            'Accept: application/json', $apisc
    );
    curl_setopt($ch, CURLOPT_URL, "https://api.clashofclans.com/v1/clans/%23".$tag);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headerArray);
    $result = curl_exec($ch);
    if(!curl_errno($ch) && !empty($result)) {
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	if($httpCode !== 200) { $balas = array('replyToken' => $replyToken,	'messages' => array( array(	'type' => 'text','text' => $nombre.', clan no encontrado o no hay permiso para visualizar datos')));
	}
	else {
    $data = json_decode($result, true);
	curl_close($ch);
	$urlimage = $data ['badgeUrls']['small'];
	$urlclan = "https://link.clashofclans.com/?action=OpenClanProfile&tag=".$tag;
	$urlfinal = acortar_url($urlclan);

	$balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
 /*              array ( 
                        'type' => 'template', 
                          'altText' => 'Acerca del clan', 
                          'template' =>  
                          array ( 
                            'type' => 'buttons', 
                            'thumbnailImageUrl' => $data ['badgeUrls']['small'], 
                            'imageAspectRatio' => 'rectangle', 
                            'imageSize' => 'cover', 
                            'imageBackgroundColor' => '#FFFFFF', 
                            'title' => $data["name"], 
                            'text' => 'Miembros: '.$data ['members'].'/50  --  Puntos: '.$data["clanPoints"].'     Guerras Ganadas: '.$data["warWins"] ,
                            'actions' =>  
                            array ( 
                              0 =>  
                              array ( 
                                'type' => 'uri', 
                                'label' => 'Acceder', 
                                'uri' => 'https://link.clashofclans.com/?action=OpenClanProfile&tag='.$tag, 
                              ), 
                            ), 
                          ), 
                        ), 
*/						
					array(
						'type' => 'image',                   
						'originalContentUrl' => $urlimage,
						'previewImageUrl' => $urlimage				
				),					
				array(
						'type' => 'text',                   
						'text' => "🔍 Nombre: ".$data["name"]."\n📜 Descripción: ".$data["description"]."\n📊 Nivel: ".$data["clanLevel"]."\n🏆 Trofeos: ".$data["clanPoints"]."\n🌎 Localización: ".$data["location"]["name"]."\n⭐️ Guerras ganadas: ".$data["warWins"]."\n🎉 Racha Victorias: ".$data ['warWinStreak']."\n⚔️ Miembros: ".$data ['members']."/50\n".$urlfinal
				)
			) 
		);
	}}}
	else if(strpos($pesan_datang,'/historial #') !== false)
	{
	$tag = str_replace("/historial #","", $pesan_datang);
	if($tag === false || $tag === 0) {$balas = array('UserID' => $profil->userId,	'replyToken' => $replyToken, 'messages' => array(array('type' => 'text','text' => 'Falta tag, escriba /historial #tag del jugador')));}
	$cliente = new GuzzleHttp\Client();
	$res = $cliente->request('GET', 'https://api.clashofstats.com/players/'.$tag.'/history/clans');
	$array = json_decode($res->getBody(), true);
	$i = 1;
	if (isset($array['log'][0]['tag'])){
	foreach ($array as $value) {
	foreach ($value as $valor) {
	if (isset($valor['tag'])) {
		$tag = urlencode($valor['tag']);
		$data = json_decode($result, true);
		$days = (int)($valor['duration']/1000/60/60/24)+1;
		if ($valor['role'] == "leader"){$rol = "Líder";}
		if ($valor['role'] == "coLeader"){$rol = "Colíder";}
		if ($valor['role'] == "admin"){$rol = "Veterano";}
		if ($valor['role'] == "member"){$rol = "Miembro";}
		$clan = $valor['tag'].' - '.$array['clansMap'][$valor['tag']]['name']." - ".$rol." ".$days." días";		
		if ($i++ >= 15) break;  
		$text .= $clan."\n";}  		
	}}}
	$balas = array('UserID' => $profil->userId,	'replyToken' => $replyToken, 'messages' => array(array('type' => 'text','text' => "Mostrando últimos clanes del jugador:\n".$text)));
	}

	
/*	elseif($pesan_datang=='/lista')
	{
	include "../config/conexion.php";
	$consulta="SELECT * FROM `asigna` ORDER BY `aldea` ASC";  
	$resultado = mysqli_query($dbiConex,$consulta);
	while($row = mysqli_fetch_assoc($resultado)){
	$filas[]  = $row;
	}
	$text = "Lista asociaciones: \n";

	foreach ($filas as $fila) {
	foreach ($fila as $columna => $valor) {
    $text .= "\t $valor ";
	}
	$text .= "\n";
	}
	
	//file_put_contents('./balasan.json',$resultado);
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $text
									)
							)
	);
	include "cerrar_conexion.php";
				
	}
*/	
	else if($msg=='/creador' || $msg == 'creador')
/*
	{
				$get_sub = array();
				$aa =   array(
								'type' => 'image',									
								'originalContentUrl' => 'https://saladepeligro.es/ildenet/perfil.jpg',
								'previewImageUrl' => 'https://saladepeligro.es/ildenet/perfil.jpg'	
							);
				array_push($get_sub,$aa);	
				$get_sub[] = array(
											'type' => 'text',									
											'text' => 'Puede contactar con el creador: https://line.me/ti/p/~ildenet'
										);
				$balas = array(
							'replyToken' 	=> $replyToken,														
							'messages' 		=> $get_sub
						 );	
			}
*/
	{
	$balas = array( 
            'replyToken' => $replyToken, 
            'messages' => array( 
                array ( 
                        'type' => 'template', 
                          'altText' => 'Acerca de ildenet', 
                          'template' =>  
                          array ( 
                            'type' => 'buttons', 
                            'thumbnailImageUrl' => 'https://saladepeligro.es/ildenet/perfil.jpg', 
                            'imageAspectRatio' => 'rectangle', 
                            'imageSize' => 'cover', 
                            'imageBackgroundColor' => '#FFFFFF', 
                            'title' => 'IldeNet', 
                            'text' => 'Investigando', 
                            'actions' =>  
                            array ( 
                              0 =>  
                              array ( 
                                'type' => 'uri', 
                                'label' => 'Contactar', 
                                'uri' => 'https://line.me/ti/p/~ildenet', 
                              ), 
                            ), 
                          ), 
                        ) 
            ) 
        );
	}
	
	
	else if($msg == '/youtube') {
	function youtube($keyword) {
    $uri = "https://www.googleapis.com/youtube/v3/search?part=snippet&order=relevance&regionCode=lk&q=" . $keyword . "&key=AIzaSyB5cpL7DYDn_2c7QuExnGOZ1Wmg4AQmx8c&maxResults=10&type=video";
	

    $response = Unirest\Request::get("$uri");

    $json = json_decode($response->raw_body, true);
    $parsed = array();
    $parsed['a1'] = $json['items']['0']['id']['videoId'];
	$parsed['b1'] = $json['items']['0']['snippet']['title'];
	$parsed['c1'] = $json['items']['0']['snippet']['thumbnails']['high']['url'];
    $parsed['a2'] = $json['items']['1']['id']['videoId'];
	$parsed['b2'] = $json['items']['1']['snippet']['title'];
	$parsed['c2'] = $json['items']['1']['snippet']['thumbnails']['high']['url'];
    $parsed['a3'] = $json['items']['2']['id']['videoId'];
	$parsed['b3'] = $json['items']['2']['snippet']['title'];
	$parsed['c3'] = $json['items']['2']['snippet']['thumbnails']['high']['url'];
    $parsed['a4'] = $json['items']['3']['id']['videoId'];
	$parsed['b4'] = $json['items']['3']['snippet']['title'];
	$parsed['c4'] = $json['items']['3']['snippet']['thumbnails']['high']['url'];
    $parsed['a5'] = $json['items']['4']['id']['videoId'];
	$parsed['b5'] = $json['items']['4']['snippet']['title'];
	$parsed['c5'] = $json['items']['4']['snippet']['thumbnails']['high']['url'];
    $parsed['a6'] = $json['items']['5']['id']['videoId'];
	$parsed['b6'] = $json['items']['5']['snippet']['title'];
	$parsed['c6'] = $json['items']['5']['snippet']['thumbnails']['high']['url'];
    $parsed['a7'] = $json['items']['6']['id']['videoId'];
	$parsed['b7'] = $json['items']['6']['snippet']['title'];	
	$parsed['c7'] = $json['items']['6']['snippet']['thumbnails']['high']['url'];
    $parsed['a8'] = $json['items']['7']['id']['videoId'];
	$parsed['b8'] = $json['items']['7']['snippet']['title'];
	$parsed['c8'] = $json['items']['7']['snippet']['thumbnails']['high']['url'];
    $parsed['a9'] = $json['items']['8']['id']['videoId'];
	$parsed['b9'] = $json['items']['8']['snippet']['title'];
	$parsed['c9'] = $json['items']['8']['snippet']['thumbnails']['high']['url'];
    $parsed['a10'] = $json['items']['9']['id']['videoId'];
	$parsed['b10'] = $json['items']['9']['snippet']['title'];	
	$parsed['c10'] = $json['items']['9']['snippet']['thumbnails']['high']['url'];
    return $parsed;
}

        $result = youtube('Clash of clans');
        $balas = array(
            'replyToken' => $replyToken,
            'messages' => array(
				array (
				  'type' => 'template',
				  'altText' => 'Youtube',
				  'template' => 
				  array (
				    'type' => 'carousel',
				    'columns' => 
				    array (
				      0 => 
				      array (
				        'thumbnailImageUrl' => $result['c1'],
				        'imageBackgroundColor' => '#FFFFFF',
				        'text' => preg_replace('/[^a-z0-9_ ]/i', '', substr($result['b1'], 0, 47)).'...',
				        'actions' => 
				        array (
				          0 => 
				          array (
				            'type' => 'uri',
				            'label' => 'Youtube',
				            'uri' => 'https://youtu.be/'.$result['a1'],
				          ),
				        ),
				      ),
				      1 => 
				      array (
				        'thumbnailImageUrl' => $result['c2'],
				        'imageBackgroundColor' => '#000000',
				        'text' => preg_replace('/[^a-z0-9_ ]/i', '', substr($result['b2'], 0, 47)).'...',
				        'actions' => 
				        array (
				          0 => 
				          array (
				            'type' => 'uri',
				            'label' => 'Youtube',
				            'uri' => 'https://youtu.be/'.$result['a2'],
				          ),
				        ),
				      ),	
				      2 => 
				      array (
				        'thumbnailImageUrl' => $result['c3'],
				        'imageBackgroundColor' => '#FFFFFF',
				        'text' => preg_replace('/[^a-z0-9_ ]/i', '', substr($result['b3'], 0, 47)).'...',
				        'actions' => 
				        array (
				          0 => 
				          array (
				            'type' => 'uri',
				            'label' => 'Youtube',
				            'uri' => 'https://youtu.be/'.$result['a3'],
				          ),
				        ),
				      ),					  
				      3 => 
				      array (
				        'thumbnailImageUrl' => $result['c4'],
				        'imageBackgroundColor' => '#FFFFFF',
				        'text' => preg_replace('/[^a-z0-9_ ]/i', '', substr($result['b4'], 0, 47)).'...',
				        'actions' => 
				        array (
				          0 =>
				          array (
				            'type' => 'uri',
				            'label' => 'Youtube',
				            'uri' => 'https://youtu.be/'.$result['a4'],
				          ),
				        ),
				      ),
				      4 => 
				      array (
				        'thumbnailImageUrl' => $result['c5'],
				        'imageBackgroundColor' => '#FFFFFF',
				        'text' => preg_replace('/[^a-z0-9_ ]/i', '', substr($result['b5'], 0, 47)).'...',
				        'actions' => 
				        array (
				          0 => 
				          array (
				            'type' => 'uri',
				            'label' => 'Youtube',
				            'uri' => 'https://youtu.be/'.$result['a5'],
				          ),
				        ),
				      ),
				      5 => 
				      array (
				        'thumbnailImageUrl' => $result['c6'],
				        'imageBackgroundColor' => '#FFFFFF',
				        'text' => preg_replace('/[^a-z0-9_ ]/i', '', substr($result['b6'], 0, 47)).'...',
				        'actions' => 
				        array (
				          0 => 
				          array (
				            'type' => 'uri',
				            'label' => 'Youtube',
				            'uri' => 'https://youtu.be/'.$result['a6'],
				          ),
				        ),
				      ),					  
				      6 => 
				      array (
				        'thumbnailImageUrl' => $result['c7'],
				        'imageBackgroundColor' => '#FFFFFF',
				        'text' => preg_replace('/[^a-z0-9_ ]/i', '', substr($result['b7'], 0, 47)).'...',
				        'actions' => 
				        array (
				          0 =>
				          array (
				            'type' => 'uri',
				            'label' => 'Youtube',
				            'uri' => 'https://youtu.be/'.$result['a7'],
				          ),
				        ),
				      ),					  
				      7 => 
				      array (
				        'thumbnailImageUrl' => $result['c8'],
				        'imageBackgroundColor' => '#FFFFFF',
				        'text' => preg_replace('/[^a-z0-9_ ]/i', '', substr($result['b8'], 0, 47)).'...',
				        'actions' => 
				        array (
				          0 =>
				          array (
				            'type' => 'uri',
				            'label' => 'Youtube',
				            'uri' => 'https://youtu.be/'.$result['a8'],
				          ),
				        ),
				      ),					  
				    ),
				    'imageAspectRatio' => 'rectangle',
				    'imageSize' => 'cover',
				  ),
				)		
            )
        );
}
elseif(strpos($pesan_datang,'/salir') !== false && $userId == 'U175b9911af99bb27e221061a38b69f02')
{
$grupo = str_replace("/salir ","", $pesan_datang);
$clientLine->leaveRoom($grupo);
$clientLine->leaveGroup($grupo);

}
elseif(strpos($pesan_datang,'/hispanistad') !== false && $userId == 'U175b9911af99bb27e221061a38b69f02')
	{
$msgpush = str_replace("/hispanistad ","", $pesan_datang);
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Mensaje enviado'
									)
							)
						);
						
		$push = array(
							'to' => $GroupIdHispanistad,									
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $msgpush
									)
							)
						);

$clientLine->pushMessage($push);
} 
elseif(strpos($pesan_datang,'/familia') !== false && $userId == 'U175b9911af99bb27e221061a38b69f02')
	{
$msgpush = str_replace("/familia ","", $pesan_datang);
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Mensaje enviado'
									)
							)
						);
						
		$push = array(
							'to' => $GroupIdFamiliaHispanistad,									
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $msgpush
									)
							)
						);

$clientLine->pushMessage($push);
}
elseif(strpos($pesan_datang,'/send3') !== false && $userId == 'U175b9911af99bb27e221061a38b69f02')
	{
$msgpush = str_replace("/send3 ","", $pesan_datang);
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Mensaje enviado'
									)
							)
						);
						
		$push = array(
							'to' => $GroupIdiberos,									
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $msgpush
									)
							)
						);

$clientLine->pushMessage($push);
} 
else if($msg == 'dispara' && $groupId == $GroupIdiberos)
{
	include "../config/conexion.php";
	$sql= "SELECT * FROM `Ruleta` WHERE `id`='1'";
	$result=mysqli_query($dbiConex, $sql);
	while ($mostrar=mysqli_fetch_array($result)) {
	$ruleta = $mostrar['hueco'];
	$ultimotiro = $mostrar['jugador'];
	}
	include "cerrar_conexion.php";
		if($ruleta == "-")    
			{
			$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $nombre.' El revolver 🔫 necesita ser cargado con el comando CARGAR'
									)
							)
						);
			}
		
		else if($ruleta >= "7")    
			{
			$ruleta = "-";
			include "../config/conexion.php";
			$sql = "UPDATE `Ruleta` SET `hueco`= '$ruleta',`jugador`= '$userId' WHERE `id`='1'";
			mysqli_query($dbiConex,$sql);
			include "cerrar_conexion.php";
			$muerto_array = array($nombre.'BOOOOM!! 🤦‍♂️ Mañana no vayas a trabajar, no tienes cabeza 👎🏻👼🏼', $nombre.' 💥🔫 Boom, estas muerto ⛪',$nombre.'CATAPUMM!! Dejas mujer 👩🏼 3 hijas 👧🏼 5 niños 👶🏼 solos y una hipoteca 📜 sin pagar 💸', $nombre.'BIIIIMM!! Tus restos 💩 estan siendo trasladados 🚑 a un hospital cercano 🏥', $nombre.'BOOM!!.. Miralo por el lado bueno 👋🏻, o vas a tener que peinarte mas 🌋',$nombre.' BUMMM!! Rapido 🏃🏼, busquemos un hoyo 🚽 donde echar sus restos! 🧻');
			$muerto_rnd = array_rand($muerto_array, 2);
				$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $muerto_array[$muerto_rnd[0]]
									)
							)
						);
			}
		else if($ultimotiro == $userId)    
			{
			$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $nombre." Pasa tu revolver 🔫 al compañero, no seas ansia viva!"
									)
							)
						);
			}
		else 
		{
			++$ruleta; 
			include "../config/conexion.php";
			$sql = "UPDATE `Ruleta` SET `hueco`= '$ruleta',`jugador`= '$userId' WHERE `id`='1'";
			mysqli_query($dbiConex,$sql);
			include "cerrar_conexion.php";
			$fallo_array = array($nombre.' tic 😧🔫 uff por poco', $nombre.' tic 😓🔫 ha estado cerca',$nombre.' tic 😢🔫 esta no fue', $nombre.' tic 😎🔫 estas de suerte', $nombre.' tic 😰🔫 huele a caquita',$nombre.' tic 😰😜🔫 hoy no es mi dia');
			$fallo_rnd = array_rand($fallo_array, 2);

			$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $fallo_array[$fallo_rnd[0]]
									)
							)
						);
			
		}	
}
else if($msg == 'cargar' && $groupId == $GroupIdiberos)
{
	include "../config/conexion.php";
	$sql= "SELECT `hueco` FROM `Ruleta` WHERE `id`='1'";
	$result=mysqli_query($dbiConex, $sql);
	while ($mostrar=mysqli_fetch_array($result)) {
	$ruleta = $mostrar['hueco'];
	}
	include "cerrar_conexion.php";
		if ($ruleta == "-")
		{
		$ruleta = rand(0,6); 
		include "../config/conexion.php";
		$sql = "UPDATE `Ruleta` SET `hueco`= '$ruleta',`jugador`= '$userId' WHERE `id`='1'";
		mysqli_query($dbiConex,$sql);
		include "cerrar_conexion.php";

		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'RULETA RUSA PREPARADA: Se ha introducido una bala en el revolver, quedan 5 huecos libres, pierde quien muera antes. Suerte y DISPARA'
									)
							)
						);
		}
		else
		{
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $nombre.' el revolver tiene una bala dentro. continua disparando con comando DISPARA'
									)
							)
						);
		}
}
else if ($msg == 'borrar log' || $msg == 'reset log'){
				$contenido = "";
				$file = "log.txt";
				$fp = fopen($file,"w+"); 
				fwrite($fp, $contenido); 
				fclose($fp);
				include "../config/conexion.php";
				$SQL="TRUNCATE `linebot`";
				mysqli_query($dbiConex,$SQL);
				include "cerrar_conexion.php";
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'Inicio de registro'
									)
							)
						);
}


// PRUEBAS COMANDOS
/*
if($msg == 'prueba')
		{
			
			$balas = array(
			'replyToken' => $replyToken,														
			'messages' => array(
			              array(
					   'type' => 'template',	
					   'altText' => 'Movies',
					   'template' =>[
					  'type' => 'buttons',	
					   'thumbnailImageUrl' => 'https://s-media-cache-ak0.pinimg.com/236x/0c/cd/6a/0ccd6a5e74067bab2d43b4c3e7501fd1.jpg',
						'title' => 'Movies',
						'text' => 'Tempat Download Film',
						'actions' => [
						[
						'type' => 'uri',
						    'label' => 'Detalis',
						    'uri' => 'http://lk21.org'
						]
						]
						
								]
								)
								)
							);
					
		}

*/
else if($msg == 'prueba') {
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
array (
  'type' => 'template',
  'altText' => 'this is a carousel template',
  'template' => 
  array (
    'type' => 'carousel',
    'columns' => 
    array (
      0 => 
      array (
        'thumbnailImageUrl' => 'https://example.com/bot/images/item1.jpg',
        'imageBackgroundColor' => '#FFFFFF',
        'title' => 'Item',
        'text' => 'Percobaan doang mamank',
        'defaultAction' => 
        array (
          'type' => 'uri',
          'label' => 'View detail',
          'uri' => 'http://example.com/page/123',
        ),
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'postback',
            'label' => 'Buy',
            'data' => 'action=buy&itemid=111',
          ),
          1 => 
          array (
            'type' => 'postback',
            'label' => 'Add to cart',
            'data' => 'action=add&itemid=111',
          ),
          2 => 
          array (
            'type' => 'uri',
            'label' => 'View detail',
            'uri' => 'http://example.com/page/111',
          ),
        ),
      ),
      1 => 
      array (
        'thumbnailImageUrl' => 'https://example.com/bot/images/item2.jpg',
        'imageBackgroundColor' => '#000000',
        'title' => 'this is menu',
        'text' => 'description',
        'defaultAction' => 
        array (
          'type' => 'uri',
          'label' => 'View detail',
          'uri' => 'http://example.com/page/222',
        ),
        'actions' => 
        array (
          0 => 
          array (
            'type' => 'postback',
            'label' => 'Buy',
            'data' => 'action=buy&itemid=222',
          ),
          1 => 
          array (
            'type' => 'postback',
            'label' => 'Add to cart',
            'data' => 'action=add&itemid=222',
          ),
          2 => 
          array (
            'type' => 'uri',
            'label' => 'View detail',
            'uri' => 'http://example.com/page/222',
          ),
        ),
      ),
    ),
    'imageAspectRatio' => 'rectangle',
    'imageSize' => 'cover',
  ),)));}


						
						


}


// $result =  json_encode($balas).PHP_EOL;
$result =  json_encode($balas);
//$str = json_encode($profil).PHP_EOL; //sacar array a txt
$mensaje = $type.":".$tipo." ".$hora.' Desde:'.$sitio.' | '.$grupo.' Nombre: ('.$userId.')'.$nombre.' -> '.$pesan_datang." -|- ".$balas['messages']['0']['text'].PHP_EOL;
//$mensaje = $type.":".$tipo." ".$hora.' Desde:'.$sitio.' | '.$grupo.' Nombre: '.$profil->displayName.' -> '.$pesan_datang." -|- ".$clientLine->parseEvents()[0]['source']['userId'];


// enviar todo a MYSQL 
include "../config/conexion.php"; //archivo de conexion
$msgtext = "<b>(".$tipo.")</b> ".$pesan_datang;



$SQL="INSERT INTO `linebot` (`fecha`,`grupo`,`usuario`,`texto`) VALUES  ('$hora','    <b><font color=#ff0000>$grupo</font></b>','<b>($userId)$nombre</b>','$msgtext');";
mysqli_query($dbiConex,$SQL);
include "cerrar_conexion.php"; //archivo de desconexion 

//file_put_contents('./log.txt',$mensaje."\n", FILE_APPEND);
//file_put_contents('./log.txt', print_r($clientLine->parseEvents()[0], true),FILE_APPEND);
file_put_contents('./log.txt', print_r($data, true),FILE_APPEND);


echo '<br>';
echo '<br>';
echo '<center><H1>HTTP 404 Not Found</H1></center>'; 

$clientLine->replyMessage($balas);