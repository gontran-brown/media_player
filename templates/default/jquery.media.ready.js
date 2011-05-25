$(document).ready(function() {
    
    var $this = $("#player");
    $this.mediaplayer({
        //~ showPlaylist:false,
        file:"../videos/5_SG.flv",
        image:"videos/urbilog.png",
        prefix:"player_",
        ids: {
            loading:"#player_mediaplayerloading",
            player:"#player_mediaplayer",
            titleBar:"#player_mediatitlebar",
            node:"#player_medianode",
            currentTime:"#player_mediacurrenttime",
            totalTime:"#player_mediatotaltime",
            playPause:"#player_mediaplaypause",
            seekUpdate:"#player_mediaseekupdate",
            seekProgress:"#player_mediaseekprogress",
            seekBar:"#player_mediaseekbar",
            seekHandle:"#player_mediaseekhandle",
            volumeUpdate:"#player_mediavolumeupdate",
            volumeBar:"#player_mediavolumebar",
            volumeHandle:"#player_mediavolumehandle",
            mute:"#player_mediamute",
            busy:"#player_mediabusy",
            preview:"#player_mediapreview",
            play:"#player_mediaplay",
            media:"#player_mediadisplay",
            control:"#player_mediacontrol",
            mediaRegion:"#player_mediaregion"
        }
    });
        
    var i=0;
    var line=1;
    var currentTime=0;
    $this.find("#player_mediaplaypause").click(function(){
        var $form_subtitle = $this.next("form#subtitle");
        if ($form_subtitle.length == 0){
            var $help = $this.next("div.help");
            if ($help.length > 0){
                $help.remove();
            }
            $this.after('<form id="subtitle" method ="POST" action="generate_xml.php" enctype="multipart/form-data"><input type="text" name="filename" value="mes_soustitres"></input><input  value="Envoyer" type="submit"></form>');
            $form_subtitle = $this.next("form#subtitle");
        }
        var button = i%2;
        i++;
        currentTime = $this.find("#player_mediacurrenttime").text().trim();
        //console.log("bouton:"+button+";temps:"+currentTime);
        $form_subtitle_table = $form_subtitle.find("table tbody");
        if(button == 0){
            if (($form_subtitle_table.length == 0) && (currentTime != null)){
                $form_subtitle.prepend('<table><thead><tr><th>Temps début :</th><th>Temps fin :</th><th>Sous titre :</th></tr></thead><tbody><tr><td><input type="text" name="debut'+line+'" value="'+currentTime+'"></input></td><td></td><td></td></tr></tbody></table>');
            }
            else {
                $form_subtitle_table.prepend('<tr><td><input type="text" name="debut'+line+'" value="'+currentTime+'"></input></td><td></td><td></td></tr>');
            }
        }
        else{
            if (currentTime != null){
                if ($form_subtitle_table.length > 0){
                    $form_subtitle_table.find("tr:first-child td:empty:first").append('<input type="text" name="fin'+line+'" value="'+currentTime+'"></input>');
                    $form_subtitle_table.find("tr:first-child td:empty:first").append('<input type="text" name="subtitle'+line+'"></input>');
                    line++;
                }
            }
        }
    });
    //~fin du $this.find("#player_mediaplaypause").click(function()
    
    var $media = $this.find("#player_mediatitlebar");
	$media.find("#player_mediamaxbutton").click(function(){
		console.log("open playlist");
		 $(this).attr("href","file://");
		 //~ $(this).attr("href");
		  //~ $(this).attr("file://");
		 //~ $(this).attr("href","/var/www/html/soumia/osmplayer/videos/");
		 //~ $(this).attr("href ='/var/www/html/soumia/osmplayer/videos/'");
		});
		//~ Function(){ $(this).attr( ton element ) }
		//~ var button = i%2;
        //~ i++;
		//~ alert('jai clické sur la touche menu');
		//~ if(button == 0){ 
		    //~ ;
		    //~ 
		    //~ var pop=window.open("pop.htm");
		      //~ <a href="file://c:/">C:</a>
			//~ var $playlist = $media.append('<div id="player_mediaplaylist"> </div>');
			//~ 
			//~ $playlist.prepend('<div id="player_mediascrollwrapper"></div>');
			//~ 
			//~ $playlist.prepend('<div id="player_mediapager" class ="player_ui-widget-header player_ui-corner-bottom"></div>');
	//~ 
	//~ $('<div id="player_mediabusy" class="player_ui-state-default player_ui-state-disabled">'+'<img src="templates/default/images/busy.gif" />'+'</div>').prependTo("#player_mediascrollwrapper");
//~ 
	//~ $("#player_mediascrollwrapper").append('<div id="player_mediascroll" class="player_ui-helper-clearfix"></dic>');
	//~ $('<div id="player_mediascrollbarwrapper"></div>').prependTo.("#player_mediascroll");
	//~ $("#player_mediascroll").append('<div id="player_medialistmask">');
	//~ 
	//~ $('<div id="player_mediascrollup" class="player_ui-state-default">'+'<span class="player_ui-icon player_ui-icon-triangle-1-n"></span>'+'</div>').prependTo.("#player_mediascrollbarwrapper");
	//~ 
    //~ $("#player_mediascrollbarwrapper").append('<div id="player_mediascrollbar"></div>');
    //~ $("#player_mediascrollbarwrapper").append('<div id="player_mediascrolldown" class="player_ui-state-default"><span class="player_ui-icon player_ui-icon-triangle-1-s"></span></div>');
    //~ 
     //~ $('<div id="player_mediascrolltrack" class="player_ui-widget-content"><div id="player_mediascrollhandle" class="player_ui-state-default"><span class="player_ui-icon player_ui-icon-grip-dotted-horizontal"></span></div></div>').prependTo("#player_mediascrollbar");         
   //~ 
    //~ $('<div id="player_mediateaser" class="player_ui-state-default"><div id="player_mediaimage" class="player_mediafield player_ui-widget-content" type="image" field="thumbnail"></div>'+
    //~ '<div id="player_mediatitle" class="player_mediafield player_ui-helper-clearfix" type="text" field="title">Sample Title</div></div>').prependTo("#player_medialistmask");      
       //~ 
    //~ $('<div id="player_mediapagerleft"></div>').prependTo("#player_mediapager");  
    //~ $("#player_mediapager").append('<div id="player_mediapagerright">'); 
    //~ 
    //~ $("#player_mediapagerleft").append('<div id="player_mediaprevpage" class="player_mediapagerlink player_ui-state-default player_ui-corner-all">'+
    //~ '<span class="player_ui-icon player_ui-icon-seek-prev"></span></div>'+
    //~ '<div id="player_medialoadprev" class="player_mediapagerlink player_ui-state-default player_ui-corner-all"><span class="ui-icon ui-icon-triangle-1-w"></span></div>'+
    //~ '<div id="player_mediaprev" class="player_mediapagerlink player_ui-state-default player_ui-corner-all"><span class="player_ui-icon player_ui-icon-carat-1-w"></span></div>');
    //~ 
    //~ $("#player_mediapagerright").append('div id="player_medianext" class=player_mediapagerlink player_ui-state-default player_ui-corner-all"><span class="player_ui-icon player_ui-icon-carat-1-e"></span>'+
    //~ '</div><div id="player_medialoadnext" class="player_mediapagerlink player_ui-state-default player_ui-corner-all"><span class="player_ui-icon player_ui-icon-triangle-1-e"></span></div>'+
    //~ '<div id="player_medianextpage" class="player_mediapagerlink player_ui-state-defaultplayer_ ui-corner-all"><span class="player_ui-icon player_ui-icon-seek-next"></span></div>');
            //~ 
		//~ }//fin du  if(button == 0)
		//~ else{
			//~ console.log("close playlist");
		//~ }      
      //~ });
      //~ fin du $media.find("#player_mediamaxbutton").click(function()
});
//~ fin du $(document).ready(function()
