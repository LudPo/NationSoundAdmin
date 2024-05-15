<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use App\Controller\Admin\BaseAdminController;

class UserCrudController extends BaseAdminController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $rolesChoices = [
            'User' => 'ROLE_USER',
            'Admin' => 'ROLE_ADMIN',
            'SuperAdmin' => 'ROLE_SUPER_ADMIN'
        ];

        return [
            EmailField::new('email'),
            TextField::new('plainPassword')
                ->onlyOnForms()
                ->setLabel('Password')
                ->setRequired(true)
                ->setFormTypeOptions(['attr' => ['autocomplete' => 'off']]),
            ChoiceField::new('roles')
                ->onlyOnForms()
                ->setLabel('Role')
                ->setChoices($rolesChoices)
                ->allowMultipleChoices()
        ];
    }
}
