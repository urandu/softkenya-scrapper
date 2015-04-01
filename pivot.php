<?php
set_time_limit(0);
// Include the library
include('simple_html_dom.php');
 
// Retrieve the DOM from a given URL
//$html = file_get_html('http://www.yellowpageskenya.com/search/?grava=0MR8ultYpf&ppsattrree=0MR8ultYpf&businness=stnatnuoccA&business=Accountants&b=stnatnuoccA&rerr=0MR8ultYpf&sessa=0MR8ultYpf');

// Find all "A" tags and print their HREFs
//foreach($html->find('a') as $e) 
//    echo $e->href . '<br>';

// Retrieve all images and print their SRCs
//foreach($html->find('img') as $e)
//    echo $e->src . '<br>';

// Find all images, print their text with the "<>" included
//foreach($html->find('img') as $e)
//    echo $e->outertext . '<br>';
$context = array
(
    'http' => array
    (
        'proxy' => 'proxy.uonbi.ac.ke:80', // This needs to be the server and the port of the NTLM Authentication Proxy Server.
        'request_fulluri' => true,
    ),
);

$context = stream_context_create($context);



    $html2 = file_get_html('http://softkenya.com/health/',false,$context);



$ol=$html2->find('ol')[4];

foreach($ol->find('a') as $e)
{
    echo("<strong>".$e->href."</strong> <br>");

    $html3=file_get_html($e->href,false,$context);
    foreach($html3->find('.lcp_catlist') as $e2)
    {
        foreach($e2->find('a') as $e3)
        {
            echo("  ");
            echo $e3->href." <br>";
        }

    }
}

?>
