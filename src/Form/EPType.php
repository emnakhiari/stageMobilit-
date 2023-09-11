<?php

namespace App\Form;

use App\Entity\EcolePartenaire;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EPType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('email',EmailType::class,[
            'label' => 'sasisir votre Email ...',
            'attr' => [
                'placeholder'=>'exemple@gmail.com',
                'class'=>'form-control form-control-lg'
            ]
        ])
        ->add('image', FileType::class, [
            'label' => 'votre image de profil (image)',

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
                    ],
                    'mimeTypesMessage' => 'Please upload a valid image document',
                ])
            ],
        ])
            ->add('description',TextareaType::class, [
                'attr' => ['class' => 'tinymce' ,   'class'=>'form-control form-control-lg'],
            ])
            ->add('nom',TextType::class,[
                'attr' => [
                    'placeholder'=>'Nom Ecole',
                    'class'=>'form-control form-control-lg'
                ]
            ])
          
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EcolePartenaire::class,
        ]);
    }
}
