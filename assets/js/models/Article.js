/* global $ */
/* global data */

function Article(options) {
    this.id = options.id;
    this.title = options.title;
    this.creator = options.creator;
    this.content = options.content;
    this.created_at = options.created_at;
    this.image = options.image;
}

Article.prototype.add = function(){
    //ajax request to save article 
    $.ajax({
   
   url: "https://altman_eddie/projekt_1.c9users.io/blog/api/articles/add",
   data : {
    title: this.title,
    creator: this.creator,
    content: this.content,
    image: this.image
},
   type: "POST",
   dataType : "json",
   success: function( json ) {
       console.log("yeeey");
   },
   
   error: function( xhr, status, errorThrown ) {
    //   console.warn(jqxhr.responseText)
       alert( "Sorry, there was a problem!" );
       console.log( "Error: " + errorThrown );
       console.log( "Status: " + status );
              console.dir( xhr );
   },
   complete: function( xhr, status ) {
       alert( "The request is complete!" );
   }
});
};