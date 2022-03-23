<?php 
//get_quote_from_mongodb.php
function getQuote() {
	require('/var/shared/vendor/autoload.php');
	require($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/../../../htpasswd/mongodb.inc');
	$client = new MongoDB\Client("mongodb://$username:$password@localhost/u26");
	$collection = $client->u26->quotes_mongo;
	$quote_number = rand(1, $collection->count());
	$quote = $collection->findone( [ '_id' => $quote_number ] );
        return "Today's " . $quote["adjective"] . " quote, from " . $quote["author"] . ": " . $quote["text"];
    }

    function updateQuote($quote) {
        $myfile = fopen("./resources/quote_today.txt", "w") or die("Cannot open file!");
        $text = date("l, F jS") . "\n" . $quote;
        fwrite($myfile, $text);
        fclose($myfile);
    }

    $url = $_SERVER['CONTEXT_DOCUMENT_ROOT'] . "/resources/quote_today.txt";
    if(file_exists($url)) {
        $myfile = fopen($url, "r");
        $date = trim(fgets($myfile));

        if ($date == date("l, F jS")) {
            $quote = "";
            while (($buffer = fgets($myfile, 4096)) !== false) {
                $quote .= $buffer;
            }
            fclose($myfile);

            echo $quote;
        } else {
            fclose($myfile);
            unlink($url);
            $quote = getQuote();
            updateQuote($quote);
            echo $quote;
        }
    } else {
        $quote = getQuote();
        updateQuote($quote);
        echo $quote;  
    }
?>
