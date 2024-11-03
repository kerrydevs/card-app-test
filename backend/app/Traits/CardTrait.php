<?php

namespace App\Traits;

trait CardTrait
{
    /**
     * Get card list (52 cards from types with numbers).
     *
     * @return array
     */
    public function getCardList()
    {
        // Get card shapes and numbers static data from config
        $cardShapes = config('card.shapes');
        $cardNumbers = config('card.numbers');

        $cards = [];

        // Loop over shapes and numbers to get final set of cards
        foreach ($cardShapes as $cardShape) {
            foreach ($cardNumbers as $cardNumber) {
                $cards[] = $cardShape . '-' . $cardNumber;
            }
        }

        return $cards;
    }
}