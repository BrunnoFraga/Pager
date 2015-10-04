
# PAGER
Pager PHP class for fast solutions


HOW TO USE?
-----------


Default is 1 index of pager, that <li> will receive active class 
```
$p = (isset($_GET['p']))? $_GET['p'] : 1;  
```

Creating
10 IS TOTAL ITENS TO SHOW
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

CSS
```
.pager li{
  border:thin solid #ccc; 
  color:#666;
}
.pager.active{
  color:$fff;
  background-color:#666;
}
```
