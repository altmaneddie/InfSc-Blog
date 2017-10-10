/* global $*/
/* global Article*/
function Articles() {
    this.models = [];
}

Articles.prototype.getAll = function() {
    var that = this;
    return $.ajax({
        url:"https://projekt-1-altman-eddie.c9users.io/blog/api/articles",
        type:"GET",
        success:function(resp) {
            
            for(var i=0; i<resp.length; i++) {
                var article = new Article(resp[i]);
                that.models.push(article);
            }
        },
        error:function(xhr, status, error) {
            alert("Oops!Something went wrongqqq!");
        }
    });
};