<?php

class PostUrlRule extends CBaseUrlRule
{
  public $connectionID = 'db';

  public $isPage = false;

  public function createUrl($manager,$route,$params,$ampersand)
  {
    if ($route==='bbs/post')
    {
      if (isset($params['id']) && !isset($params['p1'])){
        //是否设置前缀
        $this->hasHostInfo = true;
        $post = Post::model()->find("id = :id", array(":id"=>$params['id']));
        $city = City::model()->find("id = :id", array(":id"=>$post->cityId));

        if(empty($city->domain)){
          $domain = 'bj';
        }else{
          $domain = $city->domain;
        }

        return 'http://'.$domain.'.xinniangjie.com/bbs/post/'.$params['id'].'.html';
      }

      if(isset($params['id']) && isset($params['p1'])){
        //是否设置前缀
        $this->hasHostInfo = true;
        $post = Post::model()->find("id = :id", array(":id"=>$params['id']));
        $city = City::model()->find("id = :id", array(":id"=>$post->cityId));

        if(empty($city->domain)){
          $domain = 'bj';
        }else{
          $domain = $city->domain;
        }

        return 'http://'.$domain.'.xinniangjie.com/bbs/post/'.$params['id'].'/pn/'.$params['p1'];
      }
        
    }
    return false;
  }

  public function parseUrl($manager,$request,$pathInfo,$rawPathInfo)
  {
    if (preg_match('@^bbs/post/(\d+).html$@Usi', $pathInfo, $matches))
    {
      // check $matches[1] and $matches[3] to see
      // if they match a manufacturer and a model in the database
      // If so, set $_GET['manufacturer'] and/or $_GET['model']
      // and return 'bbs/post'
      $_GET['id'] = $matches[1];
    }
    if (preg_match('@^bbs/post/(\d+)/pn/(\d+)$@Usi', $pathInfo, $matches))
    {
      // check $matches[1] and $matches[3] to see
      // if they match a manufacturer and a model in the database
      // If so, set $_GET['manufacturer'] and/or $_GET['model']
      // and return 'bbs/post'
      $_GET['id'] = $matches[1];
      $_GET['p1'] = $matches[2];
    }
    return false;
  }
}