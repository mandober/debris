# Headers


<stdio.h>
provides generic file operation support and supplies fns with narrow character IO capabilities.

<wchar.h> 
supplies fns with wide character IO capabilities.



---
- [C file input/output](https://www.wikiwand.com/en/C_file_input/output)
- [File input/output - cppreference.com](https://en.cppreference.com/w/c/io)





## File access


- fopen Opens a file (with a non-Unicode filename on Windows and possible UTF-8 filename on Linux)
- freopen Opens a different file with an existing stream
- fflush Synchronizes an output stream with the actual file
- fclose Closes a file
- setbuf Sets the buffer for a file stream
- setvbuf Sets the buffer and its size for a file stream
- fwide Switches a file stream between wide-character I/O and narrow-character IO


|  Direct  
input/output fread][8]Reads from a file
fwrite][9]Writes to a file | 
|  Unformatted  
input/output fgetc][10]  
[getc][11] fgetwc][12]  
[getwc][13]Reads a byte/wchar_t from a file stream
fgets][14] fgetws][15]Reads a byte/wchar_t line from a file stream | 
fputc][16]  
[putc][17] fputwc][18]  
[putwc][19]Writes a byte/wchar_t to a file stream
fputs][20] fputws][21]Writes a byte/wchar_t string to a file stream
getchar][22] getwchar][23]Reads a byte/wchar_t from stdin
|  <s>[gets][24]</s>N/AReads a byte string from stdin until a newline or end of file is encountered (deprecated in C99, removed from C11)
putchar][25] putwchar][26]Writes a byte/wchar_t to stdout
puts][27]N/AWrites a byte string to stdout
ungetc][28] ungetwc][29]Puts a byte/wchar_t back into a file stream
|  Formatted  
input/output scanf][30]  
[fscanf][31]  
[sscanf][32] wscanf][33]  
[fwscanf][34]  
[swscanf][35]Reads formatted byte/wchar_t input from stdin,  
a file stream or a buffer
vscanf][36]  
[vfscanf][37]  
[vsscanf][38] vwscanf][39]  
[vfwscanf][40]  
[vswscanf][41]Reads formatted input byte/wchar_t from stdin,  
a file stream or a buffer using variable argument list | 
printf][42]  
[fprintf][43]  
[sprintf][44]  
[snprintf][45] wprintf][46]  
[fwprintf][47]  
[swprintf][48]Prints formatted byte/wchar_t output to stdout,  
a file stream or a buffer
vprintf][49]  
[vfprintf][50]  
[vsprintf][51]  
[vsnprintf][52] vwprintf][53]  
[vfwprintf][54]  
[vswprintf][55]Prints formatted byte/wchar_t output to stdout,  
a file stream, or a buffer using variable argument list
perror][56]N/AWrites a description of the [current error][57] to stderr
|  File positioning ftell][58]  
ftelloReturns the current file position indicator
fseek][59]  
fseekoMoves the file position indicator to a specific location in a file | 
fgetpos][60]Gets the file position indicator
fsetpos][61]Moves the file position indicator to a specific location in a file
rewind][62]Moves the file position indicator to the beginning in a file
|  Error  
handling clearerr][63]Clears errors
feof][64]Checks for the end-of-file | 
ferror][65]Checks for a file error
|  Operations  
on files remove][66]Erases a file
rename][67] Renames][68] a file | 
tmpfile][69]Returns a pointer to a temporary file
tmpnam][70]Returns a unique filename | 

[1]: http://en.cppreference.com/w/c/io/fopen
[2]: http://en.cppreference.com/w/c/io/freopen
[3]: http://en.cppreference.com/w/c/io/fflush
[4]: http://en.cppreference.com/w/c/io/fclose
[5]: http://en.cppreference.com/w/c/io/setbuf
[6]: http://en.cppreference.com/w/c/io/setvbuf
[7]: http://en.cppreference.com/w/c/io/fwide
[8]: http://en.cppreference.com/w/c/io/fread
[9]: http://en.cppreference.com/w/c/io/fwrite
[10]: http://en.cppreference.com/w/c/io/fgetc
[11]: http://en.cppreference.com/w/c/io/getc
[12]: http://en.cppreference.com/w/c/io/fgetwc
[13]: http://en.cppreference.com/w/c/io/getwc
[14]: http://en.cppreference.com/w/c/io/fgets
[15]: http://en.cppreference.com/w/c/io/fgetws
[16]: http://en.cppreference.com/w/c/io/fputc
[17]: http://en.cppreference.com/w/c/io/putc
[18]: http://en.cppreference.com/w/c/io/fputwc
[19]: http://en.cppreference.com/w/c/io/putwc
[20]: http://en.cppreference.com/w/c/io/fputs
[21]: http://en.cppreference.com/w/c/io/fputws
[22]: http://en.cppreference.com/w/c/io/getchar
[23]: http://en.cppreference.com/w/c/io/getwchar
[24]: http://en.cppreference.com/w/c/io/gets
[25]: http://en.cppreference.com/w/c/io/putchar
[26]: http://en.cppreference.com/w/c/io/putwchar
[27]: http://en.cppreference.com/w/c/io/puts
[28]: http://en.cppreference.com/w/c/io/ungetc
[29]: http://en.cppreference.com/w/c/io/ungetwc
[30]: http://en.cppreference.com/w/c/io/scanf
[31]: http://en.cppreference.com/w/c/io/fscanf
[32]: http://en.cppreference.com/w/c/io/sscanf
[33]: http://en.cppreference.com/w/c/io/wscanf
[34]: http://en.cppreference.com/w/c/io/fwscanf
[35]: http://en.cppreference.com/w/c/io/swscanf
[36]: http://en.cppreference.com/w/c/io/vscanf
[37]: http://en.cppreference.com/w/c/io/vfscanf
[38]: http://en.cppreference.com/w/c/io/vsscanf
[39]: http://en.cppreference.com/w/c/io/vwscanf
[40]: http://en.cppreference.com/w/c/io/vfwscanf
[41]: http://en.cppreference.com/w/c/io/vswscanf
[42]: http://en.cppreference.com/w/c/io/printf
[43]: http://en.cppreference.com/w/c/io/fprintf
[44]: http://en.cppreference.com/w/c/io/sprintf
[45]: http://en.cppreference.com/w/c/io/snprintf
[46]: http://en.cppreference.com/w/c/io/wprintf
[47]: http://en.cppreference.com/w/c/io/fwprintf
[48]: http://en.cppreference.com/w/c/io/swprintf
[49]: http://en.cppreference.com/w/c/io/vprintf
[50]: http://en.cppreference.com/w/c/io/vfprintf
[51]: http://en.cppreference.com/w/c/io/vsprintf
[52]: http://en.cppreference.com/w/c/io/vsnprintf
[53]: http://en.cppreference.com/w/c/io/vwprintf
[54]: http://en.cppreference.com/w/c/io/vfwprintf
[55]: http://en.cppreference.com/w/c/io/vswprintf
[56]: http://en.cppreference.com/w/c/io/perror
[57]: https://www.wikiwand.com/en/Errno.h "Errno.h"
[58]: http://en.cppreference.com/w/c/io/ftell
[59]: http://en.cppreference.com/w/c/io/fseek
[60]: http://en.cppreference.com/w/c/io/fgetpos
[61]: http://en.cppreference.com/w/c/io/fsetpos
[62]: http://en.cppreference.com/w/c/io/rewind
[63]: http://en.cppreference.com/w/c/io/clearerr
[64]: http://en.cppreference.com/w/c/io/feof
[65]: http://en.cppreference.com/w/c/io/ferror
[66]: http://en.cppreference.com/w/c/io/remove
[67]: http://en.cppreference.com/w/c/io/rename
[68]: https://www.wikiwand.com/en/Rename_(computing) "Rename (computing)"
[69]: http://en.cppreference.com/w/c/io/tmpfile
[70]: http://en.cppreference.com/w/c/io/tmpnam

  