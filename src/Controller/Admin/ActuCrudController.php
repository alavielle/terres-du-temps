<?php

namespace App\Controller\Admin;

use App\Entity\Actu;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;


class ActuCrudController extends AbstractCrudController
{
    public const ACTU_BASE_PATH = 'upload/images/actu';
    public const ACTU_UPLOAD_DIR = 'public/upload/images/actu';

    public static function getEntityFqcn(): string
    {
        return Actu::class;
    }
    
    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setEntityLabelInSingular('Actualité')
                    ->setEntityLabelInPlural('Actualités');
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title','Titre'),
            TextEditorField::new('description','Description'),
            ChoiceField::new('periode','Periode')
            ->autocomplete()
            ->setChoices([  'La Préhistoire' => 'PREHISTOIRE',
                            'L’Antiquité' => 'ANTIQUITE',
                            'Le Moyen-Age' => 'MOYEN_AGE',
                            'Les Temps modernes' => 'TEMPS_MODERN',
                            'L\'Époque Contemporaine' => 'EPOQUE_CONTEMPORAINE'
  
                        ]),
            ImageField::new('photo','Photo') 
                    ->setBasePath(self::ACTU_BASE_PATH)
                    ->setUploadDir(self::ACTU_UPLOAD_DIR)
                    ->setSortable(false),
            BooleanField::new('active','Active'),
            BooleanField::new('is_in_home_page','À la une')
        ];


    }
    
}
