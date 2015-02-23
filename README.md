#Selfie Window
A second screen experience that pulls the last 50 photos from Instagram tagged with #selfie and displays them on the desktop. You can change the photo that's displayed by clicking a button on the mobile.

##Instructions
On the desktop, navigate to http://www.zachtownsend.co.uk/archive/personal/selfie-window/. Then on mobile, go to http://goo.gl/nfY8wd. From there you can press the button to change the desktop photo

##Files to look at
The app was built using SimpleMVC framework, but the files that I coded myself are as follows:
```
index.php <-- Where I created the application routing
app/views/welcome/welcome.php <-- Landing page
app/views/welcome/button.php <-- "Button" page
app/controllers/instagram.php <-- Gets and modifies the data from the Instragram API
app/controllers/welcome.php <-- Controls the page routing
app/templates/default/ <-- This folder contains the CSS, JS and image content, as well as the header and footer of the site
```
