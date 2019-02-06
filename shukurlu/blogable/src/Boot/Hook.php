<?php

namespace Blogable\Boot;



class Hook
{
    protected $items;

    protected function addScript($name,$script_url,$in_footer,$attributes=array(),$version=null)
    {

        $this->items[] = array('name'=>"test","url"=>$script_url,"footer"=>true,"type"=>'script');

    }

    protected function addStyle($name,$style_url,$in_footer,$attributes=array(),$version=null)
    {
       $this->items[] = array(
            'name'=>$name,
            "url"=>$style_url,
            "footer"=>$in_footer,
            "type"=>'style',
            "attributes"=>$attributes,
            "version"=>$version
        );
    }

    public function blogable_header()
    {

     return self::getHooks(self::$style,'header');

    }

    public static function blogable_footer()
    {
        return self::getHooks(self::$scripts,'footer');

    }

     private static function getHooks($items,$dest='header')
     {

         $_footer_html ='';
         $_header_html='';

         foreach($items as $script)
         {
             if($script['type']=="script") {

                 if ($script['footer']) {
                     $_footer_html .= view('blogable::hook.script', compact("script"))->render();
                 }else
                     {
                     $_header_html .= view('blogable::hook.script', compact("script"))->render();
                     }
             }

            if($script['type']=='style')
            {
                if ($script['footer']) {

                    $_footer_html .= view('blogable::hook.style', compact("script"))->render();

                }else
                {
                    $_header_html .= view('blogable::hook.style', compact("script"))->render();
                }
            }
         }

        if($dest=='header'){ return $_header_html; }else{ return $_footer_html;}
     }

}