# Keyboard ghosting

https://web.archive.org/web/20160628083040/http://www.microsoft.com/appliedsciences/AntiGhostingExplained.mspx

**Ghosting** is the name for the situation when some keys are not registered when multiple keys are pressed simultaneously - the key presses that were not registered are said to have been *ghosted*.

On most keyboards, even some that are explicitly marketed as *anti-ghosting*, this happens with many 3-key-combinations. Imagine playing a game and not being able to run diagonally (e.g. W and A keys) and fire simultaneously (e.g. G key), i.e. pressing A, W and G keys at the same fails to register all key presses.

Hand at heart, the key combos that are frequently used for gaming probably support such simultaneous key presses, even though some other key combinations may fail still. This is a result of the internal design of most existing keyboards.

When a keyboard is marketed as *Anti-Ghosting* it may just refer to a particular subset of keys on the keyboard working well together. This does not necessarily guarantee that members of this set of keys avoid ghosting when combined with other keys on the keyboard.

Another marketing strategy is to state that the keyboard allows *up to* `n` key presses. This would be a true statement about a keyboard even if only a single combination of `n` keys can be pressed together, while many 3-key combinations remain affected by ghosting.

Unlike *partial anti-ghosting* solutions which have many combinations of 3 keys which do not work, `Microsoft's SideWinder X4` features multitouch technology that allows it to detect and report any combination of `17` or fewer QWERTY keys. Additionally, it can report 7 modifier keys, 1 hot key and 1 macro key, bringing the maximum number of reported keys to 26.

## Technicalities

Typically, ghosting is the result of one or more of following 3 limitations:
- hardware can't read the given key combination
- software doesn't support multiple simultaneous keys
- communication protocol between the hardware and software limits the maximum number of simultaneous keys reported.

Most keyboards are made of a stack of plastic sheets printed with silver ink in a grid of column and row wires, initially unconnected, underneath the keys. A key press can then be detected as a connection made between a particular pair of column and row wires from the pressure of the key above it.

>Pressing a key shortens the column and row wires.

Typically, when the keyboard looks to see what key is pressed, it looks at each column wire, one at a time, and sees which row wires are shorted (connected) to it. When only one key is pressed, there will be exactly one column wire which when examined will have any row wires shorted, and then, exactly one row wire. This pattern uniquely identifies which key was pressed; there is only one contact point that could cause such a result.

─┼──┼──┼──┼──┼─
─┼──o──┼──┼──┼─
─┼──┼──┼──┼──┼─

When two keys are pressed simultaneously, again, the keyboard will look at each column wire to see which row wires are connected to it. When the rows and columns are both different between the two keys, there will be two column wires that each produce one row wire short, and those row wires will not be the same. This can only happen with one set of key presses, so the keyboard can report exactly which keys are down.

─┼──┼──┼──┼──┼─
─┼──┼──o──┼──┼─
─┼──┼──┼──┼──┼─
─┼──┼──┼──o──┼─
─┼──┼──┼──┼──┼─

When the two key presses share a column, the key presses can again be determined with certainty. A test pass for shorts will show only one column wire being connected to any row wires, and that wire will be connected to exactly two rows.

─┼──┼──┼──┼──┼─
─┼──o──┼──┼──┼─
─┼──┼──┼──┼──┼─
─┼──o──┼──┼──┼─
─┼──┼──┼──┼──┼─

Similarly, when the two keys share a row, the pattern will be that each of two column will show a single row connection, and both will be the same row.

─┼──┼──┼──┼──┼─
─┼──o──┼──o──┼─
─┼──┼──┼──┼──┼─
─┼──┼──┼──┼──┼─
─┼──┼──┼──┼──┼─

This, too, can only happen for one set of depressed keys for a given pattern of shorts. Collinear simultaneous key patterns are distinct.

>Any set of collinear contacts can be uniquely determined.

However, when 3 keys are pressed, it is not necessarily true that the keys producing the pattern of shorts can be uniquely determined.

For instance, when the 3 keys share both a row and a column, there are 5 different sets of keys that each would produce the same pattern of shorts: the same two columns each connected to the same two rows.

   c1    c3
    ↓     ↓
─┼──┼──┼──┼──┼─
─┼──o──┼──?──┼─ ← r1
─┼──┼──┼──┼──┼─
─┼──o──┼──o──┼─ ← r3
─┼──┼──┼──┼──┼─

Notice that in the above example, the connected column on the right (`c2`) is shorted to the upper of the two connected rows (`r1`), by way of all 3 contacts; in fact, the circuit includes a blank of the connected column wire on the left.

The 5 different sets of key presses that produce the same pattern of shorts as illustrated above are illustrated below.

    ↓  ↓  ↓  ↓  ↓
─┼──┼──┼──┼──┼──┼──┼─
─┼──┼──┼──┼──┼──┼──┼─
─┼──┼──┼──┼──┼──┼──┼─
─┼──o──o──o──o──o──┼─ ←
─┼──┼──┼──┼──┼──┼──┼─


Recall that the typical keyboard just checks if a column is connected to a row, and the number of contacts it must travel through are not aggragated, so they become "more connected" as more connections are added.

The keyboard just sees the presence or absence of a connection, making the above patterns indistinguishable. When an ambiguous pattern occurs, the typical keyboard stops reporting new key presses to avoid reporting the wrong keys. Such unreported key presses are said to be "ghosted".

Not all sets of simultaneous key presses larger than 2 are ambiguous (e.g. collinear key presses are not). Usually, keyboards will report as many unambiguous keys as they can.

However, *the standard reporting protocol* limits the number of simultaneous keys to *6 QWERTY keys* plus the modifiers (e.g. shift, control, alt).

This limitation of only registering 6 QWERTY keys plus 4 modifiers at any one time is a constraint on part of the **USB protocol**. The older PS2 connectors had the full n-rollover support. Whether the keyboard itself supports such n-rollovers is another matter. This issue is now solved now - you can finally play piano using keyboard!

Some anti-ghosting keyboards are able to report additional keys beyond this either by using a custom reporting protocol designed with an increased limit or by sending additional reports for combinations of large numbers of keys.

However, both of these solutions pose problems. The use of a custom protocol may not function properly prior to loading the operating system, such as when the computer is booting or when an operating system is being installed ⟨so you cannot play games while booting?!⟩ A keyboard like this may require switching between protocols to support states when the custom protocol can't be used.

In contrast, sending multiple reports allows the keyboard to remain usable when the computer is in these states. However, because, the computer's keyboard software was not designed to be used in this manner, there is a potential for unexpected behavior by the software receiving the multiple reports instead of a single report when large numbers of simultaneous keys are pressed.

An easy change that keyboard makers utilize is to rearrange the wires such that important key combinations don't exhibit this problem. However, all this does is move the problems to other sets of keys, where the user is less likely to notice.

Another possibility is to add extra wires to create more unambiguous cases. However, this is more expensive as more circuitry is needed to read the extra wires.

At the extreme, keyboards have been made with a *diode* at every key so that each key can be detected individually. As we discussed above, when only pressing 3 keys in certain configurations, a 4th key would appear to also be pressed because a circuit would be completed 'traveling backwards' along the normal routes established by each of the 3 contacts. Diodes prevent this kind of a circuit from forming because diodes conduct current in only one direction. However, because this requires printing a circuit board with as much diodes as there are keys, it is expensive.

In contrast, Microsoft's *advanced anti-ghosting technology* leverages *multi-touch technology* to prevent key ghosting. In addition, by using standard manufacturing techniques and avoiding diodes and large printed circuit boards, this technology remains inexpensive to produce, making it an interesting alternative to other currently available options.
