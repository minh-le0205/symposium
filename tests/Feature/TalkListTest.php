<?php

use App\Models\User;

test('testing talk list page', function () {
    $user = User::factory()
        ->hasTalks(3)
        ->create();

    $otherUserTalk = User::factory()
        ->hasTalks(2)
        ->create()
        ->talks
        ->first();

    $response = $this
        ->actingAs($user)
        ->get('/talks')
        ->assertSee($user->talks->first()->title)
        ->assertDontSee($otherUserTalk->title);

    $response->assertOk();
});

test('it show talk details when clicking on a talk', function () {
    $user = User::factory()
        ->hasTalks(1)
        ->create();

    $talk = $user->talks->first();

    $response = $this
        ->actingAs($user)
        ->get("/talks/{$talk->id}")
        ->assertSee($talk->title)
        ->assertSee($talk->description);

    $response->assertOk();
});
