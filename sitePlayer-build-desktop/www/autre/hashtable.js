/**
 * @file
 * area.js.
 */
var HashTable = Class.extend({

    m_keys : null,
    m_hash : null,
    
    /**
     * Classe désignant une zone
     * @ctor
     * Constructor.
     * Le constructeur initialise une zone de parcours
     * @tparam String id L'identifiant de la zone
     */
    init: function()
       {
	   this.m_keys =  new Array();
	   this.m_hash = new Object();
       },

    set: function(key, value) 
       {
	   if (typeof(this.m_hash[key]) == "undefined") 
	       this.m_keys.push(key); 
	   this.m_hash[key] = value;
       },

    value: function(key) 
       {
	   return this.m_hash[key];
       },

    keys: function()
       {
	   return this.m_keys;
       },
    
    getSortedKeys : function() 
       {
	   this.m_keys.sort();
	   return this.m_keys;
       },

    values: function() 
       {
	   var a = new Array();
	   for(var b in this.m_hash)
	       a.push(this.m_hash[b]);
	   
	   return a;
       }, 

    remove: function(key)
       {
	   delete this.m_hash[key];
       },

    clear: function()
       {
	   for (var i in this.m_keys) 
	       delete this.m_keys[i];

	   this.m_keys =  new Array();
	   this.m_hash = new Object();
       },

    size: function()
       {
	   return this.m_keys.length;
       }
});