# Call-out boxes

## HTML info box


<div style="border:solid 0px #2d2d2d; text-align:center; background:#7a7a7a; padding:5px; border-radius: 5px 5px 0 0">HTML callout errr box</div>


<div style="border: solid 1px #999; padding: 5px 5px 30px" >Message goes here. </div>

```css
.box-info {
  background: #7a7a7a;
  padding: 10px;
  text-align: center;
  display: inline-block;
}

.ibox {
  background: #7a7a7a;
  border-radius: 0 5px 0 0;
  border: solid 1px #2d2d2d;
  box-shadow: rgba(163, 163, 163, 0.72) 0px 0px 2px 0px inset;
  color: #ccc;
  padding: 5px;
}

.alert-info:before {
    padding:10px;
    margin:10px 0;
    display:inline-block;
    text-decoration:inherit;
    width:1 em;
    margin-right:.2 em;
    text-align:center;
    text-transform:none;
    line-height:1 em;
    margin-left:.2 em;
    -webkit-font-smoothing:antialiased;
    -moz-osx-font-smoothing:grayscale
}

legend, label {
  font-size: 1em;
  line-height: 1.5;
  margin: 0.75em 0;
  font-weight: 400!important;
}

#caption {
  width: 100%;
  color: #8E8C87;
  background-color: #FFFFFF;
  border-style: solid;
  border-width: 1px;
  border-color: #cccccc;
  margin: 0 0 1rem 0;
  padding: 0.5em;
  min-height: 8em;
  outline: none;
}

#caption :first-child {
  padding-top: 0;
  margin-top: 0;
}
```


<div style="background:#7a7a7a; padding:10px">HTML info box</div>


<div class="box-info">HTML info box</div>



## Call-out boxes with a gitbook v.1 plugin

`hint` plugin: https://plugins.gitbook.com/plugin/hints

Call-out boxes:
- info (default)
- tip
- danger
- working

hint configuration:
* `danger`
  CSS class for the 'danger' icons:
  - type `String`
  - default = `fa fa-exclamation-circle`
*`info`
  CSS class for the 'info'
  default = `fa fa-info-circle`
*`tip`
  CSS class for the 'tip'
  default = `fa fa-mortar-board`
* `working`
  CSS class for the 'working'
  default = `fa fa-wrench`


```md
* Examples

{% hint style='info' %}
Info note
{% endhint %}

{% hint style='warning' %}
Warning: experimental
{% endhint %}

{% hint style='error' %}
Error: error
{% endhint %}

{% hint style='danger' %}
Danger! Danger! High volatage!
{% endhint %}
```
