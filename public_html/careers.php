
<?php
 use PHPMailer\PHPMailer\PHPMailer;
 require_once 'PHPMailer/Exception.php';
 require_once 'PHPMailer/PHPMailer.php';
 require_once 'PHPMailer/SMTP.php';
 
 $mail = new PHPMailer(true);

  if(isset($_POST['c-submit'])){
      
          $name = $_POST['Name'];
          $mobile = $_POST['MobileNumber'];
          $email = $_POST['Email'];
          $message = $_POST['Message'];
          
            $uploadDir = 'media/resumes/'; // Directory to store uploaded files
            // Handle file upload
            $uploadedFile = $uploadDir . basename($_FILES['file']['name']);
            $movingFile = move_uploaded_file($_FILES['file']['tmp_name'], $uploadedFile);
            
            $siteUrl = 'https://www.manjeera.com/';
            
            $finalUrlFile = $siteUrl.$uploadedFile;
      
        // try {
        //     $mail-> isSMTP();
        //     $mail->SMTPDebug = 4;
        //     // $mail-> Host = "smtp.gmail.com";
        //     $mail-> Host = "smtp-mail.outlook.com";
        //     $mail-> SMTPAuth = true;
        //     // $mail-> Username = "leads@madworks.in";
        //     $mail-> Username = "marketing@manjeera.com";
        //     // $mail-> Password = "ewwadqwzuptynjnk";
        //     $mail-> Password = "Manjeera@711";
        //     //$mail-> SMTPSecure = "tls";
        //     $mail-> SMTPSecure = "tls";
        //     $mail-> Port ="587";
            
        //     $mail->setFrom("marketing@manjeera.com");
        //     $mail->addAddress("leads@madworks.in","resume from manjeera website");
        //     $mail->addAddress("nagaraju@madworks.in","resume from manjeera website");
        //     // $mail->addAddress("hr@manjeera.com","resume from manjeera website");
            
        //     $mail-> isHTML(true);
        //     $mail->Subject = "Lead From Manjeera Constructions";
        //     $mail-> Body = "Name: $name <br>  Mobile Number: $mobile <br> Email Id: $email <br> Messaage: $message";
        //     $mail->addAttachment($uploadedFile, 'Resume.pdf');
        //     $mail->send();
        //     // $alert = '<span>Thanks you for submitting the form</span>';
        //     // header('location: ./thank-you.php');
            
        // } catch (Exception $e) {
        //     $alert = '<span>form not submitted</span>';
        // }
        
        // data base work starts here
        
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
                $sql = "INSERT INTO `careers_leads` (`NAME`, `MOBILE`, `EMAIL`, `RESUME`, `MESSAGE`, `DATE`) VALUES ('$name', '$mobile', '$email', '$finalUrlFile', '$message', CURTIME())";
                
                if ($conn->query($sql) === TRUE) {
                    echo "Data inserted successfully.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            
            
            // Close the database connection
            $conn->close();
      
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CAREERS-MANJEERA</title>
    <link rel="stylesheet" href="css/styles.css" />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <!-- header starts  -->
    <?php
     include "header.php";
    ?>
    <!-- header ends  -->
    
    <section class="job-apply-main">
        <div class="job-apply-container">
            <div class="c-close-icon">
                <img src="media/close-icon.svg">
            </div>
            <form class="job-apply-form" method="POST" enctype="multipart/form-data">
                <input type="text" name="Name" placeholder="YOUR NAME">
                <input type="tel" name="MobileNumber" placeholder="YOUR MOBILE NUMBER" class="">
                <input type="email" name="Email" placeholder="YOUR EMAIL ID" class="careers-mails">
                <label for='file' class="file-label">ATTACH CV</label>
                <input type="file" name="file" id="file" placeholder="UPLOAD RESUME" accept=".doc, .docx, .pdf, .png, .jpg">
                
                <input placeholder="YOUR MESSAGE" name="Message" class="careers-message">
                <input type="submit" name="c-submit" value="SUBMIT" class="c-submit">
                
            </form>
        </div>
    </section>

    <section class="careersBanner">
      <div class="careersBanner-Container">
        <div class="bannerImage">
          <img class="desktop-careerheroimg" src="media/careers-hero.png" alt=""/>
          <img class="mobile-careerheroimg" src="media/careers-herobanner.png" alt="" />
          <div class="imageOverlay"></div>
        </div>
        <div class="bannerContent">
          <h2>GROW YOUR CAREER WITH MANJEERA</h2>
          <p>
           Unlock your potential at Manjeera: join our dynamic team
          </p>
          <a href="#all-positions">VIEW POSITIONS <img src="media/Arrow 14.png" alt="" /></a>
        </div>
      </div>
    </section>

    <!-- resume section starts -->

    <section class="resume">
      <div class="resume-Container">
        <p>
          Manjeera is guided by its values for all actions within and outside
          the Group and for business with customers and other associates.
          Members of Team Manjeera display initiative even in areas outside
          their direct work obligations, possesses a strong sense of commitment
          to work unit goals, <br />and feel a sense of responsibility that far
          exceeds what’s required by the work contract. They get increased
          autonomy, greater access to the top management, and more influence in
          work decisions.
        </p>
        <a class="c-apply">SEND US YOUR RESUME </a>
      </div>
    </section>

    <!-- workArea section starts -->

    <section class="workArea">
      <div class="workArea-container">
        <div class="workArea-specs">
          <div class="specs-left">
            <h2>ALL ABOUT TEAMWORK</h2>
            <p>
              Manjeera is guided by its values for all actions within and
              outside the Group and for business with customers and other
              associates. Members of Team Manjeera display initiative even in
              areas outside their direct work obligations, possess a strong
              sense of commitment to work unit goals, and feel a sense of
              responsibility that far exceeds what's required by the work
              contract. They get increased autonomy, greater access to  top
              management, and more influence in work decisions.
            </p>
          </div>
          <div class="specs-right">
            <div class="image">
              <img src="media/careers-1.jpg" alt="" />
            </div>
          </div>
        </div>
        <div class="workArea-specs">
          <div class="specs-left">
            <h2>ALL ABOUT TEAMWORK</h2>
            <p>
              At Manjeera, being positively engaged is the key, as much as
              bringing an owner's mentality to work while tossing the I do what I
              am told attitude out of the window. The commitment of the employee
              to deliver the value expected by the employer with no surprises is
              what makes him a true Manjeerite. A Manjeerite achieves better
              accountability by making the effort to understand thoroughly, the
              clear strategic direction of the management, the goals, measures,
              and targets communicated, and the policies, procedures, and
              processes in place.
            </p>
            <p>
              Be part of this burgeoning team of indomitable and reach out to
              the brightest future that you truly deserve.
            </p>
            <p>
              If you wish to shine bright in your career, e-mail your resume to
              <a href="mailto:hr@manjeera.com">hr@manjeera.com</a>
            </p>
          </div>
          <div class="specs-right">
            <div class="image">
              <img src="media/careers-2.jpg" alt="" />
            </div>
          </div>
        </div>
        <div class="workArea-specs">
          <div class="specs-left">
            <h2>ALL ABOUT TEAMWORK</h2>
            <p>
              We are busy building both landmark constructions and the futures of
              our employees. At Manjeera, you will seek new growth opportunities
              and get challenged every day, meeting and working with the best
              people in the industry. We offer continuous education and training
              to develop your career and help you realise your true potential.
            </p>
            <p>
              The inspiring work environment and incentive structure foster
              team spirit and enthusiasm to realize the objectives of the
              Company. We know the importance of a safe and healthy work
              environment and strive hard to achieve that for our employees.
            </p>
          </div>
          <div class="specs-right">
            <div class="image">
              <img src="media/careers-3.jpg" alt="" />
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- position section starts -->

    <section class="positions" id="all-positions">
      <div class="positions-Container">
        <div class="title">
          <h2>CURRENT POSITIONS</h2>
        </div>
        <div class="position">
          <h3>SALE EXECUTIVE / MANAGER</h3>
          <div class="position-Details">
            <p>Qualification : MBA / Graduate/ Post Graduate /  </p>
            <p>Experience : 5+ Years</p>
            <p>Location : Hyderabad, Bangalore, Ongole</p>
          </div>
          <div class="position-Description">
            <a href="#DescriptionLink1"
              >read job description <i class="bx bx-chevron-down"></i
            ></a>
            <div class="DescriptionLink" id="DescriptionLink1">
              <h3>Desired Candidate Requirements:</h3>
              <ul>
                    <li>Candidate must be An MBA from reputed college  Or Graduate / Post Graduate with an excellent academic record.</li>
                   <li> Must possess Excellent communication skills.</li>
                    <li>Candidate should be aggressive in Sales, should be SALES TARGET ORIENTED, and should have achieved sales targets consistently in current /past assignments.</li>
                    <li>Must have good experience in Residential sales of apartments, villas, plots with good developer.</li>
                    <li>Must be well versed in MS Office and ERP.</li>
                    <li>Must be well groomed that is smart and Presentable on all working days.</li>
                    <li>Should have good experience in handling HNI Clients/Customers.</li>
                    <li>Should have a self-positive attitude & confidence to accept new challenges.</li>
                    <li>Must own a bike/car with a valid license & papers for the vehicle.</li>
                    <li>Should be Comfortable with numbers and sales planning.</li>
              </ul>
              
              <h3>Roles and Responsibilities for a Sales Executive / Manager</h3>
              <ul>
                    <li>Should own the monthly / Quarterly / Half-yearly / Yearly sales Targets and should achieve the SALES TARGETS MONTH ON MONTH CONSITENTLY.</li>
                    <li>Should possess good understanding of the company's products and services, and be able to effectively communicate the value proposition to clients.</li>
                    <li>Should be able to generate own Leads , Manage & Nurture  the leads, and Convert the leads into sales  and  Sales leads to be attended immediately after lead is assigned and generated.</li>
                    <li>Collaborating with Marketing Team to develop lead generations. And provide monthly competitors insights to managements on sales offer/pricing of competitors projects.</li>
                    <li>Develop sales strategies to acquire new customers and clients / MUST ACHIEVE SALES TARGETS EVERY MONTH without any excuses, whatsoever.</li>
                    <li>Setting sales  targets, performance plans, and standards for the sales team</li>
                    <li>Convert prospects into customers by showcasing appropriate residential properties to the prospects matching the investment/residential needs of the prospects.</li>
                    <li>Develop sales plan    and   sales pitch for the project based on technical specifications and surrounding area development in consultation with leadership team.</li>
                    <li>To Build and maintain good relationships with all existing clients & new clients and Channel Partners.</li>
                    <li>Should be Willing to Cold call on primary, secondary database / leads to convert them to site visits in absence of pre sales and tele caller team.</li>
                    <li>To attend timely Review meetings with proper preparation, as per instruction of leadership team   & channel partner orientations as and when required.</li>
                    <li>Participate in Closing & Negotiation meetings with buyers & Sellers.</li>
                    <li>Maintain accurate sales reporting information through ERP.</li>
                    <li>Should be willing to relocate to other projects and other locations, as per business needs and as per instructions of leadership team.</li>
              </ul>
              <div class="jobdescription-apply-btn" style="text-align: center;">
                  <a class="c-apply">SEND US YOUR RESUME </a>
              </div>
            </div>
          </div>
        </div>
        <div class="position" style="display: none;">
          <h3>Engineer - Projects</h3>
          <div class="position-Details">
            <p>Qualification : Graduate/Diploma</p>
            <p>Experience : 3 – 6 years</p>
            <p>Location: Ongole</p>
          </div>
          <div class="position-Description">
            <a href="#DescriptionLink2"
              >read job description <i class="bx bx-chevron-down"></i
            ></a>
            <div class="DescriptionLink" id="DescriptionLink2">
              <p>
                3 – 6 years experience in Real Estate. Project at Ongole
                (Preference will be given to Ongole & nearby places incumbents).
              </p>
              <a class="c-apply">SEND US YOUR RESUME </a>
            </div>
          </div>
        </div>
        <div class="position" style="display: none;">
          <h3>Asst. Manager – Sales</h3>
          <div class="position-Details">
            <p>Qualification : Graduate /MBA</p>
            <p>Experience : 5 to 5 Years</p>
            <p>Location: Hyderabad</p>
          </div>
          <div class="position-Description">
            <a href="#DescriptionLink3"
              >read job description <i class="bx bx-chevron-down"></i
            ></a>
            <div class="DescriptionLink" id="DescriptionLink3">
              <p>
                Experience in Real estate sales, layouts at Hyderabad.
                (Residential, High Rise Apartments).
              </p>
              <a class="c-apply">SEND US YOUR RESUME </a>
            </div>
          </div>
        </div>
        <div class="position" style="display: none;">
          <h3>Executive – HR</h3>
          <div class="position-Details">
            <p>Qualification : MBA- HR</p>
            <p>Experience : 1 to 3 Years</p>
            <p>Location: Hyderabad</p>
          </div>
          <div class="position-Description">
            <a href="#DescriptionLink4"
              >read job description <i class="bx bx-chevron-down"></i
            ></a>
            <div class="DescriptionLink" id="DescriptionLink4">
              <p>
                Experience in Recruitment, onboarding and exit formalities and
                other day to day administration tasks at Hyderabad. (MBA – HR
                will be Preferable).
              </p>
              <a class="c-apply">SEND US YOUR RESUME </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- footer starts  -->
    <?php
      include "footer.php";
    ?>

    <!-- footer ends  -->
    
    
  </body>
</html>
