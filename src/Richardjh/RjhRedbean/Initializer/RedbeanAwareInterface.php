<?php

namespace Richardjh\RjhRedbean\Initializer;

use R;

/**
 * If something implements this, the RedbeanAwareInitializer will inject the Redbean Service
 */
interface RedbeanAwareInterface
{
    /**
     * @param R $redbeanService
     */
    public function setRedbeanService(R $redbeanService);
}