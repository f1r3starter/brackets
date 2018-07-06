# Solver for brackets problem
For using run:

```
<?php

use brackets\Brackets;

$bracketsString = '((()))';
$solver = new Brackets($bracketsString);
var_dump($solver->isCorrect());