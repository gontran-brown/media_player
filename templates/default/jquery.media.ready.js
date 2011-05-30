$(document).ready(function() {

    var $this = $("#playerP");
    $this.mediaplayer({
        playlist: "playlist.xml",
        showPlaylist:true,
        ids: {
            titleLinks:"#mediatitlelinks",
            listMask:"#medialistmask",
            list:"#medialist",
            scrollWrapper:"#mediascrollbarwrapper",
            scrollBar:"#mediascrollbar",
            scrollTrack:"#mediascrolltrack",
            scrollHandle:"#mediascrollhandle",
            scrollUp:"#mediascrollup",
            scrollDown:"#mediascrolldown",
            linkText:"#medialinktext",
            pager:"#mediapager",
            scroll:"#mediascroll",
            busy:"#mediabusy",
            links:"#medialinks",
            loading:"#playerloading",
            player:"#player",
            menu:"#mediamenu",
            titleBar:"#mediatitlebar",
            node:"#medianode",
            playlist:"#mediaplaylist",
            control:"#mediacontrol",
            prev:"#mediaprev",
            next:"#medianext",
            loadPrev:"#medialoadprev",
            loadNext:"#medialoadnext",
            prevPage:"#mediaprevpage",
            nextPage:"#medianextpage",
            voter:"#mediavoter",
            uservoter:"#mediauservoter",
            mediaRegion:"#mediaregion",
            field:".mediafield",
            busy:"#mediabusy",
            preview:"#mediapreview",
            play:"#mediaplay",
            media:"#mediadisplay",
            close:"#mediamenuclose",
            embed:"#mediaembed",
            elink:"#mediaelink",
            email:"#mediaemail",
            linkScroll:"#medialinkscroll",
            currentTime:"#mediacurrenttime",
            totalTime:"#mediatotaltime",
            playPause:"#mediaplaypause",
            seekUpdate:"#mediaseekupdate",
            seekProgress:"#mediaseekprogress",
            seekBar:"#mediaseekbar",
            seekHandle:"#mediaseekhandle",
            volumeUpdate:"#mediavolumeupdate",
            volumeBar:"#mediavolumebar",
            volumeHandle:"#mediavolumehandle",
            mute:"#mediamute"
        }
     });
     
	$(window).load(function(){
		//~ var $this = $("#playerP");
		var i=0;
		var line=1;
		var currentTime=0;
		var event = jQuery.Event("logged");
		console.log(event);
		 event =		 $this.find("#mediaplaypause").click(function(){
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
				if(($form_subtitle_table.length == 0) && (currentTime != null)){
					$form_subtitle.prepend('<table><thead><tr><th>Temps début :</th><th>Temps fin :</th><th>Sous titre :</th></tr></thead><tbody><tr><td><input type="text" name="debut'+line+'" value="'+currentTime+'"></input></td><td></td><td></td></tr></tbody></table>');
				}
				else{
					$form_subtitle_table.prepend('<tr><td><input type="text" name="debut'+line+'" value="'+currentTime+'"></input></td><td></td><td></td></tr>');
				}
			}
			else{
				if(currentTime != null){
			;		if($form_subtitle_table.length > 0){
						$form_subtitle_table.find("tr:first-child td:empty:first").append('<input type="text" name="fin'+line+'" value="'+currentTime+'"></input>');
						$form_subtitle_table.find("tr:first-child td:empty:first").append('<input type="text" name="subtitle'+line+'"></input>');
						line++;
					}
				}
			}
		});  
console.log(event);
	//~ var event = $("#medialist").find("#mediaplaypause");
  //your code here
		console.log($("#medialist").find("> div"));
		alert("it's ok");
		$this.find("#medialist").find("> div").click(function(){	
			alert("je viens de cliquer sur une video");			
		}).trigger(event);
	});
});
