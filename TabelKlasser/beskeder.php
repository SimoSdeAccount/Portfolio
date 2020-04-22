<?php
class beskeder {
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
    private $Bruger;
    private $Emne;
    private $Besked;
    private $Tid;
    public function setId($Id){$this->Id = $Id;}
    public function getId(){return $this->Id;}
    public function setBruger($Bruger){$this->Bruger = $Bruger;}
    public function getBruger(){return $this->Bruger;}
    public function setEmne($Emne){$this->Emne = $Emne;}
    public function getEmne(){return $this-Emne;}
    public function setBesked($Besked){$this->Besked = $Besked;}
    public function getBesked(){return $this-Besked;}
    public function setTid($Tid){$this->Tid = $Tid;}
    public function getTid(){return $this->Tid;}
    public function insert() 
    {
        $sql = "INSERT INTO beskeder (Bruger, Emne, Besked, Tid) VALUES ('".$this->Bruger."', '".$this->Emne."', '" .$this->Besked . "', '" . $this->Tid . "')";
        if (mysqli_query($this->connection, $sql)) 
        {
            echo "New record created successfully";
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->connection);
        }
    }
    public function update() 
    {
        $sql = "UPDATE beskeder SET Bruger = '" . $this->Bruger . "', Emne = '" . $this->emne . "', Besked = '" . $this->Besked . "', Tid = '" . $this->Tid. "' WHERE Id = '" . $this->Id . "'";
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
        $beskedListe = array();
        $counter = 0;
        $sql = "SELECT Id, Bruger, Emne, Besked, Tid FROM Beskeder";
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) 
            {
                $tempRow = array($row["Id"], $row["Bruger"], $row["Emne"], $row["Besked"],$row["Tid"]);
                for($i = 0; $i < count($tempRow); $i++)
                {
                    $beskedListe[$counter][$i] = $tempRow[$i];
                }
                $counter++;
            }
        }
        else
        {
            echo "0 results";
        }
        mysqli_close($this->connection);
        return $beskedListe;
    }
}
