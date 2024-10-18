<?php

class Config
{
    private $HOSTNAME = "localhost";
    private $USERNAME = "root";
    private $PASSWORD = "";
    private $DB_DATA = "exam";
    private $VEHICLE_TABLE = "vehicle";

    public $conn;

    public function connect()
    {
        $this->conn = mysqli_connect($this->HOSTNAME, $this->USERNAME, $this->PASSWORD, $this->DB_DATA);

        return $this->conn;
    }

    public function insertUserdata($Name, $Contact, $Vehicle, $Vehicle_no)
    {

        $this->connect();

        $query = "INSERT INTO user_data (Name, Contact, Vehicle, Vehicle_no) VALUES('$Name','$Contact', '$Vehicle', $Vehicle_no);";

        return mysqli_query($this->conn, $query);
    }

    public function fetchUserdata()
    {
        $this->connect();
        $query = "SELECT * FROM user_data;";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }
    public function deleteUsardata($id)
    {
        $this->connect();

        $fetch_singel_userdata = $this->fetchSingleUserdata($id);

        $fetch_data = mysqli_fetch_assoc($fetch_singel_userdata);

        if ($fetch_data) {

            $query = "DELETE FROM user_data WHERE Id = $id ;";
            $res = mysqli_query($this->conn, $query);
            return $res;

        } else {

            return false;
        }

    }

    public function fetchSingleUserdata($id)
    {
        $this->connect();

        $query = "SELECT * FROM user_data WHERE Id = $id;";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function updateUserdata($Name, $Contact, $Vehicle, $Vehicle_no, $id)
    {
        $this->connect();

        $fetch_singel_userdata = $this->fetchSingleUserdata($id);

        $fetch_data = mysqli_fetch_assoc($fetch_singel_userdata);

        if ($fetch_data) {


            $query = "UPDATE user_data SET Name = '$Name', Contact = '$Contact', Vehicle = '$Vehicle', Vehicle_no = '$Vehicle_no' WHERE Id = $id ;";
            $res = mysqli_query($this->conn, $query);
            return $res;

        } else {
            return false;
        }
    }

    public function insertVehicle($number)
    {
        $this->connect();

        $isDepartment = $this->fetchSingleUserdata($number);

        if ($isDepartment) {
            $query = "INSERT INTO $this->VEHICLE_TABLE (name, department_id) VALUES($number);";

            return mysqli_query($this->conn, $query); // return bool
        } else {
            return false;
        }
    }

    // Entry Vehicle

    public function insertEntryVehicle($Vehicle, $Vehicle_no)
    {

        $this->connect();

        $query = "INSERT INTO entry_vehicle (Vehicle, Vehicle_no) VALUES('$Vehicle', $Vehicle_no);";

        return mysqli_query($this->conn, $query);
    }

    public function fetchEntryVehicle()
    {
        $this->connect();
        $query = "SELECT * FROM entry_vehicle;";
        $res = mysqli_query($this->conn, $query);

        return $res;
    }
    public function deleteEntryVehicle($id)
    {
        $this->connect();

        $fetch_singel_EntryVehicle = $this->fetchSingleEntryVehicle($id);

        $fetch_data = mysqli_fetch_assoc($fetch_singel_EntryVehicle);

        if ($fetch_data) {

            $query = "DELETE FROM entry_vehicle WHERE Id = $id ;";
            $res = mysqli_query($this->conn, $query);
            return $res;

        } else {

            return false;
        }

    }

    public function fetchSingleEntryVehicle($id)
    {
        $this->connect();

        $query = "SELECT * FROM entry_vehicle WHERE Id = $id;";

        $res = mysqli_query($this->conn, $query);

        return $res;
    }

    public function updateEntryVehicle($Name, $Contact, $Vehicle, $Vehicle_no, $id)
    {
        $this->connect();

        $fetch_singel_EntryVehicle = $this->fetchSingleEntryVehicle($id);

        $fetch_data = mysqli_fetch_assoc($fetch_singel_EntryVehicle);

        if ($fetch_data) {


            $query = "UPDATE entry_vehicle SET Vehicle = '$Vehicle', Vehicle_no = '$Vehicle_no' WHERE Id = $id ;";
            $res = mysqli_query($this->conn, $query);
            return $res;

        } else {
            return false;
        }


    }

}

?>