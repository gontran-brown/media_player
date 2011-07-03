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
		var fichier ;
		var valeur ;
        var i=0;
        var line=1;
        var currentTime=0;
           
        $this.find("#mediaplaypause").click(function(){
			
			//~ console.log();
            var $form_subtitle = $this.find("form#subtitle");
            if($form_subtitle.length == 0){
                var $help = $this.next("div.help");
                if ($help.length > 0){
                    $help.remove();
                }
                console.log(valeur);
                $("form#subtitle").append('<input type="hidden" name="filename" value="'+valeur+'"></input>');
                            //~ '<input  value="Envoyer" type="submit">
                //~ $this.after('<form id="subtitle" method ="POST" action="generate_xml.php" enctype="multipart/form-data">'+
                            //~ '<input type="hidden" name="filename" value="'+valeur+'"></input>'+
                            //~ '<input  value="Envoyer" type="submit"></form>');
                 $form_subtitle = $this.next("form#subtitle");
            }
            var button = i%2;
            i++;
            currentTime = $this.find("#mediacurrenttime").text().trim();
            //console.log("bouton:"+button+";temps:"+currentTime);
            $form_subtitle_table = $form_subtitle.find("table tbody");
            if(button == 0){
                if(($form_subtitle_table.length == 0) && (currentTime != null)){
                    $("form#subtitle> table > thead").after('<tbody><tr><td><input type="text" name="debut'+line+'" value="'+currentTime+'"></input></td><td></td><td></td></tr></tbody>');
                }
                else{
                    $form_subtitle_table.prepend('<tr><td><input type="text" name="debut'+line+'" value="'+currentTime+'"></input></td><td></td><td></td></tr>');
                }
            }
            else{
                if(currentTime != null){
                    		if($form_subtitle_table.length > 0){
                        $form_subtitle_table.find("tr:first-child td:empty:first").append('<input type="text" name="fin'+line+'" value="'+currentTime+'"></input>');
                        $form_subtitle_table.find("tr:first-child td:empty:first").append('<input type="text" name="subtitle'+line+'"></input>');
                        line++;
                    }
                }
            }
        });
        
       alert("it's ok");
       
       $this.find("#medialist > div").click(function(){
			var $form_subtitle = $this.next("form#subtitle");
			$("form#subtitle > table").remove();
			$form_subtitle.prepend('<table><thead><tr><th>Temps début :</th><th>Temps fin :</th><th>Sous titre :</th></tr></thead><tbody></tbody></table>');
										
				$.ajax({
					async : false,
					url : "upload.php",
					type: "POST",
					data: "title="+$(this).find("#mediatitle").text().trim(),
					success: function(data){valeur = data;}
				});
				
				//console.log(valeur);
				var dom ;
				 $.ajax({
					async : false,
					url : "load.php",
					type: "POST",
					data: "valeur="+valeur,
					success:function(data){
						 dom = data;
						$("form#subtitle > table > tbody").append(dom);
					}
				});
			//$("form#subtitle > table > tbody").replaceWith(dom);
			});
			
		$this.find("#mediaplay").unbind('click');
    });
});
