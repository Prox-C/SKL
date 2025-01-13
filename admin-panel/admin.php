<?php
session_start();
require_once('../functions.php');

if (!isset($_SESSION['active_user'])) {
  header("Location: ../login.php"); // Redirect to login page
  exit;
}

// Proceed with the rest of the page code
$_SESSION['total_users'] = count_users();
$_SESSION['no_of_cat'] = count_categories();
$_SESSION['total_posts'] = countAllBlogs();
$_SESSION['no_of_fb'] = countFeedbacks();

$averageRating = getAverageRating();

$topCategories = getTopCategoriesWithMostPosts();

// Prepare data for the chart
$categoryNames = array_column($topCategories, 'category_name');
$postCounts = array_column($topCategories, 'post_count');

$topEditors = getTopEditorsWithMostPosts(); // Fetch top editors
$editorNames = array_map(function ($editor) {
    return $editor['first_name'] . ' ' . $editor['last_name'];
}, $topEditors);
$editorPostCounts = array_column($topEditors, 'post_count');

?>


<div class="wrapper">
  <!-- Navbar -->
  <?php include_once('../components/sidenav.php'); ?>

  <div class="content-wrapper" style="height: 600px">
    <div class="container" style="padding-top: 30px;">
        <h1 class="display-5" style="font-size: 42px; font-weight: 600; font-family: 'Poppins'">Dashboard</h1>
        <p class="text-muted" style="position: relative; bottom: 12px; font-size: 22px; font-weight: 450; font-family: 'Poppins'"> Hello, <?php echo $_SESSION['active_user'];?></p>

        <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-indigo" style="border-radius: 15px;">
              <div class="inner">
                <h3 style="font-family: 'Poppins';"><?php echo  $_SESSION['total_users'] ?></h3>

                <p style="font-family: 'Poppins'; font-weight: 500; font-size: 22px">Members</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"><svg id="Layer_1" height="45" viewBox="0 0 24 24" fill="#dedede" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"><path d="m7.5 13a4.5 4.5 0 1 1 4.5-4.5 4.505 4.505 0 0 1 -4.5 4.5zm6.5 11h-13a1 1 0 0 1 -1-1v-.5a7.5 7.5 0 0 1 15 0v.5a1 1 0 0 1 -1 1zm3.5-15a4.5 4.5 0 1 1 4.5-4.5 4.505 4.505 0 0 1 -4.5 4.5zm-1.421 2.021a6.825 6.825 0 0 0 -4.67 2.831 9.537 9.537 0 0 1 4.914 5.148h6.677a1 1 0 0 0 1-1v-.038a7.008 7.008 0 0 0 -7.921-6.941z"/></svg></i>
              </div>
              <a href="members.php" class="small-box-footer" style="font-family: 'Poppins'">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-indigo" style="border-radius: 15px;">
              <div class="inner">
                <h3 style="font-family: 'Poppins';"><?php echo  $_SESSION['no_of_cat'] ?></h3>

                <p style="font-family: 'Poppins'; font-weight: 500; font-size: 22px">Categories</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars">
                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24"  height="45" fill="#dedede">
                  <path d="m0,3v7h10V0H3C1.346,0,0,1.346,0,3Zm22,0c0-1.654-1.346-3-3-3h-7v10h10V3ZM0,19c0,1.654,1.346,3,3,3h7v-10H0v7Zm23.979,3.564l-2.812-2.812c.524-.791.833-1.736.833-2.753,0-2.757-2.243-5-5-5s-5,2.243-5,5,2.243,5,5,5c1.017,0,1.962-.309,2.753-.833l2.812,2.812,1.414-1.414Z"/>
                </svg>
                </i>
              </div>
              <a href="categories.php" class="small-box-footer" style="font-family: 'Poppins'">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-indigo card" style="border-radius: 15px;">
              <div class="inner">
                <h3 style="font-family: 'Poppins';"><?php echo  $_SESSION['total_posts'] ?></h3>

                <p style="font-family: 'Poppins'; font-weight: 500; font-size: 22px">Posts</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"><svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" height="50" fill="#dedede"><path d="M.1,6C.57,3.72,2.59,2,5,2h14c2.41,0,4.43,1.72,4.9,4H.1Zm23.9,2v9c0,2.76-2.24,5-5,5H5c-2.76,0-5-2.24-5-5V8H24Zm-14,4c0-.55-.45-1-1-1H5c-.55,0-1,.45-1,1s.45,1,1,1h1v4c0,.55,.45,1,1,1s1-.45,1-1v-4h1c.55,0,1-.45,1-1Zm10,4c0-.55-.45-1-1-1h-6c-.55,0-1,.45-1,1s.45,1,1,1h6c.55,0,1-.45,1-1Zm0-4c0-.55-.45-1-1-1h-6c-.55,0-1,.45-1,1s.45,1,1,1h6c.55,0,1-.45,1-1Z"/></svg></i>
              </div>
              <a href="#" class="small-box-footer" style="font-family: 'Poppins';">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-indigo" style="border-radius: 15px;">
              <div class="inner">
                <h3 style="font-family: 'Poppins';"><?php echo  $_SESSION['no_of_fb'] ?></h3>

                <p style="font-family: 'Poppins'; font-weight: 500; font-size: 22px">Feedbacks</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add">
                <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 24 24" height="50" fill="#dedede">
                  <path d="m17.829,10.762c-.141,0-.282-.045-.4-.133-.227-.17-.321-.464-.236-.734l.627-2.011-1.585-1.29c-.213-.181-.291-.476-.194-.738.096-.262.346-.437.626-.437h2.001l.708-1.987c.097-.261.346-.434.625-.434s.528.173.625.434l.708,1.987h2.001c.28,0,.53.175.626.438s.017.558-.197.739l-1.577,1.285.652,1.987c.089.269-.001.565-.226.738-.225.173-.534.185-.771.031l-1.836-1.196-1.805,1.208c-.112.075-.242.113-.371.113Zm-8-3c-.141,0-.282-.045-.4-.133-.227-.17-.321-.464-.236-.734l.627-2.011-1.585-1.29c-.213-.181-.291-.476-.194-.738.096-.262.346-.437.626-.437h2.001l.708-1.987c.097-.261.346-.434.625-.434s.528.173.625.434l.708,1.987h2.001c.28,0,.53.175.626.438s.017.558-.197.739l-1.577,1.285.652,1.987c.089.269-.001.565-.226.738-.225.173-.534.185-.771.031l-1.836-1.196-1.805,1.208c-.112.075-.242.113-.371.113ZM1.829,10.762c-.141,0-.282-.045-.4-.133-.227-.17-.321-.464-.236-.734l.627-2.011L.235,6.595c-.213-.181-.291-.476-.194-.738.096-.262.346-.437.626-.437h2.001l.708-1.987c.097-.261.346-.434.625-.434s.528.173.625.434l.708,1.987h2.001c.28,0,.53.175.626.438s.017.558-.197.739l-1.577,1.285.652,1.987c.089.269-.001.565-.226.738-.225.173-.534.185-.771.031l-1.836-1.196-1.805,1.208c-.112.075-.242.113-.371.113Zm15.17,3.238h-4.183l.58-3.265c.057-.334.029-.519.007-.599-.188-.69-.75-1.136-1.432-1.136-.213,0-.428.044-.64.132-.254.105-.503.367-.682.719l-2.193,4.149h-1.456c-1.657,0-3,1.343-3,3v4c0,1.657,1.343,3,3,3h0v-7c0-.552.448-1,1-1s1,.448,1,1v7h6.379c1.907,0,3.548-1.346,3.922-3.216l.639-3.196c.371-1.856-1.049-3.588-2.942-3.588Z"/>
                </svg>
                </i>
              </div>
              <a href="feedbacks.php" class="small-box-footer" style="font-family: 'Poppins'">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body text-center">
              <input disabled type="text" class="knob" value="<?php echo $averageRating?>" data-width="150" data-height="150" 
              data-fgColor="
              <?php 
              if($averageRating >= 85){
                echo "#28a745";
              }
              if($averageRating < 85 && $averageRating >= 80) {
                echo "#ffc107";
              }
              if($averageRating < 80){
                echo "#dc3545";
              }
              ?>"
              
              >
              <div class="knob-label" style="margin-top: 10px; font-family: 'Poppins'; font-size: 16px;">User Satisfaction</div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body text-center">
              <canvas id="myChart" style="min-height: 50px; height: 150px; max-height: 150px; max-width: 100%;"></canvas>
              <div class="knob-label" style="margin-top: 10px; font-family: 'Poppins'; font-size: 16px;">Trending Topics</div>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6 col-sm-12">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body text-center">
              <canvas id="editorChart" style="min-height: 50px; height: 150px; max-height: 150px; max-width: 100%;"></canvas>
              <div class="knob-label" style="margin-top: 10px; font-family: 'Poppins'; font-size: 16px;">Top Editors</div>
            </div>
          </div>
        </div>


      </div>
  </body>
</html>
 
<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- jQuery Knob -->
<script src="../assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- Sparkline -->
<script src="../assets/plugins/sparklines/sparkline.js"></script>
<!-- ChartJS -->
<script src="../assets/plugins/chart.js/Chart.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../assets/dist/js/demo.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Page specific script -->

<!-- Jquery Knob -->
<script>
  $(function () {
    /* jQueryKnob */

    $('.knob').knob({
      /*change : function (value) {
       //console.log("change : " + value);
       },
       release : function (value) {
       console.log("release : " + value);
       },
       cancel : function () {
       console.log("cancel : " + this.value);
       },*/
      draw: function () {

        // "tron" case
        if (this.$.data('skin') == 'tron') {

          var a   = this.angle(this.cv)  // Angle
            ,
              sa  = this.startAngle          // Previous start angle
            ,
              sat = this.startAngle         // Start angle
            ,
              ea                            // Previous end angle
            ,
              eat = sat + a                 // End angle
            ,
              r   = true

          this.g.lineWidth = this.lineWidth

          this.o.cursor
          && (sat = eat - 0.3)
          && (eat = eat + 0.3)

          if (this.o.displayPrevious) {
            ea = this.startAngle + this.angle(this.value)
            this.o.cursor
            && (sa = ea - 0.3)
            && (ea = ea + 0.3)
            this.g.beginPath()
            this.g.strokeStyle = this.previousColor
            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
            this.g.stroke()
          }

          this.g.beginPath()
          this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
          this.g.stroke()

          this.g.lineWidth = 2
          this.g.beginPath()
          this.g.strokeStyle = this.o.fgColor
          this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
          this.g.stroke()

          return false
        }
      }
    })
    /* END JQUERY KNOB */

    //INITIALIZE SPARKLINE CHARTS
    var sparkline1 = new Sparkline($('#sparkline-1')[0], { width: 240, height: 70, lineColor: '#92c1dc', endColor: '#92c1dc' })
    var sparkline2 = new Sparkline($('#sparkline-2')[0], { width: 240, height: 70, lineColor: '#f56954', endColor: '#f56954' })
    var sparkline3 = new Sparkline($('#sparkline-3')[0], { width: 240, height: 70, lineColor: '#3af221', endColor: '#3af221' })

    sparkline1.draw([1000, 1200, 920, 927, 931, 1027, 819, 930, 1021])
    sparkline2.draw([515, 519, 520, 522, 652, 810, 370, 627, 319, 630, 921])
    sparkline3.draw([15, 19, 20, 22, 33, 27, 31, 27, 19, 30, 21])

  })

</script>
<!-- Chart JS -->
<script>
  const ctx = document.getElementById('myChart');
  const categoryNames = <?php echo json_encode($categoryNames); ?>;
  const postCounts = <?php echo json_encode($postCounts); ?>;

  new Chart(ctx, {
    type: 'pie',
    data: {
      labels: categoryNames, // Dynamic labels from PHP
      datasets: [{
        label: '# of Posts',
        data: postCounts, // Dynamic data from PHP
        backgroundColor: [
          '#DB4437', // Google Red
          '#4285F4', // Google Blue
          '#0F9D58', // Google Green
          '#F4B400', // Google Yellow
          '#F28B20'  // Google Orange
        ],
        borderColor: [
          '#DB4437', // Google Red
          '#4285F4', // Google Blue
          '#0F9D58', // Google Green
          '#F4B400', // Google Yellow
          '#F28B20'  // Google Orange
        ],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: {
          display: false // Correct way to disable the legend
        },
        tooltip: {
          callbacks: {
            label: function(context) {
              return `${context.label}: ${context.raw} posts`;
            }
          }
        }
      }
    }
  });
</script>

<!-- Donut Chart -->
<script>
  const editorCtx = document.getElementById('editorChart');
const editorNames = <?php echo json_encode($editorNames); ?>;
const editorPostCounts = <?php echo json_encode($editorPostCounts); ?>;

new Chart(editorCtx, {
  type: 'bar',
  data: {
    labels: editorNames,
    datasets: [{
      label: 'Number of Posts',
      data: editorPostCounts,
      backgroundColor: ['#4caf50', '#2196f3', '#ff9800'],
      borderWidth: 1
    }]
  },
  options: {
    responsive: true,
    plugins: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Top 3 Editors by Post Count'
      }
    },
    scales: {
      y: { beginAtZero: true }
    }
  }
});

</script>




<script>
$(function () {
  bsCustomFileInput.init();
});
</script>

