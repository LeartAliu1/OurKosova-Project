<?php

require 'Contact.php'; 


$db = new mysqli('localhost', 'root', '', 'contact_form_db');

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}


$contact = new Contact($db);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if ($contact->saveContact($name, $email, $subject, $message)) {
        echo "<script>alert('Message sent successfully!');</script>";
    } else {
        echo "<script>alert('Failed to send message.');</script>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles-contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
    <title>Contact Section</title>
</head>
<body class="body">
    <div class="container">
        <main class="row">
            <section class="col left">
                <div class="contactTitle">
                    <h2>Contact Us</h2>
                    <p>We’d love to hear from you! Whether you have questions, feedback, or need assistance, our team is here to help.</p>
                </div>
                <div class="contactInfo">
                    <div class="iconGroup">
                        <div class="icon">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="details">
                            <span>Phone</span>
                            <span>049 123 542</span>
                        </div>
                    </div>
                    <div class="iconGroup">
                        <div class="icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="details">
                            <span>Email</span>
                            <span>YourPrishtina@gmail.com</span>
                        </div>
                    </div>
                </div>
                <div class="socialMedia">
                    <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="https://x.com/"><i class="fa-brands fa-x"></i></a>
                    <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
            </section>
            <section class="col right">
                <form class="messageForm" method="POST" action="">
                    <div class="inputGroup halfWidth">
                        <input type="text" name="name" required="required">
                        <label>Your Name</label>
                    </div>
                    <div class="inputGroup halfWidth">
                        <input type="email" name="email" required="required">
                        <label>Email</label>
                    </div>
                    <div class="inputGroup fullWidth">
                        <input type="text" name="subject" required="required">
                        <label>Subject</label>
                    </div>
                    <div class="inputGroup fullWidth">
                        <textarea name="message" required="required"></textarea>
                        <label>Say Something</label>
                    </div>
                    <div class="inputGroup fullWidth">
                        <button type="submit">Send Message</button>
                    </div>
                </form>        
            </section>
        </main>
    </div>
    
</body>
</html>
