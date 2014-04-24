<?php
// src/Blogger/BlogBundle/Admin/BlogAdmin.php

namespace Blogger\BlogBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class BlogAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title', 'text', array('label' => 'Post Title'))
            ->add('user', 'entity', array('class' => 'Blogger\UserBundle\Entity\User'))
            ->add('blog', null, array('attr'=>array("class"=>"tinymce","data-theme"=>"blog"))) //if no type is specified, SonataAdminBundle tries to guess it
            ->add('tags','text', array('attr'=>array("class"=>"IamTagable")));
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('user');
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('title')
            ->add('slug')
            ->add('user')
            ->add('_action', 'actions', array(
            'actions' => array(
          //      'show' => array(),
                'edit' => array(),
                'delete' => array(),
            )
        ));

    }
    
     protected function configureShowFields(ShowMapper $showMapper)
    {
        // Here we set the fields of the ShowMapper variable, $showMapper (but this can be called anything)
	$showMapper
            /*
             * The default option is to just display the value as text (for boolean this will be 1 or 0)
             */
            ->add('id')
            ->add('title')
            ->add('slug')
            ->add('user')
            ->add('blogs')
            ->add('tags');

    }
}
