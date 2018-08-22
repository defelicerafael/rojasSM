<?php

class Text_class {
    
    public $text;
    
    function setText($t){
        $this->text = $t;
    }
    
    function getText(){
        return $this->text;
    }
    
    public function formateoUnicode($str) {
    
        $str = str_replace( 'u00c1', '\u00C1', $str ); 
        $str = str_replace( 'u00c9', '\u00C9', $str ); 
        $str = str_replace( 'u00cD', '\u00CD', $str ); 
        $str = str_replace( 'u00d3', '\u00D3', $str ); 
        $str = str_replace( 'u00dA', '\u00DA', $str ); 
        $str = str_replace( 'u00e1', '\u00E1', $str ); 
        $str = str_replace( 'u00e9', '\u00E9', $str ); 
        $str = str_replace( 'u00eD', '\u00ED', $str ); 
        $str = str_replace( 'u00e3', '\u00F3', $str );
        $str = str_replace( 'u00fA', '\u00FA', $str ); 
        $str = str_replace( 'u00f1', '\u00F1', $str );
        $str = str_replace( 'u00d1', '\u00D1', $str );
        $str = str_replace( 'u0022', '\u0022', $str );
        $str = str_replace( 'u0022', '\u0022', $str );
        $str = str_replace( 'u00b0', '\u00B0', $str );
        $str = str_replace( 'u00a1', '\u00A1', $str );
    }
    
}
