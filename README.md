## G1. Which column did you turn into a table, and why?

I turned the `prerequisite` column in my `subjects` table into a separate `prerequisites` table. This avoids repeating prerequisite names in every subject record and lets the subjects table reference each prerequisite using `prerequisite_id`.

## G2. What number did Screenshot 6 show, and why exactly that number?

Screenshot 6 showed 8 queries. The count included the subjects query, queries used to load each subject's prerequisite relationship, and an additional query from `Prerequisite::all()` used by the prerequisite filter in the Blade view.

## G3. Your belongsTo method is named in the singular. What would break if you made it plural?

My `Subject` model uses the singular `prerequisite()` method because each subject belongs to one prerequisite. If I renamed it to `prerequisites()` without updating the code that calls the relationship, Laravel would not find the expected `prerequisite` relationship, and calls such as `with('prerequisite')` would fail.