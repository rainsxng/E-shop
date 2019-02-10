<?php
/**
 * Created by PhpStorm.
 * User: brian
 * Date: 19.01.2019
 * Time: 17:43
 */

namespace Models;

use Core\Model;
use Mappers\CommentMapper;

class Comment extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->mapper = new CommentMapper();
    }
    /**
     * @var $id
     */
    protected $id;
    /**
     * @var $message
     */
    protected $message;
    /**
     * @var $date
     */
    protected $date;
    /**
     * @var $stars
     */
    protected $stars;
    /**
     * @var $user_id
     */
    protected $user_id;
    /**
     * @var $product_id
     */
    protected $product_id;
    /**
     * @var $userLogin
     */
    protected $userLogin;
    /**
     * @var CommentMapper
     */
    protected $mapper;
    /**
     * @var $count
     */
    protected static $count;
    /**
     * @return mixed
     */
    public function getUserLogin()
    {
        return $this->userLogin;
    }

    /**
     * @param mixed $userLogin
     */
    public function setUserLogin($userLogin)
    {
        $this->userLogin = $userLogin;
    }


    /**
     * @return mixed
     */
    public static function getCount()
    {
        return self::$count;
    }

    /**
     * @param mixed $count
     */
    public static function setCount($count)
    {
        self::$count = $count;
    }
    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getStars()
    {
        return $this->stars;
    }

    /**
     * @param mixed $stars
     */
    public function setStars($stars)
    {
        $this->stars = $stars;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    /**
     * @return mixed
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param mixed $product_id
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }

    /**
     * Get all comments for product
     * @param $id
     * @return array
     */
    public function getCommentsForProduct($id) :array
    {

        return $this->mapper->getProductComments($id);
    }

    /**
     * Add comment
     * @param Comment $commentObj
     */
    public function add(Comment $commentObj)
    {
        $this->mapper->addComment($commentObj);
    }
}
