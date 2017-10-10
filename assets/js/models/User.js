function User(options){
    this.username = options.username;
    this.password = options.password;
}

User.prototype.login = function(){
    var userDataStr = JSON.stringify({
        username:this.username,
        password:this.password
    });
    localStorage.setItem("user_session",userDataStr);
}

User.prototype.logout= function(){
}