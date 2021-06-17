<?php

namespace App\EventListener;

use App\Entity\Society;
use App\Entity\Version;
use App\Repository\ArchiveRepository;
use Doctrine\Persistence\Event\LifecycleEventArgs;

class DatabaseActivity
{
    // the listener methods receive an argument which gives you access to
    // both the entity object of the event and the entity manager itself
    public function postUpdate(LifecycleEventArgs $args): void
    {
        $entity = $args->getObject();

        if (!$entity instanceof Society) {

            return;
        }

        $version = $args->getObjectManager()->getRepository(Version::class)->findById($entity->getId());

        if(empty($version)){
            $version = new Version();
            $version->setName($entity->getName());
            $version->setCapital($entity->getCapital());
            $version->setCityOfRegistration($entity->getCityOfRegistration());
            $version->setLegalForm($entity->getLegalForm());
            $version->setRegistration($entity->getRegistration());
            $version->setCapital($entity->getCapital());
            $version->setSirenNumber($entity->getSirenNumber());
            $version->setUpdatedAt($entity->getUpdatedAt());
        }

        $args->getObjectManager()->persist($version);
        $args->getObjectManager()->flush();

    }
}
