<?php
use Joomla\CMS\Extension\ComponentInterface;
use Joomla\CMS\Extension\Service\Provider\ComponentDispatcherFactory;
use Joomla\CMS\Extension\Service\Provider\MVCFactory;
use Joomla\CMS\Dispatcher\ComponentDispatcherFactoryInterface;
use Joomla\CMS\MVC\Factory\MVCFactoryInterface;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;

return new class implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $ns = '\\YourITHelp\\Component\\Membership';
        $container->registerServiceProvider(
            new ComponentDispatcherFactory($ns)
        );
        $container->registerServiceProvider(
            new MVCFactory($ns)
        );

        $container->set(
            ComponentInterface::class,
            function (Container $container) use ($ns) {
                $component = new \YourITHelp\Component\Membership\Administrator\Extension\MembershipComponent(
                    $container->get(ComponentDispatcherFactoryInterface::class)
                );
                $component->setMVCFactory(
                    $container->get(MVCFactoryInterface::class)
                );
                return $component;
            }
        );
    }
};
