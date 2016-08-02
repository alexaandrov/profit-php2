<?php

namespace App;

class MultiException
    extends \Exception
    implements \ArrayAccess, \Iterator
{
    use TCollection;
}