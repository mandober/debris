# Petite Chez Scheme

**Petite Chez Scheme** is a sibling implementation of Chez Scheme that uses a threaded interpreter design instead of the incremental native-code compiler. Programs written for Chez Scheme run unchanged in Petite Chez Scheme provided they don't depend on the compiler intrinsics (like FFI).


* Distributing Applications with Petite Chez Scheme - R. Kent Dybvig, 1998
https://www.scheme.com/csv6.9b/petite.pdf

Petite Chez Scheme is a fast, reliable, and full-featured implementation of the Scheme programming language. It is fully compatible with the complete Chez Scheme system but uses a high-speed
threaded interpreter in place of Chez Scheme's incremental native-code compiler. Programs written
for Chez Scheme run unchanged in Petite Chez Scheme as long as they do not depend specifically
on the compiler. In fact, Petite Chez Scheme is built from the same sources as Chez Scheme, with
all but the compiler sources included. Petite Chez Scheme may be used and redistributed without
license fee or royalty for any purpose, including for resale as part of a commercial product. For
details, see the Petite Chez Scheme Software License Agreement, a copy of which is included as an
appendix to this note.
Although suitable for use as a stand-alone Scheme system, Petite Chez Scheme was conceived
as a run-time system for compiled Chez Scheme applications. This note describes how to create
and distribute such applications. The following section briefly describes the characteristics of Petite
Chez Scheme and how it compares with Chez Scheme. The remaining sections detail how to prepare
application source code, how to build and run applications, and how to distribute them.
