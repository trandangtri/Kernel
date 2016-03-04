<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\Kernel\ClassResolver\DependencyProvider;

use Spryker\Shared\Config\Config;
use Spryker\Shared\Kernel\Exception\Backtrace;
use Spryker\Shared\Kernel\KernelConstants;
use Spryker\Zed\Kernel\ClassResolver\ClassInfo;

class DependencyProviderNotFoundException extends \Exception
{

    /**
     * @param \Spryker\Zed\Kernel\ClassResolver\ClassInfo $callerClassInfo
     */
    public function __construct(ClassInfo $callerClassInfo)
    {
        parent::__construct($this->buildMessage($callerClassInfo));
    }

    /**
     * @param \Spryker\Zed\Kernel\ClassResolver\ClassInfo $callerClassInfo
     *
     * @return string
     */
    protected function buildMessage(ClassInfo $callerClassInfo)
    {
        $message = 'Spryker Kernel Exception' . PHP_EOL;
        $message .= sprintf(
            'Can not resolve $1$sDependencyProvider for your bundle "%1$s"',
            $callerClassInfo->getBundle()
        ) . PHP_EOL;

        $message .= 'You can fix this by adding the missing DependencyProvider to your bundle.' . PHP_EOL;

        $message .= sprintf(
            'E.g. %s\\Zed\\%2$s\\%2$sDependencyProvider',
            Config::getInstance()->get(KernelConstants::PROJECT_NAMESPACE),
            $callerClassInfo->getBundle()
        );

        $message .= new Backtrace();

        return $message;
    }

}
