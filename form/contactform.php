<?PHP
/*
    Copyright: www.gabesmithtrombone.com 2017
    Created and powered by: CS4 Development
    Update: 6/20/2017
    Contact Page
*/
require_once("./include/fgcontactform.php");
require_once("./include/captcha-creator.php");

$formproc = new FGContactForm();
$captcha = new FGCaptchaCreator('scaptcha');

$formproc->EnableCaptcha($captcha);

//1. Add your email address here.
//You can add more than one receipients.
$formproc->AddRecipient('gabesmithtrombone@gmail.com'); //<<---Put your email address here


//2. For better security. Get a random tring from this link: http://tinyurl.com/randstr
// and put it here
$formproc->SetFormRandomKey('n91LqHNvMrpoXte');


if(isset($_POST['submitted']))
{
   if($formproc->ProcessForm())
   {
        $formproc->RedirectToURL("thank-you.php");
   }
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<head>
      <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
      <title>Contact Me</title>
      <link rel="STYLESHEET" type="text/css" href="contact.css" />
      <link rel="stylesheet" href="css/contact.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation.min.css">
      <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="icon" type="image/jpg" href="../images/gs_icon.jpg">
      <link rel="apple-touch-icon" href="../images/gs_icon.jpg"/>
      <script type='text/javascript' src='scripts/gen_validatorv31.js'></script>
      <script type='text/javascript' src='scripts/fg_captcha_validator.js'></script>
</head>
  <body>

      <div class="header">    
        <header>
          <a href="../index.html">Gabe Smith</a>
        </header>
      </div>
      
      <!-- Start Main Nav -->
        <div>
          <nav class="navbar">
            <ul>
              <li><a href="../index.html">Home</a></li>
              <li><a href="../about/about.html">About</a></li>
              <li><a href="../media/media.html">Media</a></li>  
              <li><a href="../lessons/lessons.html">Lessons</a></li>
              <li><a href="contactform.php">Contact</a></li>
            </ul>
          <nav>
        </div>
      <!-- End Main Nav -->

      <!-- Start Mobile Nav -->
        <div class="mobilecontainer">
          <div id="offcanvas-full-screen" class="offcanvas-full-screen" data-off-canvas data-transition="overlap">
            <div class="offcanvas-full-screen-inner">
              <button class="offcanvas-full-screen-close" aria-label="Close menu" type="button" data-close>
                <span aria-hidden="true">&times;</span>
              </button>

              <ul class="offcanvas-full-screen-menu">
                <li><a href="../index.html">Home</a></li>
                <li><a href="../about/about.html">About</a></li>
                <li><a href="../media/media.html">Media</a></li>
                <li><a href="../lessons/lessons.html">Lessons</a></li>
                <li><a href="contactform.php">Contact</a></li>
              </ul>
            </div>
          </div>

          <div class="off-canvas-content" data-off-canvas-content>
            <div class="top-bar">
              <div class="top-bar-left">
                <button class="menu-icon dark" type="button" data-toggle="offcanvas-full-screen"></button>
              </div>
            </div>
          </div>
        </div>
      <!-- End Mobile Nav -->

      <!-- Start Icons -->
        <div class="icons">
          <a href="https://www.linkedin.com/in/gabriel-smith-906bb0ab/"><img src="images/linkedin-logo.png" height="50" width="50"></a>
          <a href="https://www.facebook.com/profile.php?id=100009486104288"><img src="images/facebook-logo.png" height="50" width="50"></a>
        </div>
      <!-- End Icons -->
    
      <!-- Start Flip Card -->
        <div class="flip-card card" ontouchstart="this.classList.toggle('hover');">
          <div class="flip-card-inner">
            <div class="flip-card-inner-front">
              <span>Want lessons?</span>
            </div>
            <div class="flip-card-inner-back">
              <h3 class="flip-card-inner-back-title"></h3>
              <p class="flip-card-inner-back-text">Fill out the information below so we can get started!</p>
              <a href="#contactus" class="button success">Contact</a>
            </div>
          </div>
        </div>
      <!-- End Flip Card -->

      <!-- Start Map -->
        <div class="map-container">
          <div class="map-word">
            <p>Approximate Traveling Distance</p>
          </div>
          <div class="map">
            <img src="images/staticmap.png" border="0" height="600" width="600"/>
          </div>
        </div>  
      <!-- End Map -->
      
      <!-- Form Code Start -->
        <form class="contactus" id='contactus' action='<?php echo $formproc->GetSelfScript(); ?>' method='post' accept-charset='UTF-8'>
        <fieldset >
        <legend>Contact Me</legend>

        <input type='hidden' name='submitted' id='submitted' value='1'/>
        <input type='hidden' name='<?php echo $formproc->GetFormIDInputName(); ?>' value='<?php echo $formproc->GetFormIDInputValue(); ?>'/>
        <input type='text'  class='spmhidip' name='<?php echo $formproc->GetSpamTrapInputName(); ?>' />

        <div class='short_explanation'>* required fields</div>

        <div><span class='error'><?php echo $formproc->GetErrorMessage(); ?></span></div>
        <div class='container'>
            <label for='name' >Your Full Name*: </label><br/>
            <input type='text' name='name' id='name' value='<?php echo $formproc->SafeDisplay('name') ?>' maxlength="50" /><br/>
            <span id='contactus_name_errorloc' class='error'></span>
        </div>
        <div class='container'>
            <label for='email' >Email Address*:</label><br/>
            <input type='text' name='email' id='email' value='<?php echo $formproc->SafeDisplay('email') ?>' maxlength="50" /><br/>
            <span id='contactus_email_errorloc' class='error'></span>
        </div>
        <div class='container'>
            <label for='message' >Message:</label><br/>
            <span id='contactus_message_errorloc' class='error'></span>
            <textarea rows="10" cols="50" name='message' id='message'><?php echo $formproc->SafeDisplay('message') ?></textarea>
        </div>
        <div class='container'>
            <div><img alt='Captcha image' src='show-captcha.php?rand=1' id='scaptcha_img' /></div>
            <label for='scaptcha' >Enter the code above here:</label>
            <input type='text' name='scaptcha' id='scaptcha' maxlength="10" /><br/>
            <span id='contactus_scaptcha_errorloc' class='error'></span>
            <div class='short_explanation'>Can't read the image?
            <a href='javascript: refresh_captcha_img();'>Click here to refresh</a>.</div>
        </div>


        <div class='container'>
            <input id="submit" type='submit' name='Submit' value='Submit' />
        </div>

        </fieldset>
        </form>
      <!-- Form Code Ends -->

      <!-- client-side Form Validations:
      Uses the excellent form validation script from JavaScript-coder.com-->
      <script type='text/javascript'>
      // <![CDATA[

          var frmvalidator  = new Validator("contactus");
          frmvalidator.EnableOnPageErrorDisplay();
          frmvalidator.EnableMsgsTogether();
          frmvalidator.addValidation("name","req","Please provide your name");

          frmvalidator.addValidation("email","req","Please provide your email address");

          frmvalidator.addValidation("email","email","Please provide a valid email address");

          frmvalidator.addValidation("message","maxlen=2048","The message is too long!(more than 2KB!)");


          frmvalidator.addValidation("scaptcha","req","Please enter the code in the image above");

          document.forms['contactus'].scaptcha.validator
            = new FG_CaptchaValidator(document.forms['contactus'].scaptcha,
                          document.images['scaptcha_img']);

          function SCaptcha_Validate()
          {
              return document.forms['contactus'].scaptcha.validator.validate();
          }

          frmvalidator.setAddnlValidationFunction("SCaptcha_Validate");

          function refresh_captcha_img()
          {
              var img = document.images['scaptcha_img'];
              img.src = img.src.substring(0,img.src.lastIndexOf("?")) + "?rand="+Math.random()*1000;
          }

      // ]]>
      </script>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>   
       <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.min.js"></script>
       <script type="text/javascript">$(document).foundation();</script>

  </body>

  <footer>&copy; 2017 Gabe Smith. Site powered by <a href="http://www.cs4development.com">CS4 Development</a></footer>
  
</html>