# Lab Activity 6 — Reasoning

## Q1 — Why no new route was needed for the second filter

The router only looks at the path portion of the URL — everything before the `?`. A query
string like `?code=ITP1333&units=3` never reaches the router's matching logic at all; it's
stripped off before the URL is compared against my registered routes. Because of that, every
one of the four test URLs (`/subjects`, `/subjects?course=...`, `/subjects?year=...`, and both
together) has the exact same path, `/subjects`, so they all match my single `subjects.index`
route. The filtering happens *after* routing is done, inside the `index()` method itself, when
I read the values off the request with `$request->query(...)`.

## Q2 — What the URL would have to look like as route parameters

If both filters were route parameters instead, "units 4 only, no code filter" would need a URL
like `/subjects/filter/units/4` or `/subjects/filter//4` with an empty segment standing in for
the missing code — because a route parameter's position in the path *is* its meaning, so
skipping the first value while still supplying the second means leaving an empty slot, or
defining a whole separate route just for "units only." That's clumsy and doesn't scale: every
new combination of filters being present or absent needs its own route pattern. The
query-string design avoids this entirely, since query parameters are just named key-value pairs
with no required order or position — omitting one simply omits that key, and the route never
has to know or care which filters are currently in use.

## Q3 — Which pattern needed a change, and why the other didn't

`request()->is('subjects*')` is the one that needed the wildcard. Without it, `is('subjects')`
only matches the exact path `/subjects`, so a detail page like `/subjects/3` — a longer path —
wouldn't match and the nav link would lose its marked state. Adding the `*` makes it match any
path that starts with "subjects", covering both the list and every detail page. The filter case
needed nothing because `request()->is()` only ever inspects the path; the query string
(`?units=3`) is a separate part of the URL that `is()` was never looking at, so a filtered list
page still has the exact same path as an unfiltered one and stays matched automatically.

## Q4 — Why the old filter method was deleted but the empty stubs stay

The empty `store()` and `update()` methods represent work I haven't done yet — they're stubs
for features I'll build in later weeks, and keeping them in the file is an honest record of
what's still outstanding. The old `filter()` method was different: it was finished code that I
have now replaced with a better approach (the query-string filtering in `index()`, plus a
redirect for the old bookmarked URL). Nothing will ever call it again, so leaving it in wouldn't
be "recording what's left to build" — it would just be dead code sitting alongside its own
replacement, which is the exact problem the lesson was pointing at.