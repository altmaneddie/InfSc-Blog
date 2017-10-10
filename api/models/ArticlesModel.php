<?php
require_once "DB.php";

class ArticlesModel extends DB {

    function selectArticles($search = "", $start = 0, $limit = 5) {
        $sql = 'select * from articles';
        $data = array();
        
        if ($search !== "") {
            $data = ['%' . $search . '%'];
            $sql .= ' where name like ?';
        }
        
        $sql .= ' limit ' . $start . ',' . $limit;
        
        return $this->selectAll($sql, $data);
    }
    
     function countArticles($search) {
        $sql = "select id from articles";
        $data = [];
        
        if ($search !== "") {
            $data = ['%' . $search . '%'];
            $sql .= ' where name like ?';
        }
        
        $this->selectAll($sql, $data);
        return $this->countAll();
    }
    
    function selectArticle($item) {
        $data = [$item['id']];
        $sql = 'select * from articles where id = ?';
        return $this->getItem($sql, $data);
    }
    
    function addArticle($item){
        $data = [$item['title'],
                 $item['content']];
        $sql = 'insert into articles (title, content) values (?, ?)';
        return $this->insertItem($sql, $data);
    }
    
    function updateArticle($item){
        $data = [$item['title'],
                    $item['content'],
                    $item['id']];
        $sql = 'update articles set title = ? , content = ?  where id = ?';
        return $this->updateItem($sql, $data);
    }
    
    function deleteArticle($item) {
        $data = [$item['id']];
        $sql = 'delete from articles where id = ?';
        return $this->deleteItem($sql, $data);
    }
    
    //pagination general function
    
    function art_count(){
        $pgcnt = 5;
        $articles_count = "SELECT * FROM POSTS LIMIT $curpage, $pgcnt";
        $count = mysql_num_rows (resource, $articles_count);
        $count = ceil($count / 5);
        
    }
        
}   