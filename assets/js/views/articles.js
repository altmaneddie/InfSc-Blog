/* global $*/
/* global Articles*/

function checkSession() {
    $.ajax({
        url:"https://projekt-1-altman-eddie.c9users.io/blog/api/login/check-session",
        type:"GET",
        success:function(resp) {
            if (resp.logged ==  false)
            window.location = "login.html";
        },
        error:function(xhr, status, error) {
            alert("Oops!Something went wrong!");
        }
    });
}

checkSession();    

$(document).ready(onHtmlLoaded);

function onHtmlLoaded() {
    
    var articlesContainer = $("#articles"),
        paginationContainer = $("#pagination");
        
    var articles = new Articles();
    //this will populate the models property on articles variable
    var articleXHR = articles.getAll();
    articleXHR.done(function(){
        for(var i=0;i<articles.models.length; i++) {
            var articleElem = $("<li atricle-id="+articles.models[i].id+">"+articles.models[i].title+"</li>");
            articlesContainer.append(articleElem);
            articleElem.on("click", onArticleClicked);
        }
        
        var pagination = '';
        for(var i=1; i <= articles.nrPage; i++) {
            pagination += '<li>' + i + '</li>';       
        }
        paginationContainer.html(pagination);
    });
}

function onArticleClicked() {
    var articleId = $(this).attr("atricle-id");
    window.location.href = "https://projekt-1-altman-eddie.c9users.io/blog/assets/templates/article.html?id="+articleId;
}
