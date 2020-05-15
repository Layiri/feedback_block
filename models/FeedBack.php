<?php

/**
 * Class FeedBack
 */
class FeedBack
{
    public $product_id;
    public $full_name;
    public $email;
    public $comment;
    public $ratings;
    public $advantages;
    public $disadvantages;
    public $user_ip;
    public $user_agent;
    public $file_path;
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    /**
     * @return bool
     */
    public function save()
    {
        $req = $this->conn->prepare('INSERT INTO otzivi(product_id,full_name,email,comment,ratings,advantages,disadvantages,user_ip,user_agent,file_path,created_at) VALUES(:product_id, :full_name, :email, :comment, :ratings, :advantages, :disadvantages, :user_ip, :user_agent, :file_path, :created_at)');
        $req->execute(array(
            'product_id' => $this->product_id,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'comment' => $this->comment,
            'ratings' => $this->ratings,
            'advantages' => $this->advantages,
            'disadvantages' => $this->disadvantages,
            'user_ip' => $this->user_ip,
            'user_agent' => $this->user_agent,
            'file_path' => $this->file_path,
            'created_at' => time(),
        ));

        return true;
    }
}
