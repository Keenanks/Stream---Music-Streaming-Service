var endSource;
    // get song info from button selected
    function getSongInfo(thisElement)
       {
        
        //splits string content into an array to parse
        var songStrInfo = document.getElementById(thisElement).innerHTML.split(" ");
           
        // gets the first element which should be the song
        var song = songStrInfo[0];
           
        // gets the third element which should be the artist
        var artist = songStrInfo[2];
           
        var string = song + ' ' + artist;
        
    
            collectSongSource(string);
           
        //document.getElementById(thisElement).innerHTML = artist;
        //document.getElementById(elementId).innerHTML="test";
        //var songTitle = document.getElementById(element);
       }
        
    function createSession(name, value)
        {
            sessionStorage.setItem(name, value)
        }
        
    function updateSession(name, value)
        {
            sessionStorage.removeItem(name);
            createSession(name,value);
        }
        
    function collectSongSource(str)
        {
            var info = str.split(" ");
            //createSession('timeStamp',audio.currentTime);
            endSource = info[0]+ ".mp3";
            comparedSource = audio.src.split("/");
            //window.alert(comparedSource);
            createSession('timeStamp',audio.currentTime);
            if(checkIfSameSongIsBeingPlayed(comparedSource,endSource))
                {
                    if(audio.paused)
                        {
                            audio.play();
                            
                        }
                    else
                        {
                            audio.pause();
                            updateSession('timeStamp',audio.currentTime);
                            
                        }
                    //audio.pause();
                }
            
            else
                {
                 audio.src = endSource;
                 createSession('song',endSource);
                 audio.load();
                 audio.play();
                 
                }
            
            //starMusic(endSource);
        }
        
        
    function checkIfSameSongIsBeingPlayed(array,string)
        {
            var iter;
            for( iter = 0; iter < array.length; iter++)
                {
                    if(array[iter] == string)
                        {
                            return true;
                        }
                }
            return false;
        }
        
    function updateCurrentTimeWhilePlaying()
        {
                   
         updateSession('timeStamp',audio.played.end);
                                    
            
        }