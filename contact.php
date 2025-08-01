<?php require_once('header.php'); ?>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_page WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    $contact_title = $row['contact_title'];
    $contact_banner = $row['contact_banner'];
}
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    $contact_map_iframe = $row['contact_map_iframe'];
    $contact_email = $row['contact_email'];
    $contact_phone = $row['contact_phone'];
    $contact_address = $row['contact_address'];
}
?>

<div class="page-banner" style="background-image: url(assets/uploads/<?php echo $contact_banner; ?>);">
    <div class="inner">
        <h1><?php echo $contact_title; ?></h1>
    </div>
</div>

<div class="page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row cform">
                    <div class="col-md-8">
                        <div class="well well-sm contact-form-box">
                            <h3 class="contactform-heading">Contact</h3>

                            <?php
                            // After form submit checking everything for email sending
                            if (isset($_POST['form_contact'])) {
//                                 $error_message = '';
//                                 $success_message = '';
//                                 $statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
//                                 $statement->execute();
//                                 $result = $statement->fetchAll(PDO::FETCH_ASSOC);
//                                 foreach ($result as $row) {
//                                     $receive_email = $row['receive_email'];
//                                     $receive_email_subject = $row['receive_email_subject'];
//                                     $receive_email_thank_you_message = $row['receive_email_thank_you_message'];
//                                 }

//                                 $valid = 1;

                                if (empty($_POST['visitor_name'])) {
                                    $valid = 0;
                                    $error_message .= 'Please enter your name.\n';
                                }

                                if (empty($_POST['visitor_phone'])) {
                                    $valid = 0;
                                    $error_message .= 'Please enter your phone number.\n';
                                }


                                if (empty($_POST['visitor_email'])) {
                                    $valid = 0;
                                    $error_message .= 'Please enter your email address.\n';
                                } else {
                                    // Email validation check
                                    if (!filter_var($_POST['visitor_email'], FILTER_VALIDATE_EMAIL)) {
                                        $valid = 0;
                                        $error_message .= 'Please enter a valid email address.\n';
                                    }
                                }

                                if (empty($_POST['visitor_message'])) {
                                    $valid = 0;
                                    $error_message .= 'Please enter your message.\n';
                                }

                                if(!empty($_POST['visitor_name']) && !empty($_POST['visitor_phone']) && !empty($_POST['visitor_email']) && !empty($_POST['visitor_message'])){
                                echo "<script>alert('We will contact soon')</script>";}

//                                 if ($valid == 1) {

//                                     $visitor_name = strip_tags($_POST['visitor_name']);
//                                     $visitor_email = strip_tags($_POST['visitor_email']);
//                                     $visitor_phone = strip_tags($_POST['visitor_phone']);
//                                     $visitor_message = strip_tags($_POST['visitor_message']);

//                                     // sending email
//                                     $to_admin = $receive_email;
//                                     $subject = $receive_email_subject;
//                                     $message = '
// <html><body>
// <table>
// <tr>
// <td>Name</td>
// <td>' . $visitor_name . '</td>
// </tr>
// <tr>
// <td>Email</td>
// <td>' . $visitor_email . '</td>
// </tr>
// <tr>
// <td>Phone</td>
// <td>' . $visitor_phone . '</td>
// </tr>
// <tr>
// <td>Comment</td>
// <td>' . nl2br($visitor_message) . '</td>
// </tr>
// </table>
// </body></html>
// ';
//                                     $headers = 'From: ' . $visitor_email . "\r\n" .
//                                         'Reply-To: ' . $visitor_email . "\r\n" .
//                                         'X-Mailer: PHP/' . phpversion() . "\r\n" .
//                                         "MIME-Version: 1.0\r\n" .
//                                         "Content-Type: text/html; charset=ISO-8859-1\r\n";

//                                     // Sending email to admin                  
//                                     mail($to_admin, $subject, $message, $headers);

//                                     $success_message = $receive_email_thank_you_message;
//                                 }
                            }
                            ?>

                            <?php
                            if ($error_message != '') {
                                echo "<script>alert('" . $error_message . "')</script>";
                            }
                            if ($success_message != '') {
                                echo "<script>alert('" . $success_message . "')</script>";
                            }
                            ?>
                
                            <form action="" method="post">
                                <?php $csrf->echoInputField(); ?>
                                <div class="row full-container">
                                    <div class="col-md-6">
                                        <div class="form-group font">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control name-input" name="visitor_name" placeholder="Enter name">
                                        </div>
                                        <div class="form-group font">
                                            <label for="email">Email Address</label>
                                            <input type="email" class="form-control email-input" name="visitor_email" placeholder="Enter email address">
                                        </div>
                                        <div class="form-group font">
                                            <label for="email">Phone Number</label>
                                            <input type="text" class="form-control phone-no-input" name="visitor_phone" placeholder="Enter phone number">
                                        </div>
                                    </div>
                                    <div class="col-md-6 message-div font">
                                        <div class="form-group">
                                            <label for="name">Message</label>
                                            <textarea name="visitor_message" class="form-control message-input" rows="9" cols="25" placeholder="Enter message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 button-div">
                                        <input type="submit" value="Send Message" class="btn btn-primary pull-right" name="form_contact">
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
                    <div class="flex-content"> 
                        <!-- <h3>Find Us On Map</h3> -->
                        <?php echo $contact_map_iframe; ?>
                    </div> 
            </div>
        </div>
    </div>
</div>

<?php require_once('footer.php'); ?>

<?php include('./footer_bottom.php'); ?>