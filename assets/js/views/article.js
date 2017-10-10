/* global $*/
$(document).ready(onHtmlLoaded);

function onHtmlLoaded() {
    var articleId = getUrlParam("id");
    
    var articles = new Articles();
    var articlesXHR = articles.getAll();
    articlesXHR.done(function(){
        var currentArticle;
        for(var i=0;i<articles.models.length; i++) {
            if (articles.models[i].id === articleId) {
                currentArticle = articles.models[i];
            }
        }
        
        if (currentArticle) {
            //generate an h2 element for article title
            var titleElem = $("<h2></h2>");
            titleElem.html(currentArticle.title);
            
            //generate an article element for article content
            var contentElem = $("<article></article>");
            contentElem.html(currentArticle.content);
            
            var articleImgElem = $("<img>");
            articleImgElem.attr("src","../../uploads/"+currentArticle.image);
            
            //append the elements in container
            var container = $("#content");
            container.append(titleElem);
            container.append(contentElem);
            container.append(articleImgElem);
        }
    });
}

//util function, will return the url param for the provided key
function getUrlParam(name){
    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    if (results==null){
       return null;
    }
    else{
       return results[1] || 0;
    }
}