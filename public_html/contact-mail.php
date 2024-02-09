<?php
 use PHPMailer\PHPMailer\PHPMailer;
 require_once 'PHPMailer/Exception.php';
 require_once 'PHPMailer/PHPMailer.php';
 require_once 'PHPMailer/SMTP.php';
 
 $mail = new PHPMailer(true);
 $alert = '';
  
  if(isset($_POST['c-submit'])){
      
          $name = $_POST['Name'];
          $country = $_POST['Country'];
          $mobile = $_POST['MobileNumber'];
          
          $countryWithMobile = $country.$mobile;
          $email = $_POST['Email'];
          $project = $_POST['ProjectName'];
          $message = $_POST['Message'];
          $formcontent= "From: $name \n Country Code: $country \n Mobile No: $mobile  \n Email Id: $email \n Project: $project \n Message: $message ";
          
          
        //   $to = 'nagaraju@madworks.in';
        //   $subject = 'Lead From Manjeera Website';
        //   $mailheader = "From: $email \r\n";
        //   mail($to, $subject, $formcontent, $mailheader) or die("Error!");
        
         // Database connection parameters
            $db_host = "localhost";
            $db_username = "manjeeraho_new";
            $db_password = ".3[HG}@Ca=e$";
            $db_name = "manjeeraho_new";
            
            // Create a connection to the database
            $conn = new mysqli($db_host, $db_username, $db_password, $db_name);
            
            // Check the connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            
                // Insert data into the database
                $sql = "INSERT INTO `manjeera_group_leads` (`NAME`, `MOBILE`, `EMAIL`, `PROJECT`, `MESSAGE`, `DATE`) VALUES ('$name', '$countryWithMobile', '$email', '$project', '$message', CURTIME())";
                
                if ($conn->query($sql) === TRUE) {
                    echo "Data inserted successfully.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            
            
            // Close the database connection
            $conn->close();
            
        
            // CRM INTEGRATION    
            $urls = "https://manjeeracrm.co.in/mobileapp/mblead?api_key=Man12GDFUY56KMJKL&mobile_number=$mobile&lead_project_nm=3&customer_name=$customerName&email=$email&source_type=13";

            $curl = curl_init();
            
            curl_setopt_array($curl, array(
              CURLOPT_URL => $urls,
              CURLOPT_RETURNTRANSFER => true,
              CURLOPT_ENCODING => '',
              CURLOPT_MAXREDIRS => 10,
              CURLOPT_TIMEOUT => 0,
              CURLOPT_FOLLOWLOCATION => true,
              CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
              CURLOPT_CUSTOMREQUEST => 'POST',
            ));
            
            $response = curl_exec($curl);
            
            curl_close($curl);
            echo $response;
            
             header('location: ./thank-you');
        
        
      
  }
?>
