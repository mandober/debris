# JS :: Guides :: Euclidean vector

## Euclidean vector

**Euclidean vector** is defined as an entity that has **magnitude** and **direction**.

A vector is drawn as a arrow: *direction* is indicated by the *arrow's head* and *magnitude* by the the *arrow's length*.

A vector is drawn as an arrow from point A to point B and serves as an instruction for how to get from A to B.

>Vectors provide instructions on how to get from one point to another.


Ball object drawn in canvas has some properties:
- position:         `x`,                `y`          Vec position
- speed:            `speed_x`,          `speed_y`    Vec speed

In a more advanced setup, Ball could have more properties:
- acceleration:     `acceleration_x`,   `acceleration_y`
- target position:  `target_x`,         `target_y`
- wind:             `wind_x`,           `wind_y`
- friction:         `friction_y`,       `friction_y`

## Vector

One way to think about a vector is as *difference between two points*, i.e. difference between the vec's tail point and vec's head point.

>Vectors provide instructions on how to get from one point to another.

For every frame of animation, we instruct each object on the canvas to move a certain number of pixels horizontally and a certain number of pixels vertically.

For every frame: *new position = velocity applied to current position*

Velocity is a vector (the difference between two points), i.e. **velocity vector**. position, technically, is not a vector since it does not describe how to move from one point to another - it simply describes a singular point in space. Nevertheless, it can be thought of as a path taken from the origin to reach that position. Hence, a **position vector** represents the difference between a position and origin.

- *velocity vector* specifies how to get from one point to another
- *position vector* specifies how to get from origin to another point
-  *motion*: new position = position + velocity
- for every frame: *new position vec = velocity vec + current position vec*

A new `Vec` is constructed by passing two numbers to the Vec ctor:
- `x` is x-axis value
- `y` is y-axis value

The new vector `v⃗` is then a directed segment from `(0, 0)` to `(x, y)`.

For example, `new Vec(-5, 3)`, may be interpreted as "starting at the origin: walk 5 steps West, then walk 3 steps North", or, "starting at the origin facing north: turn 90° ccw, walk 5 steps, turn 90° cw, walk 3 steps".

```
5 steps ←
4 steps ↓
then vec (-5, 4) is ↙

    -5 ←
<--------- (0, 0)
|       ⟋
|4↓   ⟋
|   ⟋ v⃗ (-5, 4)
| ↙
↓
```


## `Vec` class

```js
class Vec {
  constructor(x, y) {
    this.x = x || 0 // pos_x
    this.y = y || 0 // pos_y
  }

  move = vv => new Vec(
    this.x += vv.x, // + speed_x
    this.y += vv.y, // + speed_y
  )

}

const pos = new Vec(100, 100) // velocity vector
const vel = new Vec(1, 3.3)   // position vector
const newPos = pos.move(vel)  // new (re)position(d) vector
```

## Constructing a new vector

A new vector is constructed by passing `x` and `y` numbers into the `Vec` ctor. These 2 numbers represent how to get to the point that is the new vector's head. We start at origin, `(0, 0)`. We first take `x` steps right (or left if `x` is negative) on the x-axis. Then the `y` number tells us the number of steps to take on the y-axis. If `y` is positive go up, if negative go down.

However, `x` and `y` numbers can also be interpreted as vectors themselves. `x` describes the point `(x, 0)`, i.e. the distance from origin, `(0,0)` to `(x,0)`. It can be denoted as vector `x⃗` of the magnitude `|x|`. Its direction depends on whether `x` is positive or negative:
- `+x` means __→__ direction, towards +x on the x-axis
- `-x` means __←__ direction, towards -x on the x-axis

Similarly, the number `y` represent `y⃗` vector, of magnitude `|y|` and direction that depends on whether `y` is positive or negative:
- `+y` means __↑__ direction, towards +y on the y-axis
- `-y` means __↓__ direction, towards -y on the y-axis

The resulting vector, `v⃗`, defined by new `Vec(x, y)`, is then both the horizontal (x-axis) and vertical (y-axis) offset from the origin, and it is defined by the **vector addition**: `v⃗ = x⃗ + y⃗`.

>Thus, `x` and `y` parameters are both *the resulting vector's components*, but also *bona fide vectors themselves*.

## Vector addition

A vector has two components, an `x` and `y`. To add two vectors together, we add their `x` and `y` components.

In other words, `w⃗ = u⃗ + v⃗` can be written as:
- `wˣ = uˣ + vˣ`
- `wʸ = uʸ + vʸ`

u⃗ = (5,2)
v⃗ = (3,4)
w⃗ = u⃗ + v⃗ = (5+3, 2+4) = (8,6)
wˣ = 8
wʸ = 6

So instead of `location = location + velocity`, 
we write `location.add(velocity)`

## Vector methods

- add()           add vectors
- sub()           subtract vectors
- mult()          scale the vector with multiplication
- div()           scale the vector with division
- mag()           calculate the magnitude of a vector
- setMag()        set the magnitude of a vector
- normalize()     normalize the vector to a unit length of 1
- limit()         limit the magnitude of a vector
- heading()       2D heading of a vector expressed as an angle
- rotate()        rotate a 2D vector by an angle
- lerp()          linear interpolate to another vector
- dist()          Euclidean distance between 2 vectors (considered as points)
- angleBetween()  find the angle between two vectors
- dot()           dot product of two vectors
- cross()         cross product of vectors (only relevant in 3D)
- random2D()      make a random 2D vector
- random3D()      make a random 3D vector

## Normalizing Vectors

The **unit vector** has a length of 1. Since it describes a vector's direction without regard to its length, it is useful to always have the unit vector readily accessible.

To normalize a vector is to take a vector of any length and, keeping its direction, change its length to 1, turning it into a unit vector.

For any given vector `u⃗`, its unit vector, `u͆`, is calculated as 

`u͆ = u⃗ / ‖u⃗ ‖` where `‖u⃗ ‖` is the vector's magnitude (an absolute value).

>In other words, to normalize a vector, divide each component by its magnitude.

This is pretty intuitive. Say a vector is of length 5. Well, 5 divided by 5 is 1. So, looking at the right triangle, we then need to scale the hypotenuse down by dividing by 5. In that process the sides shrink, divided by 5 as well.

## Vector Motion: Velocity

An object on screen has a *position or location* (where it is at any given moment) as well as a *velocity* (instructions for how it should move from one moment to the next). Velocity is added to location `location.add(velocity)` and then we draw the object at the new location.

A function to determine what the object does when it reaches an edge of window:
- disappear into offscreen
- bounce back (inverting position, e.g. y-position)
- wrap around (pop back on the opposite side)

## Vector Motion: Acceleration
