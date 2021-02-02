<?php

namespace Vibrato;

use Vibrato\Core\BaseTheme;
use Vibrato\CustomFields\ThemeCarbonFields;
use Vibrato\Helpers\ThemeHelpers;

/**
 * class Theme
 *
 * @since 1.0.0
 */
final class Theme extends BaseTheme
{
    use ThemeHelpers;

    /**
     * @since 1.0.0
     */
    protected function register(): void
    {
        $this->setup();
        $this->add_filters();
        $this->add_actions();
        $this->register_widgets();
        $this->register_nav_menus();
        $this->register_custom_taxonomies();
        $this->register_custom_post_types();
        $this->register_custom_fields();
    }

    /**
     * @since 1.0.0
     */
    protected function setup(): void
    {
        ThemeSetup::boot();
    }

    /**
     * @since 1.0.0
     */
    protected function add_filters(): void
    {
        ThemeFilters::boot();
    }

    /**
     * @since 1.0.0
     */
    protected function add_actions(): void
    {
        ThemeActions::boot();
    }

    /**
     * @since 1.0.0
     */
    protected function register_widgets(): void
    {
        ThemeWidgets::boot();
    }

    /**
     * @since 1.0.0
     */
    protected function register_nav_menus(): void
    {
        ThemeMenus::boot();
    }

    /**
     * @since 1.0.0
     */
    protected function register_custom_taxonomies(): void
    {
        add_action('init', function () {
            //register_taxonomy('', []);
        });
    }

    /**
     * @since 1.0.0
     */
    protected function register_custom_post_types(): void
    {
        add_action('init', function () {
            //register_post_type('', []);
        }, 0);
    }

    /**
     * @since 1.0.0
     */
    protected function register_custom_fields(): void
    {
        /**
         * Initialize all the Carbon Fields
         */
        add_action('after_setup_theme', function () {
            \Carbon_Fields\Carbon_Fields::boot();
        });

        ThemeCarbonFields::boot();
    }
}
