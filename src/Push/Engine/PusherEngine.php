<?php

namespace CakePush\Push\Engine;

use CakePush\Push\Engine\PushEngine;
use Pusher\Pusher;

class PusherEngine extends PushEngine {

    protected $_instance;

    public function __construct($config)
    {
        if (!$appId = $config['appId']) {
            throw new Exception('PusherEngine Error: You must provide an appId in app.php configuration.');
        }

        if (!$appKey = $config['appKey']) {
            throw new Exception('PusherEngine Error: You must provide an appKey in app.php configuration.');
        }

        if (!$appSecret = $config['appSecret']) {
            throw new Exception('PusherEngine Error: You must provide an appSecret in app.php configuration.');
        }

        $config = $this->_filterConfig($config);

        $this->_instance = new Pusher($appKey, $appSecret, $appId, $config);
    }

    public function trigger($push_opts)
    {

    }

    public function instance()
    {
        return $this->_instance;
    }

    protected function _filterConfig($config)
    {
        $allowed = ['scheme', 'host', 'port', 'timeout', 'encrypted', 'cluster', 'curl_options'];
        $filtered = array_filter(
            $config,
            function ($key) use ($allowed) {
                return in_array($key, $allowed);
            },
            ARRAY_FILTER_USE_KEY
        );
        return $filtered;
    }

}