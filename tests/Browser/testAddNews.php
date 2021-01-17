<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class testAddNews extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/create')
                ->assertSee('Название новости')
                ->assertSee('Описание')
                ->type('tittle', '')
                ->press('Сохранить')
                ->assertSee('Поле Название новости обязательно для заполнения')
                ->type('tittle', 'asdasvaseraerb')
                ->type('content', '')
                ->press('Сохранить')
                ->assertSee('Поле Описание обязательно для заполнения.')
                ->type('tittle', '11')
                ->press('Сохранить')
                ->assertSee('Количество символов в поле Название новости должно быть не меньше 10.')
            ;
        });
    }
}
