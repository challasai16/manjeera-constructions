

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
        .h-slider-main .slick-dots {
            bottom: 25px !important;
        }
        .h-slider-main .slick-dots li button:before {
            font-size: 12px !important;
            color: white;
            opacity: 1 !important;
        }
        .h-slider-main .slick-dots li.slick-active button:before {
            color: #971419 !important;
        }
        .header-main {
            margin-bottom: 0 !important;
        }
    </style>
  </head>
  <body>



    <!-- header starts  -->
    <?php
     include "header.php";
    ?>
    <!-- header ends  -->


    
        <?php
        if($_SERVER['REQUEST_METHOD'] == "POST"  && isset($_POST["submit"])){
          //search specs
      
          $sector = $_POST["sector"];
          $location = $_POST["location"];
          $type = $_POST["type"];
      
          //db connection
          require_once "./admin/db.php";

          echo '<section class="project_display" style=" width: 100%; height: 100vh; position: fixed; top: 0; z-index: 1000; background: rgba(0, 0, 0, 0.7);">
          <div class="project_display-container">
            <h2>YOUR RESULTS</h2>
            <div class="closePopUp">
              <span class="close-1"></span>
              <span class="close-2"></span>
            </div>
            <div class="projects">';
          ?>

    <!-- project display popup  -->

   

        <?php       
        $sql = "SELECT * FROM `manjeera_projects` WHERE 1=1";

        if(!empty($sector)){
          $sql .= " AND Sector = '". $sector . "'";
        }
    
        if(!empty($location)){
          $sql .= " AND Location = '". $location . "'";
        }
    
        if(!empty($type)){
          $sql .= " AND Type = '". $type . "'";
        }
    
        //statement
        
        $stmt = mysqli_stmt_init($conn);
    
        if(!mysqli_stmt_prepare($stmt,$sql)){
          echo 'Stmt Error'. mysqli_error($conn);
      }else{
        mysqli_stmt_execute($stmt);
        $result =mysqli_stmt_get_result($stmt);
        
      }
        if(mysqli_num_rows($result) >0){
          while($data = mysqli_fetch_assoc($result)){

        ?>
          <!-- 1 -->
          <div class="project">
            <div class="image">
              <img src="<?=$data["ImageURL"]?>" alt="" />
            </div>
            <div class="content">
              <h3><span>Project: </span> <?=$data["Name"]?></h3>
              <h3><span>Location: </span> <?=$data["Location"]?></h3>
              <a href=" <?=$data["ProjectLink"]?>" target="_blank">VIEW PROJECT</a>
            </div>
          </div>

          <?php
         }
        }else{
          echo "no records found";
        }

        echo '</div>
        </div>
      </section>
  ';

      }
          ?>
        
     <!-- project display popup  -->

    <!-- slider section starts here  -->
    <section class="h-slider-main">
      <div class="h-slider-container m-container home-main-slider">
          <!--1-->
           <!--  newyork-->
        <div class="h-slider">
          <img class="desktop-slider" src="media/sliders/newyork-desk-slider.jpg" alt="">
          <img class="mobile-slider" src="media/sliders/newyork-mobile-slider.jpg" alt="">
          <div class="h-slider-text">
            <span class="tittle-line"></span>
            <strong style="color: #e5c184;">MANJEERA NEWYORK</strong>
            <h1>EMBRACE THE EMPIRE <br>STATE OF MIND
            </h1>
            <p>LOCATED IN BANGALORE</p>
            <a href="http://newyork.manjeera.com/" target="_blank">READ MORE</a>
          </div>
        </div>
          <!--2-->
          <!-- casa-->
        <div class="h-slider">
          <img class="desktop-slider" src="media/sliders/casa-desk-slider.jpg" alt="">
          <img class="mobile-slider" src="media/sliders/casa-mobile-slider.jpg" alt="">
          
          <div class="h-slider-text">
            <span class="tittle-line"></span>
            <strong style="color: #e5c184;">MANJEERA CASA</strong>
            <h1>Modern Living <br>Gated Comfort
            </h1>
            <p>LOCATED IN HYDERABAD</p>
            <a href="https://casa.manjeera.com/" target="_blank">READ MORE</a>
          </div>
        </div>
        
           <!--3-->
          <!-- blue-->
        <div class="h-slider">
          <img class="desktop-slider" src="media/sliders/blue-desk-slider.jpg" alt="">
          <img class="mobile-slider" src="media/sliders/blue-mobile-slider.jpg" alt="">
          <div class="h-slider-text">
            <span class="tittle-line"></span>
            <strong style="color: #92bbda;">MANJEERA BLUE</strong>
            <h1>Indulge in the Epitome of <br> Opulence and Extravaganza
            </h1>
            <p>LOCATED IN ONGOLE</p>
            <a href="https://blue.manjeera.com/" target="_blank">READ MORE</a>
          </div>
        </div>
       
          <!--4-->
        <!-- tuscany-->
        <div class="h-slider">
          <img class="desktop-slider" src="media/sliders/tuscany-desk-slider.jpg" alt="">
          <img class="mobile-slider" src="media/sliders/tuscany-mobile-slider.jpg" alt="">
          <div class="h-slider-text">
            <span class="tittle-line"></span>
            <strong style="color: #d5bb98;">MANJEERA TUSCANY</strong>
            <h1>A Green Weekend <br>Retreat
            </h1>
            <p>LOCATED IN ZAHEERABAD</p>
            <a href="https://tuscany.manjeera.com/" target="_blank">READ MORE</a>
          </div>
        </div>
        <!--5-->
        <!--6-->
      </div>
    </section>

    <!-- slider section ends here -->

    <!-- search section starts here  -->
    <section class="search-main" style="display: none;">
      <div class="section-container">
        <form class="search-form" action="index.php" method="POST" id="search_form">
          <select class="sector" name="sector">
            <option value >SELECT SECTOR</option>
            <option value="Residential">RESIDENTIAL</option>
             <option value="commercial">COMMERCIAL</option>
            <option value="retail">RETAIL</option>
            <option value="hospitality">HOSPITALITY</option> c
          </select>

          <select class="location" name="location">
            <option value>SELECT LOCATION</option>
            <option value="Hyderabad">HYDERABAD</option>
            <option value="Bangalore">BANGALORE</option>
            <option value="VIJAYAWADA">VIJAYAWADA</option> 
            <option value="Ongole">ONGOLE</option>
            <option value="Ongole">RAJAHMUNDRY</option>
          </select>
          <select class="type" name="type">
            <option value>TYPE</option>
            <option value="UnderConstruction">UNDERCONSTRUCTION</option>
             <option value="ReadyToMoveIn">READY TO MOVE IN</option>
            <option value="Upcoming">UPCOMING PROJECTS</option>
          </select>
          <input type="submit" name="submit" value="SEARCH NOW" class="h-search-sbtn">
        </form>
      </div>
    </section>

    <!-- search section ends here  -->

    <!-- hightlights sections starts  -->
    <section class="hightlights-main">
      <div class="hightlights-container m-container m-flex">
        <!-- 1 -->
        <div class="hightlight-box">
          <strong>4+</strong>
          <p>MAJOR SECTORS </p>
        </div>
        <!-- 2 -->
        <div class="hightlight-box">
          <strong>6+</strong>
          <p>SERVING LOCATIONS </p>
        </div>
        <!-- 3 -->
        <div class="hightlight-box">
          <strong>20+</strong>
          <p>PROJECTS COMPLETED</p>
        </div>
        <!-- 4 -->

        <!-- 5 -->
      </div>
    </section>

    <!-- hightlights section ends  -->
    <!-- about section starts here  -->
    <section class="home-about">
      <div class="home-about-container m-container">
        <!-- 1 -->
        <div class="about-img" style="display: none;">
          <!--<img src="media/home-about-img.png" alt="">-->
          <!--<img src="media/h-about.png" alt="">-->
        </div>
        <!-- 2 -->
        <div class="home-about-box m-flex">
          <!-- left -->
          <div class="home-about-left" style="display: none;">
            <h2>MANJEERA
              <strong>ABOUT US</strong>
            </h2>
          </div>
          <!-- right -->
          <div class="home-about-right" style="display: none;">
            <h5>Architectural leadership is our forte.</h5>
            <p>Manjeera realized very early on, that success can be very quickly redefined. Manjeera has prepared itself fully to dare the challenges of tomorrow’s marketplace. Technology skills, domain expertise, process focus, and a commitment to long-term client relationships; all combine at Manjeera, to deliver performances that rank high on quality.</p>
            <a href="./about-us.php" data-text="Read More">Read More <img src="media/arrow-right-black.svg"></a>
          </div>
        </div>
        <!-- 3 -->

        <div class="home-about-high m-flex">
          <!-- 1 -->
          <div class="home-about-highbox">
            <strong>5 million square feet, under development</strong>
          </div>
          <!-- 2 -->
          <div class="home-about-highbox">
            <strong>36+ Years Of Experience In Construction Industry</strong>
          </div>
          <!-- 3 -->
          <div class="home-about-highbox">
            <strong>Present in Telangana, Andhra Pradesh, Karnataka</strong>
          </div>
          <!-- 4 -->
        </div>
      </div>
    </section>

    <!-- about section ends here -->

    <!-- our projects starts here  -->
    <section class="home-projects-main">

      <div class="home-projects-container m-container">
        <div class="home-projects-headingbox m-flex">
          <div class="project-text-left">
            <h3>OUR PROJECTS</h3>
          </div>
          <div class="project-text-right">
                <p>Manjeera's projects span across various sectors showcasing the company's diverse portfolio and expertise in real estate development.</p>
          </div>
        </div>
        <div class="home-projects m-flex">
          <!-- 1 -->
          <div class="home-project-box">
            <img src="media/sector-residential.jpg" alt="">
            <div class="project-text">
              <a href="./residential.php" data-text="RESIDENTIAL">RESIDENTIAL</a>
            </div>
          </div>
          <!-- 2 -->
          <div class="home-project-box">
            <img src="media/sector-commercial.jpg" alt="">
            <div class="project-text">
              <a href="./commercial.php" data-text="COMMERCIAL">COMMERCIAL</a>
            </div>
          </div>
          <!-- 3 -->
          <div class="home-project-box">
            <img src="media/sector-retail.jpg" alt="">
            <div class="project-text">
              <a href="./retail.php" data-text="RETAIL">RETAIL</a>
            </div>
          </div>

          <!-- 4 -->
          <div class="home-project-box">
            <img src="media/sector-hospitality.jpg" alt="">
            <div class="project-text">
              <a href="./hospitality.php" data-text="HOSPITALITY">HOSPITALITY</a>
            </div>
          </div>
          <!-- 5 -->
        </div>
      </div>
    </section>

    <!-- our projects ends here  -->

    <!-- our featured projects starts  -->
    <section class="h-featured-main">
      <div class="h-featured-container m-container">
        <div class="h-featured-hedingbox">
          <h3>OUR FEATURED WORKS</h3>
          <p>Manjeera continuously strives to make lives calm and tranquil by providing ideal homes.</p>
        </div>
        <section class="featured-slider h-featured-boxcontainer m-flex">
             <!-- 4 -->
          <div class="h-featured-box">
            <img src="media/casa-project.jpg" alt="">
            <div class="h-feature-text">
            <a href="https://casa.manjeera.com/" target="_blank">
              <strong>Manjeera Casa</strong>
              <span>Hyderabad | 3BHK</span>
            </a>
           </div>
          </div>
          <!-- 5 -->
          <div class="h-featured-box">
            <img src="media/tuscany-project.jpg" alt="">
            <div class="h-feature-text">
            <a href="https://tuscany.manjeera.com/" target="_blank">
              <strong>Manjeera Tuscany</strong>
              <span>Zaheerabad | 13M sqft</span>
            </a>
           </div>
          </div>
          <!-- 3 -->
          <div class="h-featured-box">
            <img src="media/monarch-project.jpg" alt="">
            <div class="h-feature-text">
            <a href="./monarch-project.php">
              <strong>Manjeera Monarch</strong>
              <span>Vijayawada | 2, 3 & 4 BHK</span>
            </a>
           </div>
          </div>
           <!-- 2 -->
          <div class="h-featured-box">
            <img src="media/blue-project.jpg" alt="">
            <div class="h-feature-text">
            <a href="https://blue.manjeera.com/" target="_blank">
              <strong>Manjeera Blue</strong>
              <span>Ongole | 246 Villas</span>
            </a>
            </div>
          </div>
          <!-- 1 -->
          <div class="h-featured-box">
            <img src="media/newyork-project.jpg" alt="">
            <div class="h-feature-text">
              <a href="http://newyork.manjeera.com/" target=_blank>
                <strong>Manjeera New York</strong>
                <span>Bangalore | 2 & 3 BHK</span>
              </a>
            </div>
          </div>
         
          
         
          <!-- 6 -->
        </section>
        <div class="h-featured-morebtn">
          <!--<a href="#">MORE WORKS</a>-->
        </div>
      </div>
    </section>

    <!-- our featured projects ends -->

    <!-- contact us section starts  -->
    <section class="h-contact-main">

      <div class="h-contact-container m-container">
        <h3>CONTACT US</h3>
        <p>We are here for you, now & always!</p>
        <div class="h-contact-wrapper m-flex">
          <!-- left -->
          <div class="h-contact-left">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d60897.21054626568!2d78.39003967055014!3d17.456092487483595!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb90cf5e6689ab%3A0x692e591e9bde149f!2sManjeera%20Constructions%20Limited!5e0!3m2!1sen!2sin!4v1681725616315!5m2!1sen!2sin" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <!-- right -->
          <div class="h-contact-right" id="h-contact">
            <form class="" action="contact-mail.php" method="POST">
              <i class="star1 bi bi-asterisk"></i>
              <i class="star2 bi bi-asterisk"></i>
              <i class="star3 bi bi-asterisk"></i>
              <i class="star4 bi bi-asterisk"></i>
              <input type="text" name="Name" value="" placeholder="NAME" required>
              <div class="m-flex c-mobile-number">
                <select class="" name="Country" required style="width: 35%">
                  <option data-countryCode="IN" value="91" selected>India (+91)</option>
                  <option data-countryCode="DZ" value="213">Algeria (+213)</option>
                  <option data-countryCode="AD" value="376">Andorra (+376)</option>
                  <option data-countryCode="AO" value="244">Angola (+244)</option>
                  <option data-countryCode="AI" value="1264">Anguilla (+1264)</option>
                  <option data-countryCode="AG" value="1268">Antigua &amp; Barbuda (+1268)</option>
                  <option data-countryCode="AR" value="54">Argentina (+54)</option>
                  <option data-countryCode="AM" value="374">Armenia (+374)</option>
                  <option data-countryCode="AW" value="297">Aruba (+297)</option>
                  <option data-countryCode="AU" value="61">Australia (+61)</option>
                  <option data-countryCode="AT" value="43">Austria (+43)</option>
                  <option data-countryCode="AZ" value="994">Azerbaijan (+994)</option>
                  <option data-countryCode="BS" value="1242">Bahamas (+1242)</option>
                  <option data-countryCode="BH" value="973">Bahrain (+973)</option>
                  <option data-countryCode="BD" value="880">Bangladesh (+880)</option>
                  <option data-countryCode="BB" value="1246">Barbados (+1246)</option>
                  <option data-countryCode="BY" value="375">Belarus (+375)</option>
                  <option data-countryCode="BE" value="32">Belgium (+32)</option>
                  <option data-countryCode="BZ" value="501">Belize (+501)</option>
                  <option data-countryCode="BJ" value="229">Benin (+229)</option>
                  <option data-countryCode="BM" value="1441">Bermuda (+1441)</option>
                  <option data-countryCode="BT" value="975">Bhutan (+975)</option>
                  <option data-countryCode="BO" value="591">Bolivia (+591)</option>
                  <option data-countryCode="BA" value="387">Bosnia Herzegovina (+387)</option>
                  <option data-countryCode="BW" value="267">Botswana (+267)</option>
                  <option data-countryCode="BR" value="55">Brazil (+55)</option>
                  <option data-countryCode="BN" value="673">Brunei (+673)</option>
                  <option data-countryCode="BG" value="359">Bulgaria (+359)</option>
                  <option data-countryCode="BF" value="226">Burkina Faso (+226)</option>
                  <option data-countryCode="BI" value="257">Burundi (+257)</option>
                  <option data-countryCode="KH" value="855">Cambodia (+855)</option>
                  <option data-countryCode="CM" value="237">Cameroon (+237)</option>
                  <option data-countryCode="CA" value="1">Canada (+1)</option>
                  <option data-countryCode="CV" value="238">Cape Verde Islands (+238)</option>
                  <option data-countryCode="KY" value="1345">Cayman Islands (+1345)</option>
                  <option data-countryCode="CF" value="236">Central African Republic (+236)</option>
                  <option data-countryCode="CL" value="56">Chile (+56)</option>
                  <option data-countryCode="CN" value="86">China (+86)</option>
                  <option data-countryCode="CO" value="57">Colombia (+57)</option>
                  <option data-countryCode="KM" value="269">Comoros (+269)</option>
                  <option data-countryCode="CG" value="242">Congo (+242)</option>
                  <option data-countryCode="CK" value="682">Cook Islands (+682)</option>
                  <option data-countryCode="CR" value="506">Costa Rica (+506)</option>
                  <option data-countryCode="HR" value="385">Croatia (+385)</option>
                  <option data-countryCode="CU" value="53">Cuba (+53)</option>
                  <option data-countryCode="CY" value="90392">Cyprus North (+90392)</option>
                  <option data-countryCode="CY" value="357">Cyprus South (+357)</option>
                  <option data-countryCode="CZ" value="42">Czech Republic (+42)</option>
                  <option data-countryCode="DK" value="45">Denmark (+45)</option>
                  <option data-countryCode="DJ" value="253">Djibouti (+253)</option>
                  <option data-countryCode="DM" value="1809">Dominica (+1809)</option>
                  <option data-countryCode="DO" value="1809">Dominican Republic (+1809)</option>
                  <option data-countryCode="EC" value="593">Ecuador (+593)</option>
                  <option data-countryCode="EG" value="20">Egypt (+20)</option>
                  <option data-countryCode="SV" value="503">El Salvador (+503)</option>
                  <option data-countryCode="GQ" value="240">Equatorial Guinea (+240)</option>
                  <option data-countryCode="ER" value="291">Eritrea (+291)</option>
                  <option data-countryCode="EE" value="372">Estonia (+372)</option>
                  <option data-countryCode="ET" value="251">Ethiopia (+251)</option>
                  <option data-countryCode="FK" value="500">Falkland Islands (+500)</option>
                  <option data-countryCode="FO" value="298">Faroe Islands (+298)</option>
                  <option data-countryCode="FJ" value="679">Fiji (+679)</option>
                  <option data-countryCode="FI" value="358">Finland (+358)</option>
                  <option data-countryCode="FR" value="33">France (+33)</option>
                  <option data-countryCode="GF" value="594">French Guiana (+594)</option>
                  <option data-countryCode="PF" value="689">French Polynesia (+689)</option>
                  <option data-countryCode="GA" value="241">Gabon (+241)</option>
                  <option data-countryCode="GM" value="220">Gambia (+220)</option>
                  <option data-countryCode="GE" value="7880">Georgia (+7880)</option>
                  <option data-countryCode="DE" value="49">Germany (+49)</option>
                  <option data-countryCode="GH" value="233">Ghana (+233)</option>
                  <option data-countryCode="GI" value="350">Gibraltar (+350)</option>
                  <option data-countryCode="GR" value="30">Greece (+30)</option>
                  <option data-countryCode="GL" value="299">Greenland (+299)</option>
                  <option data-countryCode="GD" value="1473">Grenada (+1473)</option>
                  <option data-countryCode="GP" value="590">Guadeloupe (+590)</option>
                  <option data-countryCode="GU" value="671">Guam (+671)</option>
                  <option data-countryCode="GT" value="502">Guatemala (+502)</option>
                  <option data-countryCode="GN" value="224">Guinea (+224)</option>
                  <option data-countryCode="GW" value="245">Guinea - Bissau (+245)</option>
                  <option data-countryCode="GY" value="592">Guyana (+592)</option>
                  <option data-countryCode="HT" value="509">Haiti (+509)</option>
                  <option data-countryCode="HN" value="504">Honduras (+504)</option>
                  <option data-countryCode="HK" value="852">Hong Kong (+852)</option>
                  <option data-countryCode="HU" value="36">Hungary (+36)</option>
                  <option data-countryCode="IS" value="354">Iceland (+354)</option>
                  <option data-countryCode="ID" value="62">Indonesia (+62)</option>
                  <option data-countryCode="IR" value="98">Iran (+98)</option>
                  <option data-countryCode="IQ" value="964">Iraq (+964)</option>
                  <option data-countryCode="IE" value="353">Ireland (+353)</option>
                  <option data-countryCode="IL" value="972">Israel (+972)</option>
                  <option data-countryCode="IT" value="39">Italy (+39)</option>
                  <option data-countryCode="JM" value="1876">Jamaica (+1876)</option>
                  <option data-countryCode="JP" value="81">Japan (+81)</option>
                  <option data-countryCode="JO" value="962">Jordan (+962)</option>
                  <option data-countryCode="KZ" value="7">Kazakhstan (+7)</option>
                  <option data-countryCode="KE" value="254">Kenya (+254)</option>
                  <option data-countryCode="KI" value="686">Kiribati (+686)</option>
                  <option data-countryCode="KP" value="850">Korea North (+850)</option>
                  <option data-countryCode="KR" value="82">Korea South (+82)</option>
                  <option data-countryCode="KW" value="965">Kuwait (+965)</option>
                  <option data-countryCode="KG" value="996">Kyrgyzstan (+996)</option>
                  <option data-countryCode="LA" value="856">Laos (+856)</option>
                  <option data-countryCode="LV" value="371">Latvia (+371)</option>
                  <option data-countryCode="LB" value="961">Lebanon (+961)</option>
                  <option data-countryCode="LS" value="266">Lesotho (+266)</option>
                  <option data-countryCode="LR" value="231">Liberia (+231)</option>
                  <option data-countryCode="LY" value="218">Libya (+218)</option>
                  <option data-countryCode="LI" value="417">Liechtenstein (+417)</option>
                  <option data-countryCode="LT" value="370">Lithuania (+370)</option>
                  <option data-countryCode="LU" value="352">Luxembourg (+352)</option>
                  <option data-countryCode="MO" value="853">Macao (+853)</option>
                  <option data-countryCode="MK" value="389">Macedonia (+389)</option>
                  <option data-countryCode="MG" value="261">Madagascar (+261)</option>
                  <option data-countryCode="MW" value="265">Malawi (+265)</option>
                  <option data-countryCode="MY" value="60">Malaysia (+60)</option>
                  <option data-countryCode="MV" value="960">Maldives (+960)</option>
                  <option data-countryCode="ML" value="223">Mali (+223)</option>
                  <option data-countryCode="MT" value="356">Malta (+356)</option>
                  <option data-countryCode="MH" value="692">Marshall Islands (+692)</option>
                  <option data-countryCode="MQ" value="596">Martinique (+596)</option>
                  <option data-countryCode="MR" value="222">Mauritania (+222)</option>
                  <option data-countryCode="YT" value="269">Mayotte (+269)</option>
                  <option data-countryCode="MX" value="52">Mexico (+52)</option>
                  <option data-countryCode="FM" value="691">Micronesia (+691)</option>
                  <option data-countryCode="MD" value="373">Moldova (+373)</option>
                  <option data-countryCode="MC" value="377">Monaco (+377)</option>
                  <option data-countryCode="MN" value="976">Mongolia (+976)</option>
                  <option data-countryCode="MS" value="1664">Montserrat (+1664)</option>
                  <option data-countryCode="MA" value="212">Morocco (+212)</option>
                  <option data-countryCode="MZ" value="258">Mozambique (+258)</option>
                  <option data-countryCode="MN" value="95">Myanmar (+95)</option>
                  <option data-countryCode="NA" value="264">Namibia (+264)</option>
                  <option data-countryCode="NR" value="674">Nauru (+674)</option>
                  <option data-countryCode="NP" value="977">Nepal (+977)</option>
                  <option data-countryCode="NL" value="31">Netherlands (+31)</option>
                  <option data-countryCode="NC" value="687">New Caledonia (+687)</option>
                  <option data-countryCode="NZ" value="64">New Zealand (+64)</option>
                  <option data-countryCode="NI" value="505">Nicaragua (+505)</option>
                  <option data-countryCode="NE" value="227">Niger (+227)</option>
                  <option data-countryCode="NG" value="234">Nigeria (+234)</option>
                  <option data-countryCode="NU" value="683">Niue (+683)</option>
                  <option data-countryCode="NF" value="672">Norfolk Islands (+672)</option>
                  <option data-countryCode="NP" value="670">Northern Marianas (+670)</option>
                  <option data-countryCode="NO" value="47">Norway (+47)</option>
                  <option data-countryCode="OM" value="968">Oman (+968)</option>
                  <option data-countryCode="PW" value="680">Palau (+680)</option>
                  <option data-countryCode="PA" value="507">Panama (+507)</option>
                  <option data-countryCode="PG" value="675">Papua New Guinea (+675)</option>
                  <option data-countryCode="PY" value="595">Paraguay (+595)</option>
                  <option data-countryCode="PE" value="51">Peru (+51)</option>
                  <option data-countryCode="PH" value="63">Philippines (+63)</option>
                  <option data-countryCode="PL" value="48">Poland (+48)</option>
                  <option data-countryCode="PT" value="351">Portugal (+351)</option>
                  <option data-countryCode="PR" value="1787">Puerto Rico (+1787)</option>
                  <option data-countryCode="QA" value="974">Qatar (+974)</option>
                  <option data-countryCode="RE" value="262">Reunion (+262)</option>
                  <option data-countryCode="RO" value="40">Romania (+40)</option>
                  <option data-countryCode="RU" value="7">Russia (+7)</option>
                  <option data-countryCode="RW" value="250">Rwanda (+250)</option>
                  <option data-countryCode="SM" value="378">San Marino (+378)</option>
                  <option data-countryCode="ST" value="239">Sao Tome &amp; Principe (+239)</option>
                  <option data-countryCode="SA" value="966">Saudi Arabia (+966)</option>
                  <option data-countryCode="SN" value="221">Senegal (+221)</option>
                  <option data-countryCode="CS" value="381">Serbia (+381)</option>
                  <option data-countryCode="SC" value="248">Seychelles (+248)</option>
                  <option data-countryCode="SL" value="232">Sierra Leone (+232)</option>
                  <option data-countryCode="SG" value="65">Singapore (+65)</option>
                  <option data-countryCode="SK" value="421">Slovak Republic (+421)</option>
                  <option data-countryCode="SI" value="386">Slovenia (+386)</option>
                  <option data-countryCode="SB" value="677">Solomon Islands (+677)</option>
                  <option data-countryCode="SO" value="252">Somalia (+252)</option>
                  <option data-countryCode="ZA" value="27">South Africa (+27)</option>
                  <option data-countryCode="ES" value="34">Spain (+34)</option>
                  <option data-countryCode="LK" value="94">Sri Lanka (+94)</option>
                  <option data-countryCode="SH" value="290">St. Helena (+290)</option>
                  <option data-countryCode="KN" value="1869">St. Kitts (+1869)</option>
                  <option data-countryCode="SC" value="1758">St. Lucia (+1758)</option>
                  <option data-countryCode="SD" value="249">Sudan (+249)</option>
                  <option data-countryCode="SR" value="597">Suriname (+597)</option>
                  <option data-countryCode="SZ" value="268">Swaziland (+268)</option>
                  <option data-countryCode="SE" value="46">Sweden (+46)</option>
                  <option data-countryCode="CH" value="41">Switzerland (+41)</option>
                  <option data-countryCode="SI" value="963">Syria (+963)</option>
                  <option data-countryCode="TW" value="886">Taiwan (+886)</option>
                  <option data-countryCode="TJ" value="7">Tajikstan (+7)</option>
                  <option data-countryCode="TH" value="66">Thailand (+66)</option>
                  <option data-countryCode="TG" value="228">Togo (+228)</option>
                  <option data-countryCode="TO" value="676">Tonga (+676)</option>
                  <option data-countryCode="TT" value="1868">Trinidad &amp; Tobago (+1868)</option>
                  <option data-countryCode="TN" value="216">Tunisia (+216)</option>
                  <option data-countryCode="TR" value="90">Turkey (+90)</option>
                  <option data-countryCode="TM" value="7">Turkmenistan (+7)</option>
                  <option data-countryCode="TM" value="993">Turkmenistan (+993)</option>
                  <option data-countryCode="TC" value="1649">Turks &amp; Caicos Islands (+1649)</option>
                  <option data-countryCode="TV" value="688">Tuvalu (+688)</option>
                  <option data-countryCode="UG" value="256">Uganda (+256)</option>
                  <!-- <option data-countryCode="GB" value="44">UK (+44)</option> -->
                  <option data-countryCode="UA" value="380">Ukraine (+380)</option>
                  <option data-countryCode="AE" value="971">United Arab Emirates (+971)</option>
                  <option data-countryCode="UY" value="598">Uruguay (+598)</option>
                  <!-- <option data-countryCode="US" value="1">USA (+1)</option> -->
                  <option data-countryCode="UZ" value="7">Uzbekistan (+7)</option>
                  <option data-countryCode="VU" value="678">Vanuatu (+678)</option>
                  <option data-countryCode="VA" value="379">Vatican City (+379)</option>
                  <option data-countryCode="VE" value="58">Venezuela (+58)</option>
                  <option data-countryCode="VN" value="84">Vietnam (+84)</option>
                  <option data-countryCode="VG" value="84">Virgin Islands - British (+1284)</option>
                  <option data-countryCode="VI" value="84">Virgin Islands - US (+1340)</option>
                  <option data-countryCode="WF" value="681">Wallis &amp; Futuna (+681)</option>
                  <option data-countryCode="YE" value="969">Yemen (North)(+969)</option>
                  <option data-countryCode="YE" value="967">Yemen (South)(+967)</option>
                  <option data-countryCode="ZM" value="260">Zambia (+260)</option>
                  <option data-countryCode="ZW" value="263">Zimbabwe (+263)</option>
                </select>
                <input type="tel" name="MobileNumber" value="" placeholder="MOBILE NUMBER" onkeypress="isInputNumber(event); if(this.value.length==10)  return false; "
                minlength="10"
                title="10 Digit Valid Number" maxlength="10" style="width: 65%"
                required>
              </div>
              <input type="email" name="Email" value="" placeholder="EMAIL ADDRESS" required>
              <select class="select-project-c" name="ProjectName" required>
                  <option value="select-project">SELECT PROJECT</option>
                  <option value="Manjeeera-Tuscany">MANJEERA TUSCANY</option>
                  <option value="Manjeera-Blue">MANJEERA BLUE</option>
                  <option value="Manjeera-Newyork">MANJEERA NEWYORK</option>
                  <option value="Manjeera-Monarch">MANJEERA MONARCH</option>
                  <option value="Manjeera-Casa">MANJEERA CASA</option>
                </select>
              <textarea name="Message" rows="3" cols="80" placeholder="MESSAGE"></textarea>
              <input type="submit" name="c-submit" value="SUBMIT" class="h-submit">
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- contact us section ends -->

    <!-- footer starts  -->
    <?php
      include "footer.php";
    ?>

    <!-- footer ends  -->
    <script src="js/script.js"></script>
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
    <script type="text/javascript">
      $('.home-main-slider').slick( {
        arrows: false,
        autoplay: true,
        dots: true,
        autoplaySpeed:1700,
        prevArrow:"<img class='h-slider-leftarrow' src='media/left-arrow.svg'>",
        nextArrow:"<img class='h-slider-rightarrow' src='media/right-arrow.svg'>"
      });

    </script>

    <script type="text/javascript">
      $('.featured-slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplaySpeed:1700,
        autoplay: true,
        prevArrow:"<img class='featured-leftarrow' src='media/left-arrow.svg'>",
        nextArrow:"<img class='featured-rightarrow' src='media/right-arrow.svg'>",
        responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
                dots: true
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
            // You can unslick at a given breakpoint now by adding:
            // settings: "unslick"
            // instead of a settings object
          ]
      });
    </script>

  </body>
</html>