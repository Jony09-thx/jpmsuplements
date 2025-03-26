// Load the SDK asynchronously<br>
(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    window.fbAsyncInit = function() {
        FB.init({
        appId : '625110443528323',
        cookie : true,
        xfbml : true, 
        version : 'v2.1'
        });
        
        FB.getLoginStatus().
        
        FB.getLoginStatus(function(response) {
        statusChangeCallback(response);
        });
        };

// This is called with the results from from FB.getLoginStatus().<br>
function statusChangeCallback(response) {
// The response object is returned with a status field that lets the app know the current login status of the person.
if (response.status === 'connected') {
    console.log('Welcome! Fetching your information.... ');
    FB.api('/me', function(response) {
    console.log('Successful login for: ' + response.name);
    document.getElementById('status').innerHTML =
    'Thanks for logging in, ' + response.name + '!';
    });
    } else if (response.status === 'not_authorized') {
    // The person is logged into Facebook, but not your app.
    document.getElementById('status').innerHTML = 'Please log ' + 'into this app.';
    } else {
    // The person is not logged into Facebook, so we're not sure if they are logged into this app or not.
    document.getElementById('status').innerHTML = 'Please log ' + 'into Facebook.';
    }
}
    // This function is called when someone finishes with the Login Button.
    function checkLoginState() {
FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
    });
}