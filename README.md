
# PAGER
Pager PHP class for fast solutions


HOW TO USE?
-----------


Set your actual page (a simple example below):

```
$p = (isset($_GET['p']))? $_GET['p'] : 1;  
```

Creating

In this case, we need to show only 10 items per page.
```
$pager = new Pager($yourArrayList, $p, 10);
```
Calling the `list` property (getting actual page's data).
```
$list = $pager->get('list');
foreach($list as $k => $v)
{
    echo $v;
}
```
Call the pager
```
echo $pager->show();
```
or
```
echo $pager->show("/my-specific-subpage");
```


OUTPUT
-----------

HTML
```
<ul class="pager">
  <li class="active"><a href='/?p=1'>1</a></li>
  <li><a href='/?p=2'>2</a></li>
  <li><a href='/?p=3'>3</a></li>
  ...
</ul>
```