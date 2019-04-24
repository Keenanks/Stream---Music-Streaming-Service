<html>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel = "stylesheet"
    type = "text/css"
    href = "homepage.css" />
    
    <link rel = "stylesheet"
          type = "text/css"
          href = "playButton.css"/>
    
    <!--link href="https://fonts.googleapis.com/css?family=Karla" rel="stylesheet"-->
    
    <style>
        div#mp3_player
        { 
            position: fixed; 
            bottom: 0%; 
            width:100%; 
            height: ; 
            background:#F3F3F3; 
            padding: 0px;
        }
        
        div#mp3_player > div > audio
        {
            width:100%; 
            background:#F3F3F3; 
            float:left; 
            height: 30px; 
            padding: 0px;
        }
        
        
        div#mp3_player > canvas
        { 
            width:100%; 
            height:30px; 
            background-color: #F3F3F3; 
            float:left; 
            padding: 0px;
        }
        
        body{
	background-color: dimgray;
	overflow-y: scroll;
}
    </style>
    
<script src="SongPage_Script.js"></script>
<script>

   /* 
function pauseSong()
    {
        if(!pausedSong())
            {
                audio.pause()
                sessionStorage.setItem('timeStamp',audio.currentTime);
            }
    }
    */
var audio = new Audio();
         var receiveCookie = localStorage.getItem('lastPlayed');
         if( receiveCookie != null && sessionStorage.getItem('song') == null)
             {
                 audio.src = receiveCookie;
                 audio.currentTime = localStorage.getItem('timeStamp');
                 audio.load();
                 //audio.play();
             }
         else if(sessionStorage.getItem('song')!= null)
             {
                 audio.src = sessionStorage.getItem('song');
                 audio.currentTime = sessionStorage.getItem('timeStamp');
                 audio.load();
                 if( sessionStorage.getItem('status')=='playing')
                     {
                         audio.play();
                     }
                 else
                     {
                         audio.pause();
                     }
                 /*
                 
                 
                 ///////////////////////////////////////////////////////////////
                                    WE WILL PROBABLY NEED TO IMPLEMENT
                                    A UNIQUE AUDIO BAR INSTEAD OF THE
                                    BROWSERS DEFAULT AUDIO BAR
                 ///////////////////////////////////////////////////////////////
                 if(sessionStorage.getItem('checkPlaying') == 'true')
                     {
                         audio.play();
                     }
                 else
                     {
                         audio.pause();
                     }
                     */
             }
    
        else
            {
                audio.src = "";
            }
    
         
         //audio.load();
         audio.controls = true;
         audio.loop = false;
         audio.autoplay = false;
         audio.volume = .08;
    //    }
    

    
    // Establish all variables that your Analyser will use
var canvas, ctx, source, context, analyser, fbc_array, bars, bar_x, bar_width, bar_height;
// Initialize the MP3 player after the page loads all of its HTML into the window
window.addEventListener("load", initMp3Player, false);
function initMp3Player(){
	document.getElementById('audio_box').appendChild(audio);
	context = new AudioContext(); // AudioContext object instance
    //context.resume();
	analyser = context.createAnalyser(); // AnalyserNode method
	canvas = document.getElementById('analyser_render');
	ctx = canvas.getContext('2d');
	// Re-route audio playback into the processing graph of the AudioContext
	source = context.createMediaElementSource(audio); 
	source.connect(analyser);
	analyser.connect(context.destination);
	frameLooper();
}
// frameLooper() animates any style of graphics you wish to the audio frequency
// Looping at the default frame rate that the browser provides(approx. 60 FPS)
function frameLooper(){
	window.requestAnimationFrame(frameLooper);
	fbc_array = new Uint8Array(analyser.frequencyBinCount);
	analyser.getByteFrequencyData(fbc_array);
    canvas.backgroundColor = 'white';
	ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear the canvas
	ctx.fillStyle = "cadetblue"; // Color of the bars
	bars = 300;
	for (var i = 0; i < bars; i++) {
		bar_x = i * 3;
		bar_width = 2;
		bar_height = -(fbc_array[i] / 2 );
		//  fillRect( x, y, width, height ) // Explanation of the parameters below
		ctx.fillRect(bar_x, canvas.height, bar_width, bar_height);
	}
}
    
    
    
    </script>
    
    <body>
    
    <!-- for now we will place the div here that contains the audio bar, but we should make it
     so that the bar stays and continues to play while navigating the website
-->
    <div id="mp3_player" style="background-color: #F3F3F3;">
  <div id="audio_box"></div><br>
  <canvas id="analyser_render"></canvas>
    </div>
    
    
    
    </body>
    
</html>