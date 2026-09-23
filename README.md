# Lab Activity 6 — Reasoning

## Q1 — Why no new route was needed for the second filter

The router only considers the URL path when determining which page to display, so no new route was required. 
The query parameters are used to handle the filter independently. Therefore, a new route is not created by altering the filter.
## Q2 — What the URL would have to look like as route parameters

The URL might be /students/year/4/course/all if both filters were route parameters. 
The URL path would include both the year and the course. Because both parameters must be included in the URL structure, this is less flexible.

## Q3 — Which pattern needed a change, and why the other didn't

Because the filter pattern had to match the filtered URL, the modification was necessary. 
Since its route pattern already accurately matched the detail URL, the detail page didn't require anything.

## Q4 — Why the old filter method was deleted but the empty stubs stay

Since the new filtering strategy no longer required the old filter method, it was eliminated. 
Even though no URL directly accesses the empty store and update methods, they are retained because the application structure requires them.