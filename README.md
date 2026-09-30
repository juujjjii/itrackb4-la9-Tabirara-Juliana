Activity 7

# Q1.Your form sends data with POST rather than GET. Explain what would go wrong if it used GET instead. Your answer should say something about what a browser does when a page is refreshed.

 With GET, the form data would go into the URL as a query string. Refreshing a page just re-requests the current URL, so every refresh would resend the same "add subject" request and create a duplicate — with no warning, since GET is treated as safe to repeat.

# Q2. When validation fails, your controller does not run the code that saves the record — and you did not write an if statement to stop it. Explain what actually stops it, and where the visitor ends up.

$request->validate([...]) throws an exception the instant a rule fails, and Laravel's handler catches it automatically — that's what stops execution, not an if I wrote. It then redirects back to the form with the errors and old input flashed into the session.

# Q3.Your success message is displayed from the layout, which renders on every page. Explain why it does not appear on every page.

 The layout's @if (session('success')) check does run on every page — but flashed session data only survives one request after it's set. So the check is always there, it just finds nothing after that one request, which is why the message shows once and disappears on its own.