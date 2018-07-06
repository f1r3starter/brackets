# Solver for brackets problem

Library for solving the problem of the correct brackets closing

## Installation:

```
composer require f1r3starter/brackets
```

## Using:

For using run:

```
<?php

use brackets\Brackets;

$bracketsString = '((()))';
$solver = new Brackets($bracketsString);
var_dump($solver->isCorrect());
```

If you need to use square brackets:
```

$solver->setOpenBracket('[');
$solver->setCloseBracket(']');

```

If you need to change the list of the allowed characters (note that special characters should be escaped with backslash ('\\') symbol):

```

$solver->setAllowedSymbols('a', 'b', 'c', '1', '\%', '\$');

```