<?php declare(strict_types=1);

// Lambda Calculus
// Combinators as PHP arrow functions (PHP 7.4+)
// Only K and S are essential, others can be derived from them


/**
 * Idiotbird AKA identity
 * λα.α
 * f(x) -> x
 * id :: a -> a
 */
$I = fn($a) => a;

/**
 * Kester AKA true, fst
 * λαβ.α
 * f(x)(y) -> x
 * kester :: a -> b -> a
 */
$K = fn($x) => fn($y) => x;

/**
 * Starling
 * λϕγα.ϕα(γα)
 * f(x), g(x), x -> f(x)(g(x))
 */
$S = fn($f) => fn($g) => fn($x) => $f($x)($g($x));

/**
 * Bluebird AKA flip
 * λϕαβ.ϕβα
 *
 * f(x)(y) -> f(y)(x)
 * flip :: (a -> b) -> (b -> a)
 */
$B = fn($f) => fn($x) => fn($y) => $f($y)($x);





$B1  = fn($a) => fn( $b) => fn($c) => fn($d) => $a($b( c )(d) )            ;
$B2  = fn($a) => fn( $b) => fn($c) => fn($d) => fn($e) => $a($b( c )(d)(e));
$B3  = fn($a) => fn( $b) => fn($c) => fn($d) => $a($b($c(d)) )             ;

$C   = fn($a) => fn( $b) => fn($c) => $a(c)(b)                             ;
$C_  = fn($a) => fn( $b) => fn($c) => fn($d) => $a(b)(d)(c)                ;
$C__ = fn($a) => fn( $b) => fn($c) => fn($d) => fn($e) => $a(b)(c)(e)(d)   ;

$D   = fn($a) => fn( $b) => fn($c) => fn($d) => $a(b)($c(d))               ;
$D1  = fn($a) => fn( $b) => fn($c) => fn($d) => fn($e) => $a(b)(c)($d(e))  ;
$D2  = fn($a) => fn( $b) => fn($c) => fn($d) => fn($e) => $a($b(c))($d(e)) ;

$E   = fn($a) => fn( $b) => fn($c) => fn($d) => fn($e) => $a(b)($c(d)(e))  ;

$F   = fn($a) => fn( $b) => fn($c) => $c(b)( a)                            ;
$F_  = fn($a) => fn( $b) => fn($c) => fn($d) => $a(d)(c)(b)                ;
$F__ = fn($a) => fn( $b) => fn($c) => fn($d) => fn($e) => $a(b)(e)(d)(c)   ;

$G   = fn($a) => fn( $b) => fn($c) => fn($d) => $a(d)($b(c))               ;
$H   = fn($a) => fn( $b) => fn($c) => $a(b)(c)(b)                          ;
$I_  = fn($a) => fn( $b) => $a(b)                                          ;
$I__ = fn($a) => fn( $b) => fn($c) => $a(b)(c)                             ;
$J   = fn($a) => fn( $b) => fn($c) => fn($d) => $a(b)($a(d)(c))            ;
$L   = fn($a) => fn( $b) => $a($b(b))                                      ;
$M   = fn($f) => f(f)                                                      ;
$M2  = fn($a) => fn( $b) => $a(b)($a(b))                                   ;
$O   = fn($a) => fn( $b) => $b( $a(b))                                     ;
$Q   = fn($a) => fn( $b) => fn($c) => $b( $a(c))                           ;
$Q1  = fn($a) => fn( $b) => fn($c) => $a($c(b))                            ;
$Q2  = fn($a) => fn( $b) => fn($c) => $b($c( a))                           ;
$Q3  = fn($a) => fn( $b) => fn($c) => $c( $a(b))                           ;
$Q4  = fn($a) => fn( $b) => fn($c) => $c($b( a))                           ;
$R   = fn($a) => fn( $b) => fn($c) => $b(c)( a)                            ;
$R_  = fn($a) => fn( $b) => fn($c) => fn($d) => $a(c)(d)(b)                ;
$R__ = fn($a) => fn( $b) => fn($c) => fn($d) => fn($e) => $a(b)(d)(e)(c)   ;
$T   = fn($a) => fn( $b) => $b( a)                                         ;
$U   = fn($a) => fn( $b) => $b( $a(a)(b))                                  ;
$V   = fn($a) => fn( $b) => fn($c) => $c( a)(b)                            ;
$V_  = fn($a) => fn( $b) => fn($c) => fn($d) => $a(c)(b)(d)                ;
$V__ = fn($a) => fn( $b) => fn($c) => fn($d) => fn($e) => $a(b)(e)(c)(d)   ;
$W   = fn($a) => fn( $b) => $a(b)(b)                                       ;
$W_  = fn($a) => fn( $b) => fn($c) => $a(b)(c)(c)                          ;
$W__ = fn($a) => fn( $b) => fn($c) => fn($d) => $a(b)(c)(d)(d)             ;
$W1  = fn($a) => fn( $b) => $b( a)(a)                                      ;
$Y   = fn($a) => (fn($b) => $b(b))(fn($b) => $a(fn($c) => $b(b)(c)))       ;


$zero  = fn($_) => fn($x) =>                     x;
$one   = fn($f) => fn($x) => f(                  x);
$two   = fn($f) => fn($x) => f(f(                x));
$three = fn($f) => fn($x) => f(f(f(              x)));
$four  = fn($f) => fn($x) => f(f(f(f(            x))));
$five  = fn($f) => fn($x) => f(f(f(f(f(          x)))));
$six   = fn($f) => fn($x) => f(f(f(f(f(f(        x))))));
$seven = fn($f) => fn($x) => f(f(f(f(f(f(f(      x)))))));
$eight = fn($f) => fn($x) => f(f(f(f(f(f(f(f(    x))))))));
$nine  = fn($f) => fn($x) => f(f(f(f(f(f(f(f(f(  x)))))))));
$ten   = fn($f) => fn($x) => f(f(f(f(f(f(f(f(f(f(x))))))))));
