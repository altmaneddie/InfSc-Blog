window.addEventListener("load",function(){
    //we need to make sure HTML is loaded , as View component needs to search/update HTML
    var logOutBtnElem = document.getElementById("logout-btn");
    var loginFormElem = document.getElementById("login-form");
    var h1Elem =document.getElementById("welcome-msg");
    
    var loginBtn = document.getElementById("login-btn");
        loginBtn.addEventListener("click",function(){
            var userName = document.getElementById("user_name").value;
            var userPass = document.getElementById("user_password").value;
            
            var user = new User({
                username:userName,
                password:userPass
            });
            user.login();
            displayLoggedInView(user);
        });
    
    function displayLoggedInView(user){
        h1Elem.innerHTML = "Welcome, "+user.username;
        
        loginFormElem.classList.add("hide");
        logOutBtnElem.classList.remove("hide");
        logOutBtnElem.classList.add("show");
        
        window.location.href = "https://projekt-1-altman-eddie.c9users.io/blog/assets/templates/articles.html"
    }
});