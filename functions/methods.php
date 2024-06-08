<?php
session_start();

@include "conn.php";

function CheckAdminPermission($email)
{
    global $conn;
    $query = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_object()) {
            if ($row->isAdmin == true) {
                return true;
            } else {
                return false;
            }
        }
    }
}
function Logout()
{
    session_destroy();
    header("Location: index.php");
}
function Login($email, $password)
{
    global $conn;
    if (!empty($email) && !empty($password)) {
        $query = "SELECT * FROM `users` WHERE `email` = '$email'";
        $result = $conn->query($query);

        if (!$conn) {
            echo "Connection Error: " . $conn->error;
        } else {
            if ($result->num_rows > 0) {
                if ($row = $result->fetch_object()) {
                    if (password_verify($password, $row->password_hash)) {
                        if ($data = CheckAdminPermission($email)) {
                            //echo $data;
                            $userData = [];

                            $userData[] = [
                                "user_id" => $row->user_id,
                                "name" => $row->name,
                                "surname" => $row->surname,
                                "birth_date" => $row->birth_date,
                                "email" => $row->email,
                                "tel_number" => $row->tel_number,
                                "prof_image" => base64_encode($row->prof_image),
                                "curr_position" => $row->curr_position,
                                "curr_position_description" =>
                                    $row->curr_position_description,
                                "career_summary" => $row->career_summary,
                            ];

                            $_SESSION["adminPerr"] = $data;
                            $_SESSION["userData"] = $userData;
                            $_SESSION["login"] = "true";
                        }
                        header("Location: index.php");
                    } else {
                        echo "Niepoprawne haslo";
                    }
                }
            } else {
                echo "Nie ma takiego uzytkowanika w bazie";
            }
        }
    } else {
        echo "Please enter your email and password";
    }
}

function SelectDataFormSession($dataArr, $name)
{
    $result = "";
    foreach ($dataArr as $data) {
        $result = $data[$name];
    }

    return $result;
}

function SearchCompany($compName, $compId = null)
{
    global $conn;
    $compData = [];
    if (empty($compName) && empty($compId)) {
        echo "Proszę uzupełnić dane";
    } elseif (!empty($compName) && empty($compId)) {
        $query = "SELECT * FROM company 
                WHERE company_name LIKE '%$compName'
                OR company_name LIKE '%$compName%'
                OR company_name LIKE '$compName%'";

        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $compData[] = [
                    "company_id" => $row->company_id,
                    "company_name" => $row->company_name,
                    "company_address" => $row->company_address,
                    "company_logo" => base64_encode($row->company_logo),
                    "lat" => $row->lat,
                    "lng" => $row->lng,
                    "about_company" => $row->about_company,
                ];
            }
        }
    } elseif (empty($compName) && !empty($compId)) {
        $query = "SELECT * FROM company WHERE company_id = '$compId'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_object()) {
                $compData[] = [
                    "company_id" => $row->company_id,
                    "company_name" => $row->company_name,
                    "company_address" => $row->company_address,
                    "company_logo" => base64_encode($row->company_logo),
                    "lat" => $row->lat,
                    "lng" => $row->lng,
                    "about_company" => $row->about_company,
                ];
            }
        }
    }

    return $compData;
}
