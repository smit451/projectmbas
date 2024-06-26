<?php 
error_reporting(0);
include '../Includes/dbcon.php';


    if(isset($_POST['submit'])){

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $phoneNo = $_POST['phoneNo'];
        $password = $_POST['password'];
        $conPassword = $_POST['conPassword'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $state = $_POST['state'];
        $city = $_POST['city'];
        $address = $_POST['address'];
        $lga = $_POST['lga'];
        $coopAccountId = $_POST['coopAccountId'];
        $userType = $_POST['userType'];
        $dateCreated =  date("Y-m-d");


// echo $isLinked;
// echo $_POST['isExisting'];


        $query = "SELECT * FROM users WHERE emailAddress = '$email'";
        $rs = $conn->query($query);
        $num = $rs->num_rows;

        if($password != $conPassword)
        {
            echo "<script type = \"text/javascript\">
            alert(\"Password Mismatch!\");
            window.location = (\"../memberSetup.php\")
            </script>";
        }
        
        else if($num > 0)
        {
            echo "<script type = \"text/javascript\">
            alert(\"Email Address has already been used!\");
            window.location = (\"../memberSetup.php\")
            </script>";

        }
        else
        {
            
            if($_POST['userType'] == 1) // if the userType is staff, save staff info and user info
            {
                $companyId = $_POST['companyId'];
                $staffCode = $_POST['staffCode'];
                $position = $_POST['position'];
                $level = $_POST['level'];
                $department = $_POST['department'];
                $description = $_POST['description'];

                $userqr = "INSERT INTO users (roleId,coopId,firstName,lastName,gender,dob,city,state,lga,emailAddress,address,phoneNo,password,dateCreated) 
                        VALUES ('2','$coopAccountId','$firstName','$lastName','$gender','$dob','$city','$state','$lga','$email','$address','$phoneNo','$password','$dateCreated')";
                $useres = $conn->query($userqr);

                if($useres === TRUE)
                {
                    $qryss = "SELECT * FROM companystaff WHERE compId = '$companyId' AND staffCode = '$staffCode'";
                    $rst = $conn->query($qryss);
                    $num = $rst->num_rows;

                    if($num == 0)
                    {
                        $querys = "SELECT * FROM users WHERE emailAddress = '$email'";
                        $rslt = $conn->query($querys);
                        // $num = $rslt->num_rows;
                        $rrw = $rslt->fetch_assoc();
                        $memberId = $rrw['Id'];

                        $compqr = "INSERT INTO companystaff (staffCode,memberId,compId,coopId,position,level,department,jobDescription,dateCreated) 
                            VALUES ('$staffCode','$memberId','$companyId','$coopAccountId','$position','$level','$department','$description','$dateCreated')";
                        $compres = $conn->query($compqr);

                            if($compres === TRUE)
                            {
                                
                            }
                            else
                            {
                                echo "<script type = \"text/javascript\">
                                alert(\"An Error Occurred!\");
                                </script>";
                            }

                        echo "<script type = \"text/javascript\">
                        alert(\"Created Successfully!\");
                        window.location = (\"../index.php\")
                        </script>";
                    }
                    else
                    {

                        echo "<script type = \"text/javascript\">
                        alert(\"Staff with staff code already exist!\");
                        window.location = (\"../memberSetup.php\")
                        </script>";
                    }
                }
                else
                {
                    echo "<script type = \"text/javascript\">
                    alert(\"An Error Occurred!\");
                    </script>";
                }

            }


            else if($_POST['userType'] == 2) // if the userType is ExternalMmber, save the member info to the user table only
            {
                $userqr = "INSERT INTO users (roleId,coopId,firstName,lastName,gender,dob,city,state,lga,emailAddress,address,phoneNo,password,dateCreated) 
                        VALUES ('2','$coopAccountId','$firstName','$lastName','$gender','$dob','$city','$state','$lga','$email','$address','$phoneNo','$password','$dateCreated')";
                $useres = $conn->query($userqr);

                if($useres === TRUE)
                {
                    
                }
                else
                {
                    echo "<script type = \"text/javascript\">
                    alert(\"An Error Occurred!\");
                    </script>";
                }

                echo "<script type = \"text/javascript\">
                alert(\"Created Successfully!\");
                window.location = (\"../index.php\")
                </script>";
            }

        } // end of else statement
        
    } //end of if for submit button



        ?>



