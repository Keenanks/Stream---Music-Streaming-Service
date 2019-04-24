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

    function createLocalSession(name,value)
        {
            localStorage.setItem(name, value);
        }

    function updateLocalSession(name,value)
        {
            localStorage.removeItem(name);
            createLocalSession( name, value);
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
            endSource = './songs/' + info[0]+ ".mp3";
            
            endSourceComparison = endSource.split('/');
        
            comparedSource = audio.src.split('/');
            //window.alert(comparedSource);
            createSession('timeStamp',audio.currentTime);
            if(checkIfSameSongIsBeingPlayed(comparedSource,endSourceComparison))
                {
                    if(audio.paused)
                        {
                            audio.play();
                            updateSession('checkPlaying',true);
                            
                        }
                    else
                        {
                            audio.pause();
                            updateSession('timeStamp',audio.currentTime);
                            updateSession('checkPlaying',false);
                            
                        }
                    //audio.pause();
                }
            
            else
                {
                 audio.src = endSource;
                 createSession('song',endSource);
                 updateCookie( 'lastPlayed', endSource, 30);
                 updateLocalSession('lastPlayed',endSource);
                 audio.load();
                 audio.play();
                 createSession('checkPlaying', true);
                }
            
            //starMusic(endSource);
        }
        
        
    function checkIfSameSongIsBeingPlayed(array,array2)
        {
            if(checkEndValOfArray(array) == checkEndValOfArray(array2))
                {
                    return true;
                }
            return false;
        }

    function checkEndValOfArray(array)
       {
        var iter = 0;
        var result;
        for( iter = 0; iter<array.length; iter++)
            {
                result = array[iter];
            }
        return result;
       }
        
    function updateCurrentTimeWhilePlaying()
        {
                   
         updateSession('timeStamp',audio.played.end);
                                    
            
        }


/*
FUNCTION that creates a cookie with the name, the value the cookie holds,
and amount of time it exists before it expires

@PARAMS
name: name of cookie
value: the information the cookie holds
expiration: the amount of days the cookie exists
*/
function createCookie(name,value,expiration)
   {
    //TODO
    var days = new Date();
    days.setTime( days.getTime() + calcTime( expiration ) );
    
    var expireTime;
    expireTime = "expires=" + days.toUTCString();
       
    document.cookie = name + '=' + value + ';' + expireTime + ';path=/';
   }

/*
FUNCTION updates a cookies by overwritin the cookie with the same name.
*/
function updateCookie(name,value,expiration)
   {
    createCookie( name, value, expiration);
   }

/*
FUNCTION calculates the total time in miliseconds

@PARAMS
time: the amount of days the cookies should exist
*/
function calcTime(time)
   {
    var hoursInDay, minutesInHour, secondsInMin, miliSecsInSeconds;
    hoursInDay = 24;
    minutesInHour = 60;
    secondsInMin = 60;
    miliSecsInSeconds = 1000;
       
    var singleDayTime;
    singleDayTime = hoursInDay * minutesInHour * secondsInMin * miliSecsInSeconds;
    
    var totalTime;
    totalTime = time * singleDayTime;
       
    if ( time < 1 )
       {
        return singleDayTime;
       }
       
    return totalTime;
   }

/*
FUNCTION that gets the cookie with the provided name
*/
function getCookie(name)
   {
    //TODO
    var cookieName = name + '=';
       
    var cookieDecoded = decodeURIComponent( document.cookie );
       
    var cookieSplit = cookieDecoded.split( ';' );
       
    var iterator;
    
    for( iterator = 0; iterator < cookieSplit.length; iterator++ )
       {
        var tempCook = cookieSplit[iterator];
        
        while( tempCook.charAt( 0 ) == ' ')
            {
                tempCook = tempCook.substring( 1 );
            }
        if ( tempCook.indexOf( cookieName ) == 0 )
            {
             return tempCook.substring( cookieName.length, tempCook.length );
            }
       }
       
       return "";
   }

/*
FUNCTION that deletes the cookie with the provided name
*/
function deleteCookie(name)
   {
    document.cookie = name + '=; expires = Mon, 01 Jan 1900 00:00:00 UTC; path=/;';
   }