# Validation Rules

https://laravel.com/docs/master/validation#available-validation-rules

`bail`
- bail when first validator fails
- put it first, e.g. `bail|required|exists:channels,id`

`min:value` `max:value`
- field must have a max/min value, e.g. `max:255`
- strings, numerics, arrays and files are evaluated the same as the `size` rule.

`accepted`
- The field under validation must be yes, on, 1, or true

`required`
- present and not empty (not null, '', empty countable, uploaded file with no path)

`unique`
- The field must not exist within the given database table
- `unique:table,column,except,idColumn`

`exists:table,column`
- The field must exist on a given database table.



- Required With        Required If          Required Without
- Required With All    Required Unless      Required Without All
- Date      Date Equals     Date Format     Timezone
- Alpha     Alpha Dash      Alpha Numeric
- After (Date)              After Or Equal (Date)
- Before (Date)             Before Or Equal (Date)
- Image (File)              Dimensions (Image Files)
- Array       Boolean       Integer       String
- URL           Active URL          E-Mail
- Numeric       Digits              Digits Between
- File          MIME Types          MIME Type By File Extension
- IP Address    JSON
- Regular Expression        Not Regex
- UUID          Password
- Size
- Sometimes
- Present       Nullable
- Accepted      Confirmed
- Filled        Distinct      Different       Same
- Starts With       Ends With
- Between
- Greater Than        Greater Than Or Equal
- Less Than           Less Than Or Equal
- In          Not In        In Array
- Min

