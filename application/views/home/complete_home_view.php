<html>
  <head>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <meta name="google-signin-client_id" content="1067483480445-gengh3tq4anad9odhqs0fralk85veclh.apps.googleusercontent.com">
  </head>
  <body>
    <div class="g-signin2" data-onsuccess="onSignIn"></div>
    <button id="google">Click</button>


    
    
    
    <!-- jQuery 3 -->
    <script src="<?php echo base_url();?>js/jquery.min.js"></script>  

    

    <script>
      $('#google').on('click', function()
      {
        function onSignIn(googleUser) {

          var profile = googleUser.getBasicProfile();
          var email = profile.getEmail();

          $.ajax({
              type:'POST',
              url:'http://localhost/login-ci/index.php/login/get_user',
              success: function(data)
              {
                console.log(data.length);
                var key = false;
                for(i=0; i<data.length; i++)
                {
                  if(data[i].email == email)
                  {
                    key = true;
                  }
                }
                if(key==true)
                {
                  console.log('GOOD');
                }
                else
                {
                  console.log('BAD');
                }
              },
              error: function(data)
              {
                console.log('wrong!');
              }
            });

          console.log('sign');
          console.log(profile);
        
        }
      });

      function onSignIn(googleUser) {

        var profile = googleUser.getBasicProfile();
        var email = profile.getEmail();

        $.ajax({
            type:'POST',
            url:'http://localhost/tms_ci/index.php/login/get_user',
            success: function(data)
            {
              console.log(data.length);
              var key = false;
              for(i=0; i<data.length; i++)
              {
                if(data[i].email == email)
                {
                  key = true;
                }
              }
              if(key==true)
              {
                console.log('GOOD');
              }
              else
              {
                console.log('BAD');
              }
            },
            error: function(data)
            {
              console.log('wrong!');
            }
          });

        console.log('sign');
        console.log(profile);
        
      }

      console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
      console.log('Name: ' + profile.getName());
      console.log('Given Name: ' + profile.getGivenName());
      console.log('Family Name: ' + profile.getFamilyName());
      console.log('Image URL: ' + profile.getImageUrl());
      console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.


    </script>

    <a href="#" onclick="signOut();">Sign out</a>

    <script>
      function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
          console.log('User signed out.');
        });
      }
    </script>

  </body>
</html>