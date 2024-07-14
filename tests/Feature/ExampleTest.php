<?php


uses(Tests\TestCase::class);

it('checking -> create-folder', function () {
    $response = $this->post('/create-folder');

    $response->assertStatus(200);
});

it('checking -> add-set', function () {
    $response = $this->post('/add-set');
    $response->assertStatus(200);
});

it('checking -> delete-folder', function () {
    $response = $this->post('/delete-folder');
    $response->assertStatus(200);
});

it('checking -> edit-folder', function () {
    $response = $this->post('/edit-folder');
    $response->assertStatus(200);
});
