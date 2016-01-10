<?php
$searchValue = $_POST["searchValue"];
ini_set('memory_limit', '1G');
$str = file_get_contents('Medicinal_ingredient_information.json');
$str = str_replace("{","",$str);
$str = str_replace("}","",$str);
$str = str_replace("[","{",$str);
$str = str_replace("]","}",$str);
$str = mb_substr($str,2,-1,'utf-8');
$str = "[".$str."]";
$json = json_decode($str,true);
$msgArray =[];
$lenght = count($json);
for( $i = 0 ; $i<$lenght;$i++){
    $str = $json[$i]['適應症'];
	if($searchValue == "" || $searchValue == null){
		$pos = true;
	}else{
		$pos = strpos($str, $searchValue);
	}
	if(($json[$i]['中文品名'])==($searchValue)){
		$msg = "<div data-role='collapsible' data-collapsed='true' data-content-theme='b' data-collapsed-icon='arrow-r' data-expanded-icon='arrow-d' class='ui-collapsible ui-collapsible-inset'>";
		$msg .="<h3>中文品名:" . $json[$i]['中文品名'] . "</h3><p><h4>適應症 : " . $json[$i]['適應症'];
		$msg .= "<br>主成分略述 : " . $json[$i]['主成分略述']. "</h4></p>";
		$msg .= "</div>";
		array_push($msgArray, $msg);
	}else {
            if ($pos){
		$msg = "<div data-role='collapsible' data-collapsed='true' data-content-theme='b' data-collapsed-icon='arrow-r' data-expanded-icon='arrow-d' class='ui-collapsible ui-collapsible-inset'>";
		$msg .="<h3>中文品名:" . $json[$i]['中文品名']. "</h3><p><h4>適應症 : " . $json[$i]['適應症'];
		$msg .= "<br>主成分略述 : " . $json[$i]['主成分略述'] . "</h4></p>";
		$msg .= "</div>";
		array_push($msgArray, $msg);
            }
        }
}
echo json_encode($msgArray);
?>