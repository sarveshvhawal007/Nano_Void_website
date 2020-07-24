<?php


// $mysql_host='localhost';
// $mysql_user='id14294850_query123';
// $mysql_password='=eEX1wX(>9C}Qz1D';
// $mysql_db='id14294850_query';

$mysql_host='localhost';
$mysql_user='root';
$mysql_password='Myadmin@2000';
$mysql_db='queries1';


 $conn=mysqli_connect($mysql_host,$mysql_user,$mysql_password,$mysql_db);

 echo "<br><br><h4>Database Connected</h4>";

$table='query';
$mysqli = new mysqli($mysql_host,$mysql_user,$mysql_password,$mysql_db) or die($mysqli->connect_error);

  //
  // // Replace contact@example.com with your real receiving email address
  // $receiving_email_address = 'contact@example.com';
  //
  // // if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
  // //   include( $php_email_form );
  // // } else {
  // //   die( 'Unable to load the "PHP Email Form" Library!');
  // // }
  //
  // $contact = new PHP_Email_Form;
  // $contact->ajax = true;
  //
  // $contact->to = $receiving_email_address;
  // $contact->from_name = $_POST['name'];
  // $contact->from_email = $_POST['email'];
  // $contact->subject = $_POST['subject'];
  //
  // // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  // /*
  // $contact->smtp = array(
  //   'host' => 'example.com',
  //   'username' => 'example',
  //   'password' => 'pass',
  //   'port' => '587'
  // );
  // */
  //
  // $contact->add_message( $_POST['name'], 'From');
  // $contact->add_message( $_POST['email'], 'Email');
  // $contact->add_message( $_POST['phone'], 'Phone');
  // $contact->add_message( $_POST['message'], 'Message', 10);
  //
  // echo $contact->send();


  if(isset($_POST['submit_message']))
{
  $name=$_POST['name'];
  $email=$_POST['email'];
  $phone=$_POST['phone'];
  $message=$_POST['message'];
  $subject=$_POST['subject'];
  if($name!="" && $email!="" && $message!="")
  {
    echo"hi";
    $sql = "INSERT IGNORE INTO $table (name,email,phone,subject,message) VALUES('$name','$email','$phone','$subject','$message')";
    $mysqli->query($sql) or die($mysqli->error);

    $to="info@nanovoid.co.in";

    $msg="Name:".$name."\n"."Phone: ".$phone."\n"."Query: \n\n".$message."\n";
    $headers="From: ".$email;

    $to1=$email;
    $subject1="Reg: Query Submitted";
    $msg1="Thanks For Your Respond\n\n Our team will contact You Soon via this email!!!";
    $headers1="From: ".$to;

    if(mail($to,$subject,$msg,$headers))
    {
      ?>
      <script type="text/javascript">
      alert('Thanks\nYour qurey has been recorded');
      </script>
      <?php
    }
    else {
      ?>
      <script type="text/javascript">
      alert('Message not submitted');
      </script>
      <?php
      // code...
    }
header("Location:../index.html#facts");

  }
  else {
    ?>
    <script type="text/javascript">
    alert('Message not submitted');
    </script>
    <?php
    header("Location:../index.html");
  }

}
?>
