
# PAGER
Pager PHP class for fast solutions


HOW TO USE?
-----------


Default is 1 index of pager, that index will receive active class 

```
$p = (isset($_GET['p']))? $_GET['p'] : 1;  
```

Creating

10 is total itens to show
```
$pager = new pager($yourArrayList, $p, 10);
```
Call List
```
$list = $pager->get('list');
foreach($list as $k => $v)
{
  echo $v;
}
```
Call Pager
```
echo $pager->pager();
```
or
```
echo $pager->pager("href","yourpage.html");
```


HTML / CSS
-----------

HTML
```
<ul class="pager">
  <li class="active">1</li>
  <li>2</li>
  <li>3</li>
  ...
</ul>
```
or if use href
```
<ul class="pager">
  <a href="/yourpage.html?p=1"><li class="active">1</li></a>
  <a href="/yourpage.html?p=2"><li>2</li></a>
  <a href="/yourpage.html?p=3"><li>3</li></a>
  ...
</ul>
```

CSS

.pager li, .pager a{

  border:thin solid #ccc; 
  color:#666;
  
}
.pager.active{

  color:$fff;
  background-color:#666;
  
}
```
