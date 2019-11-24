<?php


namespace App\Form;


use App\Entity\Author;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class BookFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('createdAt', DateType::class,['label' => 'Дата книги', 'years' => range(1500,2100)])
            ->add('title', TextType::class,['label' => 'Наименование'])
//            ->add('author', EntityType::class, ['class' => Author::class,
//                'choice_label' => 'name', 'label' => 'Авторы'])
            ->add('save', SubmitType::class, ['label' => 'Сохранить']);
    }

}