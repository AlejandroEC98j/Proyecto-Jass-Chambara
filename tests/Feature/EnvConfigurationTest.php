<?php

namespace Tests\Feature;

use Tests\TestCase;

class EnvConfigurationTest extends TestCase
{
    public function test_env_configuracion_correcta()
    {
        $this->assertEquals(env('DB_DATABASE'), 'jass_unas');
        $this->assertEquals(env('APP_ENV'), 'testing');
        $this->assertNotEmpty(env('APP_KEY'));
    }
}
