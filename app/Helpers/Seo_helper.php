<?php
global $title;
global $metaTags;
/** function for include title of the page
 *
 */
if ( ! function_exists('include_title'))
{
   function include_title()
    {
        global $title;
       echo "<title>".$title."</title>";

    }
}

/**
 *  function foer set page title at run time
 */
if ( ! function_exists('set_title'))
{
   function set_title($titlevalue)
    {
        global $title; $title = $titlevalue;
    }
}


/**
 * function get meta tag into header
 */
if ( ! function_exists('include_metas'))
{
   function include_metas()
    {
       global $metaTags;
       if(is_array($metaTags)){
       foreach($metaTags as $key=>$value)
       {
            echo "<meta name='".$key."' content='".$value."'>";
       }
       }

    }
}

/**
 * function for set meta tag for SEO at any place
 */
if ( ! function_exists('set_metas'))
{
   function set_metas($arrmeta)
    {
        global $metaTags;

        foreach($arrmeta as $key=>$value)
       {
            $metaTags[$key] = $value;
       }
    }
}

if ( ! function_exists('make_menu_url'))
{
   function make_menu_url($arrmenu=array())
    {
        $arrmenu_url = array('menuUrl' =>"",'target'=>"");
       
        if(!empty($arrmenu)) {
            
        if($arrmenu['cat_type'] =='Page') {
         $arrmenu_url['menuUrl']= strstr($arrmenu['cat_url'], "#") ? $arrmenu['cat_url'] : base_url("content/" . $arrmenu['cat_url']);
         $arrmenu_url['menuUrl'] = str_replace("t=_blank","",$arrmenu_url['menuUrl']);
         $arrmenu_url['target'] = strstr($arrmenu['cat_url'], "t=_blank") ? "target='_new'" : "";
         } else {
         $arrmenu_url['menuUrl'] = strstr($arrmenu['cat_url'], "#") ? $arrmenu['cat_url'] : base_url($arrmenu['cat_url']);
         $arrmenu_url['menuUrl'] = str_replace("t=_blank","",$arrmenu_url['menuUrl']);
         $arrmenu_url['target']  = strstr($arrmenu['cat_url'], "t=_blank") ? "target='_new'" : "";
         }
        }
        
        return $arrmenu_url;
    }
}