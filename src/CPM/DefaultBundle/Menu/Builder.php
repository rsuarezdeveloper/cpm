<?php
// src/Acme/DemoBundle/Menu/Builder.php
namespace CPM\DefaultBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttributes(array('class' => 'nav'));
		$menu->addChild('Configuración', array('uri' => 'javascript:void(0)'));
		$menu['Configuración']->setChildrenAttributes(array('class' => 'dropdown-menu'));
        $menu['Configuración']->addChild('Municipios', array('route' => 'municipio'));
        $menu->addChild('Editar', array(
            'route' => 'municipio_edit',
            'routeParameters' => array('id' => 1)
        ));
        // ... add more children

        return $menu;
    }
}