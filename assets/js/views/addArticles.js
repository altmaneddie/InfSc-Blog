/* global $*/
$(document).ready(onHtmlLoaded);

function onHtmlLoaded() {
    var articleForm = $("#create_article");
    articleForm.on("submit",function(ev){
        //this will prevent the page to reload when 
        //user clicks submit button
        ev.preventDefault();
        
        //extract input data
        var titleText = $("input[name='title']").val();
        var contentText = $("input[name='content']").val();
        var articleImgElem = $("input[name='article_img']");
        
        var files = articleImgElem[0].files;
        var articleImg = files[0];
        
        //prepare the form data to be sent to server
        var formData = new FormData();
        formData.append("title",titleText);
        formData.append("content",contentText);
        formData.append("file",articleImg);
        
        var article = new Article({
            title:titleText,
            content:contentText,
            image:articleImg
        })
        article.add(formData);
    });
}