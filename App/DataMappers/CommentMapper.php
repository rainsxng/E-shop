<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 04.01.2019
 * Time: 17:48
 */

namespace Mappers;

use Core\Database;
use Models\Comment;
use PDO;

class CommentMapper
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }
    private function mapArrayToComment($data) {
        $comment = new Comment();
        $comment->setId($data['id']);
        $comment->setDate($data['date']);
        $comment->setMessage($data['message']);
        $comment->setStars($data['stars']);
        $comment->setUserId($data['user_id']);
        $comment->setProductId($data['product_id']);
        $comment->setUserLogin($data['user_login']);
        return  $comment;
    }

    public function getProductComments($product_id)
    {
        $query=$this->pdo->prepare("SELECT  comments.id,comments.product_id,comments.user_id,comments.date,comments.message,comments.stars,users.login as user_login FROM comments
INNER JOIN users on comments.user_id=users.id
WHERE comments.product_id=:id;");
        $query->execute(array('id'=>$product_id));
        $row=$query->fetchALL(PDO::FETCH_ASSOC);
        $comments = [];
        foreach ($row as $r) {
            array_push($comments, $this->mapArrayToComment($r));
        }
        $query=$this->pdo->prepare("SELECT count(*) as comment_count FROM comments 
WHERE comments.product_id=:id;");
        $query->execute(array('id'=>$product_id));
        Comment::setCount($query->fetchColumn());
        return $comments;
    }

    public function isCommentsExist($product_id)
    {
        $query = $this->pdo->prepare("SELECT comments.id FROM  products
 LEFT JOIN comments on products.id=comments.product_id
INNER JOIN users on comments.user_id=users.id WHERE products.id=:id;");
        $query->execute(array('id'=>$product_id));
        $row = $query->fetchALL(PDO::FETCH_ASSOC);
        return $row;
    }

    public function addComment (Comment $commentObj)
    {
        echo json_encode($commentObj);
        $query = $this->pdo->prepare("INSERT INTO comments (id,message,date,created_at,updated_at,stars,user_id,product_id) VALUES (NULL,:message,current_date(),current_timestamp(),current_timestamp(),:stars,:user_id,:product_id)");
        $query->execute(array(
            'message'=>$commentObj->getMessage(),
            'stars'=>$commentObj->getStars(),
            'user_id'=>$commentObj->getUserId(),
            'product_id'=>$commentObj->getProductId()
            ));
    }
}
