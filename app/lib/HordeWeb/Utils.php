<?php
/**
 * Utility functions
 * 
 */
class HordeWeb_Utils
{
    /**
     * Get a random "we are awesome" quote.
     * 
     */
    static public function getQuote()
    {
        include $GLOBALS['fs_base'] . '/config/quotes.php';
        return $quotes[rand(0, count($quotes) - 1)];
    }

}