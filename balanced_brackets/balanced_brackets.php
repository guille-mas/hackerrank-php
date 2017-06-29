<?php
/*
$handle = fopen ("php://stdin","r");
fscanf($handle,"%d",$t);
for($a0 = 0; $a0 < $t; $a0++){
  fscanf($handle,"%s",$expression);
  if(checkBrackets($expression)){
    print_r('SI');
  }else{
    print_r('NO');
  }
}
*/


if(checkBrackets('{[()]}')){
  print "YES\n";
}else{
  print "NO\n";
}

if(checkBrackets('{[(])}')){
  print "YES\n";
}else{
  print "NO\n";
}

if(checkBrackets('{{[[(())]]}}')){
  print "YES\n";
}else{
  print "NO\n";
}


/**
 * return true if the given character is a
 * closing bracket and false otherwise
 */
function isClosing(string $char): bool {
  return in_array($char,[')','}',']']);
}

/**
 * Given a valid closing bracket returns it's opening pair
 */
function getOppositeBracket(string $char) : string {
  $opposites = [
      ')' => '(',
      ']' => '[',
      '}' => '{'
  ];
  return $opposites[$char];
}

/**
 * Her is the core logic of the solution
 */
function areBracketsBalanced(string $word, SplStack $stack): bool {
  if (!strlen($word)) {
    return $stack->isEmpty();
  } elseif(isClosing($word[0])) {
    if($stack->isEmpty()) {
      return false;
    }elseif($stack->top() == getOppositeBracket($word[0])) {
      $stack->pop();
    }else{
      $stack->push($word[0]);
    }
  }else{
    $stack->push($word[0]);
  }
  return areBracketsBalanced(substr($word, 1), $stack);
};

/**
 * main function to be used inside the test
 */
function checkBrackets(string $word) : bool {
  $stack = new SplStack();
  return areBracketsBalanced($word, $stack);
}


