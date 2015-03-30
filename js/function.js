var appid = 428783303826348;
var my_access_token;
var user_id;
var user_name;

window.fbAsyncInit = function() 
{
    FB.init({
    
        appId  : appid,
        status : true, // check login status
        cookie : true, // enable cookies to allow the server to access the session
        xfbml  : true  // parse XFBML
    });

    FB.Event.subscribe('auth.statusChange', function(response) {
          if (response.authResponse) {
            // user has auth'd your app and is logged into Facebook
            FB.api('/me', function(me){
              if (me.name) {
                user_id = me.id;
                user_name = me.name;
              }
            })
          } else {
          }
    });

    FB.Canvas.setAutoGrow();

    var source = "https://apps.facebook.com/" + appid; 
    var params = {"debug": false};
    
}

/*   Share Btn   */
$('#share').live('click', function() { 
    var _settings = {
        method: 'feed',
        name: 'Share the STLTO Bottle Finder',
        link: 'http://www.facebook.com/pages/Bottle-Finder-Dev-Community/345264385562916?sk=app_428783303826348',
        picture: 'http://miocontest.kpd-i.com/LeginKnits/images/shareicon.png', 
        caption: '',
        description: 'Check out the STLTO Bottle Finder!',
        message: '',
        app_id: appid
    };
    //console.log(_settings);
    FB.ui(_settings, function(response) {
        if (response && response.post_id) { 
        }
    });
});




