<?php

    session_start();

    include ('../../../connect.php');

    error_reporting(E_ALL);
    ini_set('display_errors', 'On');  

    $nama     = $_POST['nama'];
    $username = $_POST['username'];
    $password = md5(md5($_POST['password']));
    $cp       = $_POST['hp'];
    $address  = $_POST['address'];
    $role     = $_POST['role'];
    $emailadd = $_POST['email'];

    $uname = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'"));
    $maile = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM admin WHERE email = '$emailadd'"));

    if($uname > 0)
    {
      echo "<script>alert ('Username has used by another user, try another ');
            eval(\"parent.location='../pages/register.php '\");</script>";
    }
    elseif ($maile > 0) {
      echo "<script>alert ('Email has used by another user, try another ');
            eval(\"parent.location='../pages/register.php '\");</script>";
    }
    else
    {
      $query = "INSERT INTO admin (username, password, hp, role, address, name, email) values ('".$username."','".$password."','".$cp."', '".$role."','".$address."','".$nama."','".$emailadd."')";

      $cek = mysqli_query($conn, $query);
      
      $token = date("Ymdhi").$username;
      $_SESSION['token'] = $token;
      $_SESSION['user']  = $username;

      $homepage = file_get_contents("../../../mailtemplate.php");

      if($cek)
      {
        require '../../../PHPMailer/class.phpmailer.php';
      
        $mail = new PHPMailer(); // create a new object
        $mail->isSMTP();
        $mail->SMTPDebug = 2;
        // $mail->Debugoutput = 'html';
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
      
        // But you can comment from here
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;
        $mail->CharSet = "UTF-8";
        // To here. 'cause default secure is TLS.
      
        $mail->setFrom("halal.tourism.pdg@gmail.com", "PDG TOURISM");
        $mail->Username = "halal.tourism.pdg@gmail.com";
        $mail->Password = "pdg2020tourism";
      
        $mail->Subject = "EMAIL VERIFICATION";
      
        $mail->addAddress("$emailadd", "$nama");
        $mail->msgHTML("<!DOCTYPE html>

        <html>
        <head>
          <title>Verification</title>
          <style>
            #container{
              width: 800px;
              margin: 0 auto;
              height: 100px;
            }
            #header{
              background-color: #26a69a;
              color: white;
              text-align: center
            }
            #badan{
              font-family: arial;
              text-align: center;
            }
            #kaki{
              margin-top:10px;
              background-color: #26a69a;
              color: white;
              text-align: center;
            }
          </style>
        </head>
        <body>
          <div id='container'>
            <div id='header'>
              <h2>VERIFY YOUR EMAIL</h2>
            </div>
            <div id='badan'>
              <p> Click the link below to verify your account</p>
              <a href='https://gissurya.org/pdg_tourism/tourism_pdg/admin/pages/verifikasi.php?token=$token&user=$username'>Click on this link to confirm your email</a> <!-- EDIT UNTUK HOSTING -->
            </div>
            <div id='kaki'>
              <h3>end of discusion</h3>
            </div>
          </div>
        </body>
        </html>");
       
        if (!$mail->send()) {
          $mail->ErrorInfo;
        } 
        else {
            // header('location:https://pdg_tourism/tourism_pdg/admin/checkemailjo.php'); //EDIT UNTUK HOSTING
            // header('location:../pdg_tourism/tourism_pdg/admin/checkemailjo.php');
            // echo '<meta http-equiv="REFRESH" content="0.1;url=../pdg_tourism/tourism_pdg/admin/checkemailjo.php>';
            ?>
              <script src="../../assets/js/jquery-1.8.3.min.js"></script>
              <script type="text/javascript">
                $( document ).ready(function() {
                    window.location = "../checkemailjo.php";
                })
              </script>
            <?php
        }
      }
      else{
        echo "gagal";
      }
    }
?>