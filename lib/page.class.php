<?php

class page {
    
    public  $maxPage;
    
    function __construct($dataTotal,$pageTotal,$p,$file) {
        $this->maxPage = ceil($dataTotal / $pageTotal);
        $this->p = $p;
        $this->file = $file;
    }
    
    function  showPage() {
        $html = '';
        for ($i = 1; $i<=$this->maxPage; $i++){
            if ($this->p == $i){
                $html .= "<li><a href='{$this->file}?p=$i' style='color:red;'>$i</a></li>";
            }else {
                $html .= "<li><a href='{$this->file}?p=$i'>$i</a></li>";
            }
        }
        return $html;
        
    }
    
}
