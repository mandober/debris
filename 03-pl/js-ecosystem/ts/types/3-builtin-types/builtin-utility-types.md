# TS :: Types :: Builtin utility types

https://www.typescriptlang.org/docs/handbook/utility-types.html

TS provides globally available utility types to facilitate common *type transformations*. There are also 4 (as of v5.2) *intrinsic string manipulation types* implemented in the compiler (non-user-definable), intended to perform case transformations of string literal types.

Utility types
- tuple types
  - NonNullable<T>
- object types
  - Partial<T>
  - Required<T>
  - Record<K, T>
  - Readonly<T>
  - Pick<T, K>
  - Omit<T, K>
  - Exclude<UnionType, ExcludedMembers>
  - Extract<T, Union>
- function types
  - Parameters<T>
  - ConstructorParameters<T>
  - ReturnType<T>
- methods
  - InstanceType<T>
  - ThisParameterType<T>
  - OmitThisParameter<T>
  - ThisType<T>
- promises
  - Awaited<T>

Intrinsic String Manipulation Types
- Uppercase<SLT>
- Lowercase<SLT>
- Capitalize<SLT>
- Uncapitalize<SLT>
