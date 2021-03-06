<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\Kernel;

class Container extends \Pimple
{

    /**
     * @return \Generated\Client\Ide\AutoCompletion|static
     */
    public function getLocator()
    {
        return Locator::getInstance();
    }

}
