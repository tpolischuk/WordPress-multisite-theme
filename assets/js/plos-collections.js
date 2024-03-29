// Truncate widget text
(function($) {
    $(".wpp-post-title").dotdotdot({
        //  configuration goes here
    });
    $(".rpwe-title").dotdotdot({
        //  configuration goes here
    });
})(jQuery);

// Truncate widget text
(function($) {
    $(".entry-title.blog-name").dotdotdot({
    	 //  configuration goes here
    })
})(jQuery);

// MultiLevelPush
new mlPushMenu( document.getElementById( 'mp-menu' ), document.getElementById( 'trigger' ), {
	type : 'cover'
} );

jQuery(document).ready(function() {
    function validateEmail($email) {
      var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
      return emailReg.test( $email );
    }

    //Cache the e-mail field
    $exactTargetEmailField = jQuery( "#exact-target-signup-form .email" );

    $exactTargetEmailField.focus(function() {
      jQuery( "#exact-target-names" ).slideDown();
    });

    jQuery("#exact-target-submit").on('click', function(e){

      var gdprConsent = jQuery("#gdpr-consent-wrapper input").is(":checked");

      var theEmail = $exactTargetEmailField.val();

      if (theEmail === "") {
        alert('E-mail address is required');
        e.preventDefault();
      } else if (!validateEmail(theEmail)) {
        alert('That is not a valid e-mail address');
        e.preventDefault();
      } else if (gdprConsent === false) {
        alert('Please read and agree to the terms of the PLOS Privacy Policy.');
        e.preventDefault();
      }
  });
});
