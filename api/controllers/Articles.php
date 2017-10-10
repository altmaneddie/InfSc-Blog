<?php
require "models/ArticlesModel.php";

class Articles {
    private $articlesModel;
    
    function __construct() {
        $this->articlesModel = new ArticlesModel();
    }
    
    function getAll() {
        $search = (!empty($_GET["search"])) ? ($_GET["search"]) : "";
        $page = (!empty($_GET["page"])) ? $_GET["page"] : 1;
        $ipp = 2;                       
        $start = $page*$ipp-$ipp;
        $count = $this->articlesModel->countArticles($search);
        $nrPages = ceil($count/$ipp);
        $articles = ["items" => $this->articlesModel->getAll($search, $start, $ipp),
                        "nrPages" => $nrPages];
        return $articles;
    }
    
    function getItem() {  
        $this->articlesModel->selectArticle($_GET['id']);
    }
    
    function addItem() {
        // echo "add";
        // var_dump($_POST);
        // var_dump($_FILES); 
        // exit;
        // GET FILES AND SAVE TO SERVER
        
        // va;idate title and content not to be  empty
        $tmpPath = $_FILES["file"]["tmp_name"];
        $filePath = "../uploads/".$_FILES["file"]["name"];
        move_uploaded_file($tmpPath, $filePath);
        // ADD FILE NAME INTO DB
        $_POST["image"] = $_FILES["file"]["name"];

        return $this->articlesModel->insertArticle($_POST);    
    }
    
       function editItem() {
        // GET PUT VALUS FROM $PUT 
        global $PUT;
        echo $PUT["test"];
    }
    
    function deleteItem() {
        // $DELETE 
        global $DELETE;
        echo $DELETE["test"];
    }
    
    //pagination calculation
    
    if(isset($_GET["page"])){
        
    } else {
        $page = "";
    }
    
    if ($page == "" || $page === 1){
        $cur_page = 0;
    } else {
        $cur_page = ($page * $pgcnt) - $pgcnt;
    }
    
    
    //pagination display, <li>'s'
 
            for ($i=1; $i<=$count; $i++ {
             echo "<li><a href="controllers/Articles.php?page=$i">$i </a></li>"
            {

   
    
}