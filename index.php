<?php
session_start();
header("content-type: text/html;charset=utf-8")
?>
<!DOCTYPE html>
<?php
$lang = 'gr';
$search = array('Title : ','Content : ','Τίτλος : ','Περιεχόμενο : ','Year : ','Χρονιά : ','Icon : ','Εικονίδιο : ');
$separator = "\r\n";
?>
<!--
<style media="screen">
  #lang_choose button{
    display: inline-block;
    background-color: inherit;
    border: none;
  }
  #lang_choose button img{
    display: block;
    align-self: center;
    width: 9em;
    margin: 1em;
  }
  #lang_choose button:focus{
      outline: none;
  }
  #lang_choose button:hover{
    cursor: pointer;
  }
</style>
-->
<?php
//if (isset($_POST['lang']) || isset($_SESSION['lang'])):
//  if (isset($_POST['lang'])){
//    $lang = $_POST['lang'];
//    $_SESSION['lang'] = $lang;
//  } else {
//    $lang = $_SESSION['lang'];
//  }
if (isset($_POST['lang']) || isset($_SESSION['lang'])){
  if (isset($_POST['lang'])){
    $lang = $_POST['lang'];
    $_SESSION['lang'] = $lang;
  } else {
    $lang = $_SESSION['lang'];
  }
}
?>
  <head>
    <link rel="shortcut icon" href="./images/favicon.png">
    <?php include "loading.php"; ?>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=<?php echo ($lang == 'gr') ? 'Οι NGK (Next Generation Kids) είναι η ομάδα ρομποτικής του 2ου Δημοτικού Σχολείου Καλυβίων που συμμετέχει στον διαγωνισμό εκπαιδευτικής ρομποτικής FLL' : ' NGK (Next Generation Kids) is the robotics team of 2nd Primary School of Kalyvia that participates in FLL educational robotics competition'; ?>>

    <title>Next Generation Kids</title>
    <link rel="stylesheet" href="./CSS/layout.css">
    <link rel="stylesheet" href="./CSS/style.css">
    <link rel="stylesheet" href="./CSS/headline-nav-menu.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./JS/fade-unfade.js"></script>
    <script src="./JS/show_hide.js"></script>
    <style media="screen">
      #lang_choose button img{
        width: 3em;
        margin: 0.5em;
      }
    </style>
  </head>

  <body class="container grid fadeIn" id="top">

    <nav id="headline_menu">
      <img id="headline_logo" src="./images/logo.png" alt="logo">
      <script type="text/javascript">
      $("#headline_logo").click(function() {
        window.location.href = "./"
      });
      </script>
      <img id="nav-menu-icon" src="./img/nav-menu-icon.png" alt="nav-menu-icon">
      <ul id="nav-menu">
        <li><a href="#about_us_anchor"><?php echo ($lang == 'gr') ? 'Σχετικά με εμάς' : 'About Us'; ?></a></li>
        <li><a href="#news_anchor"><?php echo ($lang == 'gr') ? 'Νέα' : 'News'; ?></a></li>
        <li><a href="#problem_anchor"><?php echo ($lang == 'gr') ? 'Το Πρόβλημα' : 'The Problem'; ?></a></li>
        <li><a href="#solution_anchor"><?php echo ($lang == 'gr') ? 'Η Λύση' : 'The Solution'; ?></a></li>
        <li><a href="#sponsors_anchor"><?php echo ($lang == 'gr') ? 'Χορηγοί' : 'Sponsors'; ?></a></li>
        <li><a href="#contact_anchor"><?php echo ($lang == 'gr') ? 'Επικοινωνία' : 'Contact Us'; ?></a></li>
        <!--<li>
          <form id="lang_choose" action="" method="post">
            <button class="lang" type="submit" name="lang" value="gr">
              <img src="./img/flags/greek_flag.png" alt="gr"/>
            </button>
            <button class="lang" type="submit" name="lang" value="en">
              <img src="./img/flags/english_flag.png" alt="en" />
            </button>
          </form>
        </li>-->
      </ul>
      <script type="text/javascript">
      var nav = document.getElementById("nav-menu")
      window.onclick = function(event) {
        if (nav.style.display == "block") {
            nav.style.display = "none";
        } else if (event.target.id == 'nav-menu-icon') {
            nav.style.display = "block";
        }
      }
      window.addEventListener('resize', function(event){
        if ($(window).width() > (810-18)) {
          nav.style.display = "flex";
        } else {
          nav.style.display = "none";
        }
      })
      </script>

    </nav>

    <header class="flex_column">
      <div class="headline_space"></div>
      <div class="title">
        <h1 class="h_content"><?php echo ($lang == 'gr') ? 'Γνωρίστε τον NGK RTI' : 'Meet NGK RTI'; ?></h1>
        <p class="center">Better be Safe than Sorry</p>
      </div>
      <!--gia to graph-->
      <link rel="stylesheet" href="CSS/graph.css">
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.js"></script>
      <!---->
      <div id="graphs">
        <div id="plot">
          <canvas id="chartjs-0"></canvas>
          <script src="./JS/graph.js"></script>
        </div>
        <div id="tank">
          <div id="water"></div>
          <p id="full_text">πλήρως γεμάτη</p>
          <p id="empty_text">πλήρως άδεια</p>
        </div>
      </div>
    </header>

    <div id="identity">
      <link rel="stylesheet" href="./CSS/about_us.css">
      <link rel="stylesheet" href="./CSS/prime_sponsors.css">
      <span class="anchor" id="about_us_anchor"></span>
      <h2 class="h_content"><?php echo ($lang == 'gr') ? 'Σχετικά με εμάς' : 'About Us'; ?></h2>
      <?php include "./content/About Us/About Us - $lang.html"; ?>
    </div>

    <div id="prime_sponsors">
      <?php
      $sponsors = file_get_contents("./sponsors/Current Prime.txt");
      $sponsors = str_replace(' ', '_', $sponsors);
      $line = strtok($sponsors, $separator);
      while ($line !== false) {
        $path = glob("./sponsors/$line/$line.*")[0];
        $link = file_get_contents("./sponsors/$line/$line.txt");
        echo '<a href="'.$link.'" target="_blank" style="background-image: url('.$path.')"></a>';
        $line = strtok($separator);
      }
      ?>
    </div>

    <div id="fb_feed">
      <span class="anchor" id="news_anchor"></span>
      <link rel="stylesheet" href="./CSS/fb_feed/fb_feed.css">
      <!-- Social-feed css -->
      <link href="./CSS/fb_feed/jquery.socialfeed.css" rel="stylesheet" type="text/css">
      <!-- font-awesome for social network icons -->
      <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
      <h2 class="h_content"><?php echo ($lang == 'gr') ? 'Νέα από το Facebook' : 'Facebook Feed'; ?></h2>
      <div class="social-feed-container"></div>
      <!-- jQuery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
      <!-- doT.js for rendering templates -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
      <!-- Moment.js for showing "time ago" and/or "date"-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/dot/1.1.2/doT.min.js"></script>
      <!-- Moment Locale to format the date to your language (eg. en-gb lang)-->
      <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/locale/en-gb.js"></script>-->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/locale/el.js"></script>
      <!-- Social-feed js -->
      <script src="./JS/fb_feed/jquery.socialfeed.js"></script>
      <script src="./JS/fb_feed/fb_feed.js"></script>
    </div>

    <div id="about_us">
	  <script src="./JS/menu_show_hide.js"></script>
      <section id="problem">
        <span class="anchor" id="problem_anchor"></span>
        <script type="text/javascript">
          function addClass(ele,cls) {
            ele.className += " "+cls;
          }
          function removeClass(ele,cls) {
            var reg = new RegExp('(\\s|^)'+cls+'(\\s|$)');
            ele.className=ele.className.replace(reg,' ');
          }
        </script>
        <link rel="stylesheet" href="./CSS/div_tab_menu.css">
        <h2 class="h_content"><?php echo ($lang == 'gr') ? 'Το Πρόβλημα' : 'The Problem'; ?></h2>
        <?php include "./content/Problem/The Problem/The Problem - $lang.html"; ?>

        <div id="problem_menu" class="tab_menu flex_row">
          <h4 class="h_content tab_picker active" id="sources_tab" onclick="change_section('sources');"><?php echo ($lang == 'gr') ? 'Πηγές Πληροφοριών' : 'Sources of information'; ?></h4>
          <h4 class="h_content tab_picker" id="analysis_tab" onclick="change_section('analysis');"><?php echo ($lang == 'gr') ? 'Ανάλυση Προβλήματος' : 'Problem Analysis'; ?></h4>
        </div>
        <div class="tab hidden active fadeIn" id="sources">
          <?php include "./content/Problem/Source of Information/Source of Information - $lang.html"; ?>
        </div>
        <div class="tab hidden fadeIn" id="analysis">
          <?php include "./content/Problem/Problem Analysis/Problem Analysis - $lang.html"; ?>
        </div>
      </section>


      <section id="solution">
        <span class="anchor" id="solution_anchor"></span>
        <script type="text/javascript">
          function addClass(ele,cls) {
            ele.className += " "+cls;
          }
          function removeClass(ele,cls) {
            var reg = new RegExp('(\\s|^)'+cls+'(\\s|$)');
            ele.className=ele.className.replace(reg,' ');
          }
        </script>
        <link rel="stylesheet" href="./CSS/div_tab_menu.css">
        <h2 class="h_content"><?php echo ($lang == 'gr') ? 'Η Λύση' : 'The Solution'; ?></h2>
        <div id="solution_menu" class="tab_menu flex_row">
          <h4 class="h_content tab_picker active" id="existing_solutions_tab" onclick="change_section('existing_solutions');"><?php echo ($lang == 'gr') ? 'Μελέτη Υπαρχόντων Λύσεων' : 'Study of Existing Solutions'; ?></h4>
          <h4 class="h_content tab_picker" id="team_solution_tab" onclick="change_section('team_solution');"><?php echo ($lang == 'gr') ? 'H Λύση της Ομάδας' : 'Team\'s Solution'; ?></h4>
          <h4 class="h_content tab_picker" id="sharing_tab" onclick="change_section('sharing');"><?php echo ($lang == 'gr') ? 'Κοινοποίηση – Μοίρασμα ' : 'Sharing'; ?></h4>
        </div>
        <div class="tab hidden active fadeIn" id="existing_solutions">
          <?php include "./content/Solution/Study of Existing Solutions/Study of Existing Solutions - $lang.html"; ?>
        </div>
        <div class="tab hidden fadeIn" id="team_solution">
          <?php include "./content/Solution/Team's Solution/Team's Solution - $lang.html"; ?>
        </div>
        <div class="tab hidden fadeIn" id="sharing">
          <?php include "./content/Solution/Sharing - Spreading/Sharing - Spreading - $lang.html"; ?>
        </div>
      </section>


      <section id="team_members" class="team_members">
        <link rel="stylesheet" href="./CSS/team_members-team_linked_images.css">
        <link rel="stylesheet" href="./CSS/bio.css">
        <script src="./JS/show_hide_bio.js"></script>
        <div class="hidden_overlay" onclick="hide_bio();">
          <div id="bio">
          </div>
        </div>

        <span class="anchor" id="team_members_anchor"></span>
        <div class="button zoom">
          <a id="meet_ur_team" href="#team_members_anchor" onclick="toggle_visibility('team_members');"><?php echo ($lang == 'gr') ? 'γνωρίστε την ομάδα μας' : 'meet our team'; ?></a>
        </div>
        <div class="button hidden zoom">
          <a onclick="toggle_visibility('team_members');"><?php echo ($lang == 'gr') ? 'απόκρυψη ομάδα' : 'hide team'; ?></a>
        </div>
        <div class="hidden">
          <div class="linked_images_area grid">
            <?php
            $find = array('{{Name}}', '{{Link_Name}}');
            $team_members = file_get_contents("./teams/Current.txt");
            $template_block = file_get_contents("./templates/team_members_template.html");
            $counter = 0;
            $link_name = strtok($team_members, $separator);
            while ($link_name !== false) {
              preg_match_all("/{{Name}}>(.*?)<\/{{Name}}>/is",file_get_contents("./teams/team_members/$link_name/$link_name - $lang.txt"),$name);
              $name = $name[1][0];
              $replace = array($name, $link_name);
              echo str_replace($find,$replace,$template_block);
              $link_name = strtok($separator);
            }
            ?>
          </div>
        </div>
      </section>

      <section id="cd-timeline" class="cd-container">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
        <link rel="stylesheet" href="./CSS/timeline/style.css"> <!-- Resource style -->
        <?php
        $stations = file_get_contents("./content/Teams Stations/Team Stations - $lang.txt");
        $stations = str_replace($search,'',$stations);
        $line = strtok($stations, $separator);
        $counter = 0;
        $template_block = file_get_contents("./templates/timeline_block_template.html");
        $find = array('{{Title}}', '{{Content}}', '{{Year}}', '{{Icon}}', '{{Icon_Path}}');
        while ($line !== false) {
          for ($counter=0; $counter < 4 ; $counter++) {
            $replace[$counter] = $line;
            $line = strtok($separator);
          }
          $replace[4] = glob("./img/timeline/cd-icon-$replace[3].*")[0];
          echo str_replace($find, $replace, $template_block);
        }
        ?>
      </section>
    </div>

    <section id="sponsors">
      <link rel="stylesheet" href="./CSS/sponsors.css">
      <span class="anchor" id="sponsors_anchor"></span>
      <h2 class="h_content"><?php echo ($lang == 'gr') ? 'Χορηγοί' : 'Sponsors'; ?></h2>
      <div class="linked_images_area grid">
        <?php
        $sponsors = file_get_contents("./sponsors/Current.txt");
        $sponsors = str_replace(' ', '_', $sponsors);
        $line = strtok($sponsors, $separator);
        while ($line !== false) {
          $path = glob("./sponsors/$line/$line.*")[0];
          $link = file_get_contents("./sponsors/$line/$line.txt");
          echo '<a href="'.$link.'"id="'.$line.'" target="_blank" style="background-image: url('.$path.')"></a>';
          $line = strtok($separator);
        }
        ?>
      </div>
      <div id="sponsorship_benefits" class="center">
        <?php
        $benefits = file_get_contents("./content/Sponsorship Benefits/Sponsorship Benefits - $lang.txt");
        $benefits = str_replace($search,'',$benefits);
        $line = strtok($benefits, $separator);
        $counter = 0;
        ?>
        <div>
          <h3 class="h_content"><?php echo ($lang == 'gr') ? 'Οφέλη Χορηγίας' : 'Sponsorship Benefits'; ?></h3>
          <p>
            <?php echo $line;
            $line = strtok($separator); ?>
          </p>
        </div>
        <div class="button zoom">
          <a href="#sponsorship_benefits_anchor" onclick="toggle_visibility('sponsorship_benefits');"><?php echo ($lang == 'gr') ? 'μάθετε περισσότερα για τα οφέλη χορηγίας' : 'learn more about sponsorship benefits'; ?></a>
        </div>
        <span class="anchor" id="sponsorship_benefits_anchor"></span>
        <div class="button hidden zoom">
          <a onclick="toggle_visibility('sponsorship_benefits');"><?php echo ($lang == 'gr') ? 'απόκρυψη οφελών χορηγίας' : 'hide sponsorship benefits'; ?></a>
        </div>
        <div class="hidden zoom">
          <div class="grid">
            <?php
            while ($line !== false) {
              $counter += 1;
              if (!$counter): continue ;
              elseif ($counter%2): echo '<div class="zoom"><h4 class="h_content">'.$line.'</h4>' ;
              else: echo '<p>'.$line.'</p></div>' ;
              endif;
              $line = strtok($separator);
            }
            ?>
          </div>
        </div>
      </div>
    </section>

    <footer class="flex_column">
      <link rel="stylesheet" href="./CSS/footer.css">
      <span class="anchor" id="contact_anchor"></span>
      <section id="contact" class="grid">
        <h2 class="h_content column_span"><?php echo ($lang == 'gr') ? 'Επικοινωνία' : 'Contact Us'; ?></h2>
        <div id="location" class="flex_column">
          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><g class="nc-icon-wrapper" fill="#ffffff"><path d="M24 4c-7.73 0-14 6.27-14 14 0 10.5 14 26 14 26s14-15.5 14-26c0-7.73-6.27-14-14-14zm0 19c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5z"></path></g></svg>
          <a href="https://goo.gl/maps/LUPd2M9fYcr" target="_blank">
            <p><?php echo ($lang == 'gr') ? '2ο Δημοτικό Σχολείο Καλυβίων' : '2nd Primary School of Kalyvia'; ?></p>
          </a>
        </div>
        <div id="mail" class="flex_column">
          <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48"><g class="nc-icon-wrapper" fill="#ffffff"><path d="M40 8H8c-2.21 0-3.98 1.79-3.98 4L4 36c0 2.21 1.79 4 4 4h32c2.21 0 4-1.79 4-4V12c0-2.21-1.79-4-4-4zm0 8L24 26 8 16v-4l16 10 16-10v4z"></path></g></svg>
          <a href="mailto:ngkrobotics@gmail.com" target="_top">ngkrobotics@gmail.com</a>
        </div>
        <div id="team_promo" class="grid">
          <a href="https://www.facebook.com/ngkrobotics/" target="_blank"><img src="./img/social media icons/facebook.png" width="48" height="48" alt="Facebook"></a>
          <a href="https://twitter.com/ngkfll?ref_src=twsrc%5Etfw" target="_blank" data-show-count="false"><img src="./img/social media icons/twitter.png" width="48" height="48" alt="Instagram"></a>
          <a href="https://www.youtube.com/channel/UCB4uW6ravLMJkllgfwZv_rw?view_as=subscriber" target="_blank"><img src="./img/social media icons/youtube.png" width="48" height="48" alt="Youtube"></a>
        </div>
      </section>

      <div class="copyrights center">
        <p> &#169; Copyright 2017 Next Generation Kids | <?php echo ($lang == 'gr') ? 'Σχεδίαση & Κατασκεύη ιστοσελίδας - Μπενετάτος Αλέξανδρος' : 'Site design by Benetatos Alexandros'; ?></p>
      </div>
    </footer>

    <script src="./JS/smooth_scrolling.js"></script>
    <script src="./JS/timeline/main.js"></script>
  </body>

  <!--<script src="./JS/move_background_on_mouseover.js"></script>-->


<!--
<?php //else: ?>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Language/Γλώσσα</title>
    <link rel="shortcut icon" href="./images/favicon.ico">
  </head>
  <style type="text/css">
    h1{
      color: rgb(214, 214, 214);
      font-family: sans-serif;
    }
    #lang_choose{
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: #222222;
      z-index: 1000;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
    img.lang{
      display: block;
      width: 150px;
      height: auto;
      cursor: pointer;
      padding: 1em;
      margin : 1em;
    }
  </style>
  <form id="lang_choose" action="" method="post">
    <h1>Choose Your Preferable Language</h1>
    <button class="lang" type="submit" name="lang" value="gr">
      <img src="./img/flags/greek_flag.png" alt="gr"/>
    </button>
    <button class="lang" type="submit" name="lang" value="en">
      <img src="./img/flags/english_flag.png" alt="en" />
    </button>
  </form>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
  <script type="text/javascript">
  $(".lang").click(function() {
    $("#lang-wrapper").fadeOut("slow");
  });
  </script>
<?php //endif; ?>
-->
