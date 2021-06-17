<?php

namespace App\DataFixtures;

use App\Entity\LegalForm;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{

    private $data = [
                        "Entrepreneur individuel",
                        "Groupement de droit privé non doté de la personnalité morale",
                        "Indivision",
                        "Indivision entre personnes physiques",
                        "Indivision avec personne morale",
                        "Société créée de fait",
                        "Société créée de fait entre personnes physiques",
                        "Société créée de fait avec personne morale",
                        "Société en participation",
                        "Société en participation entre personnes physiques",
                        "Société en participation avec personne morale",
                        "Société en participation de professions libérales",
                        "Fiducie",
                        "Paroisse hors zone concordataire",
                        "Autre groupement de droit privé non doté de la personnalité morale",
                        "Personne morale de droit étranger",
                        "Personne morale de droit étranger, immatriculée au RCS (registre du commerce et des
                        sociétés)",
                        "Représentation ou agence commerciale d'état ou organisme public étranger immatriculé au
                        RCS",
                        "Société commerciale étrangère immatriculée au RCS",
                        "Personne morale de droit étranger, non immatriculée au RCS",
                        "Organisation internationale",
                        "État, collectivité ou établissement public étranger",
                        "Société étrangère non immatriculée au RCS",
                        "Autre personne morale de droit étranger",
                        "Personne morale de droit public soumise au droit commercial",
                        "Etablissement public ou régie à caractère industriel ou commercial",
                        "Établissement public national à caractère industriel ou commercial doté d'un comptable
                        public",
                        "Établissement public national à caractère industriel ou commercial non doté d'un comptable
                        public",
                        "Exploitant public",
                        "Établissement public local à caractère industriel ou commercial",
                        "Régie d'une collectivité locale à caractère industriel ou commercial",
                        "Institution Banque de France",
                        "Société commerciale",
                        "Société coopérative commerciale particulière",
                        "Société de caution mutuelle",
                        "Société coopérative de banque populaire",
                        "Caisse de crédit maritime mutuel",
                        "Caisse (fédérale) de crédit mutuel",
                        "Association coopérative inscrite (droit local Alsace Moselle)",
                        "Caisse d'épargne et de prévoyance à forme coopérative",
    ];

    public function load(ObjectManager $manager)
    {

        foreach ($this->data as $value){
            $legalForm = new LegalForm();
            $legalForm->setName($value);
            $manager->persist($legalForm);
        }

        $manager->flush();
    }
}
