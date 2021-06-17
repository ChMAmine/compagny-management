<?php

namespace App\Controller\Admin;

use App\Entity\Society;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SocietyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Society::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            IntegerField::new('siren_number'),
            TextField::new('city_of_registration'),
            DateField::new('registration'),
            MoneyField::new('capital')->setCurrency('EUR'),
            AssociationField::new('addresses')->setFormTypeOptions([
                'by_reference' => false,
            ]),
            AssociationField::new('legalForm'),
            DateTimeField::new('updatedAt'),
        ];
    }

}
