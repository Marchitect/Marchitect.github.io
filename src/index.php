<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
          <title>Aircon.</title>
        <meta name="description" content="">
        <meta name='viewport' content='initial-scale=1,maximum-scale=1,user-scalable=no' />
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="favicon" href="favicon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/practicemap.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>

        <!--map stuff-->
        <script src='https://api.tiles.mapbox.com/mapbox.js/v2.2.1/mapbox.js'></script>
        <script src='https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-omnivore/v0.2.0/leaflet-omnivore.min.js'></script>
        <script src='https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/leaflet.markercluster.js'></script>
        <link href='https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/MarkerCluster.css' rel='stylesheet' />
        <link href='https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-markercluster/v0.4.0/MarkerCluster.Default.css' rel='stylesheet' />
        <link href='https://api.tiles.mapbox.com/mapbox.js/v2.2.1/mapbox.css' rel='stylesheet' />
        <style>
          body { margin:0 auto; padding:0; }
        #map { position:absolute; top:0; bottom:0; width:100%; height:100%; }
        </style>

	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="./dialogue.js"></script>
	<!-- thanks to Google open source.
	Credit:
	https://developers.google.com/web/updates/2013/01/Voice-Driven-Web-Apps-Introduction-to-the-Web-Speech-API -->
	<style>
	  * {
	    font-family: Verdana, Arial, sans-serif;
	  }
	  a:link {
	    color:#000;
	    text-decoration: none;
	  }
	  a:visited {
	    color:#000;
	  }
	  a:hover {
	    color:#33F;
	  }
	  .button {
	    background: -webkit-linear-gradient(top,#008dfd 0,#0370ea 100%);
	    border: 1px solid #076bd2;
	    border-radius: 3px;
	    color: #fff;
	    display: none;
	    font-size: 13px;
	    font-weight: bold;
	    line-height: 1.3;
	    padding: 8px 25px;
	    text-align: center;
	    text-shadow: 1px 1px 1px #076bd2;
	    letter-spacing: normal;
	  }
	  .center {
	    padding: 10px;
	    text-align: center;
	  }
	  .final {
	    color: black;
	    padding-right: 3px; 
	  }
	  .interim {
	    color: gray;
	  }
	  .info {
	    font-size: 14px;
	    text-align: center;
	    color: #777;
	    display: none;
	  }
	  .right {
	    float: right;
	  }
	  .sidebyside {
	    display: inline-block;
	    width: 45%;
	    min-height: 40px;
	    text-align: left;
	    vertical-align: top;
	  }
	  #headline {
	    font-size: 40px;
	    font-weight: 300;
	  }
	  #info {
	    font-size: 20px;
	    text-align: center;
	    color: #777;
	    visibility: hidden;
	  }
	  #results{
	    font-size: 14px;
	    font-weight: bold;
	    border: 1px solid #ddd;
	    padding: 15px;
	    text-align: left;
	    min-height: 20px;
	  }
	  #start_button {
	    border: 0;
	    background-color:transparent;
	    padding: 0;
	  }
	  #narrower{
	  	width: 500px;
	  }

	  	table {
		margin: 5px;
		}

		th {
		font-family: Arial, Helvetica, sans-serif;
		font-size: .7em;
		background: #666;
		color: #FFF;
		padding: 2px 6px;
		border-collapse: separate;
		border: 1px solid #000;
		}

		td {
		font-family: Arial, Helvetica, sans-serif;
		font-size: .7em;
		border: 1px solid #DDD;
		}
	</style>
	</head>

<body>
      <!--[if lt IE 8]>
          <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
      <![endif]-->

      <!-- Add your site or application content here -->
      <header>
        <h2>AirCondor.</h2>
      </header>

      <div class="instructions">
        <p>Enter your postcode in the search box, or navigate through the map using the markers.</br>
Select a final postcode marker to examine the top rated airconditioners for your area.</br></p>
      </div>

      <div class="mapbox">
      <style>
      .menu-ui {
        background:#fff;
        position:absolute;
        top:10px;right:10px;
        z-index:1;
        border-radius:3px;
        width:120px;
        border:1px solid rgba(0,0,0,0.4);
        }
        .menu-ui a {
          font-size:13px;
          color:#404040;
          display:block;
          margin:0;padding:0;
          padding:10px;
          text-decoration:none;
          border-bottom:1px solid rgba(0,0,0,0.25);
          text-align:center;
          }
          .menu-ui a:first-child {
            border-radius:3px 3px 0 0;
            }
          .menu-ui a:last-child {
            border:none;
            border-radius:0 0 3px 3px;
            }
          .menu-ui a:hover {
            background:#f8f8f8;
            color:#404040;
            }
          .menu-ui a.active {
            background:#3887BE;
            color:#FFF;
            }
            .menu-ui a.active:hover {
              background:#3074a4;
              }
              .search-ui {
            position:absolute;
            top:10px;
           right:10px;
            z-index:1000;
        }
        .popup {
        text-align:center;
        }
      .popup .slideshow .image        { display:none; }
      .popup .slideshow .image.active { display:block; }
      .popup .slideshow img {
        width:100%;
        }
      .popup .slideshow .caption {
        background:#eee;
        padding:10px;
        }
      .popup .cycle {
        padding:10px 0 20px;
        }
        .popup .cycle a.prev { float:left; }
        .popup .cycle a.next { float:right; }

      </style>
      <div id='map'>
      	<nav id='map-ui' class='menu-ui'>
        </nav>
      </div>

      <script>


      L.mapbox.accessToken = 'pk.eyJ1IjoiamVzc2NsYXJrZSIsImEiOiI1NjBjMmI1YjZhYzhjNDBmNWI0NjMwZDI3YTBiNDMzNCJ9.maxV35PVVN-oIOSKrgnk8A';
      var map = L.mapbox.map('map', 'jessclarke.mkf7e0n9').setView([-28, 138], 4).addControl(L.mapbox.geocoderControl('mapbox.places'));

      var imageContent = '<div class="image active">' +
                                    '<img src="img/acimage.png"/>' +
                                  '</div>';
      var popupContent =  '<div id="id" class="popup">' +
                            '<h2>Top 5 Airconditioners</h2>' +
                            '<div class="slideshow">' +
                                      imageContent +
                                  '</div>' +
                        '</div>';

      L.mapbox.featureLayer('jessclarke.mki5j8l1').on('ready', function(e) {

          var clusterGroup = new L.MarkerClusterGroup();
          e.target.eachLayer(function(layer) {
              clusterGroup.addLayer(layer);
          });
          map.addLayer(clusterGroup);
      }).bindPopup(popupContent, {minWidth: 600}).openPopup();

      </script>
      </div>	

	<div id="narrower">
	<div id="info">
	  <p id="info_start">Click on the microphone icon and speak an Australian postcode.</p>
	  <p id="info_speak_now">Speak now.</p>
	  <p id="info_no_speech">No speech was detected. You may need to adjust your
	    <a href="//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">
	      microphone settings</a>.</p>
	  <p id="info_no_microphone" style="display:none">
	    No microphone was found. Ensure that a microphone is installed and that
	    <a href="//support.google.com/chrome/bin/answer.py?hl=en&amp;answer=1407892">
	    microphone settings</a> are configured correctly.</p>
	  <p id="info_allow">Click the "Allow" button above to enable your microphone.</p>
	  <p id="info_denied">Permission to use microphone was denied.</p>
	  <p id="info_blocked">Permission to use microphone is blocked. To change,
	    go to chrome://settings/contentExceptions#media-stream</p>
	  <p id="info_upgrade">Web Speech API is not supported by this browser.
	     Upgrade to <a href="//www.google.com/chrome">Chrome</a>
	     version 25 or later.</p>
	</div>
	<div class="right">
	  <button id="start_button" onclick="startButton(event)">
	    <img id="start_img" src="mic.gif" alt="Start"></button>
	</div>
	<div id="results">
	  <span id="final_span" class="final"></span>
	  <span id="interim_span" class="interim"></span>

	</div>
	<div class="center">
	  <div class="sidebyside" style="text-align:right">
	    <button id="copy_button" class="button" onclick="endSpeak()">
	      End Speak</button>
	    <div id="copy_info" class="info">
	      wait and allow the microphone to speak again.
	    </div>
	  </div>
	  
<!-- 	  <div class="sidebyside">
	    <form method="post" action="acinfo.php" id="ajaxform">
	    	<input type="text" id="postcode">
	    	<input type="submit" id="submit" value="POST CODE to Submit">
	    </form>
	  </div> -->


	  <div id="div_language">
	    <select id="select_language" onchange="updateCountry()"></select>
	    &nbsp;&nbsp;
	    <select id="select_dialect"></select>
	  </div>
	</div>

	<div id="ins">
		<div id="newinfo">
		</div>
		<div id="topinfo">
		</div>
	</div>
	</div>
<script>
	var noun = <?php echo json_encode($content); ?>;

	for (var i = 0; i < langs.length; i++) {
	  select_language.options[i] = new Option(langs[i][0], i);
	}
	select_language.selectedIndex = 6;
	updateCountry();
	select_dialect.selectedIndex = 6;
	showInfo('info_start');
	function updateCountry() {
	  for (var i = select_dialect.options.length - 1; i >= 0; i--) {
	    select_dialect.remove(i);
	  }
	  var list = langs[select_language.selectedIndex];
	  for (var i = 1; i < list.length; i++) {
	    select_dialect.options.add(new Option(list[i][1], list[i][0]));
	  }
	  select_dialect.style.visibility = list[1].length == 1 ? 'hidden' : 'visible';
	}

	var create_email = false;
	var final_transcript = '';
	var recognizing = false;
	var ignore_onend;
	var start_timestamp;
	var speakingStatus;
	var store = '';

	if (!('webkitSpeechRecognition' in window)) {
	  upgrade();
	} else {  	
	  start_button.style.display = 'inline-block';
	  var recognition = new webkitSpeechRecognition();


	  recognition.continuous = true;
	  recognition.interimResults = true;
	  
	  recognition.onstart = function() {
	    recognizing = true;
	    showInfo('info_speak_now');
	    start_img.src = 'mic-animate.gif';
		
	  };
	  recognition.onerror = function(event) {
	    if (event.error == 'no-speech') {
	      start_img.src = 'mic.gif';
	      showInfo('info_no_speech');
	      ignore_onend = true;
	    }
	    if (event.error == 'audio-capture') {
	      start_img.src = 'mic.gif';
	      showInfo('info_no_microphone');
	      ignore_onend = true;
	    }
	    if (event.error == 'not-allowed') {
	      if (event.timeStamp - start_timestamp < 100) {
	        showInfo('info_blocked');
	      } else {
	        showInfo('info_denied');
	      }
	      ignore_onend = true;
	    }
	  };
	  recognition.onend = function() {
	    recognizing = false;
	    if (ignore_onend) {
	      return;
	    }
	    start_img.src = 'mic.gif';
	    if (!final_transcript) {
	      showInfo('info_start');
	      return;
	    }
	    showInfo('');
	    if (window.getSelection) {
	      window.getSelection().removeAllRanges();
	      var range = document.createRange();
	      range.selectNode(document.getElementById('final_span'));
	      window.getSelection().addRange(range);
	    }
	    if (create_email) {
	      create_email = false;
	      createEmail();
	    }
	  };
	  recognition.onresult = function(event) {
	    var interim_transcript = '';
	    for (var i = event.resultIndex; i < event.results.length; ++i) {
	      if (event.results[i].isFinal) {
	        final_transcript = event.results[i][0].transcript;
			
			computertalk(final_transcript);
			speakingStatus = "stopped";
			
	      } else {
	        interim_transcript = event.results[i][0].transcript;
	      }
	    }
	    final_transcript = capitalize(final_transcript);
	    final_span.innerHTML = linebreak(final_transcript);
	    interim_span.innerHTML = linebreak(interim_transcript);
	    if (final_transcript || interim_transcript) {
	      showButtons('inline-block');
	    }
	  };
	}


	
</script>		

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/{{JQUERY_VERSION}}/jquery.min.js"></script>
      <script>window.jQuery || document.write('<script src="js/vendor/jquery-{{JQUERY_VERSION}}.min.js"><\/script>')</script>
      <script src="js/plugins.js"></script>
      <script src="js/main.js"></script>

      <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
      <script>
          (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
          function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
          e=o.createElement(i);r=o.getElementsByTagName(i)[0];
          e.src='https://www.google-analytics.com/analytics.js';
          r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
          ga('create','UA-XXXXX-X','auto');ga('send','pageview');
      </script>

      <footer>
        <a href="practicemap.html">Home </a>
        <a href="about.html">About </a>
        <a href="https://github.com/GosHawkTas/airconapp.git">Github </a>
      </footer>
    </body>
</html>