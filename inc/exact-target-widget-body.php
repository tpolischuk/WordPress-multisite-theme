<section id="exact-target-signup" class="widget">
  <div class="widget-wrap">
    <h4>Sign up for PLOS Updates</h4>
    <?php
      $blog_details = get_blog_details(get_current_blog_id());
      $blog_name = str_replace('/', '', $blog_details->path);
     ?>
    <form action="http://cl.s7.exct.net/subscribe.aspx?lid=5488&Source=WebCollect" name="subscribeForm" method="post" id="exact-target-signup-form">
      <input type="text" class="required email" id="signup_email" name="Email Address" placeholder="Email Address (required)">
      <div id="exact-target-names">
        <input type="text" class="first_name" id="signup_first_name" name="First Name" placeholder="First Name">
        <input type="text" class="last_name" id="signup_last_name" name="Last Name" placeholder="Last Name">
      </div>
      <div id="gdpr-consent-wrapper">
          <input type="checkbox" name="gdpr-consent" value="consented">
          <p>I have read and agree to the terms of the <a href="https://www.plos.org/privacy-policy" target="_blank">PLOS Privacy Policy</a> and hereby consent to send my personal information to PLOS.</p>
      </div>
      <input type="hidden" name="MID" value="7207856" />
      <input type="hidden" name="thx" value="<?php echo network_site_url(); ?>signup-successful/" />
      <input type="hidden" name="err" value="<?php echo network_site_url(); ?>signup-error/" />
      <input id="exact-target-source" type="hidden" value="blogs_<?php echo $blog_name; ?>" name="Marketing Source Code">
      <input id="exact-target-submit" type="submit" value="Sign Up">
    </form>
  </div>
</section>
