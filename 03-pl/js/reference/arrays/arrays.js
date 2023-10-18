const arr = [[1], [3], [5]];

console.log(arr.map(([x]) => [x, x + 1]));
// [[1, 2], [3, 4], [5, 6]]

console.log(arr.flatMap(([x]) => [x, x + 1]));
// [1, 2, 3, 4, 5, 6]

const arr2 = ['Lorem amet,', 'adipiscing elit.'];

console.log(
    arr2.flatMap((x) => x.split(/[\W+]/))

)

console.log(
    arr2.flatMap((x) => x.split(/[\W+]/))
        .flatMap((x) => x || [])
);

// ============================================================================
ds = [[1], [3], [5]];

// using a builtin method Array#concat off of Array object
ds.reduceRight((a,b) => Array.prototype.concat.call(a,b), [])
