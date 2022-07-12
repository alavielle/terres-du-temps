<?php

namespace App\Controller\Admin;

use App\Entity\Agenda;

use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AgendaCrudController extends AbstractCrudController
{
    public const AGENDA_BASE_PATH = 'upload/images/agenda';
    public const AGENDA_UPLOAD_DIR = 'public/upload/images/agenda';

    public static function getEntityFqcn(): string
    {
        return Agenda::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name','Nom de l\'événement'),
            DateTimeField::new('date','Date de l\'événement'),
            TextField::new('localisation','Localisation'),
            TextField::new('plan','plan'),
            TextEditorField::new('mot_organisateur','Mot de l\'organisateur'),
            TextEditorField::new('description','Description'),
            ChoiceField::new('event_type','Type d\événement')
            ->autocomplete()
            ->setChoices([  'Fête' => 'FETE',
                            'Marché / Bourse aux collectionneurs' => 'MARCHE',
                            'Campement' => 'CAMPEMENT',
                            'Commémoration' => 'COMMEMORATION',
                            'Festival' => 'FESTIVAL',
                            'Exposition' => 'EXPOSITION',
                            'Salon' => 'SALON'
  
                        ]),

            ChoiceField::new('periode','Periode')
            ->autocomplete()
            ->setChoices([  'La Préhistoire' => 'PREHISTOIRE',
                            'L’Antiquité' => 'ANTIQUITE',
                            'Le Moyen-Age' => 'MOYEN_AGE',
                            'Les Temps modernes' => 'TEMPS_MODERN',
                            'L\'Époque Contemporaine' => 'EPOQUE_CONTEMPORAINE'
  
                        ]),
            ImageField::new('photo','Photo') 
                    ->setBasePath(self::AGENDA_BASE_PATH)
                    ->setUploadDir(self::AGENDA_UPLOAD_DIR)
                    ->setSortable(false),
            BooleanField::new('is_followed','TT aime'),
            BooleanField::new('is_in_home_page','À la une')
        ];

    }
    
}
