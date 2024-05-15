<?php

namespace App\Controller\Admin;

use App\Entity\Location;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use App\Controller\Admin\BaseAdminController;

class LocationCrudController extends BaseAdminController
{
    public static function getEntityFqcn(): string
    {
        return Location::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('locationName'),
            AssociationField::new('locationCategory'),
            NumberField::new('latitude')->setNumDecimals(7),
            NumberField::new('longitude')->setNumDecimals(7),
            ImageField::new('locationIcon')
                ->setBasePath('uploads/icons')
                ->setUploadDir('public/uploads/icons')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
        ];
    }
}
