<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('anchor_admin'))
{

    function anchor_admin($uri = '', $title = '', $attributes = '')
    {
	$title = (string) $title;
	$uri = 'admin/' . $uri;

	if (!is_array($uri))
	{
	    $site_url = (!preg_match('!^\w+://! i', $uri)) ? site_url($uri) : $uri;
	} else
	{
	    $site_url = site_url($uri);
	}

	if ($title == '')
	{
	    $title = $site_url;
	}

	if ($attributes != '')
	{
	    $attributes = _parse_attributes($attributes);
	}

	return '<a href="' . $site_url . '"' . $attributes . '>' . $title . '</a>';
    }

}

if (!function_exists('redirect'))
{

    function redirect_admin($uri = '', $method = 'location', $http_response_code = 302)
    {

	$uri = 'admin/' . $uri;

	if (!preg_match('#^https?://#i', $uri))
	{
	    $uri = site_url($uri);
	}

	switch ($method)
	{
	    case 'refresh' : header("Refresh:0;url=" . $uri);
		break;
	    default : header("Location: " . $uri, TRUE, $http_response_code);
		break;
	}
	exit;
    }

}

if (!function_exists('asset_url'))
{

    function asset_url()
    {
	$config = & get_config();
	return $config['assets_url'];
    }

}



if (!function_exists('activehosted_api_url'))
{

    function activehosted_api_url()
    {
	$config = & get_config();
	return $config['activehosted_api_url'];
    }

}

if (!function_exists('activehosted_api_key'))
{

    function activehosted_api_key()
    {
	$config = & get_config();
	return $config['activehosted_api_key'];
    }

}

if (!function_exists('my_site_base'))
{

    function my_site_base()
    {
	$config = & get_config();
	return $config['my_site_base'];
    }

}

/* End of file MY_url_helper.php */
/* Location: ./application/helpers/MY_url_helper.php */