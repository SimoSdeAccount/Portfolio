<?php
class projekter {
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
    private $Navn;
    public function setNavn($Navn) {$this->Navn = $Navn;}
    public function getNavn(){return $this->Navn;}
    public function insert() 
    {
        $sql = "INSERT INTO projekter (Navn) VALUES ('".$this->Navn."')";
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
    public function update($UpdateNavn) 
    {
        $sql = "UPDATE projekter SET Navn = '" . $UpdateNavn . "' WHERE Navn = '" . $this->Navn . "'";
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
        $projektListe = array();
        $counter = 0;
        $sql = "SELECT Navn FROM projekter";
        $result = mysqli_query($this->connection, $sql);
        if (mysqli_num_rows($result) > 0) 
        {
            while($row = mysqli_fetch_assoc($result)) 
            {
                $tempRow = array($row["Navn"]);
                for($i = 0; $i < count($tempRow); $i++)
                {
                    $projektListe[$counter][$i] = $tempRow[$i];
                }
                $counter++;
            }
        }
        else
        {
            echo "0 results";
        }
        mysqli_close($this->connection);
        return $projektListe;
    }
}
