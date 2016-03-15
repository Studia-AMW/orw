<?php
function scrape($url){
$output = file_get_contents($url); 
return $output;
}

 function fetchdata($data, $start, $end){
        $data = stristr($data, $start);
        $data = substr($data, strlen($start));  
        $stop = stripos($data, $end);   
        $data = substr($data, 0, $stop);    
        return $data;   // Zwrócenie danych pobranych przez funkcję
    }
	
	//$url = 'https://www.flickr.com/cameras/nikon/d7000/' - przykładowy adres;
    $url = $_POST['url'];
    

        $page = scrape($url);   
        $result = fetchdata($page, "<div id=\"thumb-wrapper\">", "<div class=\"paginator\">");
        
        $thumbnails = explode("<img id=\"",$result);

        foreach($thumbnails as $thumb) {            
            $images[] = fetchdata($thumb, "\" src=\"", "\"width");
        }

        echo json_encode(array('status' => 'Success', 'imageset' => $images));
    
?>

