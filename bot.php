<?php
require_once('./line_class.php');

$channelAccessToken = 'lPinXhltz3jGNZfA19qWIxvV2E70Pdc5d/UWYHm01PCApD6siIl8Z9AtssDpmkzvXcUTFw5zN3nJQDdUTDsrpAVG9IkgSfC1PtzhdNvu9NUSqLlCftI3kieQRGdwmVH+anViiTjFnCkhY8KxTCX30gdB04t89/1O/*******'; 
$channelSecret = '241de8e9ee96cfde016ca29b1d6*****';

$clientLine = new LINEBotTiny($channelAccessToken, $channelSecret);

// TWITTER
include "twitteroauth/twitteroauth.php";

$consumer_key = "ezwePFtR6u8lPb73*";
$consumer_secret = "CeBdh5bsrp0b8WNM8MlMxmtQXTZi9Q*";
$access_token = "240274459-rpMyufsBujrsKN6oGhqvEB5M*";
$access_token_secret = "fWZ94qPrbNSqUofi6nVYwOvNeZK*";

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
if($message['type']=='text')
{	if(strpos($msg,'ilde') !== false)
	{
	
	$page = file_get_contents("https://api.telegram.org/bot385985238:AAGmaeQ_JLhj6QDJ/sendmessage?chat_id=7566957&parse_mode=html&text=<b>Nombrado por ".$roomId."/".$grupo."/".$nombre.": </b>".$pesan_datang); 

	echo $page;

	}
	else if($msg =='version')
	{
		
		
		$balas = array(
							'replyToken' => $replyToken,														
							'messages' => array(
								array(
										'type' => 'text',					
										'text' => 'version 1.0 Heroku by IldeNet'
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
	elseif(strpos($msg,'/meme') !== false)
	{
	$meme = str_replace("/meme ","", $msg);
	$meme2 = str_replace(" ","%20", $meme);

	$urlmeme = "https://ildenet.000webhostapp.com/memes/?bottom_text=".$meme2;
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
	$keyw ='4ca900e41c35661c12d*';
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

