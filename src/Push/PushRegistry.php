<?php

namespace CakePush\Push;

use Cake\Core\Configure;

class PushRegistry {
    /**
     * Array containing a list of all previously built Collection object instances.
     *
     * @var array
     */
    protected static $_instances = [];

    /**
     * Get an instance of a Collection class from the default namespace with the appropriate datasource injected into
     * the Collection instance.  You can change the datasource of the returned Collection object by passing a datasource
     * string into the 'connection' paramater of the $config array for this function.
     *
     * @param $alias
     * @param array $config
     * @return mixed
     */
    public static function get($alias)
    {
        if (static::_isInstantiated($alias)) {
            return static::$_instances[$alias];
        }

        return static::_create($alias);
    }

    /**
     * Clears all current instances stored in the CollectionRegistry.
     */
    public static function clear()
    {
        static::$_instances = [];
    }

    /**
     * Instantiates the appropriate Collection class with the appropriate Connection object injected into the
     * constructor.
     *
     * @param $instance
     * @param $connection
     * @param $config
     * @return mixed
     */
    protected static function _create($alias)
    {
        $config = static::_getConfig($alias);
        if (!$config['className']) {
            throw new Exception('PushRegistry Error: You must provide a className to construct PushEngine.');
        }
        $class = $config['className'];
        static::$_instances[$alias] = new $class($config);
        return static::$_instances[$alias];
    }

    /**
     * Returns whether or not the appropriate alias has been instantiated by the registry or not.  Used for caching
     * instances inside of the registry class.
     *
     * @param $alias
     * @return bool
     */
    protected static function _isInstantiated($alias)
    {
        if (isset(static::$_instances[$alias])) {
            return true;
        }
        return false;
    }

    protected static function _getConfig($alias)
    {
        $config = Configure::read('push.'.$alias);
        if (!$config) {
            throw new Exception('PushRegistry Error: Config information for '.$alias.' does not exist in app.php.');
        }
        return $config;
    }

}