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

   $("#player").after('<form method =\"POST\" id=\"formulaire\"name=\"formulaire\" action= \"serveur.php\"></form>');
   $('<INPUT id=\"validation\" type=\"submit\" value=\"Envoyer\"type=\"submit\" >').prependTo('#formulaire');
  //~ 
   $('<table name=\"mon_tableau_de_donnee\" id=\"mon_tableau_de_donnee\"></table>').prependTo('#formulaire');
   var i=0;

   $("#player_mediaplaypause").click(function(){
       var button = 0;
       if( i%2 == 0){
           button = 0;
       }
       else{
           button = 1;
       }
       console.log(i);
       console.log(button);
       i++;

       time = $('#player_mediacurrenttime').text().trim();

       if(button == 0){
           if (time != null){
           //**..//    
               $('<input type =text name=\"debut\" id=\"debut\" value=\"'+time+'\"></input>').prependTo('#mon_tableau_de_donnee');
                 $('#debut').wrap('<tr id =\"tab'+i+'\">');
               }
           }
       else{
           console.log('si button different de 0');
           if (time != null){
               //~ $('#debut').after($('<input type = \"button\"id=\"valider\"value=\"editer\"></input>'));
               $('#debut').after($('<input type = text name =\"subtitle\" id=\"subtitle\"></input>'));
              //**..// 
                $('#debut').after($('<input type =text name=\"fin\" id =\"fin\"value=\"'+time+'\"></input>'));
               console.log(time);
           }
       }
       
   });
   
});
