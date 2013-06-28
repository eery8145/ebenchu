<?php

/**********************************************************
 * Created 2012-5-16
 *
 * memcache session类
 *
 * Author matian <matian@baijob.com>
 *********************************************************/

class CMemHttpSession extends CHttpSession {
    
    /* memcache obj */
    protected $mem;

    /* cookie domain */
    public $domain = '.xinniangjie.com';

    /* cookie生命周期 */
    public $expire = 0;


    /*  */
    public static $ifset = false;

    const CACHE_KEY_PREFIX='xinniangjie.';

    /* 自定义session */
    public function getUseCustomStorage() {
        return true;
    }

    
    public function init() {
        ini_set('session.name', 'xinniangjie');
        parent::init();
    }

    
    /* memcache初始化 */
    public function openSession($savePath, $sessionName) {
        $this->mem = Yii::app()->cache;
        $this->setTimeout(86400/2);
        //setcookie($this->getSessionName(), $this->getSessionID(), $this->expire, '/', $this->domain);        
        return true;
    }

    
    public function readSession($id) {
        $this->calculateKey($id);
		return $this->mem->get($this->calculateKey($id));
    }

    
    public function ifSetCookie($id) {
        if (self::$ifset === false) {
            self::$ifset = true;
//            if($this->mem->get($id) === false){
                if($_SESSION['remeberPass'] == 1) {
                    ///记住密码
                    $this->remeberPass();
                }
                setcookie($this->getSessionName(), $this->getSessionID(), $this->expire, '/', $this->domain);
//            }
        }
    }

    
    public function writeSession($id, $data) {
        $this->ifSetCookie($id);
        $sess_life = $this->getTimeout();
        $this->mem->set($this->calculateKey($id), $data, $sess_life);
        return true;
    }

    
    public function destroySession($id) {
        $this->mem->delete($this->calculateKey($id));
        return true;
    }

    
    public function gcSession($maxLifetime) {
        return true;
    }

    
    /* 记住密码 */
    public function remeberPass() {
        $this->expire = time() + 86400 * 30;
        $this->setTimeout(86400 * 30);
        $_SESSION['remeberPass'] = 1;
    }
    
    protected function calculateKey($id)
    {
        return self::CACHE_KEY_PREFIX.$id;
    }
}

