# Microsoft keyboard Layout Creator

**Microsoft keyboard Layout Creator (MSKLC)** is a utility for remapping the keyboard under Windows. The latest version is 1.4, released for Windows 8 (at least, probably earlier), but nevertheless it works fine with the subsequent Windows OSs(checked with Windows 8, and various builds of Windows 10).

## Modifier Keys

All keyboards have modifier keys which are used to alter the behaviour of other keys. The most common modifiers on modern keyboards usually include:
- Shift: LeftShift, RightShift
- Ctrl:  LeftCtrl, RightCtrl
- Alt (aka Meta key): LeftAlt, RightAlt. RightAlt may be in fact AltGr
- ESC (often acts as Meta key esp. on Linux)
- Super (Windows): LeftSuper, RightSuper
- AppKey (MenuKey, ContextMenu key)
- Fn: modifes Function keys
- CAPSLock key: toggle the shift mode
- NumPad key: toggle the numpad mode

NOTE:
- All keyboards use the Shift key
- All keyboards use Ctrl key to generate ASCII control characters
- All keyboards with a *number pad (numpad)* use [Alt] and the [NumPad] to generate characters by number.
- Keyboards using [AltGr] as a Modifier Key usually translate the *Virtual ScanCode* to *Virtual Keys* `VK_CTRL + VK_ALT` at input time: Modifier tables should be written to treat [Ctrl+Alt] as a valid shifter key combination in these cases.

By holding down 0 or more of these Modifier keys, a *shift state* is obtained: the shift state may affect the translation of *Virtual Scancodes* to *Virtual Keys* and/or the translation of *Virtuals Key* to *Characters*.

Examples:

Each key on a particular keyboard may be marked with up to 5 different characters in 5 different positions:

```
              ┌───────┐
            / │ 2   4 │\
           │  │       │ │
           │  │       │ │
           │  │       │ │
           │  │ 1   3 │ │
           │  └───────┘ │
           │ /        \ │
           │/  5       \│
           └────────────┘
```

A key may also be able to generate a character that is not marked on it, like the *ASCII Control chars*, lower-case letters or *invisible keys*.

```
                                                .-------.
An example of an "Invisible Key"               /|       |\
                                              | | >     | |
The German M24 keyboard 2 should produce      | |       | |
the pipe character when ALT SHIFT is held     | |       | |
while the '<' key (shown here) is pressed.    | | <   \ | |
This keyboard has 4 other invisible chars.    | |_______| |
France, Italy and Spain also support          | /       \ |
invisible characters on M24 Keyboard 2        |/         \|
with ALT SHIFT depressed.                     `-----------'
```

The keyboard table must list the keys that contribute to its shift state, and indicate which combinations are valid.

This is done with
- `aCharModifiers[]`which converts combinations of Modifier Keys to Bitmasks.
- `aModification[]` which converts Modifier Bitmasks to enumerated Modifications

An example of valid and invalid modifier key combinations

The US English keyboard has 3 Modifier keys:
- Shift (left or right)
- Ctrl (left or right)
- Alt (left or right)

The only valid combinations of these Modifier Keys are:
- none pressed : Character at position (1) on the key is printed
- Shift        : Character at position (2) on the key is printed
- Ctrl         : ASCII Control characters
- Shift + Ctrl : ASCII Control characters
- Alt          : Character-by-number on the numpad (Alt+2014)

Some examples
- Alt+48  prints 0 (ASCII 0x30)
- Alt+57  prints 9 (ASCII 0x39)
- Alt+65  prints A (ASCII 0x41)
- Alt+97  prints a (ASCII 0x61)
- Alt+126 prints ~ (ASCII 0x7e)


The invalid combinations (that do not generate any characters) are:
- Shift + Alt
- Alt + Ctrl
- Shift + Alt + Ctrl

   Modifier keys               Character produced
0  No shifter key depressed    position 1
1  Shift key is depressed      position 2
2  AltGr (r.h. Alt) depressed  position 4 or 5 (whichever is marked)


However, note that 3 shifter keys (SHIFT, can be combined in a characters, depending on the Keyboards). Consider the following keyboards:

```
  .-------.            STRANGE KBD         PECULIAR KBD
 /|       |\           ==================  ==================
: | 2   4 | :    1   -
| |       | |    2   - SHIFT               SHIFT
| |       | |    3   - MENU                MENU
| | 1   3 | |    4   - SHIFT + MENU        SHIFT + MENU
| |_______| |    5   -    no such keys     CTRL  + MENU
| /       \ |
|/    5    \|
`-----------'
```

Both STRANGE and PECULIAR keyboards could have `aVkToBits[]` =

```cpp
{ VK_SHIFT  , KBDSHIFT }, // 0x01
{ VK_CONTROL, KBDCTRL  }, // 0x02
{ VK_MENU   , KBDALT   }, // 0x04
{ 0,          0        }
```

The STRANGE keyboard has 4 distinct shift states, while the PECULIAR kbd has 5. 

However, note that 3 shifter bits can be combined in a total of 2^3 == 8 ways. 

Each such combination must be related to one (or none) of the enumerated shift states.

Each shifter key combination can be represented by 3 binary bits:
- Bit 0  is set if VK_SHIFT   is down
- Bit 1  is set if VK_CONTROL is down
- Bit 2  is set if VK_MENU    is down

Example: If the STRANGE keyboard generates no characters in combination when just the ALT key is held down, nor when the SHIFT, CTRL and ALT keys are all held down, then the tables might look like this:

```cpp
                               VK_MENU,
                       VK_CTRL,                    0
   };
   aModification[] = {
       0,            //   0       0       0     = 000  <none>
       1,            //   0       0       1     = 001  SHIFT
       SHFT_INVALID, //   0       1       0     = 010  ALT
       2,            //   0       1       1     = 011  SHIFT ALT
       3,            //   1       0       0     = 100  CTRL
       4,            //   1       0       1     = 101  SHIFT CTRL
       5,            //   1       1       0     = 110  CTRL ALT
       SHFT_INVALID  //   1       1       1     = 111  SHIFT CTRL ALT
   };
```


- `VK_TO_BIT` associate a Virtual Key with a Modifier bitmask
- `Vk`        the Virtual key (eg: VK_SHIFT, VK_RMENU, VK_CONTROL etc.)
- Special Values: 0 null terminator
- `ModBits` a combination of KBDALT, KBDCTRL, KBDSHIFT and kbd-specific bits.
            Any kbd-specific shift bits must be the lowest-order bits other 
            than KBDSHIFT, KBDCTRL and KBDALT (0, 1 & 2)

Those languages that use `AltGr` (VK_RMENU) to shift keys convert it to CTRL+ALT with the KBDSPECIAL bit in the `ausVK[]` entry for VK_RMENU and by having an entry in `aVkToPfnOem[]` to simulate the right Vk sequence.


## Ref

https://forum.colemak.com/topic/870-hacked-msklc-to-enable-remapping-capslock/p2/
https://web.archive.org/web/20160305231344/http://tinkerwithabandon.com/twa/keyboarding.html
https://archives.miloush.net/michkap/archive/index.html
https://archives.miloush.net/michkap/archive/2006/03/08/546197.html
https://archives.miloush.net/michkap/archive/2006/03/07/545115.html
https://archives.miloush.net/michkap/archive/2008/10/23/9013000.html
https://archives.miloush.net/michkap/archive/2010/11/03/10085336.html
https://archives.miloush.net/michkap/archive/2011/03/24/10145161.html
https://archives.miloush.net/michkap/archive/2006/09/13/752377.html
https://archives.miloush.net/michkap/archive/2015/08/07/8770668856267196989.html
https://archives.miloush.net/michkap/archive/2015/07/20/8770668856267196753.html
https://archives.miloush.net/michkap/archive/2015/07/03/8770668856267196631.html
https://archives.miloush.net/michkap/archive/2015/07/14/8770668856267196729.html
https://archives.miloush.net/michkap/archive/2015/06/04/8770668856267196459.html
https://archives.miloush.net/michkap/archive/2004/12/22/329657.html
https://archives.miloush.net/michkap/archive/2004/12/28/333168.html
https://forum.colemak.com/search/
