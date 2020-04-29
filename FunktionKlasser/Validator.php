<?php
class Validator 
{
    public function PåkrævetFelt($tekst) 
    {
        if(empty($tekst)) 
        {
            return false;
        }
        else 
        {
            return $tekst;
        }
    }
    public function PåkrævetStandardTekstFormat($tekst) 
    {
        if($this->PåkrævetFelt($tekst) === $tekst)
        {
            $tekst = $this->test_input($tekst);
            if (!preg_match("/^[a-zA-Z ]*$/",$tekst)) 
            {
                return false;
            }
        }
        else 
        {
            return false;
        }
        return $tekst;
    }
    public function StandardTekstFormat($tekst) 
    {
        $tekst = $this->test_input($tekst);
        if (!preg_match("/^[a-zA-Z ]*$/",$tekst)) 
        {
            return false;
        }
        return $tekst;
    }
    public function PåkrævetStandardEmailFormat($email)
    {
        if($this->PåkrævetFelt($email) === $email)
        {
            $email = $this->test_input($email);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
            {
                return false;
            }
        }
        else 
        {
            return false;
        }
        return $email;
    }
    public function StandardEmailFormat($email)
    {
        $email = $this->test_input($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            return false;
        }
        return $email;
    }
    public function PåkrævetStandardHjemmesideFormat($hjemmeside)
    {
        if($this->PåkrævetFelt($hjemmeside) === $hjemmeside)
        {
            $hjemmeside = $this->test_input($hjemmeside);
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$hjemmeside))
            {
                return false;
            }
        }
        else 
        {
            return false;
        }
        return $hjemmeside;
    }
    public function StandardHjemmesideFormat($hjemmeside)
    {
        $hjemmeside = $this->test_input($hjemmeside);
        if (!empty($hjemmeside) && !preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$hjemmeside))
        {
            return false;
        }
        return $hjemmeside;
    }
    public function TjekBrugernavn($brugernavn, $con)
    {
        $loginTjekBrugernavn = new login($con);
        $loginTjekBrugernavn->setBrugernavn($brugernavn);
        $brugertjek = $loginTjekBrugernavn->readBrugernavnFromBrugernavn();
        if($brugertjek === $brugernavn)
        {
            return false;
        }
        return $brugernavn;
    }
    private function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
