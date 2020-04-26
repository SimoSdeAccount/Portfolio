<?php
class bruger {
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
    private $Id;
    private $Profil;
    private $Brugernavn;
    public function setId($Id){$this->Id = $Id;}
    public function getId(){return $this->Id;}
    public function setProfil($Profil){$this->Profil = $Profil;}
    public function getProfil() {return $this->Profil;}
    public function setBrugernavn($Brugernavn){$this->Brugernavn = $Brugernavn;}
    public function getBrugernavn(){return $this->Brugernavn;}
    public function insert() 
    {
        $sql = "INSERT INTO bruger (Profil, Brugernavn) VALUES ('".$this->Profil."', '".$this->Brugernavn."')";
        if (mysqli_query($this->connection, $sql)) 
        {
            echo "Bruger oprettet";
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->connection);
        }
    }
    public function update() 
    {
        $sql = "UPDATE bruger SET profil = '" . $this->Profil . "', brugernavn = '" . $this->Brugernavn . "' WHERE Id = '" . $this->Id . "'";
        if (mysqli_query($this->connection, $sql)) 
        {
            echo "Record updated successfully";
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->connection);
        }
        mysqli_close($this->connection);
    }
    public function read() 
    {
        $brugerListe = array();
        $counter = 0;
        $sql = "SELECT Profil, Brugernavn FROM bruger";
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) 
            {
                $tempRow = array($row["Profil"], $row["Brugernavn"]);
                for($i = 0; $i < count($tempRow); $i++)
                {
                    $brugerListe[$counter][$i] = $tempRow[$i];
                }
                $counter++;
            }
        }
        else
        {
            echo "0 results";
        }
        mysqli_close($this->connection);
        return $brugerListe;
    }
    public function readProfilFromBrugernavn() 
    {
        $sql = "SELECT bruger.Profil AS Id FROM bruger WHERE bruger.Brugernavn = '". $this->Brugernavn ."'";
        
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0)
        {
            $row = mysqli_fetch_assoc($result);
            $profilId = $row["Id"];
            return $profilId;
        }
        else
        {
            echo "0 results";
        }
    }
    public function readIdFromBrugernavn() 
    {
        $sql = "SELECT bruger.Id AS Id FROM bruger WHERE bruger.Brugernavn = '". $this->Brugernavn ."'";
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            $row = mysqli_fetch_assoc($result);
            $BrugerId = $row["Id"];
            return $BrugerId;
        }
        else
        {
            echo "0 results";
        }
    }
}
