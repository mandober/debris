# Laravel Terms


migration (db schema)
seeding   (db data)
factory   (model factory)

database
  query builder
  Eloquent ORM
  Eloquent relations
    Direct relations:
      1-1
      1-N
      N-N
    Indirect relations:
      has 1 through (via)
      has N through (via)
    polymorphic relations:
      1-1 polymorphic
      1-N polymorphic
      N-N polymorphic
  model factory
  faker
  mass assignment protection
    fillable attributes (white list)
    guarded attributes  (black list)
testing
  unit testing
  feature testing
  Factory
    Factory States
    Factory Callbacks
      afterMaking Factory Callback
      afterCreating Factory Callback
