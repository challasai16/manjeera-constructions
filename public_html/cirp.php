<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CIRP-MANJEERA</title>
    <link rel="stylesheet" href="css/styles.css" />
    <style>
    .crip {
        margin: 4rem 0;
    }
    .crip-container {
        width: 70%;
        margin: 4rem auto;
    }
    .crip ul {
        /*justify-content: space-around;*/
    }
        .crip h3 {
            font-size: 2rem;
            /*margin-right: 6rem;*/
            font-weight: 500;
            border-bottom: 2px solid var(--m-color);
            padding-bottom: 1rem;
        }
        .mcl, .mrhpl  {
            width: 50%;
            margin: 2rem;
        }
        .mcl ul, .mrhpl ul {
            /*display: flex;*/
            margin-top: 2rem;
        }
        .mcl ul li, .mrhpl ul li {
            margin-bottom: 2rem;
        }
        .mcl ul li a, .mrhpl ul li a {
            font-size: 1.2rem;
            background-color: var(--m-color);
            color: white;
            padding: 0.3rem 1rem;
            line-height: 2.5;
           
        }
        .mcl-creators-list {
            margin-top: 1rem;
        }
         .mcl-creators-list a {
             font-size: 1.05rem !important;
             border: 0 !important;
             background-color: white !important;
             color: black !important;
             padding: 0 !important;
             margin-right: 3rem;
         }
         .mcl-creators-list a:last-child {
             margin-right: 0;
         }
        @media(max-width: 600px) {
            .crip-container {
                flex-direction: column;
                width: 95%;
            }
            .mcl-creators-list a {
               display: block;
               
            }
            .mcl, .mrhpl {
                width: 100%;
            }
            .mcl ul li a, .mrhpl ul li a {
              font-size: 0.95rem;
              line-height: 1.5;
              /*display: block;*/
              margin-bottom: 1rem;
            }
            .mcl-creators-list {
                width: 100%;
            }
            
            .mcl, .mrhpl {
                margin: 1rem;
            }
            .crip h3 {
                font-size: 1.5rem;
            }
        }
        
    </style>
  </head>
  <body>
    <!-- header starts  -->
    <?php
     include "header.php";
    ?>
    <!-- header ends  -->

    <!-- blog blogBanner -->

    <section class="blogBanner">
       <div class="blogbanner-container">
           <div class="blog-banneroverlay"></div>
            <img src="media/blog-hero.png">
            <h1>CIRP</h1>
       </div>
    </section>
    
    
    
    <section class="crip">
        <div class="crip-container  m-flex">
          <div class="mcl">
              <h3>MCL</h3>
              <ul>
                  <li><a>Order</a>
                      <div class="mcl-creators-list">
                          <a href="./media/cirp/mcl/mcl-order.pdf" target="_blank"> <i class="bi bi-file-pdf"></i> Mcl Order</a>
                           <a href="./media/cirp/mcl/mcl-nclt.pdf" target="_blank"> <i class="bi bi-file-pdf"></i> NCLT Order - 14.09.2023 </a>
                      </div>
                  </li>
                  <li><a>PA</a>
                      <div class="mcl-creators-list">
                          <a href="./media/cirp/mcl/mcl-pa.pdf" target="_blank"> <i class="bi bi-file-pdf"></i> Mcl PA</a>
                          <a href="./media/cirp/mcl/mcl-forn-g.pdf" target="_blank"> <i class="bi bi-file-pdf"></i> Form G</a> <br>
                          <a href="./media/cirp/mcl/MCL-FORM-G-1st-Ext.pdf" target="_blank"> <i class="bi bi-file-pdf"></i> Form G - 1st Extension</a> <br>
                          <a href="./media/cirp/mcl/Manjeera Constructions Limited.pdf" target="_blank"> <i class="bi bi-file-pdf"></i> Form G - 2nd Extension</a>
                      </div>
                  </li>
                  <li><a>List Of Creditors</a>
                      <div class="mcl-creators-list">
                          <a href="./media/cirp/mcl/MCL-creators.pdf" target="_blank"> <i class="bi bi-file-pdf"></i> 08.08.2023</a>
                          <a href="./media/cirp/mcl/List of Creditors as per IBBI- MCL 21.08.2023.pdf" target="_blank"> <i class="bi bi-file-pdf"></i> 21.08.2023</a>
                      </div>
                  </li>
                  
                  <li><a>Expression of Interest</a>
                      <div class="mcl-creators-list">
                          <a href="./media/cirp/mcl/EOI-process-documents-MCL-30-10-2023.pdf" target="_blank"> <i class="bi bi-file-pdf"></i> 30/10/2023</a>
                          <a href="./media/cirp/mcl/Teaser-of-MCL.pdf" target="_blank"> <i class="bi bi-file-pdf"></i> Teaser Of Mcl</a>
                          
                      </div>
                  </li>
                  
              </ul>
          </div>
          <div class="mrhpl">
              <h3>MRHPL</h3>
              <ul>
                  <li><a>Order</a >
                      <div class="mcl-creators-list">
                          <a href="./media/cirp/mrhpl/mrhpl-order.pdf" target="_blank"> <i class="bi bi-file-pdf"></i> MRHPL Order</a>
                          <a href="./media/cirp/mrhpl/mrhpl-nclt.pdf" target="_blank"> <i class="bi bi-file-pdf"></i> NCLT Order-14.09.2023 </a>
                      </div>
                  </li>
                  <li><a href="./media/mrhpl-pa.pdf" target="_blank">PA</a>
                     <div class="mcl-creators-list">
                          <a href="./media/cirp/mrhpl/mrhpl-pa.pdf" target="_blank"> <i class="bi bi-file-pdf"></i> MRHPL PA</a>
                          <a href="./media/cirp/mrhpl/mrhpl-form-g.pdf" target="_blank"> <i class="bi bi-file-pdf"></i> Form G</a> <br>
                          <a href="./media/cirp/mrhpl/MRHPL-FORM-G-1st-Ext..pdf" target="_blank"> <i class="bi bi-file-pdf"></i> Form G - 1st Extension</a> <br>
                          <a href="./media/cirp/mrhpl/Manjeera Retail Holdings Pvt Ltd.pdf" target="_blank"> <i class="bi bi-file-pdf"></i> Form G - 2nd Extension</a>
                      </div>
                  </li>
                  <li><a href="./media/MRHPL-creators.pdf" target="_blank">List Of Creditors</a>
                     <div class="mcl-creators-list">
                          <a href="./media/cirp/mrhpl/MRHPL-creators.pdf" target="_blank"> <i class="bi bi-file-pdf"></i> 18.07.2023</a>
                      </div>
                  </li>
                  
                  <li><a href="./media/MRHPL-creators.pdf" target="_blank">Expression of Interest</a>
                     <div class="mcl-creators-list">
                          <a href="./media/cirp/mrhpl/EOI-process-documents-MRHPL-30-10-2023.pdf" target="_blank"> <i class="bi bi-file-pdf"></i> 30/10/2023</a>
                          <a href="./media/cirp/mrhpl/Teaser-of-MRHPL.pdf" target="_blank"> <i class="bi bi-file-pdf"></i> Teaser of MRHPL</a>
                      </div>
                  </li>
                  
              </ul>
          </div>
            
        </div>
    </section>

    <!-- blogs setion -->

    

    <!-- footer starts  -->
    <?php
      include "footer.php";
    ?>

    <!-- footer ends  -->
  </body>
</html>