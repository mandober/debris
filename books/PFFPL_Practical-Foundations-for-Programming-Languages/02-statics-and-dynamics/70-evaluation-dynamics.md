# 2. Statics and Dynamics :: 7. Evaluation Dynamics

7. Evaluation Dynamics
  7.1 Evaluation Dynamics
  7.2 Relating Structural and Evaluation Dynamics
  7.3 Type Safety, Revisited
  7.4 Cost Dynamics

## 7. Evaluation Dynamics

Structural dynamics is very useful for proving safety, but for some purposes, such as writing a user manual, another formulation, called evaluation dynamics, is preferable.

An **evaluation dynamics** is a relation between a phrase and its value that is defined without detailing the step-by-step process of evaluation.

A **cost dynamics** enriches an evaluation dynamics with a cost measure specifying the resource use of evaluation.

A prime example is time, measured as the number of transition steps required to evaluate an expression according to its structural dynamics.

## 7.1 Evaluation Dynamics

An evaluation dynamics consists of an inductive definition of the *evaluation judgment* `e ⇓ v` stating that the closed exp `e` evaluates to the value `v`.

The evaluation dynamics of E is defined by the following rules:

(...)
