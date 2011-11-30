<?PHP


//function to fix problem to fetch rss with school proxy on
//have to call the function before getFeed
function getProxy() { 
      $Proxy = getenv("HTTP_PROXY"); 

      if (strlen($Proxy) > 1) { 
        $r_default_context = stream_context_get_default ( array 
                    ('http' => array( 
                        'proxy' => $Proxy, 
                        'request_fulluri' => True, 
                    ), 
                ) 
            ); 
        libxml_set_streams_context($r_default_context); 
      } 
    } 

//contentOnly function: get rid of the image inside description

function contentOnly($start, $end, $pizza){
	$s = strpos($pizza, $start);
	$e = strpos($pizza, $end);
	if ($e = 0) {
		return "N/A";
		break;
	}
	else {
	//$length = $e - $s; It actually start from the end
	$output = substr($pizza, $e);
	return $output; }
}

//getFeed function: main function to get rss data
function getFeed($feed_url) {   
    
	$xml = simpleXML_load_file($feed_url,"SimpleXMLElement", null); 
	//Don't phase CDATA PLZ!!!//,LIBXML_NOCDATA) 

	if($xml ===  FALSE) 
	{ 
     echo "Error";
	 break; 
	} 
	else
	{
    echo "&nbsp;&nbsp;";   
 
    foreach($xml->channel->item as $entry) { 
        $content = contentOnly("<img","/>",$entry->description);
		echo "&raquo;&nbsp;<strong>" . $entry->title . " :</strong>" . $content . "&nbsp;&nbsp;&nbsp;&nbsp;";   
    }   
    echo "";   }
}



?> 



