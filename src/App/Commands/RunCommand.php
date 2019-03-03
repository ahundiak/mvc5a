<?php
declare(strict_types=1);

namespace App\Commands;

use App\Controllers\HomeController;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

class RunCommand extends Command
{
    protected static $defaultName = 'app:run';

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('app:run');

        $routes = new RouteCollection();
        $routes->add('index',new Route('/',[
            '_controller' => HomeController::class,
            '_action' => 'Index',
            '_view'   => 'Home/Index.phtml'
        ]));
        $routes->add('home',new Route('/home',[
            '_controller' => HomeController::class,
            '_action' => 'Index',
            '_view'   => 'Home/Index.phtml'
        ]));
        $routes->add('home_index',new Route('/home/index',[
            '_controller' => HomeController::class,
            '_action' => 'Index',
            '_view'   => 'Home/Index.phtml'
        ]));
        $routes->add('home_about',new Route('/home/about',[
            '_controller' => HomeController::class,
            '_action' => 'About',
            '_view'   => 'Home/About.phtml'
        ]));

        $context = new RequestContext('/');

        $matcher = new UrlMatcher($routes, $context);

        $parameters = $matcher->match('/home/index');
        var_dump($parameters);

        $parameters = $matcher->match('/home');
        var_dump($parameters);

        $parameters = $matcher->match('/');
        var_dump($parameters);
    }
}