//@import(js/hashtable.js);

//var tableau = new HashTable();

var subtitle = Class.extend({
	
	time_debut: null,
	time_fin: null,
	texte: null,
	type : null,
	
	init: function(){
		this.time_debut =  new Array();
		this.time_fin =  new Object();
		this.texte = new Object();
		this.type = new Object();
		},
	
	setKey: function(debut){
		if (typeof(this.time_debut[key]) == "undefined") 
	       this.time_debut.push(key); 
	},
	
	getKey: function(){
		return this.time_debut;
	},
	
	set: function(val){
		  if(isNaN(val) == true)
			{
				alert('isNotNumber n\'est pas un nombre');
				this.texte = val;
			}
			else
			{
				alert('isNotNumber est un nombre');
				this.time_fin = val;
			}
	},
	
	toString : function(key) 
       {
	   return this.time_debut[key];
       },
	
	/*set : function(key, temps)
       {
	   if (typeof(this.time_debut[key]) == "undefined") 
	        this.time_debut.push(key); 
			this.time_fin[key] = temps;
	  },*/
	
	setvalue : function(key, temps, texte, type)
       {
	   if (typeof(this.time_debut[key]) == "undefined") 
			this.time_debut.push(key); 
			this.time_fin[key] = temps;
			this.texte[key] = texte;
		    this.type[key] = type;
       },
	
	
	getvalue : function(temps, texte, type) 
       {
	   return (this.time_fin[key] + this.texte[key]);
       },
       
	 
    getSortedKeys : function() 
       {
	   this.time_debut.sort();
	   return this.time_debut;
       },
       
       size: function()
       {
	   return this.time_debut.length;
       }
	});

window.onload = function(event){
    var m_video = document.querySelector("#video");
    var key = 0;
    var video = new HashTable(key, subtitle);
        
    document.querySelector("#btn-play").addEventListener("click",function(e){
			//var i = 0;
			alert(m_video.currentTime);
			 var time_d = m_video.currentTime;
			 
			 m_video.play();
			// ma_chaine = time_d;
			 //innerHTML.onloading();
			  //document.getElementById("debut").innerHTML += ma_chaine +'<br/>';
			time_d.subtitle.setKey();
		 },false);
                      
                     
    document.querySelector("#btn-pause").addEventListener("click",function(e){
		//var j = 0;
		  //if(!m_video.paused){
			 m_video.pause();
			 // m_video.subtitle();
			 //alert(m_video.currentTime);
			var time_f = new subtitle;
			time_f =  m_video.currentTime;
			 
			 //tab2.push(time);
		  //}
		  //ma_chaine +=time_f;
		  //document.getElementById("fin").innerHTML += ma_chaine +'<br/>';
		 time_f.subtitle.set();
		 
	  },false);

 
    document.querySelector("#btn-stop").addEventListener("click",function(e){
                                                             m_video.load();
                                                            document.getElementById("tableau_fin").subtitle.toString(); 
                                                         },false);
                                                         
 document.querySelector("#btn-cut").addEventListener("click", function(e){
	 alert('entrer une valeur');
	 (subtitle.toString()).Video.set();
	 
 },false);
 key ++;
}
// fin window.onload


