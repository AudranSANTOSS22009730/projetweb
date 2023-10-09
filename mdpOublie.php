<?php

final class MdpOublie
{
    private $identifiants;

    public function __construct($identifiants)
    {
        $this -> identifiants = $identifiants;
    }

    public function donneEmails($email)
    {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($this->identifiants, $sql);
        if (mysqli_num_rows($result) == 1)
        {
            return mysqli_fetch_assoc($result);
        }
        else
        {
            return null;
        }
    }

}
