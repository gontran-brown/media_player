$(document).ready(function() {
	
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
            $this.after('<form id="subtitle" method ="POST" action="generate_xml.php" enctype="multipart/form-data"><input type="hidden" name="filename" value="mes_soustitres"></input><input type="submit" value="Envoyer"></form>');
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
                //dans la ligne du <tr><td id = debut> chercher si existe une <td id fin>
                //si non en creer un si oui passer au td suivant id = subtitle
                    $form_subtitle_table.find("tr:first-child td:empty:first").append('<input type="text" name="fin'+line+'" value="'+currentTime+'"></input>');
                    $form_subtitle_table.find("tr:first-child td:empty:first").append('<input type="text" name="subtitle'+line+'"></input>');
                    line++;
                }
            }
        }
    });
});
