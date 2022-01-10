var img_ready = false;

var user;

var points;

var cost;

var img = new Image();

img.src = "components/roata-completa.jpg";

img.onload = function(){img_ready=true};

function go_load(){

if (img_ready)

{

$("#roata").css("background","url("+img.src+")");

$("#roata").css("background-position","0px 0px");

setTimeout(function(){$("#preload").fadeOut();},500);

clearInterval(inter);

}

}

var started = false;

var i=0;

var j=0;

var size = 800;

var speed = 100;

var number;

var number2;

var invarte;

var time;

var split;

function fromTo(id1,id2)

{

	$("#"+id1).fadeOut();

	$("#"+id2).delay(500).fadeIn();

}

function start()

{	

	var req = $.ajax ({

		url:"ajax/server.php",

		type:"POST",

		data:{gen:1}

	});

	req.done(function(msg){

		split=msg.split(" | ");

		number = split[0];

		number = parseInt(number);

		number2 = split[1];



		if (points-cost>=0)

		{



			

			var request;

					request = $.ajax({

					url:"ajax/server.php",

					type:"POST",

					data:{p:1,username:user}

				});

			points = points - cost;

			$("#jcoins").text(points);



		$("#roata").css("background-position","0px 0px");

		$("#start").fadeOut();



	setTimeout(function(){

		//number = Math.floor(Math.random() * 16) + 1;

	if (!started)

	{

		

		started=true;

		$("#roata").css("background-position","-"+size+"px 0px");

			i++;

			j++;

		invarte = setInterval(spin,speed); ;

	}

	

	},600);



		}

		else

		{

			$("#content").html("<p>Nu detii 150 Jetoane Dragon</p> <br><br><button onclick='$(\"#won\").fadeOut()' class='confirm'>Continua</button>");

			$("#won").fadeIn();

		}

	



	});

	





}

function spin (){

	size = 800 * j;

	if (i<(17*3)+number-2)

			{

				if (i>17*3)

				{

				

				time = setTimeout(function(){

						if (speed < 400)

						speed+=50;

				},200);

				

					clearInterval(invarte);

					invarte = setInterval(spin,speed);

				}



			$("#roata").css("background-position","-"+size+"px 0px");



		

				if (j<16)

				j++;

				else

				j=1;

			i++;



			}

			else

			{

				clearTimeout(time);

				clearInterval(invarte);



				speed=100;

				i=0;

				j=0;

				size = 800;

				started=false;

				var request;

					request = $.ajax({

					url:"ajax/server.php",

					type:"POST",

					data:{item:number2,user:user}

				});

					$("#content").html("<br><br> Loading ...");

				request.done(function(msg){

					$("#content").html("");

					$("#content").html(msg);

					if (msg.search("jcoins") != -1)

					{

						var total = parseInt(points)+parseInt(cost);

						points = total;

						$("#jcoins").text(total);

					}

				});

				$("#won").fadeIn();

				

				$("#start").fadeIn();



			}



}



var inter = setInterval(go_load,1);