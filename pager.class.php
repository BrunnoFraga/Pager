<?php

/**
 * Pager PHP class for fast solutions
 *
 * @author     Brunno Fraga <brunnofraga@yahoo.com.br>
 * @link       https://github.com/BrunnoFraga/pager
 * @since      2015
 *
 * @param Array $list
 * @param Int $p
 * @param Int $view
 * @param String $href
 * @param String $url 
 * @param String $a 
 *
*/


class pager
{
	private $list,$p,$view,$total,$n; //VARIABLES

	function __construct($list,$p,$view) // CONSTRUCT FUNCTION, USED IN CREATE METHOD: $pager = new pager($list,$p,$view);
	{
		
		foreach($list as $v) if(is_array($v) || is_object($v)) $one = true; else $one = false; // CHECK $list SIZE ARRAY

		$this->p = $p; // $p IS THE POINTER OF ACTIVE PAGER
		$this->view = $view; // NUMBER OF ITENS TO SHOW
		
		if($one===false){ // JUST ONE RESULTS

			$this->total = 1;
			$this->list[0] = $list; 

		}else{ // MULTIPLE RESULTS

			$this->total = count($list);	

			for($i=($p-1)*$view;$i<($p*$view);$i++)
			{
				if(isset($list[$i]))
				{
					$this->list[$i] = $list[$i];				
				}
			}

		}

		
	}

	function get($a)
	{
		return $this->$a;
	}


	function pager($href="",$url="") // DEFAULT - YOU DONT NEED ANY PARAM BUT IF YOU NEED A PERMALINK TRY: pager("href","yourpage.html") 
	{
		$li = "";
		$i = 1;
		$a = ""; 
		$aa="";
		

		if($this->total > $this->view)
		{
			
			while($i <= ceil($this->total/$this->view))
			{
				if(($i < ($this->p+7) && $i > ($this->p-7)) || $i == ceil($this->total / $this->view) || $i == 1) // 7 IS THE NUMBER TO ABBREVIATE THE ITENS OF PAGER 1 ... 2 3 4 5 6 ... 7 USED FOR HIGH AMOUNTS LIST
				{
					// HREF
					if($href == "href"){$a='<a class="'.(($i==$this->p)?"active":"").'" href="/'.$url.'?p='.$i.'" target="_self" >';$aa="</a>";}
					
					//...
					$last = ($i == ceil($this->total/$this->view))?"...":"";
					$first = ($i == 1)?"...":"";

					// LI
					$li .= $last.$a.'<li class="'.(($i==$this->p)?"active":"").'">'.$i.'</li>'.$aa.$first;
				}

				$i++;
			}
		
		}

		$pager = '<ul class="pager">'.$li.'</ul>'; // THE RESULT <ul class="pager"><li class="active">1</li><li>2</li><li>3</li></ul>
		return $pager;
	}


	
}
