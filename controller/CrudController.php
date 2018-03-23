<?php
include_once('../config/config.php');

if (isset($_REQUEST['getPersonalInformationList'])) {
    getPersonalInformationList();
} else if (isset($_REQUEST['savePersonalInformationFromAddFunction'])) {
    savePersonalInformationFromAddFunction();
} else if (isset($_REQUEST['editPersonalInformation'])) {
    editPersonalInformation();
} else if (isset($_REQUEST['updatePersonalInformation'])) {
    updatePersonalInformation();
} else if (isset($_REQUEST['deletePersonalInformation'])) {
    deletePersonalInformation();
}

function deletePersonalInformation() {
    global $link;
    $PersonalId = $_REQUEST['PersonalId'];
    $query = "DELETE FROM tblpersonalinformation WHERE id = '$PersonalId'";
    $result = mysqli_query($link, $query);
    if ($result) {
        echo json_encode("Personal information has been deleted.");
    } else {
        echo json_encode("Error!");
    }
}

function updatePersonalInformation() {
    global $link;
    $PersonalId = $_REQUEST['PersonalId'];
    $Firstname = $_REQUEST['Firstname'];
    $Lastname = $_REQUEST['Lastname'];
    $Gender = $_REQUEST['Gender'];
    $Email = $_REQUEST['Email'];
    $query = "UPDATE tblpersonalinformation SET firstname = '$Firstname', lastname = '$Lastname', gender = '$Gender', email = '$Email' WHERE id = '$PersonalId'";
    if (mysqli_query($link, $query)) {
        echo json_encode("Personal information has been updated.");
    } else {
        echo json_encode("Error!");
    }
}

function editPersonalInformation() {
    global $link;
    $PersonalId = $_REQUEST['PersonalId'];
    $query = "SELECT * FROM tblpersonalinformation WHERE id = '$PersonalId'";
    $result = mysqli_query($link, $query);
    if ($result) {
        $resultArray = [];
        while($row = mysqli_fetch_assoc($result)) {
            $resultArray[] = array($row['id'],$row['firstname'],$row['lastname'],$row['gender'],$row['email']);
        }
        echo json_encode($resultArray);
    } else {
        echo json_encode("Error!");
    }
    
}

function savePersonalInformationFromAddFunction() {
    global $link;
    $Firstname = $_REQUEST['Firstname'];
    $Lastname = $_REQUEST['Lastname'];
    $Gender = $_REQUEST['Gender'];
    $Email = $_REQUEST['Email'];
    $query = "INSERT INTO tblpersonalinformation (firstname,lastname,gender,email) VALUES('$Firstname','$Lastname','$Gender','$Email')";
    if (mysqli_query($link, $query)) {
        echo json_encode("Personal information has been saved.");
    } else {
        echo json_encode("Error!");
    }
    
}

function getPersonalInformationList() {
    global $link;
    $query = "SELECT * FROM tblpersonalinformation ORDER by id DESC";
    $result = mysqli_query($link, $query);
    $resultArray = [];
    while($row = mysqli_fetch_assoc($result)) {
        $resultArray[] = array($row['id'],$row['firstname'],$row['lastname'],$row['gender'],$row['email']);
    }
    echo json_encode($resultArray);
}

?>