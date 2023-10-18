---
downloaded:       2021-12-13
page-url:         https://docs.brew.sh/Formula-Cookbook#homebrew-terminology
page-title:       Formula Cookbook — Homebrew Documentation
article-title:    Formula Cookbook
---
# Formula Cookbook — Homebrew Documentation

Documentation for the missing package manager for macOS.
A *formula* is a package definition written in Ruby. It can be created with `brew create <URL>` where `<URL>` is a zip or tarball, installed with `brew install <formula>`, and debugged with `brew install --debug --verbose <formula>`. Formulae use the [Formula API][1] which provides various Homebrew-specific helpers.

## [][2]Homebrew terminology

Term

Description

Example

__Formula__

The package definition

`/usr/local/Homebrew/Library/Taps/homebrew/homebrew-core/Formula/foo.rb`

__Keg__

The installation prefix of a __Formula__

`/usr/local/Cellar/foo/0.1`

__Keg-only__

A __Formula__ is __Keg-only__ if it is not linked into the Homebrew prefix

The [`openjdk` formula][3]

__opt prefix__

A symlink to the active version of a __Keg__

`/usr/local/opt/foo`

__Cellar__

All __Kegs__ are installed here

`/usr/local/Cellar`

__Tap__

A Git repository of __Formulae__ and/or commands

`/usr/local/Homebrew/Library/Taps/homebrew/homebrew-core`

__Bottle__

Pre-built __Keg__ used instead of building from source

`qt-4.8.4.catalina.bottle.tar.gz`

__Cask__

An [extension of Homebrew][4] to install macOS native apps

`/Applications/MacDown.app/Contents/SharedSupport/bin/macdown`

__Brew Bundle__

An [extension of Homebrew][5] to describe dependencies

`brew 'myservice', restart_service: true`

## [][6]An introduction

Homebrew uses Git for downloading updates and contributing to the project.

Homebrew installs to the `Cellar` and then symlinks some of the installation into `/usr/local` so that other programs can see what’s going on. We suggest you `brew ls` a few of the kegs in your Cellar to see how it is all arranged.

Packages are installed according to their formulae, which live in `/usr/local/Homebrew/Library/Taps/homebrew/homebrew-core/Formula`. Check out a simple one, e.g. `brew edit etl` (or [`etl`][7]) or a more advanced one, e.g. `brew edit git` (or [`git`][8]).

## [][9]Basic instructions

Make sure you run `brew update` before you start. This turns your Homebrew installation into a Git repository.

Before submitting a new formula make sure your package:

-   meets all our [Acceptable Formulae][10] requirements
-   isn’t already in Homebrew (check `brew search <formula>`)
-   isn’t already waiting to be merged (check the [issue tracker][11])
-   is still supported by upstream (i.e. doesn’t require extensive patching)
-   has a stable, tagged version (i.e. not just a GitHub repository with no versions)
-   passes all `brew audit --new-formula <formula>` tests

Before submitting a new formula make sure you read over our [contribution guidelines][12].

### [][13]Grab the URL

Run `brew create` with a URL to the source tarball:

```
brew create https://example.com/foo-0.1.tar.gz
```

This creates `/usr/local/Homebrew/Library/Taps/homebrew/homebrew-core/Formula/foo.rb` and opens it in your `EDITOR`. It’ll look something like:

```
class Foo < Formula
  desc ""
  homepage ""
  url "https://example.com/foo-0.1.tar.gz"
  sha256 "85cc828a96735bdafcf29eb6291ca91bac846579bcef7308536e0c875d6c81d7"
  license ""

  # depends_on "cmake" => :build

  def install
    # ENV.deparallelize
    system "./configure", "--disable-debug",
                          "--disable-dependency-tracking",
                          "--disable-silent-rules",
                          "--prefix=#{prefix}"
    # system "cmake", ".", *std_cmake_args
    system "make", "install"
  end

  test do
    system "false"
  end
end
```

If `brew` said `Warning: Version cannot be determined from URL` when doing the `create` step, you’ll need to explicitly add the correct [`version`][14] to the formula and then save the formula.

Homebrew will try to guess the formula’s name from its URL. If it fails to do so you can override this with `brew create <URL> --set-name <name>`.

### [][15]Fill in the `homepage`

__We don’t accept formulae without a [`homepage`][16]!__

An SSL/TLS (https) [`homepage`][17] is preferred, if one is available.

Try to summarise from the [`homepage`][18] what the formula does in the [`desc`][19]ription. Note that the [`desc`][20]ription is automatically prepended with the formula name.

### [][21]Fill in the `license`

__We don’t accept new formulae into Homebrew/homebrew-core without a [`license`][22]!__

We only accept formulae that use a [Debian Free Software Guidelines license][23] or are released into the public domain following [DFSG Guidelines on Public Domain software][24].

Use the license identifier from the [SPDX License List][25] e.g. `license "BSD-2-Clause"`, or use `license :public_domain` for public domain software.

Use `:any_of`, `:all_of` or `:with` to describe complex license expressions. `:any_of` should be used when the user can choose which license to use. `:all_of` should be used when the user must use all licenses. `:with` should be used to specify a valid SPDX exception. Add `+` to an identifier to indicate that the formulae can be licensed under later versions of the same license.

Check out the [License Guidelines][26] for examples of complex license expressions in Homebrew formulae.

### [][27]Check the build system

```
brew install --interactive foo
```

You’re now at a new prompt with the tarball extracted to a temporary sandbox.

Check the package’s `README`. Does the package install with `./configure`, `cmake`, or something else? Delete the commented out `cmake` lines if the package uses `./configure`.

### [][28]Check for dependencies

The `README` probably tells you about dependencies and Homebrew or macOS probably already has them. You can check for Homebrew dependencies with `brew search`. Some common dependencies that macOS comes with:

-   `libexpat`
-   `libGL`
-   `libiconv`
-   `libpcap`
-   `libxml2`
-   `python`
-   `ruby`

There are plenty of others; check `/usr/lib` for them.

We generally try not to duplicate system libraries and complicated tools in core Homebrew but we do duplicate some commonly used tools.

Special exceptions are OpenSSL and LibreSSL. Things that use either *should* be built using Homebrew’s shipped equivalent and our Brew Test Bot’s post-install `audit` will warn if it detects you haven’t done this.

Homebrew’s OpenSSL is [`keg_only`][29] to avoid conflicting with the system so sometimes formulae need to have environment variables set or special configuration flags passed to locate our OpenSSL. You can see this mechanism in the [`clamav`][30] formula. Usually this is unnecessary because Homebrew sets up our [build environment][31] to favour finding [`keg_only`][32] formulae first.

__Important:__ `$(brew --prefix)/bin` is NOT on the `PATH` during formula installation. If you have dependencies at build time, you must specify them and `brew` will add them to the `PATH` or create a [`Requirement`][33].

### [][34]Specifying other formulae as dependencies

```
class Foo < Formula
  depends_on "pkg-config"
  depends_on "jpeg"
  depends_on "readline" => :recommended
  depends_on "gtk+" => :optional
  depends_on "httpd" => [:build, :test]
  depends_on :xcode => "9.3"
end
```

A String (e.g. `"jpeg"`) specifies a formula dependency.

A Symbol (e.g. `:xcode`) specifies a [`Requirement`][35] which can be fulfilled by one or more formulae, casks or other system-wide installed software (e.g. Xcode).

A Hash (e.g. `=>`) adds information to a dependency. Given a String or Symbol, the value can be one or more of the following values:

-   `:build` means that dependency is a build-time only dependency so it can be skipped when installing from a bottle or when listing missing dependencies using `brew missing`.
-   `:test` means that dependency is only required when running `brew test`.
-   `:optional` generates an implicit `with-foo` option for the formula. This means that, given `depends_on "foo" => :optional`, the user must pass `--with-foo` in order to use the dependency.
-   `:recommended` generates an implicit `without-foo` option, meaning that the dependency is enabled by default and the user must pass `--without-foo` to disable this dependency. The default description can be overridden using the normal option syntax (in this case, the option declaration must precede the dependency):
    
    ```
      option "with-foo", "Compile with foo bindings" # This overrides the generated description if you want to
      depends_on "foo" => :optional # Generated description would otherwise be "Build with foo support"
    ```
    
-   Some [`Requirement`][36]s can also take a string specifying their minimum version that the formula depends on.

__Note:__ `:optional` and `:recommended` are not allowed in Homebrew/homebrew-core as they are not tested by CI.

### [][37]Specifying conflicts with other formulae

Sometimes there’s hard conflict between formulae, and it can’t be avoided or circumvented with [`keg_only`][38].

A good example formula for minor conflict is [`mbedtls`][39], which ships and compiles a “Hello World” executable. This is obviously non-essential to `mbedtls`’s functionality, and conflict with the popular GNU [`hello`][40] formula would be overkill, so we just [remove it][41] during the installation process.

[`pdftohtml`][42] provides an example of a serious conflict, where both formula ship an identically-named binary that is essential to functionality, so a [`conflicts_with`][43] is preferable.

As a general rule, [`conflicts_with`][44] should be a last-resort option. It’s a fairly blunt instrument.

The syntax for a conflict that can’t be worked around is:

```
conflicts_with "blueduck", because: "yellowduck also ships a duck binary"
```

### [][45]Formulae revisions

In Homebrew we sometimes accept formulae updates that don’t include a version bump. These include resource updates, new patches or fixing a security issue with a formula.

Occasionally, these updates require a forced-recompile of the formula itself or its dependents to either ensure formulae continue to function as expected or to close a security issue. This forced-recompile is known as a [`revision`][46] and is inserted underneath the [`homepage`][47]/[`url`][48]/[`sha256`][49] block.

When a dependent of a formula fails against a new version of that dependency it must receive a [`revision`][50]. An example of such failure can be seen [here][51] and the fix [here][52].

[`revision`][53]s are also used for formulae that move from the system OpenSSL to the Homebrew-shipped OpenSSL without any other changes to that formula. This ensures users aren’t left exposed to the potential security issues of the outdated OpenSSL. An example of this can be seen in [this commit][54].

### [][55]Version scheme changes

Sometimes formulae have version schemes that change such that a direct comparison between two versions no longer produces the correct result. For example, a project might be version `13` and then decide to become `1.0.0`. As `13` is translated to `13.0.0` by our versioning system by default this requires intervention.

When a version scheme of a formula fails to recognise a new version as newer it must receive a [`version_scheme`][56]. An example of this can be seen [here][57].

### [][58]Double-check for dependencies

When you already have a lot of formulae installed, it’s easy to miss a common dependency. You can double-check which libraries a binary links to with the `otool` command (perhaps you need to use `xcrun otool`):

```
$ otool -L /usr/local/bin/ldapvi
/usr/local/bin/ldapvi:
    /usr/local/opt/openssl/lib/libssl.1.0.0.dylib (compatibility version 1.0.0, current version 1.0.0)
    /usr/local/opt/openssl/lib/libcrypto.1.0.0.dylib (compatibility version 1.0.0, current version 1.0.0)
    /usr/local/lib/libglib-2.0.0.dylib (compatibility version 4201.0.0, current version 4201.0.0)
    /usr/local/opt/gettext/lib/libintl.8.dylib (compatibility version 10.0.0, current version 10.2.0)
    /usr/local/opt/readline/lib/libreadline.6.dylib (compatibility version 6.0.0, current version 6.3.0)
    /usr/local/lib/libpopt.0.dylib (compatibility version 1.0.0, current version 1.0.0)
    /usr/lib/libncurses.5.4.dylib (compatibility version 5.4.0, current version 5.4.0)
    /System/Library/Frameworks/LDAP.framework/Versions/A/LDAP (compatibility version 1.0.0, current version 2.4.0)
    /usr/lib/libresolv.9.dylib (compatibility version 1.0.0, current version 1.0.0)
    /usr/lib/libSystem.B.dylib (compatibility version 1.0.0, current version 1213.0.0)
```

### [][59]Specifying gems, Python modules, Go projects, etc. as dependencies

Homebrew doesn’t package already-packaged language-specific libraries. These should be installed directly from `gem`/`cpan`/`pip` etc.

If you’re installing an application then use [`resource`][60]s for all language-specific dependencies:

```
class Foo < Formula
  resource "pycrypto" do
    url "https://files.pythonhosted.org/packages/60/db/645aa9af249f059cc3a368b118de33889219e0362141e75d4eaf6f80f163/pycrypto-2.6.1.tar.gz"
    sha256 "f2ce1e989b272cfcb677616763e0a2e7ec659effa67a88aa92b3a65528f60a3c"
  end

  def install
    resource("pycrypto").stage { system "python", *Language::Python.setup_install_args(libexec/"vendor") }
  end
end
```

[`jrnl`][61] is an example of a formula that does this well. The end result means the user doesn’t have to use `pip` or Python and can just run `jrnl`.

For Python formulae, running `brew update-python-resources <formula>` will automatically add the necessary [`resource`][62] stanzas for the dependencies of your Python application to the formula. Note that `brew update-python-resources` is run automatically by `brew create` if you pass the `--python` flag. If `brew update-python-resources` is unable to determine the correct `resource` stanzas, [homebrew-pypi-poet][63] is a good third-party alternative that may help.

### [][64]Install the formula

```
brew install --build-from-source --verbose --debug foo
```

`--debug` will ask you to open an interactive shell if the build fails so you can try to figure out what went wrong.

Check the top of the e.g. `./configure` output. Some configure scripts do not recognise e.g. `--disable-debug`. If you see a warning about it, remove the option from the formula.

### [][65]Add a test to the formula

Add a valid test to the [`test do`][66] block of the formula. This will be run by `brew test foo` and the [Brew Test Bot][67].

The [`test do`][68] block automatically creates and changes to a temporary directory which is deleted after run. You can access this [`Pathname`][69] with the [`testpath`][70] function. The environment variable `HOME` is set to [`testpath`][71] within the [`test do`][72] block.

We want tests that don’t require any user input and test the basic functionality of the application. For example `foo build-foo input.foo` is a good test and (despite their widespread use) `foo --version` and `foo --help` are bad tests. However, a bad test is better than no test at all.

See [`cmake`][73] for an example of a formula with a good test. The formula writes a basic `CMakeLists.txt` file into the test directory then calls CMake to generate Makefiles. This test checks that CMake doesn’t e.g. segfault during basic operation.

You can check that the output is as expected with `assert_equal` or `assert_match` on the output of the [Formula assertions][74] such as in this example from the [envv formula][75]:

```
assert_equal "mylist=A:C; export mylist", shell_output("#{bin}/envv del mylist B").strip
```

You can also check that an output file was created:

```
assert_predicate testpath/"output.txt", :exist?
```

Some advice for specific cases:

-   If the formula is a library, compile and run some simple code that links against it. It could be taken from upstream’s documentation / source examples. A good example is [`tinyxml2`][76], which writes a small C++ source file into the test directory, compiles and links it against the tinyxml2 library and finally checks that the resulting program runs successfully.
-   If the formula is for a GUI program, try to find some function that runs as command-line only, like a format conversion, reading or displaying a config file, etc.
-   If the software cannot function without credentials or requires a virtual machine, docker instance, etc. to run, a test could be to try to connect with invalid credentials (or without credentials) and confirm that it fails as expected. This is preferred over mocking a dependency.
-   Homebrew comes with a number of [standard test fixtures][77], including numerous sample images, sounds, and documents in various formats. You can get the file path to a test fixture with `test_fixtures("test.svg")`.
-   If your test requires a test file that isn’t a standard test fixture, you can install it from a source repository during the `test` phase with a resource block, like this:

```
resource("testdata") do
  url "https://example.com/input.foo"
  sha256 "ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff"
end

test do
  resource("testdata").stage do
    assert_match "OK", shell_output("#{bin}/foo build-foo input.foo")
  end
end
```

### [][78]Manuals

Homebrew expects to find manual pages in `#{prefix}/share/man/...`, and not in `#{prefix}/man/...`.

Some software installs to `man` instead of `share/man`, so check the output and add a `"--mandir=#{man}"` to the `./configure` line if needed.

### [][79]Caveats

In case there are specific issues with the Homebrew packaging (compared to how the software is installed from other sources) a `caveats` block can be added to the formula to warn users. This can indicate non-standard install paths, an example from the `ruby` formula:

```
==> Caveats
By default, binaries installed by gem will be placed into:
  /usr/local/lib/ruby/gems/bin

You may want to add this to your PATH.
```

### [][80]A quick word on naming

Name the formula like the project markets the product. So it’s `pkg-config`, not `pkgconfig`; `sdl_mixer`, not `sdl-mixer` or `sdlmixer`.

The only exception is stuff like “Apache Ant”. Apache sticks “Apache” in front of everything, but we use the formula name `ant`. We only include the prefix in cases like `gnuplot` (because it’s part of the name) and `gnu-go` (because everyone calls it “GNU Go”—nobody just calls it “Go”). The word “Go” is too common and there are too many implementations of it.

If you’re not sure about the name, check its homepage, Wikipedia page and [what Debian calls it][81].

When Homebrew already has a formula called `foo` we typically do not accept requests to replace that formula with something else also named `foo`. This is to avoid both confusing and surprising users’ expectations.

When two formulae share an upstream name, e.g. [AESCrypt][82] and [AES Crypt][83] the newer formula must typically adapt its name to avoid conflict with the current formula.

If you’re *still* not sure, just commit. We’ll apply some arbitrary rule and make a decision 😉.

When importing classes, Homebrew will require the formula and then create an instance of the class. It does this by assuming the formula name can be directly converted to the class name using a `regexp`. The rules are simple:

-   `foo-bar.rb` => `FooBar`
-   `foobar.rb` => `Foobar`

Thus, if you change the name of the class, you must also rename the file. Filenames should be all lowercase, and class names should be the strict CamelCase equivalent, e.g. formulae `gnu-go` and `sdl_mixer` become classes `GnuGo` and `SdlMixer`, even if part of their name is an acronym.

Add aliases by creating symlinks in an `Aliases` directory in the tap root.

### [][84]Audit the formula

You can run `brew audit --strict --online` to test formulae for adherence to Homebrew house style. The `audit` command includes warnings for trailing whitespace, preferred URLs for certain source hosts, and a lot of other style issues. Fixing these warnings before committing will make the process a lot quicker for everyone.

New formulae being submitted to Homebrew should run `brew audit --new-formula foo`. This command is performed by the Brew Test Bot on new submissions as part of the automated build and test process, and highlights more potential issues than the standard audit.

Use `brew info` and check if the version guessed by Homebrew from the URL is correct. Add an explicit [`version`][85] if not.

### [][86]Commit

Everything is built on Git, so contribution is easy:

```
brew update # required in more ways than you think (initialises the brew git repository if you don't already have it)
cd "$(brew --repository homebrew/core)"
# Create a new git branch for your formula so your pull request is easy to
# modify if any changes come up during review.
git checkout -b <some-descriptive-name> origin/master
git add Formula/foo.rb
git commit
```

The established standard for Git commit messages is:

-   the first line is a commit summary of *50 characters or less*
-   two (2) newlines, then
-   explain the commit thoroughly.

At Homebrew, we like to put the name of the formula up front like so: `foobar 7.3 (new formula)`. This may seem crazy short, but you’ll find that forcing yourself to summarise the commit encourages you to be atomic and concise. If you can’t summarise it in 50-80 characters, you’re probably trying to commit two commits as one. For a more thorough explanation, please read Tim Pope’s excellent blog post, [A Note About Git Commit Messages][87].

The preferred commit message format for simple version updates is `foobar 7.3` and for fixes is `foobar: fix flibble matrix.`.

Ensure you reference any relevant GitHub issue, e.g. `Closes #12345` in the commit message. Homebrew’s history is the first thing future contributors will look to when trying to understand the current state of formulae they’re interested in.

### [][88]Push

Now you just need to push your commit to GitHub.

If you haven’t forked Homebrew yet, [go to the `homebrew-core` repository and hit the Fork button][89].

If you have already forked Homebrew on GitHub, then you can manually push (just make sure you have been pulling from the `Homebrew/homebrew-core` master):

```
git push https://github.com/myname/homebrew-core/ <what-you-called-your-branch>
```

Now, [open a pull request][90] for your changes.

-   One formula per commit; one commit per formula.
-   Keep merge commits out of the pull request.

### [][91]Messaging

Three commands are provided for displaying informational messages to the user:

-   `ohai` for general info
-   `opoo` for warning messages
-   `odie` for error messages and immediately exiting

Use `odie` when you need to exit a formula gracefully for any reason. For example:

```
if build.head?
  lib_jar = Dir["cfr-*-SNAPSHOT.jar"]
  doc_jar = Dir["cfr-*-SNAPSHOT-javadoc.jar"]
  odie "Unexpected number of artifacts!" if (lib_jar.length != 1) || (doc_jar.length != 1)
end
```

### [][92]`bin.install "foo"`

You’ll see stuff like this in some formulae. This moves the file `foo` into the formula’s `bin` directory (`/usr/local/Cellar/pkg/0.1/bin`) and makes it executable (`chmod 0555 foo`).

You can also rename the file during the installation process. This can be useful for adding a prefix to binaries that would otherwise cause conflicts with another formula, or for removing a file extension. For example, to install `foo.py` into the formula’s `bin` directory (`/usr/local/Cellar/pkg/0.1/bin`) as just `foo` instead of `foo.py`:

```
bin.install "foo.py" => "foo"
```

### [][93]`inreplace`

[`inreplace`][94] is a convenience function that can edit files in-place. For example:

```
inreplace "path", before, after
```

`before` and `after` can be strings or regular expressions. You should use the block form if you need to make multiple replacements in a file:

```
inreplace "path" do |s|
  s.gsub!(/foo/, "bar")
  s.gsub! "123", "456"
end
```

Make sure you modify `s`! This block ignores the returned value.

[`inreplace`][95] should be used instead of patches when patching something that will never be accepted upstream, e.g. making the software’s build system respect Homebrew’s installation hierarchy. If it’s something that affects both Homebrew and MacPorts (i.e. macOS specific) it should be turned into an upstream submitted patch instead.

If you need modify variables in a `Makefile`, rather than using [`inreplace`][96], pass them as arguments to `make`:

```
system "make", "target", "VAR2=value1", "VAR2=value2", "VAR3=values can have spaces"
```

```
system "make", "CC=#{ENV.cc}", "PREFIX=#{prefix}"
```

Note that values *can* contain unescaped spaces if you use the multiple-argument form of `system`.

## [][97]Patches

While [`patch`][98]es should generally be avoided, sometimes they are temporarily necessary.

When [`patch`][99]ing (i.e. fixing header file inclusion, fixing compiler warnings, etc.) the first thing to do is check whether or not the upstream project is aware of the issue. If not, file a bug report and/or submit your patch for inclusion. We may sometimes still accept your patch before it was submitted upstream but by getting the ball rolling on fixing the upstream issue you reduce the length of time we have to carry the patch around.

*Always justify a [`patch`][100] with a code comment!* Otherwise, nobody will know when it is safe to remove the patch, or safe to leave it in when updating the formula. The comment should include a link to the relevant upstream issue(s).

External [`patch`][101]es can be declared using resource-style blocks:

```
patch do
  url "https://example.com/example_patch.diff"
  sha256 "85cc828a96735bdafcf29eb6291ca91bac846579bcef7308536e0c875d6c81d7"
end
```

A strip level of `-p1` is assumed. It can be overridden using a symbol argument:

```
patch :p0 do
  url "https://example.com/example_patch.diff"
  sha256 "85cc828a96735bdafcf29eb6291ca91bac846579bcef7308536e0c875d6c81d7"
end
```

[`patch`][102]es can be declared in [`stable`][103] and [`head`][104] blocks. Always use a block instead of a conditional, i.e. `stable do ... end` instead of `if build.stable? then ... end`.

```
stable do
  # some other things...

  patch do
    url "https://example.com/example_patch.diff"
    sha256 "85cc828a96735bdafcf29eb6291ca91bac846579bcef7308536e0c875d6c81d7"
  end
end
```

Embedded (__END__) patches can be declared like so:

```
patch :DATA
patch :p0, :DATA
```

with the patch data included at the end of the file:

```
__END__
diff --git a/foo/showfigfonts b/foo/showfigfonts
index 643c60b..543379c 100644
--- a/foo/showfigfonts
+++ b/foo/showfigfonts
@@ -14,6 +14,7 @@
…
```

Patches can also be embedded by passing a string. This makes it possible to provide multiple embedded patches while making only some of them conditional.

In embedded patches, the string “HOMEBREW\_PREFIX” is replaced with the value of the constant `HOMEBREW_PREFIX` before the patch is applied.

### [][105]Creating the diff

```
brew install --interactive --git foo
# (make some edits)
git diff | pbcopy
brew edit foo
```

Now just paste into the formula after `__END__`. Instead of `git diff | pbcopy`, for some editors `git diff >> path/to/your/formula/foo.rb` might help you ensure that the patch is not touched, e.g. white space removal, indentation changes, etc.

## [][106]Advanced formula tricks

If anything isn’t clear, you can usually figure it out by `grep`ping the `$(brew --repository homebrew/core)` directory. Please submit a pull request to amend this document if you think it will help!

### [][107]`livecheck` blocks

When `brew livecheck` is unable to identify versions for a formula, we can control its behavior using a `livecheck` block. Here is a simple example to check a page for links containing a filename like `example-1.2.tar.gz`:

```
livecheck do
  url "https://www.example.com/downloads/"
  regex(/href=.*?example[._-]v?(\d+(?:\.\d+)+)\.t/i)
end
```

For `url`/`regex` guidelines and additional `livecheck` block examples, refer to the [`brew livecheck` documentation][108]. For more technical information on the methods used in a `livecheck` block, please refer to the [`Livecheck` class documentation][109].

### [][110]Unstable versions (`head`)

Formulae can specify an alternate download for the upstream project’s [`head`][111] (`master`/`trunk`).

#### [][112]`head`

[`head`][113] URLs (activated by passing `--HEAD`) build the development cutting edge. Specifying it is easy:

```
class Foo < Formula
  head "https://github.com/mxcl/lastfm-cocoa.git"
end
```

Homebrew understands `git`, `svn`, and `hg` URLs, and has a way to specify `cvs` repositories as a URL as well. You can test whether the [`head`][114] is being built with `build.head?`.

To use a specific commit, tag, or branch from a repository, specify [`head`][115] with the `:tag` and `:revision`, `:revision`, or `:branch` option, like so:

```
class Foo < Formula
  head "https://github.com/some/package.git", revision: "090930930295adslfknsdfsdaffnasd13"
                                         # or branch: "main" (the default is "master")
                                         # or tag: "1_0_release", revision: "090930930295adslfknsdfsdaffnasd13"
end
```

### [][116]Compiler selection

Sometimes a package fails to build when using a certain compiler. Since recent [Xcode versions][117] no longer include a GCC compiler we cannot simply force the use of GCC. Instead, the correct way to declare this is the [`fails_with`][118] DSL method. A properly constructed [`fails_with`][119] block documents the latest compiler build version known to cause compilation to fail, and the cause of the failure. For example:

```
fails_with :clang do
  build 211
  cause "Miscompilation resulting in segfault on queries"
end
```

`build` takes a Fixnum (an integer; you can find this number in your `brew --config` output). `cause` takes a String, and the use of heredocs is encouraged to improve readability and allow for more comprehensive documentation.

[`fails_with`][120] declarations can be used with any of `:gcc`, `:llvm`, and `:clang`. Homebrew will use this information to select a working compiler (if one is available).

### [][121]Specifying the download strategy explicitly

To use one of Homebrew’s built-in download strategies, specify the `:using =>` flag on a [`url`][122] or [`head`][123]. For example:

```
class Python3 < Formula
  homepage "https://www.python.org/"
  url "https://www.python.org/ftp/python/3.4.3/Python-3.4.3.tar.xz"
  sha256 "b5b3963533768d5fc325a4d7a6bd6f666726002d696f1d399ec06b043ea996b8"
  head "https://hg.python.org/cpython", :using => :hg
```

Homebrew offers anonymous download strategies.

`:using` value

download strategy

`:bzr`

`BazaarDownloadStrategy`

`:curl`

`CurlDownloadStrategy`

`:cvs`

`CVSDownloadStrategy`

`:fossil`

`FossilDownloadStrategy`

`:git`

`GitDownloadStrategy`

`:hg`

`MercurialDownloadStrategy`

`:nounzip`

`NoUnzipCurlDownloadStrategy`

`:post`

`CurlPostDownloadStrategy`

`:svn`

`SubversionDownloadStrategy`

If you need more control over the way files are downloaded and staged, you can create a custom download strategy and specify it using the [`url`][124] method’s `:using` option:

```
class MyDownloadStrategy < SomeHomebrewDownloadStrategy
  def fetch(timeout: nil, **options)
    opoo "Unhandled options in #{self.class}#fetch: #{options.keys.join(", ")}" unless options.empty?

    # downloads output to `temporary_path`
  end
end

class Foo < Formula
  url "something", :using => MyDownloadStrategy
end
```

### [][125]Just moving some files

When your code in the install function is run, the current working directory is set to the extracted tarball.

So it is easy to just move some files:

```
prefix.install "file1", "file2"
```

Or everything:

```
prefix.install Dir["output/*"]
```

Generally we’d rather you were specific about what files or directories need to be installed rather than installing everything.

#### [][126]Variables for directory locations

Name

Default

Example

__`HOMEBREW_PREFIX`__

`/usr/local`

 

__`prefix`__

`#{HOMEBREW_PREFIX}/Cellar/#{name}/#{version}`

`/usr/local/Cellar/foo/0.1`

__`opt_prefix`__

`#{HOMEBREW_PREFIX}/opt/#{name}`

`/usr/local/opt/foo`

__`bin`__

`#{prefix}/bin`

`/usr/local/Cellar/foo/0.1/bin`

__`doc`__

`#{prefix}/share/doc/foo`

`/usr/local/Cellar/foo/0.1/share/doc/foo`

__`include`__

`#{prefix}/include`

`/usr/local/Cellar/foo/0.1/include`

__`info`__

`#{prefix}/share/info`

`/usr/local/Cellar/foo/0.1/share/info`

__`lib`__

`#{prefix}/lib`

`/usr/local/Cellar/foo/0.1/lib`

__`libexec`__

`#{prefix}/libexec`

`/usr/local/Cellar/foo/0.1/libexec`

__`man`__

`#{prefix}/share/man`

`/usr/local/Cellar/foo/0.1/share/man`

__`man[1-8]`__

`#{prefix}/share/man/man[1-8]`

`/usr/local/Cellar/foo/0.1/share/man/man[1-8]`

__`sbin`__

`#{prefix}/sbin`

`/usr/local/Cellar/foo/0.1/sbin`

__`share`__

`#{prefix}/share`

`/usr/local/Cellar/foo/0.1/share`

__`pkgshare`__

`#{prefix}/share/foo`

`/usr/local/Cellar/foo/0.1/share/foo`

__`etc`__

`#{HOMEBREW_PREFIX}/etc`

`/usr/local/etc`

__`var`__

`#{HOMEBREW_PREFIX}/var`

`/usr/local/var`

__`buildpath`__

A temporary directory somewhere on your system

`/private/tmp/[formula-name]-0q2b/[formula-name]`

These can be used, for instance, in code such as

```
bin.install Dir["output/*"]
```

to move binaries into their correct location into the Cellar, and

to create the directory structure for the manual page location.

To install man pages into specific locations, use `man1.install "foo.1", "bar.1"`, `man2.install "foo.2"`, etc.

Note that in the context of Homebrew, [`libexec`][127] is reserved for private use by the formula and therefore is not symlinked into `HOMEBREW_PREFIX`.

### [][128]Adding optional steps

__Note:__ [`option`][129]s are not allowed in Homebrew/homebrew-core as they are not tested by CI.

If you want to add an [`option`][130]:

```
class Yourformula < Formula
  ...
  option "with-ham", "Description of the option"
  option "without-spam", "Another description"

  depends_on "foo" => :optional  # will automatically add a with-foo option
  ...
```

And then to define the effects the [`option`][131]s have:

```
if build.with? "ham"
  # note, no "with" in the option name (it is added by the build.with? method)
end

if build.without? "ham"
  # works as you'd expect. True if `--without-ham` was given.
end
```

[`option`][132] names should be prefixed with the words `with` or `without`. For example, an option to run a test suite should be named `--with-test` or `--with-check` rather than `--test`, and an option to enable a shared library `--with-shared` rather than `--shared` or `--enable-shared`.

[`option`][133]s that aren’t `build.with?` or `build.without?` should be deprecated with [`deprecated_option`][134]. See [`wget`][135] for an example.

### [][136]File level operations

You can use the file utilities provided by Ruby’s [`FileUtils`][137]. These are included in the [`Formula`][138] class, so you do not need the `FileUtils.` prefix to use them.

When creating symlinks, take special care to ensure they are *relative* symlinks. This makes it easier to create a relocatable bottle. For example, to create a symlink in `bin` to an executable in `libexec`, use

```
bin.install_symlink libexec/"name"
```

instead of:

The symlinks created by [`install_symlink`][139] are guaranteed to be relative. `ln_s` will only produce a relative symlink when given a relative path.

### [][140]Rewriting a script shebang

Some formulae install executable scripts written in an interpreted language such as Python or Perl. Homebrew provides a `rewrite_shebang` method to rewrite the shebang of a script. This replaces a script’s original interpreter path with the one the formula depends on. This guarantees that the correct interpreter is used at execution time. This isn’t required if the build system already handles it (e.g. often with `pip` or Perl `ExtUtils::MakeMaker`).

For example, the [`icdiff` formula][141] uses such utility. Note that it is necessary to include the utility in the formula, for example with Python one must use `include Language::Python::Shebang`.

### [][142]Handling files that should persist over formula upgrades

For example, Ruby 1.9’s gems should be installed to `var/lib/ruby/` so that gems don’t need to be reinstalled when upgrading Ruby. You can usually do this with symlink trickery, or (ideally) a configure option.

Another example would be configuration files that should not be overwritten on package upgrades. If after installation you find that to-be-persisted configuration files are not copied but instead *symlinked* into `/usr/local/etc/` from the Cellar, this can often be rectified by passing an appropriate argument to the package’s configure script. That argument will vary depending on a given package’s configure script and/or Makefile, but one example might be: `--sysconfdir=#{etc}`

### [][143]launchd plist files

Homebrew provides two formula DSL methods for launchd plist files:

-   [`plist_name`][144] will return e.g. `homebrew.mxcl.<formula>`
-   [`plist_path`][145] will return e.g. `/usr/local/Cellar/foo/0.1/homebrew.mxcl.foo.plist`

There is two ways to add plists to a formula, so that [`brew services`][146] can pick it up:

1.  If the formula already provides a plist file the formula can install it into the prefix like so.

```
prefix.install_symlink "file.plist" => "#{plist_name}.plist"
```

1.  If the formula does not provide a plist you can add a plist using the following stanzas. This will define what the user can run manually instead of the launchd service.
    
    ```
      plist_options manual: "#{HOMEBREW_PREFIX}/var/some/bin/stuff run"
    ```
    

This provides the actual plist file, see [Apple’s plist(5) man page][147] for more information.

```
  def plist
    <<~EOS
      <?xml version="1.0" encoding="UTF-8"?>
      <!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">
      <plist version="1.0">
        <dict>
          <key>Label</key>
          <string>#{plist_name}</string>
          <key>ProgramArguments</key>
          <array>
            <string>#{var}/some/bin/stuff</string>
            <string>run</string>
          </array>
        </dict>
      </plist>
    EOS
  end
```

### [][148]Using environment variables

Homebrew has multiple levels of environment variable filtering which affects variables available to formulae.

Firstly, the overall environment in which Homebrew runs is filtered to avoid environment contamination breaking from-source builds ([https://github.com/Homebrew/brew/issues/932][149]). In particular, this process filters all but the given whitelisted variables, but allows environment variables prefixed with `HOMEBREW_`. The specific implementation can be seen in [`bin/brew`][150].

The second level of filtering removes sensitive environment variables (such as credentials like keys, passwords or tokens) to avoid malicious subprocesses obtaining them ([https://github.com/Homebrew/brew/pull/2524][151]). This has the effect of preventing any such variables from reaching a formula’s Ruby code as they are filtered before it is called. The specific implementation can be seen in the [`ENV.clear_sensitive_environment!` method][152].

You can set environment variables in a formula’s `install` method using `ENV["VARIABLE_NAME"] = "VALUE"`. An example can be seen in [the `gh` formula][153]. Environment variables can also be set temporarily using the `with_env` method; any variables defined in the call to that method will be restored to their original values at the end of the block. An example can be seen in [the `csound` formula][154].

In summary, environment variables used by a formula need to conform to these filtering rules in order to be available.

### [][155]Deprecating and disabling a formula

See our [Deprecating, Disabling, and Removing Formulae][156] documentation for more information about how and when to deprecate or disable a formula.

## [][157]Updating formulae

Eventually a new version of the software will be released. In this case you should update the [`url`][158] and [`sha256`][159]. You can use:

If a [`revision`][160] line exists outside any `bottle do` block it should be removed.

Leave the `bottle do ... end` block as-is; our CI system will update it when we pull your change.

Check if the formula you are updating is a dependency for any other formulae by running `brew uses <formula>`. If it is a dependency, run `brew reinstall` for all the dependencies after it is installed and verify they work correctly.

## [][161]Style guide

Homebrew wants to maintain a consistent Ruby style across all formulae mostly based on [Ruby Style Guide][162]. Other formulae may not have been updated to match this guide yet but all new ones should. Also:

-   The order of methods in a formula should be consistent with other formulae (e.g.: `def install` goes before `def post_install`).
-   An empty line is required before the `__END__` line.

## [][163]Troubleshooting for people writing new formulae

### [][164]Version detection fails

Homebrew tries to automatically determine the [`version`][165] from the [`url`][166] to avoid duplication. If the tarball has an unusual name you may need to manually assign the [`version`][167].

### [][168]Bad makefiles

Not all projects have makefiles that will run in parallel so try to deparallelize by adding these lines to the `install` method:

```
ENV.deparallelize
system "make"  # separate make and make install steps
system "make", "install"
```

If that fixes it, please open an [issue][169] so that we can fix it for everyone.

### [][170]Still won’t work?

Check out what MacPorts and Fink do:

```
brew search --macports foo
brew search --fink foo
```

## [][171]Superenv notes

`superenv` is our “super environment” that isolates builds by removing `/usr/local/bin` and all user `PATH`s that are not essential for the build. It does this because user `PATH`s are often full of stuff that breaks builds. `superenv` also removes bad flags from the commands passed to `clang`/`gcc` and injects others (for example all [`keg_only`][172] dependencies are added to the `-I` and `-L` flags).

## [][173]Fortran

Some software requires a Fortran compiler. This can be declared by adding `depends_on "gcc"` to a formula.

## [][174]MPI

Formula requiring MPI should use [OpenMPI][175] by adding `depends_on "open-mpi"` to the formula, rather than [MPICH][176]. These packages have conflicts and provide the same standardised interfaces. Choosing a default implementation and requiring it to be adopted allows software to link against multiple libraries that rely on MPI without creating un-anticipated incompatibilities due to differing MPI runtimes.

## [][177]Linear algebra libraries

By default packages that require BLAS/LAPACK linear algebra interfaces should link to [OpenBLAS][178] using `depends_on "openblas"` and passing `-DBLA_VENDOR=OpenBLAS` to CMake (applies to CMake based formula only) rather than Apple’s Accelerate framework, or the default reference lapack implementation. Apple’s implementation of BLAS/LAPACK is outdated and may introduce hard-to-debug problems. The reference `lapack` formula is fine, although it is not actively maintained or tuned. For this reason, formulae needing BLAS/LAPACK should link with OpenBLAS.

## [][179]How to start over (reset to upstream `master`)

Have you created a real mess in Git which stops you from creating a commit you want to submit to us? You might want to consider starting again from scratch. Your changes can be reset to the Homebrew `master` branch by running:

```
git checkout -f master
git reset --hard origin/master
```

[1]: https://rubydoc.brew.sh/Formula
[2]: https://docs.brew.sh/Formula-Cookbook#homebrew-terminology
[3]: https://github.com/Homebrew/homebrew-core/blob/HEAD/Formula/openjdk.rb
[4]: https://github.com/Homebrew/homebrew-cask
[5]: https://github.com/Homebrew/homebrew-bundle
[6]: https://docs.brew.sh/Formula-Cookbook#an-introduction
[7]: https://github.com/Homebrew/homebrew-core/blob/HEAD/Formula/etl.rb
[8]: https://github.com/Homebrew/homebrew-core/blob/HEAD/Formula/git.rb
[9]: https://docs.brew.sh/Formula-Cookbook#basic-instructions
[10]: https://docs.brew.sh/Acceptable-Formulae
[11]: https://github.com/Homebrew/homebrew-core/pulls
[12]: https://github.com/Homebrew/brew/blob/HEAD/CONTRIBUTING.md#contributing-to-homebrew
[13]: https://docs.brew.sh/Formula-Cookbook#grab-the-url
[14]: https://rubydoc.brew.sh/Formula#version-class_method
[15]: https://docs.brew.sh/Formula-Cookbook#fill-in-the-homepage
[16]: https://rubydoc.brew.sh/Formula#homepage%3D-class_method
[17]: https://rubydoc.brew.sh/Formula#homepage%3D-class_method
[18]: https://rubydoc.brew.sh/Formula#homepage%3D-class_method
[19]: https://rubydoc.brew.sh/Formula#desc%3D-class_method
[20]: https://rubydoc.brew.sh/Formula#desc%3D-class_method
[21]: https://docs.brew.sh/Formula-Cookbook#fill-in-the-license
[22]: https://rubydoc.brew.sh/Formula#license-class_method
[23]: https://wiki.debian.org/DFSGLicenses
[24]: https://wiki.debian.org/DFSGLicenses#Public_Domain
[25]: https://spdx.org/licenses/
[26]: https://docs.brew.sh/License-Guidelines
[27]: https://docs.brew.sh/Formula-Cookbook#check-the-build-system
[28]: https://docs.brew.sh/Formula-Cookbook#check-for-dependencies
[29]: https://rubydoc.brew.sh/Formula#keg_only-class_method
[30]: https://github.com/Homebrew/homebrew-core/blob/89c4574ef1a6d15e92196637ff315a0a4bb3e289/Formula/clamav.rb#L37
[31]: https://github.com/Homebrew/brew/blob/HEAD/Library/Homebrew/extend/ENV/super.rb
[32]: https://rubydoc.brew.sh/Formula#keg_only-class_method
[33]: https://rubydoc.brew.sh/Requirement
[34]: https://docs.brew.sh/Formula-Cookbook#specifying-other-formulae-as-dependencies
[35]: https://rubydoc.brew.sh/Requirement
[36]: https://rubydoc.brew.sh/Requirement
[37]: https://docs.brew.sh/Formula-Cookbook#specifying-conflicts-with-other-formulae
[38]: https://rubydoc.brew.sh/Formula#keg_only-class_method
[39]: https://github.com/Homebrew/homebrew-core/blob/HEAD/Formula/mbedtls.rb
[40]: https://github.com/Homebrew/homebrew-core/blob/HEAD/Formula/hello.rb
[41]: https://github.com/Homebrew/homebrew-core/blob/966273060ad507fea490bd931971963de8b1a1dc/Formula/mbedtls.rb#L30-L31
[42]: https://github.com/Homebrew/homebrew-core/blob/HEAD/Formula/pdftohtml.rb
[43]: https://rubydoc.brew.sh/Formula#conflicts_with-class_method
[44]: https://rubydoc.brew.sh/Formula#conflicts_with-class_method
[45]: https://docs.brew.sh/Formula-Cookbook#formulae-revisions
[46]: https://rubydoc.brew.sh/Formula#revision%3D-class_method
[47]: https://rubydoc.brew.sh/Formula#homepage%3D-class_method
[48]: https://rubydoc.brew.sh/Formula#url-class_method
[49]: https://rubydoc.brew.sh/Formula#sha256%3D-class_method
[50]: https://rubydoc.brew.sh/Formula#revision%3D-class_method
[51]: https://github.com/Homebrew/legacy-homebrew/issues/31195
[52]: https://github.com/Homebrew/legacy-homebrew/pull/31207
[53]: https://rubydoc.brew.sh/Formula#revision%3D-class_method
[54]: https://github.com/Homebrew/homebrew-core/commit/0d4453a91923e6118983961e18d0609e9828a1a4
[55]: https://docs.brew.sh/Formula-Cookbook#version-scheme-changes
[56]: https://rubydoc.brew.sh/Formula#version_scheme%3D-class_method
[57]: https://github.com/Homebrew/homebrew-core/pull/4006
[58]: https://docs.brew.sh/Formula-Cookbook#double-check-for-dependencies
[59]: https://docs.brew.sh/Formula-Cookbook#specifying-gems-python-modules-go-projects-etc-as-dependencies
[60]: https://rubydoc.brew.sh/Formula#resource-class_method
[61]: https://github.com/Homebrew/homebrew-core/blob/HEAD/Formula/jrnl.rb
[62]: https://rubydoc.brew.sh/Formula#resource-class_method
[63]: https://github.com/tdsmith/homebrew-pypi-poet
[64]: https://docs.brew.sh/Formula-Cookbook#install-the-formula
[65]: https://docs.brew.sh/Formula-Cookbook#add-a-test-to-the-formula
[66]: https://rubydoc.brew.sh/Formula#test-class_method
[67]: https://docs.brew.sh/Brew-Test-Bot
[68]: https://rubydoc.brew.sh/Formula#test-class_method
[69]: https://rubydoc.brew.sh/Pathname
[70]: https://rubydoc.brew.sh/Formula#testpath-instance_method
[71]: https://rubydoc.brew.sh/Formula#testpath-instance_method
[72]: https://rubydoc.brew.sh/Formula#test-class_method
[73]: https://github.com/Homebrew/homebrew-core/blob/HEAD/Formula/cmake.rb
[74]: https://rubydoc.brew.sh/Homebrew/Assertions.html
[75]: https://github.com/Homebrew/homebrew-core/blob/HEAD/Formula/envv.rb
[76]: https://github.com/Homebrew/homebrew-core/blob/HEAD/Formula/tinyxml2.rb
[77]: https://github.com/Homebrew/brew/tree/master/Library/Homebrew/test/support/fixtures
[78]: https://docs.brew.sh/Formula-Cookbook#manuals
[79]: https://docs.brew.sh/Formula-Cookbook#caveats
[80]: https://docs.brew.sh/Formula-Cookbook#a-quick-word-on-naming
[81]: https://www.debian.org/distrib/packages
[82]: https://github.com/Homebrew/homebrew-core/blob/HEAD/Formula/aescrypt.rb
[83]: https://github.com/Homebrew/homebrew-core/blob/HEAD/Formula/aescrypt-packetizer.rb
[84]: https://docs.brew.sh/Formula-Cookbook#audit-the-formula
[85]: https://rubydoc.brew.sh/Formula#version-class_method
[86]: https://docs.brew.sh/Formula-Cookbook#commit
[87]: https://tbaggery.com/2008/04/19/a-note-about-git-commit-messages.html
[88]: https://docs.brew.sh/Formula-Cookbook#push
[89]: https://github.com/Homebrew/homebrew-core
[90]: https://docs.brew.sh/How-To-Open-a-Homebrew-Pull-Request
[91]: https://docs.brew.sh/Formula-Cookbook#messaging
[92]: https://docs.brew.sh/Formula-Cookbook#bininstall-foo
[93]: https://docs.brew.sh/Formula-Cookbook#inreplace
[94]: https://rubydoc.brew.sh/Utils/Inreplace
[95]: https://rubydoc.brew.sh/Utils/Inreplace
[96]: https://rubydoc.brew.sh/Utils/Inreplace
[97]: https://docs.brew.sh/Formula-Cookbook#patches
[98]: https://rubydoc.brew.sh/Formula#patch-class_method
[99]: https://rubydoc.brew.sh/Formula#patch-class_method
[100]: https://rubydoc.brew.sh/Formula#patch-class_method
[101]: https://rubydoc.brew.sh/Formula#patch-class_method
[102]: https://rubydoc.brew.sh/Formula#patch-class_method
[103]: https://rubydoc.brew.sh/Formula#stable-class_method
[104]: https://rubydoc.brew.sh/Formula#head-class_method
[105]: https://docs.brew.sh/Formula-Cookbook#creating-the-diff
[106]: https://docs.brew.sh/Formula-Cookbook#advanced-formula-tricks
[107]: https://docs.brew.sh/Formula-Cookbook#livecheck-blocks
[108]: https://docs.brew.sh/Brew-Livecheck
[109]: https://rubydoc.brew.sh/Livecheck.html
[110]: https://docs.brew.sh/Formula-Cookbook#unstable-versions-head
[111]: https://rubydoc.brew.sh/Formula#head-class_method
[112]: https://docs.brew.sh/Formula-Cookbook#head
[113]: https://rubydoc.brew.sh/Formula#head-class_method
[114]: https://rubydoc.brew.sh/Formula#head-class_method
[115]: https://rubydoc.brew.sh/Formula#head-class_method
[116]: https://docs.brew.sh/Formula-Cookbook#compiler-selection
[117]: https://docs.brew.sh/Xcode
[118]: https://rubydoc.brew.sh/Formula#fails_with-class_method
[119]: https://rubydoc.brew.sh/Formula#fails_with-class_method
[120]: https://rubydoc.brew.sh/Formula#fails_with-class_method
[121]: https://docs.brew.sh/Formula-Cookbook#specifying-the-download-strategy-explicitly
[122]: https://rubydoc.brew.sh/Formula#url-class_method
[123]: https://rubydoc.brew.sh/Formula#head-class_method
[124]: https://rubydoc.brew.sh/Formula#url-class_method
[125]: https://docs.brew.sh/Formula-Cookbook#just-moving-some-files
[126]: https://docs.brew.sh/Formula-Cookbook#variables-for-directory-locations
[127]: https://rubydoc.brew.sh/Formula#libexec-instance_method
[128]: https://docs.brew.sh/Formula-Cookbook#adding-optional-steps
[129]: https://rubydoc.brew.sh/Formula#option-class_method
[130]: https://rubydoc.brew.sh/Formula#option-class_method
[131]: https://rubydoc.brew.sh/Formula#option-class_method
[132]: https://rubydoc.brew.sh/Formula#option-class_method
[133]: https://rubydoc.brew.sh/Formula#option-class_method
[134]: https://rubydoc.brew.sh/Formula#deprecated_option-class_method
[135]: https://github.com/Homebrew/homebrew-core/blob/3f762b63c6fbbd49191ffdf58574d7e18937d93f/Formula/wget.rb#L27-L31
[136]: https://docs.brew.sh/Formula-Cookbook#file-level-operations
[137]: https://www.ruby-doc.org/stdlib/libdoc/fileutils/rdoc/index.html
[138]: https://rubydoc.brew.sh/Formula
[139]: https://rubydoc.brew.sh/Pathname#install_symlink-instance_method
[140]: https://docs.brew.sh/Formula-Cookbook#rewriting-a-script-shebang
[141]: https://github.com/Homebrew/homebrew-core/blob/7beae5ab57c65249403699b2b0700fbccf14e6cb/Formula/icdiff.rb#L16
[142]: https://docs.brew.sh/Formula-Cookbook#handling-files-that-should-persist-over-formula-upgrades
[143]: https://docs.brew.sh/Formula-Cookbook#launchd-plist-files
[144]: https://rubydoc.brew.sh/Formula#plist_name-instance_method
[145]: https://rubydoc.brew.sh/Formula#plist_path-instance_method
[146]: https://github.com/Homebrew/homebrew-services
[147]: https://www.unix.com/man-page/mojave/5/plist/
[148]: https://docs.brew.sh/Formula-Cookbook#using-environment-variables
[149]: https://github.com/Homebrew/brew/issues/932
[150]: https://github.com/Homebrew/brew/blob/HEAD/bin/brew
[151]: https://github.com/Homebrew/brew/pull/2524
[152]: https://github.com/Homebrew/brew/blob/HEAD/Library/Homebrew/extend/ENV.rb
[153]: https://github.com/Homebrew/homebrew-core/blob/fd9ad29f8e3ca9476f838ebb13794ddb7dafba00/Formula/gh.rb#L22
[154]: https://github.com/Homebrew/homebrew-core/blob/c3feaff8cdb578331385676620c865796cfc3388/Formula/csound.rb#L155-L157
[155]: https://docs.brew.sh/Formula-Cookbook#deprecating-and-disabling-a-formula
[156]: https://docs.brew.sh/Deprecating-Disabling-and-Removing-Formulae
[157]: https://docs.brew.sh/Formula-Cookbook#updating-formulae
[158]: https://rubydoc.brew.sh/Formula#url-class_method
[159]: https://rubydoc.brew.sh/Formula#sha256%3D-class_method
[160]: https://rubydoc.brew.sh/Formula#revision%3D-class_method
[161]: https://docs.brew.sh/Formula-Cookbook#style-guide
[162]: https://github.com/rubocop-hq/ruby-style-guide#the-ruby-style-guide
[163]: https://docs.brew.sh/Formula-Cookbook#troubleshooting-for-people-writing-new-formulae
[164]: https://docs.brew.sh/Formula-Cookbook#version-detection-fails
[165]: https://rubydoc.brew.sh/Formula#version-class_method
[166]: https://rubydoc.brew.sh/Formula#url-class_method
[167]: https://rubydoc.brew.sh/Formula#version-class_method
[168]: https://docs.brew.sh/Formula-Cookbook#bad-makefiles
[169]: https://github.com/Homebrew/homebrew-core/issues
[170]: https://docs.brew.sh/Formula-Cookbook#still-wont-work
[171]: https://docs.brew.sh/Formula-Cookbook#superenv-notes
[172]: https://rubydoc.brew.sh/Formula#keg_only-class_method
[173]: https://docs.brew.sh/Formula-Cookbook#fortran
[174]: https://docs.brew.sh/Formula-Cookbook#mpi
[175]: https://www.open-mpi.org/
[176]: https://www.mpich.org/
[177]: https://docs.brew.sh/Formula-Cookbook#linear-algebra-libraries
[178]: https://www.openblas.net/
[179]: https://docs.brew.sh/Formula-Cookbook#how-to-start-over-reset-to-upstream-master
