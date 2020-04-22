<?php
class downloads {
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
    private $Projekt;
    private $Tid;
    public function setId($Id){$this->Id = $Id;}
    public function getId(){return $this->Id;}
    public function setBruger($Bruger){$this->Bruger = $Bruger;}
    public function getBruger(){return $this->Bruger;}
    public function setProjekt($Projekt){$this->Projekt = $Projekt;}
    public function getProjekt(){return $this->Projekt;}
    public function setTid($Tid){$this->Tid = $Tid;}
    public function getTid(){return $this->Tid;}
    public function insert() 
    {
        $sql = "INSERT INTO downloads (Bruger, Projekt, Tid) VALUES ('".$this->Bruger."', '".$this->Projekt."', '" . $this->Tid . "')";
        if (mysqli_query($this->connection, $sql)) 
        {
            echo "New record created successfully";
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->connection);
        }
        mysqli_close($this->connection);
    }
    public function update() 
    {
        $sql = "UPDATE downloads SET Bruger = '" . $this->Bruger . "', Projekt = '" . $this->Projekt . "', Tid = '" . $this->Tid. "' WHERE Id = '" . $this->Id . "'";
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
        $loginListe = array();
        $counter = 0;
        $sql = "SELECT Id, Bruger, Projekt, Tid FROM Downloads";
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) 
            {
                $tempRow = array($row["Id"], $row["Bruger"], $row["Projekt"], $row["Tid"]);
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
}
