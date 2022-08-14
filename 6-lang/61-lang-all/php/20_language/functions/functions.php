<?php declare(strict_types=1);

/*
 * Named Functions
**/

function labelled_func() {
    echo 'NAMED FUNCTION ME', PHP_EOL;
}

// labelled_func;
@labelled_func;

//var_dump(labelled_func);
var_dump(@labelled_func);
var_dump(@labelled_func());


exit;


// calling a function
// At this point it's statically unknown if the call will succeed or not,
// that is, if the function even exists (an IDE may not display any info)
// because it may be defined later, which will be resolved only at RT.

// can call a named function before its definition is seen
uthere();

// named function definition
function uthere(){
    echo 'I\'m here!', PHP_EOL;
}

try {
    // Error; call to non-existent function
    sferf();
} catch (Exception $e) {
    $e->message();
}




$flag = TRUE;

if ($flag) { function cf1() {} } // cf1 now exists

if ($flag) { cf1(); } // can call cf1 now

// -----------------------------------------
function ucf2() { function cf2() {} }

cf2();  // Error; call to non-existent function
ucf2(); // now cf2 exists
cf2();  // now we can call it







// if renamed, this function will fail
function factorial($i=1) {
    return $i==1 ? 1 : $i * factorial($i-1); // the call here fails!
}

// use this to get the fn name dinamically
function whatever($i=1) {
    return($i==1 ? 1 : $i * call_user_func(__FUNCTION__, $i-1));
}
