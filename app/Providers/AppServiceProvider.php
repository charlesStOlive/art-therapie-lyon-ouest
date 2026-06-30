<?php

namespace App\Providers;

use Filament\Forms\Components\FileUpload;
use Filament\Infolists\Components\ImageEntry;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Support\Facades\FilamentView;
use Filament\Tables\Columns\ImageColumn;
use Filament\View\PanelsRenderHook;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        FilamentView::registerRenderHook(
            'panels::auth.login.form.after',
            fn(): View => view('filament.hooks.login_extra')
        );

        FilamentView::registerRenderHook(
            PanelsRenderHook::PAGE_HEADER_WIDGETS_AFTER,
            fn(): View => view('filament.hooks.two-col-open')->render(),
            // Limite aux pages concernées (IMPORTANT pour éviter d’affecter toutes les pages)
            scopes: [
                // EditQuote::class,
                // EditInvoice::class,
                // ajoute ici d'autres pages si besoin
            ],
        );

        // Ferme le layout + injecte l’infolist juste avant les footer widgets
        FilamentView::registerRenderHook(
            PanelsRenderHook::PAGE_FOOTER_WIDGETS_BEFORE,
            fn(): View => view('filament.hooks.two-col-close')->render(),
            scopes: [
                // EditQuote::class,
                // EditInvoice::class,
            ],
        );

        // Préserver le comportement v3 pour la visibilité des fichiers (si vous utilisez des disques non-locaux)
        FileUpload::configureUsing(fn(FileUpload $fileUpload) => $fileUpload
            ->visibility('public'));

        ImageColumn::configureUsing(fn(ImageColumn $imageColumn) => $imageColumn
            ->visibility('public'));

        ImageEntry::configureUsing(fn(ImageEntry $imageEntry) => $imageEntry
            ->visibility('public'));

        // Préserver le comportement v3 pour les composants de layout
        Fieldset::configureUsing(fn(Fieldset $fieldset) => $fieldset
            ->columnSpanFull());

        Grid::configureUsing(fn(Grid $grid) => $grid
            ->columnSpanFull());

        Section::configureUsing(fn(Section $section) => $section
            ->columnSpanFull());
    }
}
