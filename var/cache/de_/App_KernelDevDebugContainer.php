<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerXxdxreq\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerXxdxreq/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerXxdxreq.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerXxdxreq\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerXxdxreq\App_KernelDevDebugContainer([
    'container.build_hash' => 'Xxdxreq',
    'container.build_id' => 'da7b7fba',
    'container.build_time' => 1736325710,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerXxdxreq');
