<?php

class UsersModel extends DBModel
{

    public function showUser()
    {
        $q = "SELECT * FROM	users;";
        $result = $this->db()->query($q);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getSpecificRows($limit, $offset)
    {
        $q = "SELECT * FROM	users LIMIT $limit OFFSET $offset; ";
        $result = $this->db()->query($q);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function countRows(){
        $q = "SELECT count(*) FROM users;";
        $result = $this->db()->query($q);
        $nrRec = $result->fetch_row();
        return $nrRec[0];
    }

    public function checkUser($user, $pass){
        $q = "SELECT * FROM `users` WHERE `user_name` = ?;";
        $myPrep = $this->db()->prepare($q);

        $myPrep->bind_param("s", $user);
        $myPrep->execute();
        $result = $myPrep->get_result()->fetch_all(MYSQLI_ASSOC);
        $myPrep->close();

        if($result){
            if(password_verify($pass, $result[0]['user_pass_hash'])){
                return 1;
            }
            else return 0;
        }
        else return null;
    }

    public function addU($user, $pass)
    {
        $passHash = password_hash($pass, PASSWORD_DEFAULT);
        $q = "INSERT INTO `users` (`user_name`, `user_pass`, `user_pass_hash`) VALUES (?,?,?);";
        $myPrep = $this->db()->prepare($q);

        $myPrep->bind_param("sss", $user, $pass, $passHash);
        $myPrep->execute();

        $myPrep->close();
    }


    public function addUserArray($userData)
    {

		$prepValues = [];
		$myFields = [];
		$bindParam = "";
		$v = array();
		foreach ($userData as $key => $value) {
			$v[] = $value;
			$myFields[] = '`'.$key.'`';
			$bindParam .= "s";
			$prepValues[] = "?";
		}

		$prepValues = '('.implode(', ',$prepValues).')'; 
		$myFields = '('.implode(', ',$myFields).')'; 

        $q = "INSERT INTO `users` $myFields VALUES $prepValues;";
        $myPrep = $this->db()->prepare($q);

        $myPrep->bind_param($bindParam, ...$v);
        $myPrep->execute();

        $myPrep->close();
    }
}

?>