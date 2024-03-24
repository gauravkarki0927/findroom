<?php

include('connect.php');
include('navbar.php');
session_start();
$id= $_SESSION['users'];
if(empty($_SESSION['users'])){
    header('Location:login.php');
}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Some other functionality</title>
  <link rel="stylesheet" href="help.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
    $(function () {
      $("#accordion").accordion();
    });
  </script>
</head>

<body>
  <div class="box">
    <div id="accordion">
      <h3>How to signup or register your account ?</h3>
      <div class="data">
        <p>
          If you are new users in our webite, you can simply create or register your account by following the steps below:
          <ul>
          <li>Select the 'Signup' option in the above navbar</li>
          <li>Registration form will appear</li>
          <li>Fill up the details correctly and click on 'Signup' to submit your data.</li>
        </ul>
        </p>
        <p>
          You might have to recover your account or forget password so please provide valid email address so that you will receive our mails in your email address.<br>
        </p>
        <p>
          Now your account is registered in the website. You can simply login now.
        </p>
      </div>
      <h3>Why can't I register my account ?</h3>
      <div class="data">
        <p>
          If you are not able to register your account then you might not have entered all the required fields in the form. Try filling all the details and click on 'Signup' button.
        </p>
       
      </div>
      <h3>How to edit/update your registered details ?</h3>
      <div class="data">
        <p>
          After you login to the server, you will be provided with multiple options in th navigation bar. Simply click on 'User' and 'Edit' to update the details and to update other details you can see multiple options in 'Setting'.
        </p>
      </div>
      <h3>How to delete your account ?</h3>
      <div class="data">
        <p>
          Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis.
          Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero
          ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis
          lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
        </p>
        <ul>
          <li>List item one</li>
          <li>List item two</li>
          <li>List item three</li>
        </ul>
      </div>
      <h3>How to create a post ?</h3>
      <div class="data">
        <p>
          You can simply click in 'Create post' button shown in the dashboard and fill up the details in the required fields and click on 'Post' to submit.
        </p>
        <p>
        <ul>
          <li>How many post is limited for a user ?<p>Any users can create as much post as they can. A single user has
              no restriction in creating a post in the website if they are registered members.</p><br>
          </li>
          <li>Can same post be created again ?<p>
          You can simply click in 'Create post' button shown in the dashboard and fill up the details in the required fields and click on 'Post' to submit.
        </p><br></li>
          <li>How long the post will remain in the platform ?<p>
          Your post will not be deleted from the website for any reason but will be less visible after certain period of time as time can't be waiting.
        </p><br></li>
          <li>Is all the post details visible to public ?<p>
          Yes, whatever you provide as content of the post is visible to all the users of this website.
        </p><br></li>
          <li>Can I add images in my post ?<p>
          Yes, you can add images in your post however you are not allowed to add multiple images in a single post.
        </p><br></li>
          <li>Can I provide any link in my post ?<p>
          No, you can't privide any links in your post bracuse of security concern and harmful attacks.
        </p></li>
        </ul>
        </p>
      </div>
      <h3>How to edit/update a post ?</h3>
      <div class="data">
        <p>
          Cras dictum. Pellentesque habitant morbi tristique senectus et netus
          et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
          faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
          mauris vel est.
        </p>
        <p>
          Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
          Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
          inceptos himenaeos.
        </p>
      </div>
      <h3>How to delete a post ?</h3>
      <div class="data">
        <p>
          Cras dictum. Pellentesque habitant morbi tristique senectus et netus
          et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
          faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
          mauris vel est.
        </p>
        <p>
          Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
          Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
          inceptos himenaeos.
        </p>
      </div>
      <h3>How to search for the required post ?</h3>
          <div class="data">
            <p>
              Cras dictum. Pellentesque habitant morbi tristique senectus et netus
              et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
              faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
              mauris vel est.
            </p>
            <p>
              Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
              Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
              inceptos himenaeos.
            </p>
          </div>
          <h3> to change your email address ?</h3>
          <div class="data">
            <p>
              Cras dictum. Pellentesque habitant morbi tristique senectus et netus
              et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
              faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
              mauris vel est.
            </p>
            <p>
              Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
              Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
              inceptos himenaeos.
            </p>
          </div>
          <h3>How to change your password ?</h3>
          <div class="data">
            <p>
              Cras dictum. Pellentesque habitant morbi tristique senectus et netus
              et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
              faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
              mauris vel est.
            </p>
            <p>
              Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
              Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
              inceptos himenaeos.
            </p>
          </div>
          <h3>How to recover your lost account ?</h3>
          <div class="data">
            <p>
              There is no such service provided to recover your lost account unless you know your email or password. You can simply change your password by clicking to the forget password in the login section if you remember your login email address you provided during the account register.
            </p>
          </div>
          <h3>Why is my page not reloading ?</h3>
          <div class="data">
            <p>
              The page reload is simply the fault of your internet connection so please check if your connection is successful or it will not work at all.
            </p>
          </div>
          <h3>Why is my post not created ?</h3>
          <div class="data">
            <p>
              The first reasons might be the user connection error or slow internet. Sometimes it leads to slow the process and the session expires so that your post might not be submitted. Server load and error might also result in such problems so try doing it again after some minute.<br>
            </p>
            <p>
              Next reason is that you didn't fill the form correctly whn you tried to create a new post. Please make sure you satisfy all the conditions in the create section.
            </p>
          </div>
          <h3>Why is my post not displayed ?</h3>
          <div class="data">
            <p>
              Post not displaying issue may be caused because your post needs to be verified by admin and checked each data and records before approving it to live website. So it might take a while to display your post in website.
            </p>
          </div>
          <h3>Why is the image in my post not displayed ?</h3>
          <div class="data">
            <p>
              There might be multiple reasons for not showing your image in the post. For example your image might not be recomended to use in this platform. Your image type is also considered to be fault so take a good look to these image types: .png, .jpg, .jpeg formate is acceptable.<br>
            </p>
            <p>
              And for other reason, the slow process of the server might result in such fault so you can refresh your page after you create any post in the dashboard.
            </p>
          </div>
          <h3>Can we share this website link ?</h3>
          <div class="data">
            <p>
              Yes, you are allowed to share our website link in any of the social sites. Just make sure you respect our terms and conditions.
            </p>
          </div>
          <h3>How to contact admin of the website ?</h3>
          <div class="data">
            <p>
              The admin contact information is not given in any webpage however you can find it in setting menu in the menu bar.<br><br> Follow the given steps to contact admin:<br>
              <ul>
          <li>Click on 'Setting' for the menu-bar</li>
          <li>Go to 'More'</li>
          <li>Click on 'Contact Us'</li>
        </ul>
            </p>
            <p>
              <br>Admin may not be able to respond in real time but you can send email to us at:<br>findroomnp@gmail.com
            </p>
          </div>
          <h3>Can we use the details of post from this website to other social media ?</h3>
          <div class="data">
            <p>
              It is strictly forbidden to copy the details of this website and post it in other platform because of the copy right and policies regarding the cyber ethics. So, No you are not allowed to do such activity that violets the rules and regulations of the website.<br>
            <p>
            <p>
              However, in case you want to use any of our content(url of particular post) for your own purpose (such as sharing on social media), please give us credit by linking back to our website.
            </p>
          </div>
    </div>
  </div>
</body>

</html>