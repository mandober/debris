# Homotopy type theory

**Univalent type theory** is often called **homotopy type theory**.

Here we are following Voevodsky, who coined the phrases *univalent foundations* and *univalent mathematics*.

We regard the term "homotopy type theory" as probably more appropriate for referring to the synthetic development of homotopy theory within univalent mathematics, for which we refer the reader to [the HoTT book][1].

However, the term "homotopy type theory" is also used as a synonym for univalent type theory, not only because univalent type theory has a model in homotopy types (as defined in homotopy theory), but also because, without considering models, types do behave like homotopy types, automatically.

We will not discuss how to do homotopy theory using univalent type theory in these notes. We refer the reader to the HoTT book as a starting point.

A common compromise is to refer to the subject as [HoTT/UF][2].

[1]: https://homotopytypetheory.org/book/
[2]: https://cas.oslo.no/hott-uf/


## General references

- [Papers][3] by [Martin-Löf][4]
- [Homotopy type theory website references][5]
- [HoTT book][1]
- [ncatlab references][6]

[3]: https://github.com/michaelt/martin-lof
[4]: https://en.wikipedia.org/wiki/Per_Martin-L%C3%B6f
[5]: https://homotopytypetheory.org/references/
[6]: https://ncatlab.org/nlab/show/homotopy+type+theory

After gaining enough experience:
- Voevodsky's original foundations of [univalent mathematics in Coq][7]
- [UniMath][8] project in [Coq][9]
- [Coq HoTT library][10]
- [Agda HoTT library][11]

[7]: https://github.com/vladimirias/Foundations
[8]: https://github.com/UniMath/UniMath
[9]: https://coq.inria.fr/
[10]: https://github.com/HoTT/HoTT
[11]: https://github.com/HoTT/HoTT-Agda


Regarding Agda, we recommend the following as starting points:
- [Agda wiki][12]
- [Dependent types at work][13] by Ana Bove and Peter Dybjer
- [Agda reference manual][14]
- [Agda further references][15]
- [Cubical Agda][16] blog post by Anders Mörtberg
- [Cubical Agda docs][17]

[12]: https://wiki.portal.chalmers.se/agda/pmwiki.php
[13]: http://www.cse.chalmers.se/~peterd/papers/DependentTypesAtWork.pdf
[14]: https://agda.readthedocs.io/en/latest/getting-started/index.html
[15]: https://wiki.portal.chalmers.se/agda/pmwiki.php?n=Main.Documentation
[16]: https://homotopytypetheory.org/2018/12/06/cubical-agda/
[17]: https://agda.readthedocs.io/en/latest/language/cubical.html#cubical


References about the genesis of the subject:
- [A very short note on homotopy λ-calculus][18]
- [Notes on homotopy λ-calculus][19]
- [Homotopy theoretic models of identity types][23] by Steve Awodey and Michael A. Warren

[18]: http://math.ucr.edu/home/baez/Voevodsky_note.ps
[19]: https://github.com/vladimirias/2006_03_Homotopy_lambda_calculus/blob/master/homotopy_lambda_calculus_Mar_5_2006.pdf
[23]: https://arxiv.org/abs/0709.0248

[Voevodsky][20] says that he was influenced by [Makkai's][21] thinking on:
- [FOLDS][FOLDS]
- [The theory of abstract sets based on FOL with dependent types][22]

[20]: https://www.math.ias.edu/vladimir/sites/math.ias.edu.vladimir/files/2014_04_22_slides.pdf
[21]: https://www.math.mcgill.ca/makkai/
[FOLDS]: https://www.math.mcgill.ca/makkai/folds/foldsinpdf/FOLDS.pdf
[22]: https://www.math.mcgill.ca/makkai/Various/MateFest2013.pdf


Additional expository material
- [An introduction to univalent foundations for mathematicians][24], a paper by [Dan Grayson][27], at the [Bulletin of the AMS][26].
- [An introduction to univalent foundations for mathematicians][27]
- [Voevodsky's Memorial talk][28] by [Dan Grayson][29]
- [Univalent foundations - an introduction][30] by Benedikt Ahrens
- [Introduction to Homotopy Type Theory][31] by Egbert Rijke
- [A course on homotopy type theory][32] by Andrej Bauer and Jaka Smrekar
- [15-819 Homotopy Type Theory][33] by Bob Harper
- [Homotopy type theory: the logic of space][34] by Mike Shulman
- [Logic in univalent type theory][35] by Martin Escardo


[24]: https://www.ams.org/journals/bull/2018-55-04/S0273-0979-2018-01616-9/
[25]: https://www.ams.org/publications/journals/journalsframework/bull
[26]: https://faculty.math.illinois.edu/~dan/
[27]: https://www.ams.org/journals/bull/2018-55-04/S0273-0979-2018-01616-9/
[28]: https://faculty.math.illinois.edu/~dan/Talks/Voevodsky-memorial-talk.pdf
[29]: https://faculty.math.illinois.edu/~dan/
[30]: https://benediktahrens.net/talks/6WFT.pdf
[31]: https://github.com/EgbertRijke/HoTT-Intro
[32]: http://math.andrej.com/2019/05/08/a-course-on-homotopy-type-theory/
[33]: https://www.cs.cmu.edu/~rwh/courses/hott/
[34]: https://arxiv.org/abs/1703.03007
[35]: https://www.newton.ac.uk/seminar/20170711100011001


[Agda development][40] of [univalent foundations][41] applied to work on
- [injective types][42]
- [compact (or searchable) types][43]
- [compact ordinals][44]

[40]: https://www.cs.bham.ac.uk/~mhe/TypeTopology/
[41]: https://www.cs.bham.ac.uk/~mhe/TypeTopology/UF.html
[42]: https://www.cs.bham.ac.uk/~mhe/TypeTopology/InjectiveTypes-article.html
[43]: https://www.cs.bham.ac.uk/~mhe/TypeTopology/Compactness.html
[44]: https://www.cs.bham.ac.uk/~mhe/TypeTopology/Ordinals.html


## Choice of material

This is intended as an introductory graduate course. We include what we regard as the essence of univalent foundations and univalent mathematics, but we are certainly omitting important material that is needed to do univalent mathematics in practice, and the readers who wish to practice univalent mathematics should consult the above references.
