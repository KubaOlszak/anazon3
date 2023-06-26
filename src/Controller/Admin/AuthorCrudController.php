<?php

namespace App\Controller\Admin;

use App\Entity\Author;
use App\Form\BookChildType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;

class AuthorCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Author::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield Field::new('name');
        yield AssociationField::new('books');
        yield CollectionField::new('books')
                ->setEntryType(BookChildType::class)
                ->allowAdd(true)
                ->allowDelete(true);
    }   
}
