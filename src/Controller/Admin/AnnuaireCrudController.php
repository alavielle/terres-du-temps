<?php

namespace App\Controller\Admin;

use App\Entity\Annuaire;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AnnuaireCrudController extends AbstractCrudController
{
    public const ANNUAIRE_BASE_PATH = 'upload/images/annuaire';
    public const ANNUAIRE_UPLOAD_DIR = 'public/upload/images/annuaire';

    public static function getEntityFqcn(): string
    {
        return Annuaire::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name','Nom de l\'association'),
            TextField::new('mot_president','Le mot du président'),
            TextField::new('contact_mail','Mail de contact'),
            TextEditorField::new('description','Description'),
            ChoiceField::new('structure','Structure')
                ->autocomplete()
                ->setChoices([  'Association' => 'FETE',
                            'Artisan' => 'MARCHE',
                            'Commerçant' => 'CAMPEMENT',
                            'Artiste' => 'COMMEMORATION',
                            'Cascadeur/Maître d’arme' => 'FESTIVAL',
                            'Eleveur / Dresseur' => 'EXPOSITION'
  
                        ]),
            ChoiceField::new('periode','Periode')
                ->autocomplete()
                ->setChoices([  'La Préhistoire' => 'PREHISTOIRE',
                                'L’Antiquité' => 'ANTIQUITE',
                                'Le Moyen-Age' => 'MOYEN_AGE',
                                'Les Temps modernes' => 'TEMPS_MODERN',
                                'L\'Époque Contemporaine' => 'EPOQUE_CONTEMPORAINE'
              
                            ]),
            ImageField::new('photo','Logo') 
                ->setBasePath(self::ANNUAIRE_BASE_PATH)
                ->setUploadDir(self::ANNUAIRE_UPLOAD_DIR)
                ->setSortable(false),
            TextField::new('web_site','Site web'),
            TextField::new('instagram','Instagram'),
            TextField::new('youtube','Youtube'),
            TextField::new('facebook','Facebook'),   
            TextField::new('localisation','Localisation'),
            BooleanField::new('is_followed','TT aime'),
            BooleanField::new('is_in_home_page','À la une'),

            TextField::new('phone_number','Num Tel'),
            TextField::new('adresse','Adresse'),
            TextField::new('ville','Ville'),
            TextField::new('postale','Code postale')
        ];
    }
    
}
