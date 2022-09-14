<?php

require 'vendor/autoload.php';

class CRMSResident extends CRMSUser
{
    public $conn;
    public $isPrimaryResident = true;

    function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    function createResident(array $residentData) {
        $cleanResidentData = CRMSUtils::sanitizeData($residentData);
        $newResidentQry = "INSERT INTO users (firstName, lastName, address, occupation, primaryPhone, username, password)";
        $newResidentQry .= " VALUES(:firstName, :lastName, :address, :occupation, :primaryPhone, :username, :password)";

        try {

            $stmt = $this->conn->prepare($newResidentQry);
            $stmt->bindParam(":firstName", $cleanResidentData['firstName']);
            $stmt->bindParam(":lastName", $cleanResidentData['lastName']);
            $stmt->bindParam(":address", $cleanResidentData['address']);
            $stmt->bindParam(":occupation", $cleanResidentData['occupation']);
            $stmt->bindParam(":primaryPhone", $cleanResidentData['primaryPhone']);
            $stmt->bindParam(":username", $cleanResidentData['username']);
            $stmt->bindParam(":password", $cleanResidentData['password']);

            $stmt->execute();
            echo "New Resident created";
            return true;
        } catch (PDOException $newResidentException){
            echo "Failed to create Resident: " . $newResidentException->getMessage();
            return false;
        }
    }

    function getResident(int $residentID) {

    }

    function updateResident(int $residentID) {

    }

    function deleteResident(int $residentID) {

    }
}

$streetP = new CRMSResident();
$iSTEMLabsAfrica = [
    "firstName" => "iSTEMLabs",
    "lastName" => "<h1>Africa</h1>",
    "address" => "16P, FLCHE, Karshi, Abuja",
    "occupation" => "Software Engineer",
    "primaryPhone" => "08100000000",
    "username" => "info@istemlabs.africa",
    "password" => "NotAPassword",
];
$streetP->createResident($iSTEMLabsAfrica);