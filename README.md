# Solver for brackets problem
For using run:

```
<?php
$bracketsString = '((()))';
$solver = new Brackets($bracketsString);
var_dump($solver->isCorrect());