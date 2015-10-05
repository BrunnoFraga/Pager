<?php

/**
 * Pager PHP class for fast solutions
 *
 * @author     Brunno Fraga <brunnofraga@yahoo.com.br>
 * @link       https://github.com/BrunnoFraga/pager
 * @since      2015
 *
 */

class Pager
{
    private $list;
    private $p;
    private $view;
    private $total;


    /**
     * Pager object creation
     *
     * @param Array $list
     * @param Int $p : The page number
     * @param Int $view : Itens to show
     * @return Pager Object
     */
    public function __construct(Array $list, $p, $view)
    {
        $this->p = (int) $p;
        $this->view = $view;
        $this->total = count($list);

        if ($this->total > 1) {
            for ($i = ($p - 1) * $view; $i < ($p * $view); $i++) {
                if (isset($list[$i])) {
                    $this->list[$i] = $list[$i];
                }
            }
        } else {
            $this->list[0] = $list;
        }

    }


    /**
     * Get an class' property
     *
     * @param $property
     * @return mixed
     */
    public function get($property)
    {
        return isset($this->$property) ? $this->$property : false;
    }


    /**
     * This method show your pagination
     * The result must be something like
     * <ul class="pager"><li class="active">1</li><li>2</li><li>3</li></ul>
     *
     * @param String $url: The prefix url
     * @return string
     */
    function show($url = '')
    {
        $li = '';

        if ($url === '') {
            $url = $_SERVER['PHP_SELF'];
        }

        if ($this->total > $this->view) {
            $i = 1;

            while ($i <= ceil($this->total / $this->view)) {

                // 7 IS THE NUMBER TO ABBREVIATE THE ITENS OF PAGER 1 ... 2 3 4 5 6 ... 7 USED FOR HIGH AMOUNTS LIST
                if (($i < ($this->p + 7) && $i > ($this->p - 7)) || $i == ceil($this->total / $this->view) || $i == 1) {

                    $first = ($i == 1) ? '...' : '';
                    $last = ($i == ceil($this->total / $this->view)) ? '...' : '';

                    $active = !$this->activePage($i) ? '' : 'active';

                    $link = '<a class="page-number-' . $i . '" href="' . $url . '?p=' . $i . '">';
                    $link .= $i;
                    $link .= '</a>';

                    // The <li> element
                    $li .= $last;
                    $li .= '<li class="' . $active . '">' . $link . '</li>';
                    $li .= $first;
                }

                $i++;
            }

        }


        return printf('<ul class="pager">%s</ul>', $li);
    }


    /**
     * Helps you to know if you are in the current page
     * Maybe this method must be used in loops.
     *
     * @param int $counter
     * @return bool
     */
    private function activePage ($counter) {
        if ((int) $counter === $this->p) return true;

        return false;
    }

}
