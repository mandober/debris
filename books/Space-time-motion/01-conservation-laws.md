# Space, Time and Motion

`The biggest ideas in the universe, Vol. 1: Space, Time and Motion`, 
Sean Carroll, 2022

## 1. Conservation

*Momentum* is mass times velocity (at least until relativity comes along and complicates things a bit).

*Weight* isn't an intrinsic property of objects, because it depends on the amount of gravity. *Mass* is the resistance that an object has to being accelerated. Mass is an intrinsic property of objects.

*Speed* is a number (scalar), a certain number of meters per second.

*Velocity* is a vector - a quantity with both a magnitude and a direction. In fact, the magnitude of the velocity vector is precisely what we call "speed", but the velocity also points in some specified direction.

We very often care about the magnitude (size) of a vector, which is written with the same symbol but without the arrow - the magnitude of a vector $\vec{v}$ (i.e. `v̅` or  ⃗v ) is `v`.

The arrow notation makes sense because we often represent a vectorial quantity by literally drawing an arrow that points in the direction of the vector, and whose length is proportional to the magnitude of the vector. Alternatively, we can represent a vector in terms of its components - the contributions it gets from different directions.

If the two vectors we're adding together point (almost) along the same direction, the total vector will be (almost) as long as the sum of their magnitudes, but if they point in (almost) opposite directions, the resulting vector can be much shorter.

*Momentum vector* is usually denoted `p̅` (the letter 'm' is reserved for mass, so we take the symbol from the Latin word for "momentum", `petere`). The expression for momentum is

`p̅ = mv̅`            (1.1)

The momentum vector points in the same direction as the *velocity vector*, and their magnitudes are proportional.

*Proportionality* means that a multiplicative change in one quantity implies a multiplicative change in the other.

If you double the velocity, you double the momentum. The factor relating the two is called the *constant of proportionality* (although in some equations it might not actually be constant). In this case it is - it is just the mass of the object.

The power of even a basic equation like this should be evident: we're not saying that the momentum of some particular object just happens to be equal to its mass times its velocity; instead, we're saying that

>there is a universal relation between momentum, mass and velocity, which always takes precisely this form for every object.

When relativity comes along, some of the explicit forms of the equations we'll see here are going to have to be tweaked, but the basic principles are largely the same.

The power of **the law of conservation of momentum** goes well beyond the idea that a single object with no forces acting on it will keep moving at a constant velocity. When a force does act on an object, for example, by bumping into another object, the total momentum of the entire system remains conserved.

Imagine two billiard balls on a frictionless table. They are initially moving on straight lines, but then they collide and move apart on new straight trajectories. Let's label the initial momenta of the first ball as `p̅₁` and that of the second ball as `p̅₂`. We label the final momentum of the first ball with `p̅₁′`, and that of the second ball as `p̅₂ ′`. Then the statement of conservation of momentum in this case is

`p̅₁ + p̅₂ = p̅₁′ + p̅₂′`      (1.2)

The individual momenta clearly change as the balls ricochet off of each other. But the total momentum of the system as a whole remains conserved.


After some important contributions from people such as René Descartes and Galileo Galilei, the first full-blown system of physical laws was introduced by Isaac Newton in 1687, the theory known as *classical mechanics*.

Pedantic but important aside: modern physicists distinguish between *classical mechanics*, which is a broad framework, and *Newtonian mechanics*, which is one specific model within that framework.

**Classical mechanics** says that the world is made of things with definite, measurable values, obeying deterministic equations of motion; it stands in contrast with *quantum mechanics*.

**Newtonian mechanics** adds specific ideas about absolute space and time. It stands in contrast with *relativistic mechanics*, which is classical but not Newtonian, and in which space and time become unified.

Until we explicitly start talking about *relativity*, the equations we'll introduce for things like energy and momentum will be Newtonian.

Just to make things one step more complicated, there are theories such as *Lagrangian mechanics* and *Hamiltonian mechanics*, which are mathematically equivalent to Newtonian mechanics but feature different sets of words and concepts. Lagrangian and Hamiltonian mechanics are certainly classical; whether you want to characterize them as Newtonian is a matter of taste.

**Classical mechanics** is a theory of patterns, rather than natures or cause/effect relations, because it doesn't ask "What is the natural state of the system?" or "What caused the system to move in that way?" All it asks is "What is the system doing at this particular moment?" And from that it makes a precise prediction for what the system will be doing at any other moment. The moment could even be in the past, not just the future. Looking back at equation (1.2), conservation of momentum for two particles, the implication works backward in time just as well as forward. If we know the total final momentum, we know it was the same at earlier times.

This is an example of a different, much more grandiose, conservation law: **conservation of information**. This principle was implicit in Newton's laws of classical mechanics, but it wasn't brought out into the limelight until the work of French mathematician Pierre-Simon Laplace around 1814.

The state of a classical system at any one time is specified by the positions and velocities of every part of the system. That amount of information, Laplace pointed out, is preserved over time. From the state at any one moment, you can predict the state at any other moment, future or past. Or at least you could, if you had perfect knowledge of the information and arbitrarily accurate calculational abilities.

Laplace imagined a "vast intellect" with such capabilities, but later commentators called this hypothetical being *Laplace's Demon*. The point of the Laplace's Demon thought experiment is not that anyone could actually have such information and make such predictions, but the universe itself possesses that information, and the laws of classical mechanics predict that it is conserved over time.

**The conservation of energy** is one of the most well-known features of classical mechanics. Unlike momentum, which is a vector, the energy of an object is simply a number, a quantity with magnitude but no direction (a scalar).

Energy comes in a number of forms, but there is one kind - **kinetic energy**, the energy of motion - that is related to momentum. The formula for the
kinetic energy of an object of mass `m` and speed `v` is

`Eᴋ = ½ m v²`           (1.3)

  Why the ½? There is a reason, but it requires calculus to explain, and we haven't gotten there yet. For future reference: when we push on an object, the accumulated energy is the integral of the force as distance changes. Newton's second law equates force to mass times acceleration. Acceleration is the derivative of velocity with respect to time. So the integral of acceleration over distance equals the integral of velocity as the velocity itself changes. And `∫ mv dv = ½ mv²`.

Both momentum and energy are conserved in classical mechanics, but kinetic energy by itself is not, since it can be converted into (or created from) other kinds of energy. When you shoot an arrow from a bow, the energy that was tied up in the stretching of the bowstring is converted into the kinetic energy of the arrow.

In simple circumstances, we can directly track how energy transforms from one form to another. Physicists like to think about a ball rolling on a hill, where we imagine there is no friction or air resistance. Then there is potential energy associated with the elevation of the ball on the hill, in addition to the kinetic energy. The potential energy of a ball at elevation `h` is

Eᴘ = m g h        (1.4)

where `h` is elevation, `m` is the mass of the ball, and `g` is the acceleration due to gravity near the surface of the Earth, i.e. `9.81 m/s²`. A dropped object (ignoring air resistance) increases its speed by `9.81 m/s` every second.

Rolling on a frictionless hill, the total energy `Eᴋ + Eᴘ` remains constant, but the two forms of energy convert back and forth. If the ball starts motionless on a slope, it will start rolling downward, and at every moment its velocity will be exactly what is required to produce an amount of kinetic energy equal to whatever it has lost in potential energy.

When both momentum and kinetic energy are conserved we are dealing with *elastic collisions* (since the objects involved simply bounce off of each other). But there are also *inelastic collisions*, where momentum is conserved, but kinetic energy transforms into some other form.

"The law of conservation of mass" does not strictly exist since the theory of relativity came on the scene. Under relativity, energy and momentum are both conserved (though the equations for them are slightly different from what we wrote above), but *mass is just a particular kind of energy*.

That's the meaning of Einstein's famous equation: the energy of an object at rest (with `Eᴋ = 0`, i.e. with zero kinetic energy, thus `E` should be `E ʀᴇꜱᴛ`) is just its mass times the speed of light squared

`E = m c²`        (1.5)

In ordinary circumstances conservation of mass is a pretty good approximation, but in particle physics, where particles are routinely moving close to the speed of light, it's no longer useful, and we should just think of conservation of energy.

In the early XX century, German mathematician Emmy Noether eventually proved a remarkable theorem relating *conservation laws to symmetries* of the laws of nature.

The basic idea is straightforward: A **symmetry** is a transformation you can do to a system that leaves its essential features unchanged. A circle has a symmetry according to which it can be rotated by any angle around its center; a square, by contrast, is symmetric under rotations by 90 degrees or any multiple thereof.

>**Noether's theorem** states that every smooth, continuous symmetry transformation of a system is associated with the conservation of some quantity.

For example, the laws of physics overall are symmetric (invariant) under changes in space (changing the location) and time (today, yesterday, tomorrow).

Noether's theorem relates symmetries to conservation laws:
- invariance under `spatial`  shifts leads to conservation of `momentum`
- invariance under `temporal` shifts leads to conservation of `energy`

The number of different symmetries works out: there is one dimension of time, and correspondingly a single conserved quantity - energy. But there are 3 dimensions of space, and we can translate separately in any one of those 3 directions. That's why momentum is a vector, which we can think of as having 3 components, one for each direction of space.

There is also a symmetry according to which we can rotate the system around any of 3 independent axes - that gives rise to another conserved quantity, **angular momentum**.

Symmetry        | Conserved quantity
----------------|--------------------
Temporal shifts | Energy
Spatial shifts  | Momentum
Rotations       | Angular momentum

These symmetries - shifts in space, shifts in time, rotations - are all **spacetime symmetries**, since they involve transforming the system in space and/or time.

In particle physics and quantum field theory we have **internal symmetries** that "rotate" different parts of a quantum field into one another. It's these internal symmetries that are responsible for conservation of electric charge and a number of other particle properties.

The laws of physics exhibit a certain symmetry, but that symmetry might be violated by our expanding universe in which the faraway galaxies are gradually moving away from one another as time passes. Consequently, there is a sense in which energy is not conserved. The configuration of our universe is not invariant under time shifts; things used to be closer together, and in the future they'll be farther apart. If we simply take the energy contained in all the different forms of matter that we know about (radiation, ordinary matter, dark matter, dark energy, what have you) and add it all together, we get a number that is *not constant over time*.

There are ways to try to fix this by defining an energy in the curvature of spacetime itself, but those ways aren't completely satisfying. There's nothing wrong with defining "the total energy contained in a region of space" as "the sum of the energies of all the things within that region," and admitting that this number changes over time.

All of which is to say: conservation laws are tricky. That's probably a lesson of broader applicability as we work our way deeper into the biggest ideas in the universe.

Conservation laws are obviously both conceptually important and practically useful. But there's another reason why they, and conservation of momentum in particular, are an appropriate starting point for an exploration of the physical world: They illustrate a basic methodological principle, the *spherical-cow philosophy*. It's an example of a general principle: namely, idealize a difficult problem down to a simple one by ignoring as many complications as you can; get an answer to the simple problem; then put the complications back in and calculate how they affect the answer to the simple problem.

We will see the spherical-cow philosophy at work again and again. But as useful as it is, it's not a universal truth-finding method. In many complex systems, such as we often encounter in the macroscopic human-scale world, different aspects of the underlying situation interact in crucial ways with one another, such that you can't just ignore them one at a time and correct for their effects later. In fields like biology or economics, everything often depends on
everything else.

The reason why physics seems so hard is because it actually is quite easy, compared to other sciences. In physics (at least in some parts) we have this miraculous ability to set aside various components of the system we're thinking about, solve a much simpler problem, and put everything backtogether at the end.

As a result, physicists are able to discover amazing and counterintuitive features of the world, from quantum mechanics to relativity to the Big Bang. We would never have been able to just guess these things by being clever; *we were forced to invent them by trying to fit the experimental data*. But precisely because they are so counterintuitive, they can be hard to understand, at least at first glance. If the vista before us seems alien, it is because we are looking so very far.
