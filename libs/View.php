<?php

class View {
     private $_cache = null;

    function __construct() {
        //echo 'this is the view';
    }

    public function render($name, $noInclude = false)
    {
        $this->_getCache();

        if ($noInclude == true) {
            require 'views/head.php';
            require 'views/' . $name . '.php';    
        }
        else {
            require 'views/head.php';
            require 'views/header.php';
            require 'views/' . $name . '.php';
            require 'views/footer.php';    
        }
        // open the cache file for writing
        if(!is_dir(CACHE))mkdir(CACHE);
        $cachefile = CACHE.$this->_cache.".html";
        $fp = fopen($cachefile, 'w');

		 // save the contents of output buffer to the file
        fwrite($fp, ob_get_contents());


		 // close the file
        fclose($fp);

		 // Send the output to the browser
        ob_end_flush();

    }
    public function viewGrill($l) 
    { 
        $this->title=$l[0];
        unset($l[0]);
        $this->list=$l;
        $widthAuto=(100/sizeof($this->title)).'%';
        $sortable=($this->options)?'sortable':'';
        $view='<ul class="tableView "><li><ul class="colsView tableTitle">';

        foreach ($this->title as $id=>$value){
            $width=($value['value']!=null)?$value['width']:$widthAuto;
            $view.="<li style='width:".$width.";'><a>".$value['value']."</a></li>";
        }
        $view.='</ul></li><li class="tableContent"><ul class="'.$sortable.'">';
        foreach ($this->list as $id=>$value){
            $alternate=(($id%2)==0)?'alternate-row':'';
            if($value['_link']) $view.='<a href="'.$value['_link'].'">';
            $view.='<li class="'.$alternate.'"><ul class="colsView">';
            $i=0;
            foreach ($value as $subid=>$subvalue){
                if(!strstr($subid, '_')){
                    $width=($this->title[$i]['width']!=null)?$this->title[$i]['width']:$widthAuto;
                    $view.="<li  style='width:".$width.";'>$subvalue</li>";
                    $i++;
                }
            }
            $view.='</ul></li>';
            if($value['_link']) $view.='</a>';
        }
        $view.='</ul></li></ul>';
        echo $view;
    }
    private function _getCache()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        if(empty($url)) $url='index';
        $this->_cache = str_replace('/', '.', $url) ;
    }

}