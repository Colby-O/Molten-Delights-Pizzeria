<!-- get_quote.php -->

<?php 
    function getQuote() {
        $quotesString = file_get_contents("./resources/quotes.json");
        $quotes = json_decode($quotesString, true);
        $quote = $quotes[rand() % count($quotes)];
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