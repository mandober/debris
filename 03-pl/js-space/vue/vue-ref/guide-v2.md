# Guide for Vue v.2.x

* Essentials
  * Installation
    - Vue Devtools
    - Direct `<script>` include
      - CDN
    - NPM
    - CLI
    - Explanation of Different Builds
      - Terms
      - Runtime + Compiler vs. Runtime-only
      - Development vs. Production Mode
      - CSP environments
    - Dev Build
    - Bower
    - AMD Module Loaders
  * Introduction
    - What is Vue.js?
    - Getting Started
    - Declarative Rendering
    - Conditionals and Loops
    - Handling User Input
    - Composing with Components
    - Relation to Custom Elements
  * The Vue Instance
    - Creating a Vue Instance
    - Data and Methods
    - Instance Lifecycle Hooks
    - Lifecycle Diagram
  * Template Syntax
    - Interpolations
      - Text
      - Raw HTML
      - Attributes
      - Using JavaScript Expressions
    - Directives
      - Arguments
      - Dynamic Arguments
      - Modifiers
    - Shorthands
      - v-bind Shorthand
      - v-on Shorthand
  * Computed Properties and Watchers
    - Computed Properties
      - Basic Example
      - Computed Caching vs Methods
      - Computed vs Watched Property
      - Computed Setter
    - Watchers
  * Class and Style Bindings
    - Binding HTML Classes
      - Object Syntax
      - Array Syntax
      - With Components
    - Binding Inline Styles
      - Object Syntax
      - Array Syntax
      - Auto-prefixing
      - Multiple Values
  * Conditional Rendering
    - v-if
      - Conditional Groups with v-if on <template>
      - v-else
      - v-else-if
      - Controlling Reusable Elements with key
    - v-show
    - v-if vs v-show
    - v-if with v-for
  * List Rendering
    - Mapping an Array to Elements with v-for
    - v-for with an Object
    - Maintaining State
    - Array Change Detection
      - Mutation Methods
      - Replacing an Array
      - Caveats
    - Object Change Detection Caveats
    - Displaying Filtered/Sorted Results
    - v-for with a Range
    - v-for on a <template>
    - v-for with v-if
    - v-for with a Component
  * Event Handling
    - Listening to Events
    - Method Event Handlers
    - Methods in Inline Handlers
    - Event Modifiers
    - Key Modifiers
      - Key Codes
    - System Modifier Keys
      - .exact Modifier
      - Mouse Button Modifiers
    - Why Listeners in HTML?
  * Form Input Bindings
    - Basic Usage
      - Text
      - Multiline text
      - Checkbox
      - Radio
      - Select
    - Value Bindings
      - Checkbox
      - Radio
      - Select Options
    - Modifiers
      - .lazy
      - .number
      - .trim
    - v-model with Components
  * Components Basics
    - Base Example
    - Reusing Components
      - data Must Be a Function
    - Organizing Components
    - Passing Data to Child Components with Props
    - A Single Root Element
    - Listening to Child Components Events
      - Emitting a Value With an Event
      - Using v-model on Components
    - Content Distribution with Slots
    - Dynamic Components
    - DOM Template Parsing Caveats

* Components In-Depth
  * Component Registration
  * Props
  * Custom Events
  * Slots
  * Dynamic & Async Components
  * Handling Edge Cases

* Transitions & Animation
Enter/Leave & List Transitions
State Transitions

* Reusability & Composition
  * Mixins
    - Basics
    - Option Merging
    - Global Mixin
    - Custom Option Merge Strategies
  * Custom Directives
  * Render Functions & JSX
  * Plugins
  * Filters

* Tooling
  * Single File Components
    - Introduction
      - What About Separation of Concerns?
    - Getting Started
      - Example Sandbox
      - For Users New to Module Build Systems in JavaScript
      - For Advanced Users
  * Unit Testing
  * TypeScript Support
  * Production Deployment

* Scaling Up
Routing
State Management
Server-Side Rendering
Security

* Internals
Reactivity in Depth

* Migrating
Migration from Vue 1.x
Migration from Vue Router 0.7.x
Migration from Vuex 0.6.x to 1.0

* Meta
Comparison with Other Frameworks
Join the Vue.js Community!
Meet the Team
