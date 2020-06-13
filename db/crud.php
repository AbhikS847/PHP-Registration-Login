<?php

class crud{

    private $db;

    function __construct($connect)
    {
        $this->db = $connect;
    }

    public function insert($fname,$lname,$dob,$specialty,$email,$contact){

        try{
            $sql = "INSERT INTO `attendee` (first_name,last_name,date_of_birth,specialty_id,email,contact) VALUES (:fname,:lname,:dob,:specialty,:email,:contact)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(":fname",$fname);
            $stmt->bindparam(":lname",$lname);
            $stmt->bindparam(":dob",$dob);
            $stmt->bindparam(":specialty",$specialty);
            $stmt->bindparam(":email",$email);
            $stmt->bindparam(":contact",$contact);
            $stmt->execute();
            return true;
        }
        catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }

    }

    public function getAttendees(){
        $sql = "SELECT * FROM `attendee` a inner join specialties s on a.specialty_id = s.specialty_id";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getSpecialties(){
        $sql = "SELECT * FROM `specialties`";
        $result = $this->db->query($sql);
        return $result;
    }

    public function getAttendeeDetails($id){
        $sql = "SELECT * from attendee a inner join specialties s on a.specialty_id = s.specialty_id where user_id=:id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':id',$id);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }

    public function editAttendee($id,$fname,$lname,$dob,$email,$contact,$specialty){
        try{
            $sql = "UPDATE `attendee` SET `first_name`=:fname,`last_name`=:lname,`date_of_birth`=:dob,`specialty_id`=:specialty,`email`=:email,`contact`=:contact WHERE user_id=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(":id",$id);
            $stmt->bindparam(":fname",$fname);
            $stmt->bindparam(":lname",$lname);
            $stmt->bindparam(":dob",$dob);
            $stmt->bindparam(":specialty",$specialty);
            $stmt->bindparam(":email",$email);
            $stmt->bindparam(":contact",$contact);
            $stmt->execute();
            return true;
        }
        catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    public function deleteAttendee($id){
        try{
            $sql = "DELETE from attendee where user_id=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(":id",$id);
            $stmt->execute();
        }
        catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

}

?>