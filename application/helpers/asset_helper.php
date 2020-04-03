<?php
function css_url($css_file)
{
    return base_url_without_index("/assets/css/" . $css_file);
}

function js_url($js_file)
{ 
    return base_url_without_index("/assets/js/" . $js_file);
} 

function img_url($img_file)
{
	return base_url_without_index("/assets/img/" . $img_file);
}


?>
