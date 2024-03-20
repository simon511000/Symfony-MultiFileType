<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MultiFileType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'multiple' => true,
        ]);
    }

    public function getBlockPrefix() 
    {
        return 'multifile';
    }

    public function getParent()
    {
        return FileType::class;
    }
}
