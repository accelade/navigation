<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Blade;

beforeEach(function () {
    Blade::componentNamespace('Accelade\\Navigation\\Components', 'navigation');
});

it('renders footer component', function () {
    $html = Blade::render('<x-navigation::footer />');

    expect($html)
        ->toContain('data-slot="footer"')
        ->toContain('data-navigation="footer"')
        ->toContain('<footer');
});

it('renders footer with default copyright', function () {
    $html = Blade::render('<x-navigation::footer />');

    $currentYear = date('Y');

    expect($html)
        ->toContain('data-slot="footer-copyright"')
        ->toContain($currentYear)
        ->toContain('All rights reserved');
});

it('renders footer with custom brand', function () {
    $html = Blade::render('<x-navigation::footer brand="Accelade" />');

    expect($html)
        ->toContain('Accelade')
        ->toContain('All rights reserved');
});

it('renders footer with custom copyright text', function () {
    $html = Blade::render('<x-navigation::footer copyright="Made with love" />');

    expect($html)
        ->toContain('Made with love')
        ->not->toContain('All rights reserved');
});

it('renders footer with custom year', function () {
    $html = Blade::render('<x-navigation::footer year="2020" />');

    expect($html)
        ->toContain('2020');
});

it('renders footer with default slot content', function () {
    $html = Blade::render('<x-navigation::footer>Extra Content</x-navigation::footer>');

    expect($html)
        ->toContain('data-slot="footer-content"')
        ->toContain('data-navigation="footer-content"')
        ->toContain('Extra Content');
});

it('renders footer with leading slot', function () {
    $html = Blade::render('
        <x-navigation::footer>
            <x-slot:leading>Custom Leading</x-slot:leading>
        </x-navigation::footer>
    ');

    expect($html)
        ->toContain('data-slot="footer-leading"')
        ->toContain('data-navigation="footer-leading"')
        ->toContain('Custom Leading')
        ->not->toContain('data-slot="footer-copyright"');
});

it('renders footer with center slot', function () {
    $html = Blade::render('
        <x-navigation::footer>
            <x-slot:center>Center Content</x-slot:center>
        </x-navigation::footer>
    ');

    expect($html)
        ->toContain('data-slot="footer-center"')
        ->toContain('data-navigation="footer-center"')
        ->toContain('Center Content');
});

it('renders footer with trailing slot', function () {
    $html = Blade::render('
        <x-navigation::footer>
            <x-slot:trailing>Social Icons</x-slot:trailing>
        </x-navigation::footer>
    ');

    expect($html)
        ->toContain('data-slot="footer-trailing"')
        ->toContain('data-navigation="footer-trailing"')
        ->toContain('Social Icons');
});

it('renders footer with all slots', function () {
    $html = Blade::render('
        <x-navigation::footer>
            <x-slot:leading>Logo</x-slot:leading>
            <x-slot:center>Links</x-slot:center>
            <x-slot:trailing>Social</x-slot:trailing>
        </x-navigation::footer>
    ');

    expect($html)
        ->toContain('data-slot="footer-leading"')
        ->toContain('data-slot="footer-center"')
        ->toContain('data-slot="footer-trailing"')
        ->toContain('Logo')
        ->toContain('Links')
        ->toContain('Social');
});

it('accepts custom classes', function () {
    $html = Blade::render('<x-navigation::footer class="px-4 py-3 border-t" />');

    expect($html)
        ->toContain('px-4')
        ->toContain('py-3')
        ->toContain('border-t');
});

it('uses app name as default brand', function () {
    config(['app.name' => 'TestApp']);

    $html = Blade::render('<x-navigation::footer />');

    expect($html)
        ->toContain('TestApp');
});
