<?php

namespace CakePush\Push\Engine;

abstract class PushEngine {

    abstract function trigger($push_opts);

}