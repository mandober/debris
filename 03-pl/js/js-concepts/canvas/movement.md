# JS :: Canvas :: Movement



JS canvas has the coordinate system with origin at the top left corner.   
Moving an object on the canvas…
- left:  means decreasing its x-position
- right: means increasing its x-position
- up:    means decreasing its y-position
- down:  means increasing its y-position


*Velocity* is change in position o'er time.    
*Acceleration* is change in velocity over time.


The animated ball is controlled with the arrow keys and its movement is constrained by 3 vectors:
- position vector
- velocity vector
- acceleration vector

Acceleration affects velocity, velocity affects position, and the ball moves accordingly.

We can illustrate the magnitudes and directions of velocity (green) and acceleration (blue) vectors as the two lines protruding from the ball's center.

Acceleration vector's line (green) falls over the place, but velocity vector (blue) line seems constrained to only fall exactly on the 8 compass points:

```
       N
  NW   |   NE
     \ | /
W -----. ----- E
     / | \
  SW   |   SE
       S
```

We move the indication out from the ball and place it in a corner, on a unit circle. Now, we see that the *blue line*, which represents the *velocity vector*, has a *magnitude* that goes from 0 to 1, and should fall exactly on the cicumference of the indication unit circle. However, when the movement of the ball is diagonal, the magnitute's max value is larger than 1 and reaches outside the indication circle. Tha tis, when the velocity vector is diagonal then its magnitude is larger than 1 unit because the horizontal and vertical vector components add up to form its magnitude - its maximum magnitude is equal to the square root 2, so it falls beyond the cicumference of the unit circle.

To fix the velocity vector without changing its direction, we first need to normalize it (make the magnitude 1 unit), and then we can scale it as appropriate.

## Vector normalization

If we have a vector, `Vec(3,4)`, then it is drawn as an arrow that (implicitly) starts at the origin (arrow tail) with arrow's head at point (3,4).

We want to draw a right triangle, but before we do that we introduce some shorthands for the involved coordinate points and triangle's sides.

Coordinate points:
- 𝑨 = (0, 0)
- 𝑩 = (3, 0) 90°
- 𝑩′ = (0, 4)  90° (alternatively)
- 𝑪 = (3, 4)

Sides of the right triangle:
- AB = i = 3
- BC = j = 4
- AC = m = 5


```
              y
              ↑
              │
              │B        i
             ⁴┤┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈┈ C
              │                 ↗
              │              ⟋
            j │            ⟋
              │         ⟋ m
 unit     . ∙ ┤ ∙ .   ⟋
circle .      │     ⟋.
      ∙       │ ⟋    ∙
──────┬───────┼───────┬───────────────┬────-> x
    ⁻¹.       │ ⟍    .¹               ³
       .      ↓    ⟍ .
          ∙   ┤   ∙   ↘
                       unit vector
```

So, we have our vector, `v̅`, going from (0,0) to (3,4) (as constructed by `new Vec(3,4)`). It is an arrow whose head is at point C = (3,4) and its tail is implicitly at the origin. To calculate its magnitute, i.e. the length of `m`, we use Pythogora's theorem. Knowing that the line `i = 3` and `j = 4`, we get the result 5 from 5² = 3² + 4². This relies on the angle at point B (or B') being a right angle. In fact, we can draw a right triangle `ABC` with 90° at B; or, equivavelntly, a right triangle `AB'C` with right angle at B' (the right angle is always assumed to be at the point in the middle, i.e. at the point B in ABC). The first one has a point B obtained by projecting the C point (given when constructing the vector) on the y-axis. Alternatively, the point B' is given by the projection of point C on the x-axis.



We label the 3 points by
- A = (0,0)
- B = (3,0)  the 90° angle is at here at `B`
- C = (3,4)

We label the 3 sides of the right triangle by
- m = AC
- i = BC
- j = AC


- The `B` point is obtained by projecting the point `C` on the x-axis.
- The `B'` point is obtained by projecting the point `C` on the y-axis.
- The angle at B in ABC is 90° and denoted by `ρ`
- The angle at B' in AB'C  is 90° and denoted by `ρ`
- side BC is the adjacent (shorter, 3) side wrt the (right) angle at B
- side AB is the adjacent (longer, 4) side wrt the (right) angle at B
- side AC is the hypotenuse and the opposite side wrt the (right) angle at B

With regards to the `⊾` angle `ρ` at B = (3,0), or at B'=(0,4)
- `⊿`ABC, angle at B is the right angle (90°), `⊾`, and denoted by ρ = 90°
- hypotenuse is always the same side, AC
- opposite side wrt to ρ is the side opposite to ρ, i.e. AC (hypotenuse)
- adjacent side wrt to ρ is the side adjacent to ρ, i.e. BC
- sin(ρ) = opposite/hypotenuse = AB/AC
- cos(ρ) = adjacent/hypotenuse
- tan(ρ) = opposite/adjacent
- sin(90) = opposite/hypotenuse
- cos(90) = adjacent/hypotenuse
- tan(90) = opposite/adjacent


With regards to the angle `θ` at A = (0,0)
- hypotenuse is always the side AC
- opposite side is the side opposite to the angle θ, i.e. side BC
- adjacent side is the side adjacent to the angle θ, i.e. side AB
- `⊿`CAB, angle at A is denoted by `θ` = ?°
- sin(θ) = opposite/hypotenuse
- cos(θ) = adjacent/hypotenuse
- tan(θ) = opposite/adjacent

With regards to the angle `θ` at A = (0,0)
- `⊿`ACB, angle at C is denoted by `α` = ?°


We could have also constructed an alternative right triangle with the `B` point at `(0,4)` obtained by projecting the point `C` on the y-axis instead. 

In any case, the magnitute of this vector, i.e. the length of the side `AC`, is `(AC)² = (AB)² + (BC)²`, where `AB = 3` and `BC = 4`. 

If `m` is the side `AC`, we have

```
m = √((AB)² + (BC)²)
m = √(3² + 4²)
m = √(9 + 16)
m = √25
m = 5 = AC
```

But in order to normalize this vector we want `m` to be 1. And for `m` to be 1 we need to divide both sides by `m`:

```js
const v = Vec(3,4)

// first lets introduce some shorthands for the 3 sides
const i = AB = 3
const j = BC = 4
const m = AC = 5

// Like always, we'd calculate the hypotenuse using Pythogora's theorem
m² = i² + j²
m = √(i² + j²)

// In order to convert the Vec(3,4) into a unit vector, the magnitute, m,
// has to be 1. To get the magnitute of 1, we divide both sides by m:

 m    √(i² + j²)
--- = ----------
 m        m

// we substitute m for √m²

     √(i² + j²)
1 =  ----------
         √m²

// since √a / √b = √(a/b)
// we can put everything under the same square root

      ⎛ i² + j²  ⎞
1 = √ ⎢----------⎢
      ⎝    m²    ⎠

// we now raise both sides to the second power

       ⎛ i² + j²  ⎞²
1² = √ ⎢----------⎢
       ⎝    m²    ⎠

// which simplifies to

    i² + j²
1 = -------
       m²

// which is the same as

    i²     j²
1 = --- + ---
    m²     m²

// which is the same as

    ⎛ i ⎞²  ⎛ j ⎞²
1 = ⎢---⎢ + ⎢---⎢
    ⎝ m ⎠   ⎝ m ⎠
```

And this is the formula for normalizing a vector to the unit vector: first we calculate the current magnitude as `m`. Then we divide each vector component by `m`, square each result, and sum the products.


```js
1  = √( (i/m)² + (j/m)² )
1² = √( (i/m)² + (j/m)² )²
1  = (i/m)² + (j/m)²

     ⎛ i ⎞²  ⎛ j ⎞²
1  = ⎢---⎢ + ⎢---⎢
     ⎝ m ⎠   ⎝ m ⎠


// with x=3 and y=4 we get m=5 and the unit() method confirms it:
1 = (3/5)² + (4/5)²
1 = 0.8² + 0.6²
1 = 0.64 + 0.36
1 = 1
```

So, when the catetes of the right-triangle are 3 and 4, the hypotenuse is 5. And when the hypotenuse decreases from `5` to `1`,  in turn one side shrinks from `3` to `0.64`, and the other from `4` to `0.36`.
- `Vec(3,4)` ⟼ `Vec(3,4).unit() === Vec(0.64, 0.36)`
- 5 ⟼ 1
- 3 ⟼ 0.64
- 4 ⟼ 0.36





## Friction

Adding friction will prevent the ball from moving around too easy. Friction is an external property (not a Ball property).

Friction will be a variable that decreases the absolute value of velocity components by multiplying them by a number between 0 and 1.

There is no friction if `friction = 0`, and if `friction = 1` then the ball doesn't move at all.

The friction variable is set to `friction = 0.1`; before changing the value of the position, the velocity will be multiplied by `1 - friction`.

## Collision

Collision between two balls
- collision detection
- penetration resolution
- collision response

Two balls A and B with radii r1 and r2 are collading if `Δ <= r1 + r2`, i.e. if their distance is smaller or equal to the sum of their radii. A and B are the ball's positions, and `δ² = |A - B|` is their distance

If ball A is located (its center) at (2,3) and ball B is at (5,7) then the distance between their central points is:
- A = (2,3)
- B = (5,7)
- C = (5,3)
- C'= (2,7)
