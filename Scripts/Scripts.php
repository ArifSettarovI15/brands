<?php
namespace Scripts;

use Composer\Script\Event;
use Composer\Installer\PackageEvent;

class Scripts
{
public static function postUpdate(Event $event)
{
$composer = $event->getComposer();
// do stuff
}


public static function postPackageInstall(PackageEvent $event)
{
mkdir("installed_packages");
$installedPackage = $event->getOperation()->getPackage();
echo "Package was installed - ".$installedPackage;
}

public static function warmCache(Event $event)
{
// make cache toasty
}
}