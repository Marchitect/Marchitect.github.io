<?php
$postcode=$_POST['script'];




// $myfile = file_get_contents(".//aircondata//".$postcode.".json");
$myfile = file_get_contents("./aircondata/".$postcode.".json");

$ac_decoded = json_decode($myfile, true);

// switch (json_last_error()) {
//         case JSON_ERROR_NONE:
//             echo ' - No errors';
//         break;
//         case JSON_ERROR_DEPTH:
//             echo ' - Maximum stack depth exceeded';
//         break;
//         case JSON_ERROR_STATE_MISMATCH:
//             echo ' - Underflow or the modes mismatch';
//         break;
//         case JSON_ERROR_CTRL_CHAR:
//             echo ' - Unexpected control character found';
//         break;
//         case JSON_ERROR_SYNTAX:
//             echo ' - Syntax error, malformed JSON';
//         break;
//         case JSON_ERROR_UTF8:
//             echo ' - Malformed UTF-8 characters, possibly incorrectly encoded';
//         break;
//         default:
//             echo ' - Unknown error';
//         break;
// }
// var_dump($ac_decoded);
// foreach ($ac_decoded as $key => $value) {
// 	if($key=="1"){
// 		echo $value["Brand"];
		
// 	}

// }

fclose($myfile);


function build_table($array){

    // start table
	echo '<p>The n most efficient ACs for this postcode are listed below.</p>';
    $html = '<table>';
    // header row


    // foreach( $array as $key=>$value){
    //     foreach($value as $key2=>$value2){

    //         $html .= '<colgroup>' . $key2 . '</colgroup>';

    //     }

    // }

    $html .= '<tr>';

    // foreach($array as $key=>$value){

    //         $html .= '<th>' . $key . '</th>';
    //     }
    foreach( $array as $key=>$value){
    	if($key == "1"){
	        foreach($value as $key2=>$value2){

	            $html .= '<th>' . $key2 . '</th>';

	        }    		
    	}


    }

    $html .= '</tr>';

    // data rows

    foreach( $array as $key=>$value){

        $html .= '<tr>';

        foreach($value as $key2=>$value2){

            $html .= '<td>' . $value2 . '</td>';

        }

        $html .= '</tr>';

    }

    // finish table and return it

    $html .= '</table>';

    return $html;

}

echo build_table($ac_decoded);
?>