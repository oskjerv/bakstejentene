<?php
    $errors = '';
    $myemail = 'kontakt@bakstejentene.no';
    if(empty($_POST['navn'])  ||
       empty($_POST['epost']) ||
       empty($_POST['beskjed']))
    {
        $errors .= "\n Feil: Alle felt må være fylt ut.";
    }
    $name = $_POST['navn'];
    $email_address = $_POST['epost'];
    $message = $_POST['beskjed'];
    if (!preg_match(
    "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
    $email_address))
    {
        $errors .= "\n Feil: ugyldig epostadresse.";
    }
    
    if( empty($errors))
    {
    $to = $myemail;
    $email_subject = "Contact form submission: $name";
    $email_body = "You have received a new message. ".
    " Here are the details:\n Name: $name \n ".
    "Email: $email_address\n Message \n $message";
    $headers = "From: $myemail\n";
    $headers .= "Reply-To: $email_address";
    mail($to,$email_subject,$email_body,$headers);
    //redirect to the 'thank you' page
    header('Location: index.html#bestill');
    }
    ?>