<?php

namespace App\Form;

use App\Entity\Demande;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DemandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('idEtudiant',TextType::class,[
                'attr' => [
                    'placeholder'=>'Nom Ecole',
                    'class'=>'form-control form-control-lg'
                ]
            ])
            ->add('EmailEtudiant',EmailType::class,[
                'label' => 'sasisir votre Email ...',
                'attr' => [
                    'placeholder'=>'exemple@gmail.com',
                    'class'=>'form-control form-control-lg'
                ]
            ])
            ->add('EcoleP',TextType::class,[
                'attr' => [
                    'placeholder'=>'Nom Ecole',
                    'class'=>'form-control form-control-lg'
                ]
            ])
            ->add('Departement',TextType::class,[
                'attr' => [
                    'placeholder'=>'Nom Ecole',
                    'class'=>'form-control form-control-lg'
                ]
            ])
            ->add('MoyenneG3eme',TextType::class,[
                'attr' => [
                    'placeholder'=>'Nom Ecole',
                    'class'=>'form-control form-control-lg'
                ]
            ])
            ->add('MoyenneG4eme',TextType::class,[
                'attr' => [
                    'placeholder'=>'Nom Ecole',
                    'class'=>'form-control form-control-lg'
                ]
            ])
            ->add('cv', FileType::class, [
                'label' => 'donner votre cv * File',

                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => false,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpg',
                            'image/png',
                            'image/gif',
                            'image/pdf',
                        ],
                        'mimeTypesMessage' => 'Please upload a valid image document',
                    ])
                ],
            ])
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Demande::class,
        ]);
    }
}
