<?php
    $ToEmail = "technomads@technomads.in";
    $EmailSubject = 'Techonomads contact form';
    $mailheader = "From: ".$_POST["email"]."\r\n";
    $mailheader .= "Reply-To: ".$_POST["email"]."\r\n";
    $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $MESSAGE_BODY = "Name: ".$_POST["first_name"] ." ".$_POST["last_name"]."<br>";
    $MESSAGE_BODY .= "Email: ".$_POST["email"]."<br>";
    $MESSAGE_BODY .= "Company Name: ".$_POST["company_name"]."<br>";
    $MESSAGE_BODY .= "Phone Number: ".$_POST["phone_number"]."<br>";
//    mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure");
    if(mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader))
        echo "Thank you for contact.";
    else
        echo "Email sending failed";
?>
