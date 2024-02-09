<?php
    $servername = "localhost";
    $username = "manjeeraho_new";
    $password = ".3[HG}@Ca=e$";
    $database = "manjeeraho_new";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password,$database);
    
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    // echo "Connected successfully";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAREERS LEADS - MANJEERA CONSTRUCTIONS</title>
    <link rel="stylesheet" href="./css/styles.css">
    <style>
    
    </style>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<section class="lead-access" id="popup">
    <div class="lead-access-container">
        <div class="access-logo">
          <img src="./media/manjeera-leads.svg">
        </div>
        <input type="text" placeholder="Username" class="access-username">
        <input type="text" placeholder="password" class="access-password">
        <button class="access-btn" id="closePopup">GET ACCESS</button>
        <p class="error-access"></p>
    </div>
</section>
    <?php
      include "header.php";
    ?>
    <div class="addCategory">

  
        
        <!--<form action="leadview.php">-->
        <!--    <label for="filter">Date:</label>-->
        <!--    <input type="date" id="filter" name="filter">-->
        <!--    <input type="submit">-->
        <!-- </form>-->
        
        
         <form action="leads.php" class="filter" method="GET">
            <label for="filter"> From : &nbsp </label>
            <input type="date" id="startfilter" name="startfilter">
            <label for="filter"> &nbsp To : &nbsp </label>
            <input type="date" id="endfilter" name="endfilter">
            <input type="submit" id="date-submit">
          
          <button id="btnExport" onclick="fnExcelReport();"> DOWNLOAD LEADS </button>
         </form>
        
        <?php
            
            
            // echo $_GET['startfilter'];
            
            
            if(!empty($_GET['startfilter'] && $_GET['endfilter'])){
                
                $start_date = date('Y-m-d', strtotime($_GET['startfilter']));
                
                echo "Start Date:  " . $start_date . "</br></br>" ;
                 $end_date = date('Y-m-d', strtotime($_GET['endfilter']));
                echo "End Date:  " . $end_date. "</br></br>";
            }
            
            // if(!empty($_GET['endfilter'])){
                
             
            //  $end_date = date('Y-m-d', strtotime($_GET['endfilter']));
            //  echo "End Date:  " . $end_date. "</br></br>";
            // }
        ?>
      
      
        <table id="headerTable" class="careers-table">
            <thead>
                <tr>
                    <td>S.No</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Mobile Number</td>
                    <td>Resumes</td>
                    <td>Message</td>
                    <td>Date</td>
                </tr>
            </thead>
            <tbody>
                <?php
                        if(!empty($_GET['startfilter'] && $_GET['endfilter'])){
                             $sql = "SELECT * FROM `careers_leads` WHERE Date BETWEEN '$start_date' and '$end_date'";
                        }else {
                            $sql = "SELECT * FROM `careers_leads`";
                            // echo "Please Select the Date";
                        }
                       
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                ?>
                        <tr>
                            <td><?= $row['ID']?></td>
                            <td><?= $row['NAME']?></td>
                            <td><?= $row['MOBILE']?></td>
                            <td><?= $row['EMAIL']?></td>
                            <td><?= $row['RESUME']?></td>
                            <td><?= $row['MESSAGE']?></td>
                            <td><?= $row['DATE']?></td>
                        </tr>
                    <?php
                        }
                        
                    }else{
                        echo "NO RECORDS FOUND";
                        
                    }
                        ?>
            </tbody>
        </table>
        <iframe id="txtArea1" style="display:none"></iframe>
        

    </div>
    
    <!--footer starts here -->
       <?php
          include 'footer.php';
       ?>
      <script src="./js/app.js"></script>
    <!--footer ends here -->
    <script>
    function fnExcelReport()
        {
            var tab_text="<table border='none'><tr bgcolor='#87AFC6'>";
            var textRange; var j=0;
            tab = document.getElementById('headerTable'); // id of table
        
            for(j = 0 ; j < tab.rows.length ; j++) 
            {     
                tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
                //tab_text=tab_text+"</tr>";
            }
        
            tab_text=tab_text+"</table>";
            tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
            tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
            tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params
        
            var ua = window.navigator.userAgent;
            var msie = ua.indexOf("MSIE "); 
        
            if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
            {
                txtArea1.document.open("txt/html","replace");
                txtArea1.document.write(tab_text);
                txtArea1.document.close();
                txtArea1.focus(); 
                sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
            }  
            else                 //other browser not tested on IE 11
                sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  
        
            return (sa);
        }
</script>
</body>
</html>