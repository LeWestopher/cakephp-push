<?php

namespace CakePush\ORM\Behavior;

use Cake\ORM\Behavior\Behavior;
use CakePush\Push\PushRegistry;

class PushBehavior extends Behavior {

    public function push($alias, $push_opts = [])
    {
        $service = PushRegistry::get($alias);
        return $service->trigger($push_opts);
    }

}