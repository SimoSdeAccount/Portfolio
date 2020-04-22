<?php
class login 
{
    public function __construct($con) 
    {
        if (!$con) 
        {
            die("Connection failed: " . mysqli_connect_error());
        }
        else 
        {
            $this->connection = $con;
        }
    }
    private $connection;
    private $brugernavn;
    private $kodeord;
    public function setBrugernavn($brugerNavn) {$this->brugernavn = $brugerNavn;}
    public function getBrugernavn(){return $this->brugernavn;}
    public function setKodeord($kode){$this->kodeord = $kode;}
    public function getKodeOrd() {return $this->kodeord;}
    public function insert() 
    {
        $sql = "INSERT INTO login (brugernavn, kodeord) VALUES ('".$this->brugernavn."', '".$this->kodeord."')";
        if (mysqli_query($this->connection, $sql)) 
        {
            echo "Login oprettet";
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->connection);
        }
    }
    public function update() 
    {
        $sql = "UPDATE login SET kodeord = '" . $this->kodeord . "' WHERE brugernavn = '" . $this->brugernavn . "'";
        if (mysqli_query($this->connection, $sql)) 
        {
            echo "Record updated successfully";
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->connection);
        }
    }
    public function read() 
    {
        $loginListe = array();
        $counter = 0;
        $sql = "SELECT brugernavn, kodeord FROM login";
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) 
            {
                $tempRow = array($row["brugernavn"]);
                for($i = 0; $i < count($tempRow); $i++)
                {
                    $loginListe[$counter][$i] = $tempRow[$i];
                }
                $counter++;
            }
        }
        else
        {
            echo "0 results";
        }
        mysqli_close($this->connection);
        return $loginListe;
    }
    public function readKodeordFromBrugernavn() 
    {
        $sql = "SELECT Kodeord FROM login WHERE Brugernavn = '" . $this->brugernavn . "'";
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_assoc($result);
            mysqli_close($this->connection);
            return $row["Kodeord"];
        }
        else 
        {
            mysqli_close($this->connection);
            return false;
        }
    }
    public function readSpecific() 
    {
        $sql = "SELECT Brugernavn, Kodeord FROM login WHERE Brugernavn = '" . $this->brugernavn . "' AND Kodeord = '" . $this->kodeord . "';";
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            $returBrugernavn = mysqli_fetch_assoc($result);
            mysqli_close($this->connection);
            return $returBrugernavn["Brugernavn"];
        }
        else 
        {
            mysqli_close($this->connection);
            return false;
        }
    }
}
