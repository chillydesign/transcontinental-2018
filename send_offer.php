<?php


// error_reporting(E_ALL);
// ini_set('display_errors', '1');



require_once('../../../wp-config.php');

function clean_string($string) {

  $bad = array("content-type","bcc:","to:","cc:","href");

  return str_replace($bad,"",$string);

}



if(isset($_POST['email'])) {





    // validation expected data exists

    if( !isset($_POST['email']) || !isset($_POST['message'])) {

         echo 'Message not sent' ;

    } else {



      $name = (isset($_POST['name'])) ?   $_POST['name'] : 'Someone'  ; // required
      $email = $_POST['email']; // required
      $message = $_POST['message']; // required
      $number = $_POST['number'];
      $offer_title = $_POST['offer_title'];


      $name = clean_string($name);
      $email = clean_string($email);
      $message = clean_string($message);
      $number = clean_string($number);
      $offer_title = clean_string($offer_title);




      // create email headers
      // add_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );
      $to = 'harvey.charles@gmail.com';
      $subject = 'New Offer Request from Transco';
      $email_message = "Offre: \n" . $offer_title . "\n\n";
      $email_message .= "Nom: \n" . $name . "\n\n";
      $email_message .= "Email:\n" . $email . "\n\n";
      $email_message .= "Nombre de personnes:\n" . $number . "\n\n";
      $email_message .= "Message: \n" . $message . "\n\n";

      $mailResult = wp_mail( $email, $subject, $email_message);
      if(  $mailResult ){
            echo 'Message sent successfully' ;
      }  else {
           echo  'Message not sent' ;
          // global $ts_mail_errors;
          // global $phpmailer;
          // if (!isset($ts_mail_errors)) $ts_mail_errors = array();
          // if (isset($phpmailer)) {
          //     $ts_mail_errors[] = $phpmailer->ErrorInfo;
          // }
          //
          // echo json_encode($ts_mail_errors);

      }

      // remove_filter( 'wp_mail_content_type', 'wpdocs_set_html_mail_content_type' );


    }



} else {
  echo "Something gone wrong ";
}



?>
