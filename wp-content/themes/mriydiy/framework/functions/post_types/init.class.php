<?php

namespace PS\Functions\Post_Types;

/**
 * Class Init
 * @package     PS\Functions\Post_Types
 * @since       1.0.0
 */
class Init {

    /**
     * Enable initialization
     * @return bool
     */
    public static function is_initialize() {
        return true;
    }

    /**
     * Init constructor.
     */
    public function __construct() {
        /*
         * Call child classes
         */
        new Call();
        new Camps();
        new Clubs();
        new Cv();
        new Documents();
        new Enter();
        new Faq();
        new News();
        new Page();
        new Question();
        new Reviews();
        new Schools();
        new Subscribe();
        new Team();
        new Vacancies();
        new Video();
    }

}