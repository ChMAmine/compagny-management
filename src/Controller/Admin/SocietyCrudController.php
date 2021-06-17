<?php

namespace App\Controller\Admin;

use App\Entity\Society;
use App\Repository\AddressRepository;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;

class SocietyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Society::class;
    }
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm()->hideOnDetail()->hideOnIndex(),
            TextField::new('name'),
            IntegerField::new('siren_number'),
            TextField::new('city_of_registration'),
            DateField::new('registration'),
            MoneyField::new('capital')->setCurrency('EUR'),
            AssociationField::new('addresses')
                ->setFormTypeOptions([
                    'by_reference' => false,
                ])
               /* ->setFormTypeOption(
                    'query_builder', function (AddressRepository  $addressRepository){
                    return $addressRepository->createQueryBuilder('a')
                        ->andWhere('a.society is NULL');
                })*/
                ->formatValue(function ($value, $entity) {
                    $str = $entity->getAddresses()[0];
                    for ($i = 1; $i < $entity->getAddresses()->count(); $i++) {
                        $str = $str . ", " . $entity->getAddresses()[$i];
                    }
                    return $str;
                }),
            AssociationField::new('legalForm'),
            DateTimeField::new('updatedAt'),
        ];
    }

}
