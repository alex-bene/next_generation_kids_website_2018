<style type="text/css">
  #loader-wrapper {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1000;
    background: rgba(34, 34, 34,0.7);

  }

  #loader {
    display: block;
    position: relative;
    left: 50%;
    top: 50%;
    width: 150px;
    height: 150px;
    margin: -75px 0 0 -75px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #3498db;

    -webkit-animation: spin 2s linear infinite;
    /* Chrome, Opera 15+, Safari 5+ */
    animation: spin 2s linear infinite;
    /* Chrome, Firefox 16+, IE 10+, Opera */
    z-index: 1001;
  }

  #loader:before {
    content: "";
    position: absolute;
    top: 5px;
    left: 5px;
    right: 5px;
    bottom: 5px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #e74c3c;

    -webkit-animation: spin 3s linear infinite;
    /* Chrome, Opera 15+, Safari 5+ */
    animation: spin 3s linear infinite;
    /* Chrome, Firefox 16+, IE 10+, Opera */
  }

  #loader:after {
    content: "";
    position: absolute;
    top: 15px;
    left: 15px;
    right: 15px;
    bottom: 15px;
    border-radius: 50%;
    border: 3px solid transparent;
    border-top-color: #f9c922;

    -webkit-animation: spin 1.5s linear infinite;
    /* Chrome, Opera 15+, Safari 5+ */
    animation: spin 1.5s linear infinite;
    /* Chrome, Firefox 16+, IE 10+, Opera */
  }

  @-webkit-keyframes spin {
    0% {
      -webkit-transform: rotate(0deg);
      /* Chrome, Opera 15+, Safari 3.1+ */
      -ms-transform: rotate(0deg);
      /* IE 9 */
      transform: rotate(0deg);
      /* Firefox 16+, IE 10+, Opera */
    }
    100% {
      -webkit-transform: rotate(360deg);
      /* Chrome, Opera 15+, Safari 3.1+ */
      -ms-transform: rotate(360deg);
      /* IE 9 */
      transform: rotate(360deg);
      /* Firefox 16+, IE 10+, Opera */
    }
  }

  @keyframes spin {
    0% {
      -webkit-transform: rotate(0deg);
      /* Chrome, Opera 15+, Safari 3.1+ */
      -ms-transform: rotate(0deg);
      /* IE 9 */
      transform: rotate(0deg);
      /* Firefox 16+, IE 10+, Opera */
    }
    100% {
      -webkit-transform: rotate(360deg);
      /* Chrome, Opera 15+, Safari 3.1+ */
      -ms-transform: rotate(360deg);
      /* IE 9 */
      transform: rotate(360deg);
      /* Firefox 16+, IE 10+, Opera */
    }
  }

  /* JavaScript Turned Off */

  .no-js #loader-wrapper {
    display: none;
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

<div id="loader-wrapper">
  <div id="loader"></div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script type="text/javascript">
$(window).load(function() {
  // Animate loader off screen
  $("#loader-wrapper").slideUp("slow");
});
</script>
