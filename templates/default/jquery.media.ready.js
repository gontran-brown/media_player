$(document).ready(function() {

    var $this = $("#player");
    $this.mediaplayer({
			  playlist: "playlist.xml",
        //~ showPlaylist:false,
        //file:"../videos/5_SG.flv",
        //image:"videos/urbilog.png",
        //prefix:"player_",
    });

    var i=0;
    var line=1;
    var currentTime=0;
    $this.find("#mediaplaypause").click(function(){
        var $form_subtitle = $this.next("form#subtitle");
        if ($form_subtitle.length == 0){
            var $help = $this.next("div.help");
            if ($help.length > 0){
                $help.remove();
            }
            $this.after('<form id="subtitle" method ="POST" action="generate_xml.php" enctype="multipart/form-data">'+
            '<input type="text" name="filename" value="mes_soustitres"></input>'+
            '<input  value="Envoyer" type="submit"></form>');
            $form_subtitle = $this.next("form#subtitle");
        }
        var button = i%2;
        i++;
        currentTime = $this.find("#mediacurrenttime").text().trim();
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

    var $media = $this.find("#mediatitlebar");
	$media.find("#mediamaxbutton").click(function(){
		console.log("open playlist");
		 var file ;
		 $this.after('<form id="upload" method ="POST" action ="upload.php" enctype="multipart/form-data">'+
		 '<input type = "hidden" name ="MAX_FILE_SIZE" value = "900000000000"/>'+
		  '<input type="file" name ="document"></input>'+
		  //~
		  //~ file = $this.find('input[name|="document"]').attr("value");
		  //~
		 //~ $("#upload").append('<input type = "hidden" name ="filename" value = "'+file+'"/>'+
		'<input type="submit" value = "Playlist"></form>');
		 		  //~ $this.mediaplayer.file = $this.find("input").attr("value"); ;

		});
		 //~ function submit(){
			 //~ console.log(file);
			 //~ $this.mediaplayer.file = $this.find('input[name|="upload"]').attr("value");
			 //~ <INPUT type="button" value="infos" onClick=javascript:popup("plan.htm") class="curs" >
			 //~ <SCRIPT language="JavaScript">
//~ function popup(page) {
//~ window.open(page,'popup','width=400,height=400,toolbar=false,scrollbars=0');
//~ }
		 //~ }


		 //~ $this.after('<form method ="post" enctype="multipart/form-data">'+
		 //~ '<input type = "hidden" name ="MAX_FILE_SIZE" value = "900000000"/><input type="file" $this.mediaplayer.file = $this.find(\'input[name|="upload"]\').attr("value") name = "document"/><input type="button" value = "Playlist" onclick = "submit()"/></form>');
		 		//~ console.log("bouton pressé");
		//~ });
		//~ function submit(){
			 //~ $this.mediaplayer.file = $this.find('input[name|="upload"]').attr("value");
			//~ alert("jai cliqué sur le submit 2");
		//~ }
});
//~ fin du $(document).ready(function()
//~ <input type ="button" calue ="info" onClick = "submit()">
