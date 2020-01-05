<?php 

class Post 
{
    public $connection;

    function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function all($userId)
    {
        $posts = mysqli_query($this->connection, "SELECT * from posts WHERE user_id='$userId' ORDER BY id desc");

        return $posts;

    }

    public function find($postId)
    {
        $post = mysqli_query($this->connection, "SELECT * from posts WHERE id=$postId LIMIT 1");

        return mysqli_fetch_assoc($post);
    }

    public function create(array $dataToSave)
    {
        $body = $dataToSave['body'];
        $userId = $dataToSave['user_id'];

        mysqli_query($this->connection, "INSERT INTO posts(body,user_id) values('$body',$userId)");

         $rowsAffected = mysqli_affected_rows($this->connection);

         if($rowsAffected > 0) {
             return true;
         }
        
         return false;
    }

    public function update($postId, $dataToUpdate)
    {
        $body = $dataToUpdate['body'];

        mysqli_query($this->connection, "UPDATE posts SET body='$body' where id=$postId");

        $rowsAffected = mysqli_affected_rows($this->connection);

        if ($rowsAffected > 0) {
            return true;
        }

        return false;
    }

    public function delete($postId)
    {
        mysqli_query($this->connection, "DELETE FROM posts where id=$postId");

        $rowsAffected = mysqli_affected_rows($this->connection);

        if ($rowsAffected > 0) {
            return true;
        }

        return false;
    }


}