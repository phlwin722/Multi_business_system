<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/8400d4cb4c.js" crossorigin="anonymous"></script>
       <link rel="stylesheet" href="Salesowner.css">
       <link rel="preconnect" href="https://fonts.googleapis.com">
        <title>Sales - BUIMO</title>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="Dashboardowner.js" defer></script>
        <link rel="icon" type="image/x-icon" href="/Multi_business_system/picture/logo.png">
                                         <!-- Google Font Link for Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200">
    </head>
    <body>
        <div class="left">
        <img src="/Multi_business_system/picture/logo.png" class="move" style="width: 30px;margin-top: 0px;margin-left: 20px;" alt="">
            <div class="Company">BUIMO</div>
                <div class="dropdown">
                  <button onclick="myFunction()" class="dropbtn"><i class="fa-solid fa-circle-user"></i></button>
                  <div id="myDropdown" class="dropdown-content">
                  <a href="Myacct.php" target="_top">My account</a>
                 </div>
              </div>
        </div>

        <div class="sidenav" id="a">
            <div class="companyname">Shirly</div>
                <div class="owner">Owner</div >
                   <a href="ownerlandingpage.php" target="_top" class="nav"><i class="fa-solid fa-house"></i> Dash Board</a>
                   <a href="Saleowner.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Sales</a>
                   <a href="Businessowner.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Business</a>
                   <a href="product.php" target="_top" class="nav"><i class="fa-solid fa-chart-simple"></i> Products</a>
                   <a href="employee.php" target="_top" class="nav"><i class="fa-solid fa-users"></i> Employee</a>
                  <a href="/Sad-Activity/landingpage/landingpage.php" target="_top"><i class="fa-solid fa-right-from-bracket"></i> Log out</a>
        </div>
        
          <div class="main" id="a">

            <div class="frame" src="" name="iframe">
                <div class="addbusines">
                    <div class="product-top">Dashboard</div>
                    </div>
                 
                    <div class="busin-right">
                       <!--Calendar-->
     <div class="wrapper">
      <header>
        <p class="current-date">November 2023</p>
        <div class="icons">
          <span id="prev" class="material-symbols-rounded">chevron_left</span>
          <span id="next" class="material-symbols-rounded">chevron_right</span>
        </div>
      </header>
      <div class="calendar">
        <ul class="weeks">
          <li>Sun</li>
          <li>Mon</li>
          <li>Tue</li>
          <li>Wed</li>
          <li>Thu</li>
          <li>Fri</li>
          <li>Sat</li>
        </ul>
        <ul class="days">
          <li>28</li>
          <li>29</li>
          <li>30</li>
          <li>31</li>
          <li>1</li>
          <li>2</li>
          <li>3</li>
          <li>4</li>
          <li>5</li>
          <li>6</li>
          <li>7</li>
          <li>8</li>
          <li>9</li>
          <li>10</li>
          <li>11</li>
          <li>12</li>
          <li>13</li>
          <li>14</li>
          <li>15</li>
          <li>16</li>
          <li>17</li>
          <li>18</li>
          <li>19</li>
          <li>20</li>
          <li>21</li>
          <li>22</li>
          <li>23</li>
          <li>24</li>
          <li>25</li>
          <li>26</li>
          <li>27</li>
          <li>28</li>
          <li>29</li>
          <li>30</li>
          <li>1</li>
        </ul>
      </div>
    </div>
    <!--Calendar-->
       <!--top sale-->
      <div class="Topsale">
        <table class="customers">
          <caption class="topsale">Top Product Sale</caption>
          <tr>
            <th>#</th>
            <th>Product name</th>
            <th>Sold</th>
          </tr>
          <tr>
            <td></td>
          </tr>
        </table>
      </div>

      <!--sales-->
      <div class="sales">
        <table class="customers">
          <caption class="topsale">Sales</caption>
          <tr>
            <th>Branch</th>
            <th>Total Sale</th>
          </tr>
          <tr>
            <td></td>
          </tr>
        </table>
       </div>
      <!--sales-->
   <!--topsale-->

   <div class="list_business">
    <table class="customers">
      <caption class="topsale">List Branch</caption>
      <tr>
        <th>Branch name</th>
        <th>Location</th>
      </tr>
      <tr>
        <td></td>
      </tr>
    </table>
   </div>
      <!--topsale-->
 </div>

                        <?php include('header.php'); ?> 


      <!--bootstarp js-->
      <?php include('footer.php');?>

   
                        </div>
                    </div>
                    </div>
            </div>
          </div>
    </body>
</html>