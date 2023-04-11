<?php 

namespace System;

/**
 * PHP Framework
 *
 * Lightweight PHP Framework
 *
 * @package		php-framework
 * @link		https://dalton.sutton.io
 * @copyright	https://unlicense.org/
 */

use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher as IlluminateDispatcher;
use Illuminate\Filesystem\Filesystem;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Engines\PhpEngine;
use Illuminate\View\Factory;
use Illuminate\View\FileViewFinder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class View {

	public static function __callStatic($viewName, $templateData = []) {
		$pathsToTemplates =  [APP . 'views'];
		$pathToCompiledTemplates = APP . 'storage' . DS . 'cache' . DS . 'views';

		// Dependencies
		$filesystem = new Filesystem;
		$eventDispatcher = new IlluminateDispatcher(new Container);

		// Create View Factory capable of rendering PHP and Blade templates
		$viewResolver = new EngineResolver;
		$bladeCompiler = new BladeCompiler($filesystem, $pathToCompiledTemplates);

		$viewResolver->register('blade', function () use ($bladeCompiler) {
			return new CompilerEngine($bladeCompiler);
		});

		$viewResolver->register('php', function () {
			return new PhpEngine;
		});

		$viewFinder = new FileViewFinder($filesystem, $pathsToTemplates);
		$viewFactory = new Factory($viewResolver, $viewFinder, $eventDispatcher);

		// if $viewName has a underscore, then it's a subfolder
		if (Str::contains($viewName, '_')) {
			$viewName = str_replace('_', '.', $viewName);
		}

		// Render template
		echo $viewFactory->make($viewName, array_merge([
			'request' => Request::capture(),
			'title' => 'PHP Framework',
			'content' => 'Lightweight PHP Framework by <a href="https://dalton.sutton.io/">Dalton Sutton</a>',
			'charset' => Config::get('app.encoding'),
			'language' => Config::get('app.language'),
			// 'auth' => Auth::user(),
			'token' => Csrf::token(),
			'styles' => Config::get('assets.styles'),
			'scripts' => Config::get('assets.scripts'),
		], $templateData[0]))->render();
		exit;
		// return new static($method, $vars);
	}

}