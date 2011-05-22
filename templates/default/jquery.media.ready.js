<<<<<<< HEAD
var time = $("#player_mediacurrenttime").text().trim();

   $(document).ready(function() {
                               var player = $("#player").mediaplayer({
                                       showPlaylist:false,
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
   
   $("#player_loading").hide();
=======
$(document).ready(function() {
	//~ var content = $('#mon_tableau_de_donnee');

	 //~  function submitForm(){
		 //~ var xml;
		 //~ try{
			 //~ xml = new ActiveXObject('Msxml2.XMLHTTP');
		 //~ }
		 //~ catch (e){
			 //~ try{
				 //~ xml = new ActiveXObject('Microsoft.XMLHTTP');
		    //~ }
			//~ catch (e2){
				//~ try {  xhr = new XMLHttpRequest();
				//~ }
				//~ catch (e3){
					//~ xhr = false;
				//~ }
			//~ }
			//~ }
			//~
			//~ xml.onreadystatechange  = function(){
				//~ if(xml.readyState  == 4){
					//~ if(xml.status  == 200)
					  //~ document.formulaire.mon_tableau_de_donnee="Received:"  + xml.responseText;
					//~ else
					   //~ document.formulaire.mon_tableau_de_donnee="Error code " + xml.status;
			   //~ }
		//~ };
	//~
	   //~ xml.open( "GET", "trad.xml",true);
	   //~ consol.log(content);
	   //~ //xml.send(content);
	   //~ xml.send(null);
	   //~
	   //~ var file = $.ajax({
		   //~ target : '#mon_tableau_de_donnee',
		   //~ url : 'minima.html',
			//~ async :false
		//~ }).responseText;
		//~ consol.log(file);
//~ }

    var $this = $("#player");
    $this.mediaplayer({
        showPlaylist:false,
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

    $this.find("#player_loading").hide();
>>>>>>> 21d46181a7ecc16fefec1754e8109c2ef24a39c6

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
            $this.after('<form id="subtitle" method ="POST" action="generate_xml.php" enctype="multipart/form-data"><input type="hidden" name="filename" value="mes_soustitres"></input><input type="submit" value="Envoyer" type="submit"></form>');
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
});
