<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ApiVersioningServiceProvider extends ServiceProvider
{
    protected array $versions = [
        // RegisterCustomerRequestInterface::class => [
        //     'v1' => RegisterCustomerRequestV1::class,
        // ],
    ];

    public function register(): void
    {
        $abstractions = array_keys($this->versions);

        foreach ($abstractions as $abstract) {
            $this->app->bind($abstract, function () use ($abstract) {
                return $this->getImplementation($abstract);
            });
        }
    }

    protected function getImplementation(string $abstract): mixed
    {
        $version = $this->app->get('api.version');

        if (!isset($this->versions[$abstract])) {
            throw new \RuntimeException('Версия API ['.$abstract.'] некорректна!');
        } elseif (!isset($this->versions[$abstract][$version])) {
            throw new \RuntimeException('Версия API ['.$abstract.'] не имеет реализации для версии ['.$version.']!');
        }

        return $this->app->make($this->versions[$abstract][$version]);
    }
}