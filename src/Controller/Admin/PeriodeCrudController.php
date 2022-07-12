<?php

namespace App\Controller\Admin;

use App\Entity\Periode;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PeriodeCrudController extends AbstractCrudController
{
    public const PERIODE_BASE_PATH = 'upload/images/periode';
    public const PERIODE_UPLOAD_DIR = 'public/upload/images/periode';

    public static function getEntityFqcn(): string
    {
        return Periode::class;
    }

    
    public function configureCrud(Crud $crud): Crud
    {
        return $crud->setEntityLabelInSingular('Période')
                    ->setEntityLabelInPlural('Périodes');
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextEditorField::new('description','Description'),
            ChoiceField::new('periode','Periode')
            ->autocomplete()
            ->setChoices([  'La Préhistoire' => 'PREHISTOIRE',
                            'L’Antiquité' => 'ANTIQUITE',
                            'Le Moyen-Age' => 'MOYEN_AGE',
                            'Les Temps modernes' => 'TEMPS_MODERN',
                            'L\'Époque Contemporaine' => 'EPOQUE_CONTEMPORAINE'
  
                        ]),
            ImageField::new('image','Image') 
                    ->setBasePath(self::PERIODE_BASE_PATH)
                    ->setUploadDir(self::PERIODE_UPLOAD_DIR)
                    ->setSortable(false),
            BooleanField::new('active','Active'),
            BooleanField::new('is_in_home_page','À la une')
        ];


    }

}
