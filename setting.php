<?php

include('connect.php');
include('navbar.php');
session_start();
$id=$_SESSION['users'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setting</title>
    <link rel="stylesheet" href="setting.css">
    <script src="https://kit.fontawesome.com/524c5a650e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(function () {
            $("#tabs").tabs();
        });
    </script>
    <script>
        function cancel() {
            var ds = document.getElementById('ds');
            var dop = document.getElementById('dop');
            if ((click = true) && (ds.style.display = 'block')) {
                ds.style.display = 'none';
                dop.style.display = 'block';
            }
        }
        function beforedelete() {
            var ds = document.getElementById('ds');
            var dop = document.getElementById('dop');
            if (ds.style.display != 'block') {
                ds.style.display = 'block';
                dop.style.display = 'none';
            }
        }
    </script>
    <script type="text/javascript">
    function confirmation(id){
    sts = confirm("Are you sure you want to delete all your post?");
    if(sts){
        document.location.href=`allpostdelete.php?db=${id}`;
        return true;
    }
    }
    </script>
</head>

<body>
    <div class="box">
        <img src="rantel.png" alt="logo">
        <div class="top">
            <p class="ar">Setting and others</p>
        </div>
        <div class="tools">
            <div id="tabs">
                <ul>
                    <li><a href="#tabs-1">Accounts</a></li>
                    <li><a href="#tabs-2">Security</a></li>
                    <li><a href="#tabs-3">Contact</a></li>
                    <li><a href="#tabs-4">Policies</a></li>
                </ul>
                <div id="tabs-1">
                    <div class="delete" id="ds">
                        <button class="cross"><i class="fa-regular fa-circle-xmark" onclick="cancel()"></i></button>
                        <div class="excla">
                            <i class="fa-solid fa-exclamation"></i>
                        </div>
                        <h3>Your account will be deleted <span>Permanently!</span></h3>
                        <p>Do you want to proceed?</p>
                        <div class="btn">
                            <button class="btn1" onclick="cancel()">Cancel</button>
                            <?php echo'<button class="btn2"><a href="udelete.php?uid='.$id.'">Delete</a></button>'; ?>
                        </div>
                    </div>
                    <div class="options" id="dop">
                        <ul>
                            <li id="opt">
                                <h3 id="opn">Delete your account</h3>
                                <p id="odn">Do you want to delete your active account ? You should know that deleting
                                    your
                                    account will result in loss of all the data related to the accounts including
                                    userpost as well as the deal you are currently involved in.<br> Click the button
                                    below if you want to continue.</p>
                                <button class="btn3" onclick="beforedelete()">Delete Account</button>
                            </li>
                            <li id="opt">
                                <h3 id="opn">Delete all of your post</h3>
                                <p id="odn">Do you want to delete all of your post ? Deleting your
                                    post will result in loss of all the data stored in the website including the deal
                                    you are currently involved in.</p>
                                <?php echo'<button class="btn4"><a href="allpostdelete.php?userid='.$id.'">Delete Post</a></button>';?>
                                <button class="btn4"><a href='javascript:void()' onclick='confirmation($id)'>Delete Post</a></button>
                            </li>
                        </ul>

                    </div>
                </div>
                <div id="tabs-2">
                    <div class="options">
                        <ul>
                            <li id="opt">
                                <h3 id="opn">Change your email</h3>
                                <p id="odn">Changing your email will take you back to the login page. If you are sure to
                                    perform the operation, please click the button below:</p>
                                <?php echo'<button class="btn5"><a href="emailupdate.php"><i class="fa-solid fa-pen"></i>Change</a></button>'; ?>
                            </li>
                            <li id="opt">
                                <h3 id="opn">Change your password</h3>
                                <p id="odn">Changing your password will take you back to the login page. If you are sure
                                    to perform the operation, please click the button below:</p>
                                <?php echo'<button class="btn6"><a href="passupdate.php"><i class="fa-solid fa-pen"></i>Change</a></button>'; ?>
                            </li>
                            <li id="opt">
                                <h3 id="opn">Change your number</h3>
                                <p id="odn">Changing your number will affect in the deal you already accepted. If you
                                    are sure to perform the operation, please click the button below:</p>
                                <?php echo'<button class="btn7"><a href="numberupdate.php"><i class="fa-solid fa-pen"></i>Change</a></button>'; ?>
                            </li>
                        </ul>

                    </div>
                </div>
                <div id="tabs-3">
                    <div class="options">
                        <ul>
                            <li id="opt">
                                <h3 id="opn">Contact Us</h3>
                                <p id="odn">Usually there is no direct method to contact admin of the website as users are neither allowed to see or view admin profile nor message them as it overload the servers issue. An admin is a part of system that haldles the performance of other users so to help them feel easy, they are unaccessable to the users.</</p>
                            </li>
                            <li id="opt">
                                <h3 id="opn">Click the button below to visit the contact page of the website</h3>
                                <p id="odn">To make it easy for both users and admin, small inquary box has been set for users to give their message through email services.</p>
                                <button class="btn4"><a href="contact.php">Visit Us</a></button>
                            </li>
                        </ul>

                    </div>
                </div>
                <div id="tabs-4">
                    <div class="options">
                        <ul>
                            <li id="opt">
                                <h3 id="opn">Our Terms & Conditions</h3>
                                <p id="odn">Welcome to our website. If you continue to browse and use this website, you
                                    are agreeing to comply with and
                                    be bound by the following terms and conditions of use,</p>
                                <a href="terms.php">Link for the Terms and conditions</a>
                            </li>
                            <li id="opt">
                                <h3 id="opn">Our Privacy Policy</h3>
                                <p id="odn">[FindRoom.com] respects your privacy and is committed to protecting your
                                    personal data. Our
                                    Privacy Policy outlines how we collect, use, store, and safeguard your data when you
                                    use our web app or
                                    website.</p>
                                <a href="privacy.php">Link for the privacy policy</a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>