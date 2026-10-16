
#Question
F1- Which column did you make nullable, and why that one and not another?
    I made prerequisite the nullable column. Some subjects genuinely have no prerequisite, so an empty value is a normal answer there, while code, title, units and is_active must always have a value and stay required.

F2- Which step failed first for you, and what did the error say?
    The first thing to fail was my seeder, which I ran before adding $fillable to the Subject model. It threw a MassAssignmentException saying to add [code] to the fillable property, because Eloquent refuses to fill any column that isn't listed. Adding the $fillable list fixed it.

F3- You changed no Blade file in Part D, yet your pages still work. Why not?
    My Blade files only read values by key from the variables the controller passes in, such as $subject['title']. Eloquent models can be read the same way as arrays, and I kept the same variable names, so the views couldn't tell that the data now comes from a table instead of a JSON file.
