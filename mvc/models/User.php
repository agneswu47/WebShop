<?php
class User extends DB{
    public function GetUser($Email)
    {
        $result = mysqli_query($this->con, "SELECT * FROM `users` WHERE  Email = '".$Email."'");
        if (!$result)
        {
            die ('Câu truy vấn bị sai');
        }
        $return = mysqli_fetch_array($result);
        
        mysqli_free_result($result);
        return $return;
    }
    public function GetUserTotal()
    {
        $result = mysqli_query($this->con, "SELECT * FROM `users`");
        if (!$result)
        {
            die ('Câu truy vấn bị sai');
        }
        $return = [];
        while ($row = mysqli_fetch_assoc($result))
        {
            $return[] = $row;
        }
        mysqli_free_result($result);
        return $return;
    }
}
?>