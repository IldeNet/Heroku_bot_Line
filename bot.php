<?php
/*
copyright @ medantechno.com
2017

*/

require_once('./line_class.php');

$channelAccessToken = '5Be/XeUn1YJz8zCv7liKBz3+Me9uJiYus8JWtCXmY2ekGWpybIxFTrO77TKoLe8hLWr4QQ6yRV9pjuw2J+RVXujhFrhh3XbaIsSfgOpJB5zc20Ms0jF527PWKxZS+sKDAkfVQ/c6rwol6uUgtQD8TwdB04t89/1O/w1cDnyilFU='; 
$channelSecret = '50d062cc8a54b828987687db927fd8b8';

$clientLine = new LINEBotTiny($channelAccessToken, $channelSecret);

// TWITTER
include "twitteroauth/twitteroauth.php";

$consumer_key = "ezwePFtR6u8lPb73mwDpxSnnZ";
$consumer_secret = "CeBdh5bsrp0b8WNM8MlMxmtQXTZi9QcibVliLCSx3KHNmSPkvW";
$access_token = "240274459-rpMyufsBujrsKN6oGhqvEB5MPlNvqbjIeubfLIqS";
$access_token_secret = "fWZ94qPrbNSqUofi6nVYwOvNeZKlcx9mA0eMoBuKDIXdb";

$twitter = new TwitterOAuth($consumer_key,$consumer_secret,$access_token,$access_token_secret);

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



/*
Nombre: IldeNet
User_Id: U175b9911af99bb27e221061a38b69f02
GroupId: Cb59358b192f2c445f5abe2d7b2fe470d

*/


$userId 	= $clientLine->parseEvents()[0]['source']['userId'];
$replyToken = $clientLine->parseEvents()[0]['replyToken'];
$timestamp	= $clientLine->parseEvents()[0]['timestamp'];
$groupId 	= $clientLine->parseEvents()[0]['source']['groupId'];



$message 	= $clientLine->parseEvents()[0]['message'];
$messageid 	= $clientLine->parseEvents()[0]['message']['id'];

$profil = $clientLine->profil($userId);

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
// $profil->displayName



//pruebas
if($message['type']=='text')
{
	if($msg =='version')
	{
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'version 0.5 by IldeNet'
									)
							)
						);
				
	}
	else if($msg =='info')
	{
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => "Nombre: ".$profil->displayName."\nUser_Id: ".$userId."\nGroupId: ".$groupId
									)
							)
						);
				
	}
	else if($msg =='/twitter')
	{
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
	
	elseif(strpos($msg,'/meme') !== false)
	{
	$meme = str_replace("/meme ","", $msg);
	$meme2 = str_replace(" ","%20", $meme);

	$urlmeme = "https://infernus.000webhostapp.com/cocbot/meme?bottom_text=".$meme2;
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
	else if(strpos($msg,'bot ') !== false) //frases para mencion al bot
    {	
		$file = "frase.txt"; 
		$fp = fopen($file,"r"); 
		$frase = fgets($fp, 26); 
		fclose($fp);
		++$frase; 
		$fp = fopen($file,"w+"); 
		fwrite($fp, $frase, 26); 
		fclose($fp);
		if($frase == "76")    
			{
				$frase = "0";
				$fp = fopen($file,"w+"); 
				fwrite($fp, $frase, 26); 
				fclose($fp);
				// exit ();    
			}
		if(strpos($msg,'bota') !== false) { }
		else if(strpos($msg,'bote') !== false) { }
		else if(strpos($msg,'boti') !== false) { }
		else if(strpos($msg,'boto') !== false) { }
		else if(strpos($msg,'botu') !== false) { }	
		else
		{
		$bot_array = array(
		"macho, cómprate un amigo, ENVIA AMIGO AL 555",
		"no me calientes mas la cabeza, pasa de mi.",
		"me has pillado mirando pornohub, perdon, que necesitas?", 
		"eres mas pesao que una vaca en brazos",
		"Va a aterrizar una hostia y se te está poniendo cara de aeropuerto",
		"Te doy una hostia y te cambia hasta el signo del zodiaco",
		"eres mas pesao que Falete",
		"eres mas sorprendente que Stivi Wonder corriendo los San Fermines",
		"tu tienes menos sexapil que el sobaco de Torrente ",
		"no te puedes imaginar la de gente como tu sin medicina",
		"tengo un pedazo de asunto entre las piernas...",
		"te has peido?", 
		"estas mas desiquilibrado que Jesus Gil en bicicleta",
		"eres mas inutil que un supositorio de fresa",
		"eres mas absurdo que un tatuaje en la planta del pie",
		"eres mas antiguo que el DNI de la abuela de Dios",
		"comó te atreves a hablarme con esa cara que me traes?", 
		"ah si?", 
		"comó te atreves a hablarme con esa cara que me traes?", 
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
		"Eres mas cansino que Mcguiver de invitado en Bricomania",
		"claro que si, guapi!", 
		"vamos a calmarnos",
		"kieres que te raje o k?",
		"no entiendo cuando hablas", 
		"tengo cara de que me importe?",
		"Iyo, tu kere que te de un sopapo?",
		"al pino, pino y pa tu culo mi pepino",
		"yo flipo contigo", 
		"K ISE?",
		"me rio de ti",
		"relaja la raja",
		"te rompo las piernas, payaso!",
		"Oh dios, te quieres callar ya?", 
		"comó te atreves a hablarme con esa cara que me traes?", 
		"eres mu cansino", 
		"te voy a mandar a la mafia rusa a tu casa y se lo cuentas a ellos", 
		"buscamos algun doctor en el canal?", 
		"estaba jiñando, dime", 
		"no voy a responder eso por tu bien psicológico", 
		"eres mas pesao que un collar de sandias", 
		"conozco a profesionales que puede tratar tu problema",
		"aún te queda mucho por aprender, joven padawan", 
		"quien me va a comer las bolas?",
		"tu si que eres guapa",
		"Estoy más agobiado que spiderman en un descampado",
		"sabias que pau va al gym para ver rabos?",
		"es el vecino el que elige el alcalde y es el alcalde el que quiere que sean los vecinos el alcalde",
		"Mi batería no tiene mucha carga, así que tendré que colgar. Que tenga un gran día",
		"Conoces al fraile?? al que le dieron por culo en el aire",
		"si hay pelito no hay delito",
		"Me acabas de poner más tenso que doraemon en un arco de seguridad",
		"te has dado cuenta que Hhce mas frio que en la comunión de pingu?",
		"Tengo más hambre que el tamagotchi de un sordo",
		"aguantas menos que las puertas de las casa en hermano mayor",
		"Tienes más peligro que Berlusconi en un instituto",
		"Te voy a meter mas rabo que cuello tiene un pavo",
		"Me pones las venas del nabo como el pescuezo de un cantaó",
		"Te gustan más las pollas que al pequeño de los morancos",
		"Hagas lo que hagas no te olvides las bragas",
		"Estoy mas nervioso que Don Quijote en un campo eólico!",
		"Te vas a quedar mas solo que Rajoy en el dia del amigo",
		"He visto cuadros abstractos más bonitos que tu cara",
		"me pones mas tenso que en el bautizo de un gremmlim",
		"te pego una paliza que te van a tener que poner el betadine con rodillo",
		"Tienes menos detalles que el salpicadero de un Panda",
		"Eres como la pantoja, polla que ve polla que se le antoja",
		"tus padres te ataban morcillas en el cuello porque ni los perros jugaban contigo?"); 
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
		$bdias_array = array("Buenos dias", "Buen dia", "Que tal estas?", "A la paz de dios, hermano", "Bienaventurado quien te puede saludar");
		$bdias_rnd = array_rand($bdias_array, 2);		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $bdias_array[$bdias_rnd[0]]." ".$profil->displayName." !!😘"
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
										'text' => $bnoches_array[$bnoches_rnd[0]]." ".$profil->displayName." !!😘"
										
									)
							)
						);
				
	}
	else if($pesan_datang=='/ayuda')
	{   
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => $profil->displayName." Disponemos de los comandos:\n  
										/tiempo ciudad -> proporciona el tiempo y pronóstico Ej: /tiempo Madrid\n
										/meme -> escribe /meme y el texto que desees, Jonas te contestará Ej: /meme Hola\n
										Comentarios de bot añadidos, cuidado, no tiene un buen día." 
									)
							)
						);
				
	}
	
}
     
 
$result =  json_encode($balas).PHP_EOL;
$mensaje = $profil->displayName.'->'.$pesan_datang." - ".$result;
//$result = ob_get_clean();


file_put_contents('./log.json',$mensaje."\n", FILE_APPEND);


$clientLine->replyMessage($balas);
echo '<br>';
echo '<br>';
echo '<center><H1>HTTP 404 Not Found</H1></center>'; 

