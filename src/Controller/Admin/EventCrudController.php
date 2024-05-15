<?php

namespace App\Controller\Admin;

use App\Entity\Event;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use App\Controller\Admin\BaseAdminController;

class EventCrudController extends BaseAdminController
{
    public static function getEntityFqcn(): string
    {
        return Event::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('artist'),
            AssociationField::new('musicalGenre'),
            AssociationField::new('location')
                ->setLabel('Stage')
                //only show Stage from location
                ->setQueryBuilder(
                    function (QueryBuilder $queryBuilder) {
                        return $queryBuilder
                            ->join('entity.locationCategory', 'lc')
                            ->where('lc.locationCategory = :categoryName')
                            ->setParameter('categoryName', 'stage');
                    }
                ),
            DateTimeField::new('startDate'),
            DateTimeField::new('endDate')
        ];
    }
}
