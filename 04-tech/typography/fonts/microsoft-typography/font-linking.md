# Font linking

(Article no longer in MS Docs)

https://community.notepad-plus-plus.org/topic/23216/new-shortcuts-of-document-management-not-displaying-correctly/6

Font fallback is handled automatically by Microsoft's Uniscribe engine.

*Font fallback*: the selected font is internally replaced by a predefined font.

*Font linking*: unlike font fallback, in font linking it is possible to link one or more fonts, called *linked fonts*, to another font, called the *base font*.

Once you link fonts, you can use the base font to display code points that do not exist in the base font but do in one of the linked fonts.

For example, linking a hangul font and a Japanese font to a Tahoma font allows you to display both Korean and Japanese characters in Tahoma font.

Note: Font linking **can only add glyphs to a base font** - you cannot override glyphs in the base font.

If font linking is enabled on your device, you can examine the registry by enumerating the subkeys of the registry key (below) to determine the mappings of linked fonts to base fonts.

`HKLM\SOFTWARE\Microsoft\Windows NT\CurrentVersion\FontLink\SystemLink`

(I have a bunch)

The value is Multi-String.
One entry per line.
An entry consists of two comma-separated parts:
1) ugly font's filename (prob in allcaps 8.3 format)
2) nice face font name
3) metrics (?)



Examples from the W10 registry for `Segoe UI` entry:

```
TAHOMA.TTF,Tahoma
MEIRYO.TTC,Meiryo UI,128,96
MEIRYO.TTC,Meiryo UI
MSGOTHIC.TTC,MS UI Gothic
MSJH.TTC,Microsoft JhengHei UI,128,96
MSJH.TTC,Microsoft JhengHei UI
MSYH.TTC,Microsoft YaHei UI,128,96
MSYH.TTC,Microsoft YaHei UI
MALGUN.TTF,Malgun Gothic,128,96
MALGUN.TTF,Malgun Gothic
MINGLIU.TTC,PMingLiU
SIMSUN.TTC,SimSun
GULIM.TTC,Gulim
YUGOTHM.TTC,Yu Gothic UI,128,96
YUGOTHM.TTC,Yu Gothic UI
SEGUISYM.TTF,Segoe UI Symbol
```

HKEY_LOCAL_MACHINE\SOFTWARE\Microsoft\Windows NT\CurrentVersion\Font Management
- Metadata: %SystemRoot%\Fonts\fms_metadata.xml
- Auto Deactivation Exclude:
```
Calibri
Cambria
Consolas
Georgia
Segoe UI Symbol
Verdana
```

>Font linking doesn't work, if a font doesn't indicate that the glyph is not supported and should be loooked up elsewhere. Some fonts just render an empty or X'd box themselves.
