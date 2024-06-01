<?php   
$server = "localhost";
$name = "root";
$password = "";
$dbname = "data";

$con = mysqli_connect($server, $name, $password, $dbname);
if (!$con)
{
    echo "not connected";

}

$name= $_POST['name'];
$email= $_POST['email'];
$mobile= $_POST['mobile'];
$company= $_POST['company'];
$visited= $_POST['visited'];
$purpose= $_POST['purpose'];
$specify= $_POST['specify'];
$date= $_POST['date'];

$sql ="INSERT INTO `login` (`name`, `Email`, `mobile`, `Company`, `visit`, `purpose`, `specify`, `date`) VALUES ('$name','$email','$mobile','$company','$visited','$purpose','$specify','$date')";


$result = mysqli_query($con, $sql);

if($result)

{
    echo "";
    
    
   
}

else{
    echo "qurey failed...";

}


//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['send']))
{
   $name=$_POST['name']; 
   $email=$_POST['email'];  
   $mobile=$_POST['mobile'];
   $company=$_POST['company'];
   $visited=$_POST['visited'];
   $purpose=$_POST['purpose'];
   $specify=$_POST['specify'];
   $date=$_POST['date'];

   

//Load Composer's autoloader
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php' ;

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
                          //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       =  'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '';                     //SMTP username
    $mail->Password   = '';                               //SMTP password
    $mail->SMTPSecure =  PHPMailer::ENCRYPTION_SMTPS;           //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 465 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('', 'Reply');
    
    
    $mail->addAddress('1323@gmail.com', 'Name');


    
        //Add a recipient
    
   

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'visitor Entry Form';
    $mail->Body    = "Name: - $name <br> Email: - $email <br> Mobile No: - $mobile <br> Company Name: - $company <br> To Visit: - $visited <br> Purpose: - $purpose <br> date: - $date <br>" ;
    

    
    $mail->send();
    echo '';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back to Homepage</title>
    <style>

        body{
            background-color: rgb(255, 255, 255);
            background-position: center;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            
            border-radius: 10px;
            outline-color: #fb831a;

        }


        .container{
            height: 250px;
            width: 250px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: #f1f1f1;
            padding: 50px;
            
            border-radius: 0px;
            backdrop-filter: blur(15px);
            
            
        }
                
        .header{
            
            display: flex;
            position: fixed;
            z-index: 1000;
            top: 20px;
           
            
            
            background: transparent;
            justify-content: center;
            

        }

        .header .logo img{
            height: 5rem;
            
            
   
            
        }
            
                 


        h2{
            text-align: center;
            color: #fb831a;
            padding: 15px;
            font-weight: 30px;

        }



        a .btn{
                top: 20px;
                cursor: pointer;
                width: 110%;
                height: 40px;
                background: #fb831a;
                outline: none;
                border: none;
                font-weight: 600;
                font-size: 20px;
                letter-spacing: 1px;  
                color: white;

        }
    
    </style>

</head>
<body>

    <div class="container">

        <header class="header">
                <a href="#" class="logo">
                    <img src="alpex1.jpg" alt="">
                </a>
        </header>


        <h2>Thank You</h2>
        
        <a href="http://localhost/vef/#">
            <button type="submit" class="btn">Back to Homepage</button>
        </a>    
                
    </div>
</body>
</html>
