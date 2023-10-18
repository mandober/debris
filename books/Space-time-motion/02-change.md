# Change

In classical physics, change is described using a specific framework we will call the *Laplacian paradigm*, after Pierre-Simon Laplace.

The Laplace's Demon thought experiment illustrated *conservation of information*: the data needed to predict the future or retrodict the past is present at any moment in the history of an isolated system.

This suggests the following paradigm for understanding how things change: (1) specify the complete state of the system at one moment in time; (2) use the laws of physics to calculate the state at a moment later; (3) repeat. This algorithm allows us to build up the entire history of the system, past, present, and future. There is no reference to natures or purposes or goals toward which the system aspires. It's just one thing after another, where the next thing is determined by the current thing and the laws of physics.

Presumably what we want to do is to break time down into its smallest possible unit. But time seems to flow smoothly, whether from ordinary experience or from the perspective of modern physics. The continuity of time was recognized as puzzling even by the ancients, from Zeno of Elea to Archimedes. The puzzle wasn't really resolved until Isaac Newton and Gottfried Wilhelm Leibniz independently developed *calculus*, the mathematical technique for dealing with infinitesimal quantities.

In calculus
- *derivatives* calculate the rate of change of something
- *integrals* calculate the total amount of change

## Planets and forces

*Ptolemy*, an Alexandrian astronomer of the II century, developed a geocentric model of the solar system that remained the state of the art for over a millennium. *Copernicus*, a Polish astronomer of the XVI century, put forward an alternative, heliocentric model. The XVII century German astronomer *Johannes Kepler* accepted Copernicus's model, but improved it by suggesting that orbits should be ellipses, not circles. On the basis of data that had been collected by his mentor, *Tycho Brahe*, Kepler put forward **3 laws of planetary motion**:
1. Planets move on ellipses with the sun at one focus of the ellipse.
2. The orbit of a planet sweeps out equal areas in equal times. 
   Thus, planets move more quickly when they are closer to the sun, more slowly when they are farther away.
3. Larger orbits have a longer orbital period. 
   In particular, the square of the period is proportional to the cube of the long axis of the ellipse. This relates the orbits of different planets to one another.

Another important step forward was made by Dutch physicist *Christiaan Huygens*. Imagine tying a rock to a string, then swinging it in a circle. You will feel the rock pulling on the string, and you have to pull back to keep it in circular motion. Huygens derived a formula for the amount of *"centripetal force"* you needed to exert to make this happen. (Huygens also proposed the wave theory of light, invented the pendulum clock, and discovered Saturn's moon Titan). This isn't the same as planets moving around the sun, but the basic similarities were evident.

In England, the Royal Society was founded in 1660, and soon featured such thinkers as experimentalist Robert Hooke, architect Christopher Wren, and young astronomer Edmond Halley, all of whom became friends.

*Robert Hooke* had suggested in a lecture to the society that planetary motions could be explained by a gravitational force, stretching from the sun and decreasing with distance, that gently nudged the planetary trajectories away from straight lines.

By 1684, the 3 friends had come to understand that Huygens's formula for centripetal force could be used to deriveKepler's third law, if the force of gravity from the sun obeyed an *inverse-square law*:
>Gravitational attraction decreases as the square of the distance to a planet.

A planet that was 3 times as far away would feel 1/9 of the gravitational force. What they weren't able to prove was that an orbit under this kind of influence would actually take the form of an *ellipse*.

## Newton and his laws

Wren, who perhaps had more cash on hand than the others, from designing St. Paul's Cathedral and other buildings, offered a prize to anyone who could derive the shape of planetary orbits under such an inverse-square law.

Even at that time everyone knew that *Isaac Newton* was the smartest one around, although he mostly kept to himself up in Cambridge. Eventually Halley worked up the courage to pay him a visit. Newton received him graciously, and Halley proposed the question of the shape of orbits subject to an inverse square force. Newton instantly replied that it would be an ellipse as he had already calculated it.

It remains a little unclear precisely how Newton carried out the original calculation. What is known is that Halley pushed Newton to write something up, which ultimately led to a short paper that Halley presented to the Royal Society. That first publication was lacking in some details, so Halley pressed him more to flesh things out a bit. Once he set to doing so, Newton couldn't be stopped, and 18 months later, he produced `Philosophiae Naturalis Principia Mathematica`.

The Principia not only established the system of classical mechanics that remained unchallenged until the XX century. It also proposed the full law of gravitation, derived Kepler's laws from basic principles, and presented the first hints of calculus.

Newton had developed calculus pretty far, but he was reluctant to deploy it fully in the Principia, since the techniques were new and bound to be controversial. As a result, he ended up in a bitter dispute with Leibniz, who developed the ideas independently and whose notation eventually came into common use. (Newton also ended up in a bitter dispute with Hooke over the inverse-square law. He ended up in a lot of bitter disputes).

*Classical mechanics* is a system, not merely a theory of some particular physical phenomenon. It's a comprehensive way of thinking about how the physical world works, one that was almost universally accepted as true until the advent of quantum mechanics.

We've seen how a large number of very smart people struggled over the course of hundreds of years to get a grasp of *momentum*, *force* and *motion*. Newton thought about it carefully and simply presented what seemed to be the right answer. As modern-day cosmologist Rocky Kolb has put it: "To compare the accomplishment of Newton to that of the first manned flight, one would have to imagine Orville and Wilbur Wright pulling up on the sands of Kitty Hawk on December 17, 1903, behind the controls of a modern jetliner and flying off to New York".

As far as the motion of the planets is concerned, Newton had two crucial ideas.

First, if the natural motion of objects is to continue in a straight line at a constant velocity, deviations from that motion can be characterized by the acceleration of that body, the rate at which the velocity changes. Like velocity itself, acceleration is a vector, since we can accelerate in different directions.

**Newton's 2ⁿᵈ law of motion** states that the acceleration of an object is proportional to the net force acting on it, with the constant of proportionality provided by the object's mass:

`F̅ = m a̅`        (2.1)

**Newton's 1ˢᵗ law of motion** states that velocity is constant when there is no force.

**Newton's 3ʳᵈ law of motion** states that bodies act on each other with equal and opposite forces.

Often there will be more than one force acting on an object at one time, in which case we simply add up the individual contributions to get the overall force, which is responsible for the acceleration.

Because vectors have a direction as well as a magnitude, two big forces can add up to give a small net force, if they're pointing in (nearly) opposite directions.

Dividing both sides of (2.1) by `m`, we get the acceleration in terms of the
force, `a̅ = F̅/m`.

Second, *Newton's law of universal gravitation* finalized the inverse-square law that Hooke and others had talked about.

What was indisputably Newton's was the idea that the law was indeed universal - it explains how apples fall from trees as well as how planets move around sun.

Consider two celestial objects A and B with masses `m₁` and `m₂`, and a distance `r` between them. Let `e̅ᵣ` be a unit vector (a vector of length 1, in whatever units we are using to measure distance) pointing from object B to object A. Then Newton says that the force acting on object B, due to the gravitational pull of object A, is given by

`F̅ = G m₁ m₂ e̅ᵣ / r²`                   (2.2)

The number `G` is a constant of nature, now known as **Newton's gravitational constant**, that tells us how strong the force of gravity is. From the point of view of object B, object A is the source of gravity - the physical property creating the force - and vice versa.

The equation once again shows a proportionality relation between two vectors: the force exerted on object B by object A, and a unit-length vector pointing from B to A. The proportionality factor involves Newton's constant as well as the two masses, and then we divide by the square of the distance.

This attaches a precise numerical value to the amount of pull that the sun exerts on the planets, which is substantial when you are nearby and fades as you get farther away.

From two simple rules, i.e. the second law of motion (2.1) and the law of universal gravitation (2.2), Newton was able to reproduce all of Kepler's laws, and more.

He showed, for example, that the gravitational force due to a spherical body is exactly the same as it would be if the same amount of mass were concentrated at a single point at the center. So it's okay to treat the sun and planets as if they were single points rather than solid objects, at least in the approximation where we treat them as perfectly spherical.

Equally important, we can go beyond the idealization of treating each planet as orbiting the sun in isolation; with Newton's rules in hand, we can ask, for example, about how the orbit of Jupiter (the most massive planet in the solar system) affects the motion of the other planets. It was a whole new way of looking at celestial mechanics, which to this day is more than accurate enough to pilot a rocket ship to the moon.

## Think locally

Our aim here isn't to reproduce Newton's derivation of Kepler's laws, but to highlight the philosophical differences between two approaches to planetary dynamics (and therefore to physics more broadly).

Kepler tells us that planets move in ellipses and says certain things about the speed at which they move. To describe an orbit as an ellipse is to make a *global statement*, in the sense that it refers to the trajectory as a whole. We wait for the planet to make one entire revolution around the sun, at which point we can verify that it really did move in an ellipse.

While Newton reaches the same conclusion, his procedure is very different. The starting point is now local in time: all of the relevant information is presented at a single moment. You tell me where the planet is, what its velocity is, and what forces are acting on it, all at some particular time. Then Newton's second law tells me the acceleration theplanet is feeling at that same moment in time. From this, we can extrapolate the entire behavior at other times.

That is the Laplacian paradigm in action. Newton developed it, but Laplace emphasized its philosophical significance, and other researchers such as William Rowan Hamilton introduced significant upgrades to the idea.

**The Laplacian paradigm** holds that all the information we need to determine what will happen to the system, or what did happen to it in the past, is contained in the state of the system at each moment in time.

The questions - what is the instantaneous rate of change of some quantity (derivatives), and how do we accumulate quantities over time (integrals) - are at the heart of calculus.

## Functions

A function is simply a map from one quantity to another quantity. The input is called the argument of the function, and the output is the value corresponding to that argument. A function mapping `t` to `x` might be written as `x = f(t)` or just `x(t)` for short. The idea of a function applies whenever there is a *unique map* from values of `t` to values of `x`. By "unique" we mean that each value of the arg is associated with one and only one value of the function. That
means, in the plot of a function, the curve may go up and down but must never double back from left to right.

## Derivatives

Given `x(t)`, position as a function of time, we might want to ask what the velocity is at any moment. We know that the velocity is defined as the rate at which the position is changing, but how do we calculate it from `x(t)`?

Velocity can't be determined from knowing the position at just one time - given the location of a car and no more information, we have no idea what its speed is. Somehow we need to take advantage of the information about the position at other times.

Just looking at the graph of the function, we get the general impression that the velocity of the car is related to the *slope* of the curve at each point, how sharply it is rising or falling. Where the curve is almost flat, time passes but the car doesn't move much - velocity is small; where the curve is steep, the car moves a lot in just a little time - velocity is large.

The straight line that exactly grazes `x(t)` curve, at some point in time `t₀`, is called the *tangent line* at that point. The velocity of the car at the precise moment `t₀` is the slope of that particular tangent line. We need to develop a systematic procedure for defining and calculating the slope of the tangent line at each point.

That would be easy to do if the car were moving at a constant velocity. In that case the function would just be a straight line. Then the slope, and therefore the velocity, is straightforward to calculate: it's just the change in position divided by the corresponding change in time. In symbols, let's write the change in position as `Δx` and the change in time as `Δt`. *Then the velocity along a straight-line path is*

```
      Δx
v = ------        (2.3)
      Δt
```

>Now we come to one of the basic insights of calculus - as long as the function is relatively smooth (not overly jagged or randomly jumping from value to value) it will look straight over very short intervals, even if overall it's pretty curved.

As we zoom in to higher and higher magnifications on the graph of the function, a curved line begins to look straighter and straighter. This suggests a strategy: fix some time `t` at which we'd like to calculate the velocity. Now pick some extra amount of time `Δt`, and consider the time interval in between an initial time `t` and a final time `t + Δt`. Given our function, we know both the position `x(t)` of the car at the initial time, and also its position `x(t + Δt)` at the final time. We can therefore calculate the total change in position over this time, which is

```
Δx = x(t + Δt) - x(t)       (2.4)
```

If the function as a whole is curved rather than straight, we can divide the total change in position by the total change in time, to find the average out the velocity over that interval

```
        Δx
vₐᵥᵣ = ------        (2.5)
        Δt
```

This looks similar to (2.3), but that expression was for the *unique velocity* along a constant-velocity path, while this is the *average velocity* for some specific time interval along any given path.

This isn't quite what we're looking for. We don't want the average velocity over some arbitrary interval, we want *the instantaneous velocity* at any moment. But the time interval `Δt` was arbitrary - we can choose smaller and smaller values of `Δt` for our interval, which implies smaller and smaller values of `Δx`. While both `Δx` and `Δt` approach 0, their ratio `Δx/Δt` approaches some number that need not be 0. In fact, it approaches exactly what we're looking for - *the slope of the tangent line at our initial point*.

This procedure called **taking the limit** as `Δt` approaches 0.

0 divided by 0 is undefined, but we can take the limit of `Δt` and `Δx` as they both individually approach 0, while their ratio, the velocity `v`, is well defined. We call this the **derivative of the function** `x(t)`, and write it in a suggestive notation as

```
v = limit ( Δx / Δt ) = dx / dt       (2.6)
```

That's what a derivative is: the slope of a curve at some point, defined by taking the limit of the slope of a sequence of lines that get closer and closer to the tangent line at that point.

We have considered the particular case of `x` as a function of `t`, where the derivative is the velocity, but the idea is general.

For example, acceleration is the derivative of velocity with respect to time

```
a̅ = dv / dt        (2.7)
```

Velocity is measured in meters per second, while acceleration is measured in (meters per second) per second, since it's the rate of change of velocity. Acceleration due to gravity of a falling object near the Earth is 9.81 m/s².

Every function is a function "of" some variable, and we can calculate the derivative with respect to that variable. The derivative of some function of `x`, denoted `f(x)`, is `df / dx`.

The quantities such as `dx` and `dt` are known as **infinitesimals**. They look like numbers we divide to get `v`, but the reality is a bit more subtle. If they were numbers, their value would be 0, and that's no good. Rather, they represent the idea of *the limit of `Δx` and `Δt` as those two quantities both approach zero*. The ratio of these two infinitesimals is a well-defined number, even if they individually are not.

**Differentiation** is the process to calculate the derivative of a given function using an explicit set of rules.

Consider a *linear function* (its plot is a straight line) `f(x) = ax + b`, where `a` and `b` are *fixed parameters* or *constants*. The constant `b` has no effect on the slope of the line, so we can ignore it. The constant `a` is the slope: if we change `x` by an amount `Δx`, then `f(x)` changes by `a Δx`, so `Δf(x) / Δx = a`, no matter what `x` is.

```
f(x) = y
f(x + Δx) = f(a Δx)

Δy      Δf(x)
---- = ------ = a
Δx       Δx

d (ax + b)
---------- = a      (2.8)
   d x
```

In general, `(d / d x) a xⁿ = a n xⁿ⁻¹`


## Integrals

To figure out an object's trajectory: If velocity is the rate of change of position, and acceleration is the rate of change of velocity, we'd like to add up all those accumulated changes to determine how the position and velocity evolve over time.

The area under a curvy function `v(t)` can be approximated by picking some small increment `Δt`, calculating the area under the rectangle from `t = 0` to `t = Δt`, which is just v(0)·Δt`, then doing the same for the curve from `t = Δt` to `t = 2Δt`, and so on. At the end we add up all the areas of these skinny rectangles, and we get a quantity that is approximately equal to the area under the curve.

As our time interval `Δt` gets smaller and smaller and our rectangles get skinnier and skinnier (but also more numerous), this procedure comes closer and closer to the true area under the curve. Just as in the case of derivatives, we can take the limit as `Δt` gets infinitesimally small, and call it `dt`.

The result is the *integral of the velocity with respect to time*, which gives us the accumulated distance traveled:

`Δx(t) = limit [Σ v(t) Δt] = ∫ v(t) dt`     (2.11)

Similarly, the amount by which the velocity changes can be calculated as the integral of the acceleration:

`Δv(t) = ∫ a(t) dt`     (2.12)

Note: we're hiding subscripts to `t` to keep the notation clean. What we've calculated is the change in the position (or velocity) between some initial time and some final time; a more careful notation would indicate what those two times actually were.

Just like derivatives can be thought of as a way of making sense of `0 / 0`, an integral can be thought of as a way of making sense of `∞ ⨯ 0`, where infinity is the number of skinny rectangles under the curve and 0 is the area of each rectangle.

*Mathematical analysis* makes this rigorous. But you can see why Newton was hesitant to rely on calculus in the Principia. The ideas were very new at the time, and even today, some folks working in the foundations of mathematics are skeptical that calculus is entirely rigorous.
