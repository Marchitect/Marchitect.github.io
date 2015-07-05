var langs =
[['Afrikaans',       ['af-ZA']],
 ['Bahasa Indonesia',['id-ID']],
 ['Bahasa Melayu',   ['ms-MY']],
 ['Català',          ['ca-ES']],
 ['Čeština',         ['cs-CZ']],
 ['Deutsch',         ['de-DE']],
 ['English',         ['en-AU', 'Australia'],
                     ['en-CA', 'Canada'],
                     ['en-IN', 'India'],
                     ['en-NZ', 'New Zealand'],
                     ['en-ZA', 'South Africa'],
                     ['en-GB', 'United Kingdom'],
                     ['en-US', 'United States']],
 ['Español',         ['es-AR', 'Argentina'],
                     ['es-BO', 'Bolivia'],
                     ['es-CL', 'Chile'],
                     ['es-CO', 'Colombia'],
                     ['es-CR', 'Costa Rica'],
                     ['es-EC', 'Ecuador'],
                     ['es-SV', 'El Salvador'],
                     ['es-ES', 'España'],
                     ['es-US', 'Estados Unidos'],
                     ['es-GT', 'Guatemala'],
                     ['es-HN', 'Honduras'],
                     ['es-MX', 'México'],
                     ['es-NI', 'Nicaragua'],
                     ['es-PA', 'Panamá'],
                     ['es-PY', 'Paraguay'],
                     ['es-PE', 'Perú'],
                     ['es-PR', 'Puerto Rico'],
                     ['es-DO', 'República Dominicana'],
                     ['es-UY', 'Uruguay'],
                     ['es-VE', 'Venezuela']],
 ['Euskara',         ['eu-ES']],
 ['Français',        ['fr-FR']],
 ['Galego',          ['gl-ES']],
 ['Hrvatski',        ['hr_HR']],
 ['IsiZulu',         ['zu-ZA']],
 ['Íslenska',        ['is-IS']],
 ['Italiano',        ['it-IT', 'Italia'],
                     ['it-CH', 'Svizzera']],
 ['Magyar',          ['hu-HU']],
 ['Nederlands',      ['nl-NL']],
 ['Norsk bokmål',    ['nb-NO']],
 ['Polski',          ['pl-PL']],
 ['Português',       ['pt-BR', 'Brasil'],
                     ['pt-PT', 'Portugal']],
 ['Română',          ['ro-RO']],
 ['Slovenčina',      ['sk-SK']],
 ['Suomi',           ['fi-FI']],
 ['Svenska',         ['sv-SE']],
 ['Türkçe',          ['tr-TR']],
 ['български',       ['bg-BG']],
 ['Pусский',         ['ru-RU']],
 ['Српски',          ['sr-RS']],
 ['한국어',            ['ko-KR']],
 ['中文',             ['cmn-Hans-CN', '普通话 (中国大陆)'],
                     ['cmn-Hans-HK', '普通话 (香港)'],
                     ['cmn-Hant-TW', '中文 (台灣)'],
                     ['yue-Hant-HK', '粵語 (香港)']],
 ['日本語',           ['ja-JP']],
 ['Lingua latīna',   ['la']]];

function upgrade() {
  start_button.style.visibility = 'hidden';
  showInfo('info_upgrade');
}
var two_line = /\n\n/g;
var one_line = /\n/g;
function linebreak(s) {
  return s.replace(two_line, '<p></p>').replace(one_line, '<br>');
}
var first_char = /\S/;
function capitalize(s) {
  return s.replace(first_char, function(m) { return m.toUpperCase(); });
}
function createEmail() {
  var n = final_transcript.indexOf('\n');
  if (n < 0 || n >= 80) {
    n = 40 + final_transcript.substring(40).indexOf(' ');
  }
  var subject = encodeURI(final_transcript.substring(0, n));
  var body = encodeURI(final_transcript.substring(n + 1));
  window.location.href = 'mailto:?subject=' + subject + '&body=' + body;
}
//for the "End Speak" button that saves a bit of time
function endSpeak() {
  if (recognizing) {
    recognizing = false; 
    recognition.stop();
  }
  copy_info.style.display = 'inline-block';
  // showInfo('');
}
//for the "End Speak" button that saves a bit of time
//when recognition will start, the info displayed should disappear
function startSpeak() {
  copy_info.style.display = 'none';
  // showInfo('');
}

function startButton(event) {
  if (recognizing) {
    recognition.stop();
    return;
  }
  final_transcript = '';
  recognition.lang = select_dialect.value;
  recognition.start();
  ignore_onend = false;
  final_span.innerHTML = '';
  interim_span.innerHTML = '';
  start_img.src = 'mic-slash.gif';
  showInfo('info_allow');
  showButtons('none');
  start_timestamp = event.timeStamp;
}
function showInfo(s) {
  if (s) {
    for (var child = info.firstChild; child; child = child.nextSibling) {
      if (child.style) {
        child.style.display = child.id == s ? 'inline' : 'none';
      }
    }
    info.style.visibility = 'visible';
  } else {
    info.style.visibility = 'hidden';
  }
}
var current_style;
function showButtons(style) {
  if (style == current_style) {
    return;
  }
  current_style = style;
  copy_button.style.display = style;
  email_button.style.display = style;
  copy_info.style.display = 'none';
  email_info.style.display = 'none';
}



// $(document).ready(function() {
//   $('#submit').on('click', function() {
//     var postcode = $("#postcode").val();
//     $.ajax({
//       method: "POST",
//       url: "acinfo.php",
//       data: {script: postcode}
//     })
//     .done(function( msg ) {
//     // alert("hello" + msg);
//     $("#newinfo").html(msg);
//     });             
//   });
// });
// $('#submit').click(function(){
//     $.ajax({
//         method: "POST",
//         url: "acinfo.php",
//         data: {script: dialog}
//         })
//         .done(function( msg ) {
//         // alert("hello" + msg);
//         $("#newinfo").html(msg);
//         });             
//     });
// });

function computertalk(dialog){

   $.ajax({
   method: "POST",
   url: "acinfo.php",
   data: {script: dialog}
   })
   .done(function( msg ) {
    // alert("hello" + msg);
    $("#newinfo").html(msg);
   });


	
	voices = window.speechSynthesis.getVoices();
    console.log('Get voices ' + voices.length.toString());
    for(var i = 0; i < voices.length; i++ ) {
         console.log("Voice " + i.toString() + ' ' + voices[i].name);
    }
     
    // var outputtext ="result is shown";
    
	 	
		
	// var u = new SpeechSynthesisUtterance(outputtext);
 //   	u.lang = 'en-GB';
 //   	u.pitch = 1;
 //   	u.rate = 0.8;
 //   	u.volume = 1;
	
	// //reference:
 //  //https://dvcs.w3.org/hg/speech-api/raw-file/tip/speechapi.html
	// //when responding, stops recognising new speech.
	// u.onstart = function(){
	// 	recognition.stop();
	// 	reset();
	// }
	// //if responding finished, restarts recognising speech.
	// u.onend = function(event) {
	// 	recognition.start();
	// 	recognizing = true;
	// 	startSpeak();
	//  }
	
  // speechSynthesis.speak(u);
  // console.log("Voice " + u.voice.name);
     
}