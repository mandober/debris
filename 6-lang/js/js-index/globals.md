# List of JavaScript Objects and Functions

This reference contains a list of objects, functions and properties


The Global Object
Value Properties
NaN
Infinity
undefined
Function Properties
eval(x)
parseInt(string, radix)
parseFloat(string)
isNaN(number)
isFinite(number)
decodeURI(encodedURI)
decodeURIComponent(encodedURIComponent)
encodeURI(uri)
encodeURIComponent(uriComponent)
escape(string)
unescape(string)
Constructor Properties
Object
Function
Array
ArrayBuffer
String
Boolean
Number
DataView
Date
Promise
RegExp
Map
WeakMap
Set
WeakSet
SharedArrayBuffer
Symbol
Error
EvalError
RangeError
ReferenceError
SyntaxError
TypeError
URIError
Other Properties
Atomics
Math
JSON
Reflect
Proxy
The Object Object
Object Constructor
Function Properties
getPrototypeOf(O)
setPrototypeOf(O, P)
getOwnPropertyDescriptor(O, P)
getOwnPropertyDescriptors(O)
getOwnPropertyNames(O)
getOwnPropertySymbols(O)
assign(O [, Properties])
create(O [, Properties])
defineProperty(O, P, Attributes)
defineProperties(O, Properties)
entries(O)
is(V1, V2)
keys(O)
values(O)
seal(O)
isSealed(O)
freeze(O)
isFrozen(O)
preventExtensions(O)
isExtensible(O)
Object Prototype
Function Properties
toString()
toLocaleString()
valueOf()
hasOwnProperty(V)
isPrototypeOf(V)
propertyIsEnumerable(V)
__defineGetter__(P, F)
__defineSetter__(P, F)
Function Objects
Function Prototype
Function Properties
toString()
apply(thisArg, argArray)
call(thisArg [, arg1 [, arg2, ...]])
bind((thisArg [, arg1 [, arg2, …]])
[Symbol.hasInstance](O)
Array Objects
Array Prototype Object
Function Properties
toString()
toLocaleString()
concat([item1 [, item2 [, ...]]])
copyWithin([item1 [, item2 [, ...]]])
entries()
fill(item [, index1 [, index2]])
join(separator)
find(callbackfn [, thisArg]) // ECMAScript 6: Added in Qt 5.9
findIndex(callbackfn [, thisArg]) // ECMAScript 6: Added in Qt 5.9
includes(item)
keys()
pop()
push([item1 [, item2 [, ...]]])
reverse()
shift()
slice(start, end)
sort(comparefn)
splice(start, deleteCount[, item1 [, item2 [, ...]]])
unshift([item1 [, item2 [, ...]]])
indexOf(searchElement [, fromIndex])
lastIndexOf(searchElement [, fromIndex])
every(callbackfn [, thisArg])
some(callbackfn [, thisArg])
forEach(callbackfn [, thisArg])
map(callbackfn [, thisArg])
filter(callbackfn [, thisArg])
reduce(callbackfn [, initialValue])
reduceRight(callbackfn [, initialValue])
values()
[Symbol.iterator]()
String Objects
String Prototype Object
Function Properties
toString()
valueOf()
charAt(pos)
charCodeAt(pos)
codePointAt(pos)
concat([string1 [, string2 [, ...]]])
endsWith(searchString [, endPosition ]) // ECMAScript 6: Added in Qt 5.8
includes(searchString [, position ]) // ECMAScript 6: Added in 5.8
indexOf(searchString ,position)
lastIndexOf(searchString, position)
localeCompare(that)
match(regexp)
normalize()
padEnd(length [, string])
padStart(length [, string])
repeat(count) // ECMAScript 6: Added in Qt 5.9
replace(searchValue, replaceValue)
search(regexp)
slice(start, end)
split(separator, limit)
startsWith(searchString [, position ]) // ECMAScript 6: Added in Qt 5.8
substr(start, length)
substring(start, end)
toLowerCase()
toLocaleLowerCase()
toUpperCase()
toLocaleUpperCase()
trim()
[Symbol.iterator]()
Additionally, the QML engine adds the following functions to the String prototype:

arg()
Boolean Objects
Boolean Prototype Object
Function Properties
toString()
valueOf()
Number Objects
Number Prototype Object
Function Properties
toString(radix)
toLocaleString()
valueOf()
toFixed(fractionDigits)
toExponential(fractionDigits)
toPrecision(precision)
Additionally, the QML engine adds the following functions to the Number prototype:

fromLocaleString(locale, number)
toLocaleCurrencyString(locale, symbol)
toLocaleString(locale, format, precision)
The Number Object
Value Properties
NaN
NEGATIVE_INFINITY
POSITIVE_INFINITY
MAX_VALUE
MIN_VALUE
EPSILON // ECMAScript 6: Added in Qt 5.8
MAX_SAFE_INTEGER
MIN_SAFE_INTEGER
Function Properties
isFinite(x) // ECMAScript 6: Added in Qt 5.8
isInteger(x)
isSafeInteger(x)
isNaN(x) // ECMAScript 6: Added in Qt 5.8
The Math Object
Value Properties
E
LN10
LN2
LOG2E
LOG10E
PI
SQRT1_2
SQRT2
Function Properties
abs(x)
acos(x)
acosh(x)
asin(x)
asinh(x)
atan(x)
atanh(x)
atan2(y, x)
cbrt(x)
ceil(x)
clz32(x)
cos(x)
cosh(x)
exp(x)
expm1(x)
floor(x)
fround(x)
hypot(x, y)
imul(x, y)
log(x)
log10(x)
log1p(x)
log2(x)
max([value1 [, value2 [, ...]]])
min([value1 [, value2 [, ...]]])
pow(x, y)
random()
round(x)
sign(x) // ECMAScript 6: Added in Qt 5.8
sin(x)
sinh(x)
sqrt(x)
tan(x)
tanh(x)
trunc(x)
Date Objects
Date Prototype Object
Function Properties
toString()
toDateString()
toTimeString()
toLocaleString()
toLocaleDateString()
toLocaleTimeString()
valueOf()
getTime()
getFullYear()
getUTCFullYear()
getMonth()
getUTCMonth()
getDate()
getUTCDate()
getDay()
getUTCDay()
getHours()
getUTCHours()
getMinutes()
getUTCMinutes()
getSeconds()
getUTCSeconds()
getMilliseconds()
getUTCMilliseconds()
getTimeZoneOffset()
setTime(time)
setMilliseconds(ms)
setUTCMilliseconds(ms)
setSeconds(sec [, ms])
setUTCSeconds(sec [, ms])
setMinutes(min [, sec [, ms]])
setUTCMinutes(min [, sec [, ms]])
setHours(hour [, min [, sec [, ms]]])
setUTCHours(hour [, min [, sec [, ms]]])
setDate(date)
setUTCDate(date)
setMonth(month [, date])
setUTCMonth(month [, date])
setYear(year)
setFullYear(year [, month [, date]])
setUTCFullYear(year [, month [, date]])
toUTCString()
toGMTString()
toISOString()
toJSON()
[Symbol.toPrimitive](hint)
Additionally, the QML engine adds the following functions to the Date prototype:

timeZoneUpdated()
toLocaleDateString(locale, format)
toLocaleString(locale, format)
toLocaleTimeString(locale, format)
RegExp Objects
RegExp Prototype Object
Function Properties
exec(string)
test(string)
toString()
Error Objects
Error Prototype Object
Value Properties
name
message
Function Properties
toString()
The JSON Object
Function Properties
parse(text [, reviver])
stringify(value [, replacer [, space]])
