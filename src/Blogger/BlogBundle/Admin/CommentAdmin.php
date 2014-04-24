<?php
// src/Blogger/BlogBundle/Admin/BlogAdmin.php

namespace Blogger\BlogBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class CommentAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('comment', 'text', array('label' => 'Post Title'))
            ->add('user', 'entity', array('class' => 'Blogger\UserBundle\Entity\User'))
            ->add('blog','entity',array('class'=>'Blogger\BlogBundle\Entity\Blog')) //if no type is specified, SonataAdminBundle tries to guess it
            ->add('approved');
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('blog')
            ->add('user');
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('comment')
            ->add('user')
            ->add('blog')
            ->add('approved');
            
    }
}
