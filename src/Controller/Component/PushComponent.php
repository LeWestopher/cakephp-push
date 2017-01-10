<?php

namespace CakePush\Controller\Component;

use Cake\Controller\Component\Component;
use CakePush\Push\PushRegistry;

class PushComponent extends Component {

    public function push($alias, $push_opts = [])
    {
        $service = PushRegistry::get($alias);
        return $service->trigger($push_opts);
    }

}